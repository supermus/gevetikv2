<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Evenements Controller
 *
 * @property \App\Model\Table\EvenementsTable $Evenements
 */
class EvenementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $evenements = $this->paginate($this->Evenements);

        //pour faire le lien entre evenemtn categorie
        $categories = TableRegistry::get('Categories');
        $options = TableRegistry::get('Options');

        $query = $options->find('all')
            ->contain(['Categories.Evenements']);
        $this->set('categories', $query);



        $this->set(compact('evenements'));
        $this->set('_serialize', ['evenements']);
    }

    /**
     * View method
     *
     * @param string|null $id Evenement id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $evenement = $this->Evenements->get($id, [
            'contain' => []
        ]);

        $this->set('evenement', $evenement);
        $this->set('_serialize', ['evenement']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $evenement = $this->Evenements->newEntity();
        if ($this->request->is('post')) {
            $evenement = $this->Evenements->patchEntity($evenement, $this->request->data);
            if ($this->Evenements->save($evenement)) {
                $this->Flash->success(__('The evenement has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The evenement could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('evenement'));
        $this->set('_serialize', ['evenement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Evenement id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $evenement = $this->Evenements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $evenement = $this->Evenements->patchEntity($evenement, $this->request->data);
            if ($this->Evenements->save($evenement)) {
                $this->Flash->success(__('The evenement has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The evenement could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('evenement'));
        $this->set('_serialize', ['evenement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Evenement id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $evenement = $this->Evenements->get($id);
        if ($this->Evenements->delete($evenement)) {
            $this->Flash->success(__('The evenement has been deleted.'));
        } else {
            $this->Flash->error(__('The evenement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function logout(){
        $this->Flash->success('bien déconnecté');
        return $this->redirect($this->Auth->logout());
    }
}
