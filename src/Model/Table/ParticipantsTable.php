<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Participants Model
 *
 * @property \Cake\ORM\Association\HasMany $Organisateurs
 * @property \Cake\ORM\Association\HasMany $Reservation
 *
 * @method \App\Model\Entity\Participant get($primaryKey, $options = [])
 * @method \App\Model\Entity\Participant newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Participant[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Participant|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Participant patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Participant[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Participant findOrCreate($search, callable $callback = null)
 */
class ParticipantsTable extends Table
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

        $this->table('participants');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->hasMany('Organisateurs', [
            'foreignKey' => 'participant_id'
        ]);
        $this->hasMany('Reservation', [
            'foreignKey' => 'participant_id'
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
            ->requirePresence('prenom_participant', 'create')
            ->notEmpty('prenom_participant');

        $validator
            ->requirePresence('nom_participant', 'create')
            ->notEmpty('nom_participant');

        $validator
            ->requirePresence('email_participant', 'create')
            ->notEmpty('email_participant')
            ->add('email_participant', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('mot_de_passe', 'create')
            ->notEmpty('mot_de_passe');

        $validator
            ->requirePresence('etablissement', 'create')
            ->notEmpty('etablissement');

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
        $rules->add($rules->isUnique(['email_participant']));

        return $rules;
    }
}
