<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Participants Controller
 *
 * @property \App\Model\Table\ParticipantsTable $Participants
 */
class ParticipantsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $participants = $this->paginate($this->Participants);

        $this->set(compact('participants'));
        $this->set('_serialize', ['participants']);
    }

    /**
     * View method
     *
     * @param string|null $id Participant id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $participant = $this->Participants->get($id, [
            'contain' => ['Organisateurs', 'Reservation']
        ]);

        $this->set('participant', $participant);
        $this->set('_serialize', ['participant']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user();
        debug($user);
        $participant = $this->Participants->newEntity();
        if ($this->request->is('post')) {
            $participant->nom_participant = $user['nom'];
            $participant->prenom_participant = $user['prenom'];
            $participant->email_participant = $user['email'];
            $this->Participants->pahtchEntity($participant, $this->request->data);
            if ($this->Participants->save($participant)) {
                echo '<br><br>';
                $this->Flash->success(__('The participant has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The participant could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('participant'));
        $this->set('_serialize', ['participant']);
    }



    /**
     * Edit method
     *
     * @param string|null $id Participant id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $participant = $this->Participants->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $participant = $this->Participants->patchEntity($participant, $this->request->data);
            if ($this->Participants->save($participant)) {
                $this->Flash->success(__('The participant has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The participant could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('participant'));
        $this->set('_serialize', ['participant']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Participant id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $participant = $this->Participants->get($id);
        if ($this->Participants->delete($participant)) {
            $this->Flash->success(__('The participant has been deleted.'));
        } else {
            $this->Flash->error(__('The participant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
