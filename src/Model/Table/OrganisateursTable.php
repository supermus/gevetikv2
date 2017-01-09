<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Organisateurs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Evenements
 * @property \Cake\ORM\Association\BelongsTo $Participants
 *
 * @method \App\Model\Entity\Organisateur get($primaryKey, $options = [])
 * @method \App\Model\Entity\Organisateur newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Organisateur[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Organisateur|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Organisateur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Organisateur[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Organisateur findOrCreate($search, callable $callback = null)
 */
class OrganisateursTable extends Table
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

        $this->table('organisateurs');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Evenements', [
            'foreignKey' => 'evenement_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Participants', [
            'foreignKey' => 'participant_id',
            'joinType' => 'INNER'
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
            ->requirePresence('nom_role', 'create')
            ->notEmpty('nom_role');

        $validator
            ->integer('est_organisateur')
            ->requirePresence('est_organisateur', 'create')
            ->notEmpty('est_organisateur');

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
        $rules->add($rules->existsIn(['evenement_id'], 'Evenements'));
        $rules->add($rules->existsIn(['participant_id'], 'Participants'));

        return $rules;
    }
}
