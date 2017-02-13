<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
/**
 * Reservations Controller
 *
 * @property \App\Model\Table\ReservationsTable $Reservations
 */
class ReservationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $usersTable = TableRegistry::get('Users');
        $usersParticipant = TableRegistry::get('Participants');
        $leUser = $usersTable->find()->where(['id' => $this->request->session()->read('Auth.User.id')]);

        $participant = $usersParticipant->find()->where(['email_participant' => $leUser->first()->email]);
        $par = $participant->count();

        if( $par == 0)
        {
            $this->Flash->error(__('Aucune reservation.'));
            return $this->redirect(['controller'=>'evenements','action' => 'index']);
        }
        else
        {
            $conn = ConnectionManager::get('default');
            $evenements = $conn->execute('SELECT * FROM Reservations, Evenements 
          WHERE participant_id ='.$participant->first()->id.' 
          AND Evenements.id = Reservations.evenement_id');

            $this->set('evenements', $evenements);
        }


    }

    /**
     * View method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => ['Evenements', 'Participants', 'Paiement']
        ]);

        $this->set('reservation', $reservation);
        $this->set('_serialize', ['reservation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reservation = $this->Reservations->newEntity();
        if ($this->request->is('post')) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->data);
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
            }
        }
        $evenements = $this->Reservations->Evenements->find('list', ['limit' => 200]);
        $participants = $this->Reservations->Participants->find('list', ['limit' => 200]);
        $this->set(compact('reservation', 'evenements', 'participants'));
        $this->set('_serialize', ['reservation']);
    }
    public function addReservationAndParticipant($id)
    {
        $participantTable = TableRegistry::get('Participants');
        $participant = $participantTable->newEntity();
        $participant->prenom_participant = $this->request->session()->read('Auth.User.prenom');
        $participant->nom_participant = $this->request->session()->read('Auth.User.nom');
        $participant->email_participant = $this->request->session()->read('Auth.User.email');
        $participantTable->save($participant);

        $reservationTable = TableRegistry::get('Reservations');
        $reservation = $reservationTable->newEntity();

        $reservation->evenement_id = $id;
        $reservation->participant_id = $participant->id;
        $reservationTable->save($reservation);


        $this->Flash->success(__('La reservation est bien enregistré.'));

        return $this->redirect(['action' => 'index']);
    }
    /**
     * Edit method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservation = $this->Reservations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->data);
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
            }
        }
        $evenements = $this->Reservations->Evenements->find('list', ['limit' => 200]);
        $participants = $this->Reservations->Participants->find('list', ['limit' => 200]);
        $this->set(compact('reservation', 'evenements', 'participants'));
        $this->set('_serialize', ['reservation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservation = $this->Reservations->get($id);
        if ($this->Reservations->delete($reservation)) {
            $this->Flash->success(__('The reservation has been deleted.'));
        } else {
            $this->Flash->error(__('The reservation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
