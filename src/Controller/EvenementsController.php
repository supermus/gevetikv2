<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Evenement;
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


        $queryCategorieById = $this->Evenements->Categories->find('all')->where(['evenement_id'=>$id]);
        $options = TableRegistry::get('Options');
        $queryOptionPrix = $options->find()->Where(['categorie_id'=>$queryCategorieById->first()->id]);

        $queryPixTotale = ($queryOptionPrix->first()->prix_unitaire) - ($evenement->remise);

        $this->set('prixUnitaire', $queryOptionPrix->first()->prix_unitaire);
        $this->set('prixTotale', $queryPixTotale);


        $reservationTable = TableRegistry::get('Reservations');
        $usersTable = TableRegistry::get('Users');
        $usersParticipant = TableRegistry::get('Participants');
        $leUser = $usersTable->find()->where(['id' => $this->request->session()->read('Auth.User.id')]);

        
        $participant = $usersParticipant->find()->where(['email_participant' => $leUser->first()->email]);
        //debug($participant->count());die;
        if ($participant->count() == 0)
        {
            $participantExiste = -1;
            $this->set('participantExist',$participantExiste);
            $this->set('reservationExist1',false);
        }
        else
        {
            $reservationExist1 = $reservationTable->find()->where(['evenement_id' => $id])
                ->andWhere(['participant_id' => $participant->first()->id]);

            if($reservationExist1->count() == 0)
            {
                $this->set('reservationExist1',false);
            }
            else
            {
                $this->set('reservationExist1',true);
                $this->set('reservationExist11',$reservationExist1);
            }


//            if($reservationExist==$id){
//                $this->set('reservationExist',$reservationExist);
//            }
//            else
//            {
//                $reservationExist = -1;
//                $this->set('reservationExist',$reservationExist);
//            }

        }


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
        //crétion de la table organisateur
        $organisateurTable = TableRegistry::get('Organisateurs');
        $organisateur = $organisateurTable->newEntity();

        $categorieTable = TableRegistry::get('Categories');
        $categorie = $categorieTable->newEntity();

        $optionTable = TableRegistry::get('Options');
        $option = $optionTable->newEntity();

        $usersTable = TableRegistry::get('Users');
        $usersParticipant = TableRegistry::get('Participants');
        $leUser = $usersTable->find()->where(['id' => $this->request->session()->read('Auth.User.id')]);

        $participant = $usersParticipant->find()->where(['email_participant' => $leUser->first()->email]);
        //$par = $participant->count();
        $evenement = $this->Evenements->newEntity();

        if ($this->request->is('post')) {
            if($this->request->data['url_evenement']==""){$this->request->data['url_evenement']="event.jpg";}

            $evenement = $this->Evenements->patchEntity($evenement, $this->request->data);
            if ($this->Evenements->save($evenement)) {

                //mettre les infos dans organisateur et enregistrer dans la table organisateur
                if( $participant->count() == 0)
                {
                    $newParticipant = $usersParticipant->newEntity();
                    $newParticipant->nom_participant = $leUser->first()->nom;
                    $newParticipant->prenom_participant = $leUser->first()->prenom;
                    $newParticipant->email_participant = $leUser->first()->email;
                    $usersParticipant->save($newParticipant);
                    $organisateur->participant_id =  $newParticipant->id;
                }
                else
                {
                    $organisateur->participant_id = $participant->first()->id;
                }
                $organisateur->evenement_id = $evenement['id'];
                $organisateur->nom_role =  "organisateur";
                if($this->request->session()->read('Auth.User.role') == 'organisateur')
                {
                    $organisateur->est_organisateur = true;
                }


                $organisateurTable->save($organisateur);

                //Maintenant pour categorie
                $categorie->evenement_id = $evenement['id'];
                $categorie->nom_categorie = $this->request->data['nom_categorie'];
                $categorie->slug_categorie = $this->request->data['slug_categorie'];
                $categorieTable->save($categorie);
                //Maintenant Option
                $option->categorie_id = $categorie['id'];
                $option->nom_option = $this->request->data['nom_option'];
                $option->slug_option = $this->request->data['slug_option'];
                $option->prix_unitaire = $this->request->data['prix_unitaire'];
                $option->quantite_minimum = $this->request->data['quantite_minimum'];
                $option->quantite_maximum = $this->request->data['quantite_maximum'];
                $optionTable->save($option);

                $this->Flash->success(__('L\'evenement est bien enregistré.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('L\'evenement n\'est pas enregistré.'));
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
    
public function mesevenements()
    {
        $userT = TableRegistry::get('Users');
        $participantT = TableRegistry::get('Participants');
        $organisateurT = TableRegistry::get('Organisateurs');
        $evenementT = TableRegistry::get('Evenements');
        $leUser = $userT->find()->where(['id' => $this->request->session()->read('Auth.User.id')]);
        $participant = $participantT->find()->where(['email_participant' => $leUser->first()->email]);

        if(isset($participant->first()->id) != null) {
            $organisateur = $organisateurT->find()->where(['participant_id' => $participant->first()->id]);
            $event = array();
            foreach ($organisateur as $row) {
                $event[] = $evenementT->find()->where(['id' => $row->evenement_id]);
            }
            $this->set('mesevents', $event);
        }
        else
        {
            $this->Flash->error('Vous n\'avez pas d\'evenement');
            return $this->redirect(['action' => 'index']);
        }
        //$evenements = $this->paginate($this->Evenements);


        $this->set(compact('evenements'));
        $this->set('_serialize', ['evenements']);
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
