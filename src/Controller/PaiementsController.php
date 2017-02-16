<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Paiements Controller
 *
 * @property \App\Model\Table\PaiementsTable $Paiements
 */
class PaiementsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Paiements', 'PagePayees', 'Reservations']
        ];
        $paiements = $this->paginate($this->Paiements);

        $this->set(compact('paiements'));
        $this->set('_serialize', ['paiements']);
    }

    /**
     * View method
     *
     * @param string|null $id Paiement id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paiement = $this->Paiements->get($id, [
            'contain' => ['Paiements', 'PagePayees', 'Reservations']
        ]);

        $this->set('paiement', $paiement);
        $this->set('_serialize', ['paiement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($idReservation)
    {
        $paiement = $this->Paiements->newEntity();
        if ($this->request->is('post')) {
            $paiement = $this->Paiements->patchEntity($paiement, $this->request->data);
            if ($this->Paiements->save($paiement)) {
                $this->Flash->success(__('The paiement has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The paiement could not be saved. Please, try again.'));
            }
        }
        $paiements = $this->Paiements->Paiements->find('list', ['limit' => 200]);
        $pagePayees = $this->Paiements->PagePayees->find('list', ['limit' => 200]);
        $reservations = $this->Paiements->Reservations->find('list', ['limit' => 200]);
        $this->set(compact('paiement', 'paiements', 'pagePayees', 'reservations'));
        $this->set('_serialize', ['paiement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Paiement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paiement = $this->Paiements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paiement = $this->Paiements->patchEntity($paiement, $this->request->data);
            if ($this->Paiements->save($paiement)) {
                $this->Flash->success(__('The paiement has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The paiement could not be saved. Please, try again.'));
            }
        }
        $paiements = $this->Paiements->Paiements->find('list', ['limit' => 200]);
        $pagePayees = $this->Paiements->PagePayees->find('list', ['limit' => 200]);
        $reservations = $this->Paiements->Reservations->find('list', ['limit' => 200]);
        $this->set(compact('paiement', 'paiements', 'pagePayees', 'reservations'));
        $this->set('_serialize', ['paiement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Paiement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paiement = $this->Paiements->get($id);
        if ($this->Paiements->delete($paiement)) {
            $this->Flash->success(__('The paiement has been deleted.'));
        } else {
            $this->Flash->error(__('The paiement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
