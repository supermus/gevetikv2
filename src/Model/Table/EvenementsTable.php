<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Evenements Model
 *
 * @property \Cake\ORM\Association\HasMany $Article
 * @property \Cake\ORM\Association\HasMany $Categorie
 * @property \Cake\ORM\Association\HasMany $Organisateur
 * @property \Cake\ORM\Association\HasMany $Reservation
 *
 * @method \App\Model\Entity\Evenement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Evenement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Evenement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Evenement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Evenement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Evenement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Evenement findOrCreate($search, callable $callback = null)
 */
class EvenementsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('evenements');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Articles', [
            'foreignKey' => 'evenement_id'
        ]);
        $this->hasMany('Categories', [
            'foreignKey' => 'evenement_id'
        ]);
        $this->hasMany('Organisateurs', [
            'foreignKey' => 'evenement_id'
        ]);
        $this->hasMany('Reservations', [
            'foreignKey' => 'evenement_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nom_evenement', 'create')
            ->notEmpty('nom_evenement');

        $validator
            ->requirePresence('slug_evenement', 'create')
            ->notEmpty('slug_evenement');


        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('adresse', 'create')
            ->notEmpty('adresse');

        $validator
            ->integer('remise')
            ->requirePresence('remise', 'create')
            ->notEmpty('remise');

        $validator
            ->date('date_remise')
            ->requirePresence('date_remise', 'create')
            ->notEmpty('date_remise');

        $validator
            ->date('date_soumission_debut')
            ->requirePresence('date_soumission_debut', 'create')
            ->notEmpty('date_soumission_debut');

        $validator
            ->date('date_soumission_fin')
            ->requirePresence('date_soumission_fin', 'create')
            ->notEmpty('date_soumission_fin');

        $validator
            ->date('date_acceptation')
            ->requirePresence('date_acceptation', 'create')
            ->notEmpty('date_acceptation');

        $validator
            ->date('date_acceptation_definitive')
            ->requirePresence('date_acceptation_definitive', 'create')
            ->notEmpty('date_acceptation_definitive');

        $validator
            ->date('date_debut')
            ->requirePresence('date_debut', 'create')
            ->notEmpty('date_debut');

        $validator
            ->date('date_fin')
            ->requirePresence('date_fin', 'create')
            ->notEmpty('date_fin');

        $validator
            ->boolean('evenement_active');



        $validator
            ->integer('nombre_page_accepte')
            ->requirePresence('nombre_page_accepte', 'create')
            ->notEmpty('nombre_page_accepte');

        $validator
            ->integer('prix_unitaire_extra_page')
            ->requirePresence('prix_unitaire_extra_page', 'create')
            ->notEmpty('prix_unitaire_extra_page');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['slug_evenement']));

        return $rules;
    }
}
