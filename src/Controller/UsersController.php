<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\MailerAwareTrait;
use Cake\Utility\Text;
use Cake\Utility\Security;
use Cake\Routing\Router;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    
    //fonction qui permet d'accéder au différent page sans connexion
    // SI PROBLEME AVEC LES FILTRE DE CONNEXION
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    use MailerAwareTrait;
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                //MAil
                $this->getMailer('User')->send('welcome',[$user]);
                
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
        // Login 
    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            if($user){
                $this->Auth->setUser($user);
                if($user['role'] == 'admin'){
                    return $this->redirect(['controller'=>'evenements']);
                }
                if($user['role'] == 'visiteur'){
                    return $this->redirect(['controller'=>'pages']);
                }
                /// Ajouter les autres roles avec les bonnes redirections
            }
            //mauvais login

            $this->Flash->error('Erreur de connexion !!');
        }
    }
    public function logout(){
        $this->Flash->set('Vous êtes bien déconnecter.', [
            'element' => 'success'
        ]);
        return $this->redirect($this->Auth->logout());
    }
    //fonction inscription uniquement compte visiteur
    public function inscription()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user['role'] = 'visiteur';
            if ($this->Users->save($user)) {
                //MAil
                $this->getMailer('User')->send('welcome',[$user]);
                $this->Flash->success(__('Vous êtes maintenant inscrit.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Oups! Une erreur s\'est produite.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    
    public function forgotPassword()
    {
        if ($this->request->is('post'))
        {
            if (!empty($this->request->data))
            {
                $email = $this->request->data['email'];
                $user = $this->Users->findByEmail($email)->first();
            }
            if (!empty($user))
            {
                $password = sha1(Text::uuid());

                $password_token = Security::hash($password, 'sha256', true);

                $hashval = sha1($user->username . rand(0, 100));

                $user->password_reset_token = $password_token;
                $user->hashval = $hashval;
                $reset_token_link = Router::url(['controller' => 'Users', 'action' => 'resetPassword'], TRUE) . '/' . $password_token . '#' . $hashval;

                $emaildata = [$user->email, $reset_token_link];
                $this->getMailer('SendEmail')->send('forgotPasswordEmail', [$emaildata]);
                //$this->getMailer('User')->send('welcome',[$user]);

                $this->Users->save($user);
                $this->Flash->success('cliquez sur reset password pour changez votre mot de passe.');
            }
            else
            {
                $this->Flash->error('désoler l\'adresse mail n\'est pas disponible.');
            }
        }
    }
    public function resetPassword($token = null) {

        if (!empty($token)) {

            $user = $this->Users->findByPasswordResetToken($token)->first();

            if ($user) {

                if (!empty($this->request->data)) {
                    $user = $this->Users->patchEntity($user, [
                        'password' => $this->request->data['new_password'],
                        'new_password' => $this->request->data['new_password'],
                        'confirm_password' => $this->request->data['confirm_password']
                    ]
                    );

                    $hashval_new = sha1($user->username . rand(0, 100));
                    $user->password_reset_token = $hashval_new;

                    if ($this->Users->save($user)) {
                        $this->Flash->success('Votre mot de passe à été mis à jour');
                        $emaildata = ['name' => $user->nom, 'email' => $user->email];
                        $this->getMailer('SendEmail')->send('changePasswordEmail', [$emaildata]); //Send Email functionality
                        //$this->getMailer('User')->send('welcome',[$user]);

                        $this->redirect(['action' => 'login']);
                    } else {
                        $this->Flash->error('Erreur ressayez !');
                    }
                }
            } else {
                $this->Flash->error('Votre token est expiré.');
            }
        } else {
            $this->Flash->error('Error chargement reset mot de passe.');
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    
}