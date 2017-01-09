<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Organisateurs Controller
 *
 * @property \App\Model\Table\OrganisateursTable $Organisateurs
 */
class OrganisateursController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Evenements', 'Participants']
        ];
        $organisateurs = $this->paginate($this->Organisateurs);

        $this->set(compact('organisateurs'));
        $this->set('_serialize', ['organisateurs']);
    }

    /**
     * View method
     *
     * @param string|null $id Organisateur id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $organisateur = $this->Organisateurs->get($id, [
            'contain' => ['Evenements', 'Participants']
        ]);

        $this->set('organisateur', $organisateur);
        $this->set('_serialize', ['organisateur']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $organisateur = $this->Organisateurs->newEntity();
        if ($this->request->is('post')) {
            $organisateur = $this->Organisateurs->patchEntity($organisateur, $this->request->data);
            if ($this->Organisateurs->save($organisateur)) {
                $this->Flash->success(__('The organisateur has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The organisateur could not be saved. Please, try again.'));
            }
        }
        $evenements = $this->Organisateurs->Evenements->find('list', ['limit' => 200]);
        $participants = $this->Organisateurs->Participants->find('list', ['limit' => 200]);
        $this->set(compact('organisateur', 'evenements', 'participants'));
        $this->set('_serialize', ['organisateur']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Organisateur id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $organisateur = $this->Organisateurs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $organisateur = $this->Organisateurs->patchEntity($organisateur, $this->request->data);
            if ($this->Organisateurs->save($organisateur)) {
                $this->Flash->success(__('The organisateur has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The organisateur could not be saved. Please, try again.'));
            }
        }
        $evenements = $this->Organisateurs->Evenements->find('list', ['limit' => 200]);
        $participants = $this->Organisateurs->Participants->find('list', ['limit' => 200]);
        $this->set(compact('organisateur', 'evenements', 'participants'));
        $this->set('_serialize', ['organisateur']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Organisateur id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $organisateur = $this->Organisateurs->get($id);
        if ($this->Organisateurs->delete($organisateur)) {
            $this->Flash->success(__('The organisateur has been deleted.'));
        } else {
            $this->Flash->error(__('The organisateur could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
