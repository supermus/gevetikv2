<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paiements Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Paiements
 * @property \Cake\ORM\Association\BelongsTo $PagePayees
 * @property \Cake\ORM\Association\BelongsTo $Reservations
 *
 * @method \App\Model\Entity\Paiement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Paiement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Paiement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Paiement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Paiement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Paiement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Paiement findOrCreate($search, callable $callback = null)
 */
class PaiementsTable extends Table
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

        $this->table('paiements');
        $this->displayField('paiement_id');
        $this->primaryKey('paiement_id');

        $this->belongsTo('Paiements', [
            'foreignKey' => 'paiement_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('PagePayees', [
            'foreignKey' => 'page_payee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Reservations', [
            'foreignKey' => 'reservation_id',
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
            ->requirePresence('reference_paiement', 'create')
            ->notEmpty('reference_paiement')
            ->add('reference_paiement', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('type', 'create')
            ->notEmpty('type');

        $validator
            ->integer('validation')
            ->requirePresence('validation', 'create')
            ->notEmpty('validation');

        $validator
            ->numeric('total')
            ->requirePresence('total', 'create')
            ->notEmpty('total');

        $validator
            ->integer('valide_par')
            ->requirePresence('valide_par', 'create')
            ->notEmpty('valide_par');

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
        $rules->add($rules->isUnique(['reference_paiement']));
        $rules->add($rules->existsIn(['paiement_id'], 'Paiements'));
        $rules->add($rules->existsIn(['page_payee_id'], 'PagePayees'));
        $rules->add($rules->existsIn(['reservation_id'], 'Reservations'));

        return $rules;
    }
}
