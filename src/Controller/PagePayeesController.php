<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PagePayees Controller
 *
 * @property \App\Model\Table\PagePayeesTable $PagePayees
 */
class PagePayeesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PagePayees', 'Articles', 'Participants', 'Paiements']
        ];
        $pagePayees = $this->paginate($this->PagePayees);

        $this->set(compact('pagePayees'));
        $this->set('_serialize', ['pagePayees']);
    }

    /**
     * View method
     *
     * @param string|null $id Page Payee id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pagePayee = $this->PagePayees->get($id, [
            'contain' => ['PagePayees', 'Articles', 'Participants', 'Paiements']
        ]);

        $this->set('pagePayee', $pagePayee);
        $this->set('_serialize', ['pagePayee']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pagePayee = $this->PagePayees->newEntity();
        if ($this->request->is('post')) {
            $pagePayee = $this->PagePayees->patchEntity($pagePayee, $this->request->data);
            if ($this->PagePayees->save($pagePayee)) {
                $this->Flash->success(__('The page payee has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The page payee could not be saved. Please, try again.'));
            }
        }
        $pagePayees = $this->PagePayees->PagePayees->find('list', ['limit' => 200]);
        $articles = $this->PagePayees->Articles->find('list', ['limit' => 200]);
        $participants = $this->PagePayees->Participants->find('list', ['limit' => 200]);
        $paiements = $this->PagePayees->Paiements->find('list', ['limit' => 200]);
        $this->set(compact('pagePayee', 'pagePayees', 'articles', 'participants', 'paiements'));
        $this->set('_serialize', ['pagePayee']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Page Payee id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pagePayee = $this->PagePayees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pagePayee = $this->PagePayees->patchEntity($pagePayee, $this->request->data);
            if ($this->PagePayees->save($pagePayee)) {
                $this->Flash->success(__('The page payee has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The page payee could not be saved. Please, try again.'));
            }
        }
        $pagePayees = $this->PagePayees->PagePayees->find('list', ['limit' => 200]);
        $articles = $this->PagePayees->Articles->find('list', ['limit' => 200]);
        $participants = $this->PagePayees->Participants->find('list', ['limit' => 200]);
        $paiements = $this->PagePayees->Paiements->find('list', ['limit' => 200]);
        $this->set(compact('pagePayee', 'pagePayees', 'articles', 'participants', 'paiements'));
        $this->set('_serialize', ['pagePayee']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Page Payee id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pagePayee = $this->PagePayees->get($id);
        if ($this->PagePayees->delete($pagePayee)) {
            $this->Flash->success(__('The page payee has been deleted.'));
        } else {
            $this->Flash->error(__('The page payee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
