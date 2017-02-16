<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PagePayees Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PagePayees
 * @property \Cake\ORM\Association\BelongsTo $Articles
 * @property \Cake\ORM\Association\BelongsTo $Participants
 * @property \Cake\ORM\Association\BelongsTo $Paiements
 *
 * @method \App\Model\Entity\PagePayee get($primaryKey, $options = [])
 * @method \App\Model\Entity\PagePayee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PagePayee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PagePayee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PagePayee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PagePayee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PagePayee findOrCreate($search, callable $callback = null)
 */
class PagePayeesTable extends Table
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

        $this->table('page_payees');
        $this->displayField('page_payee_id');
        $this->primaryKey('page_payee_id');

        $this->belongsTo('PagePayees', [
            'foreignKey' => 'page_payee_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Articles', [
            'foreignKey' => 'article_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Participants', [
            'foreignKey' => 'auteur_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Paiements', [
            'foreignKey' => 'paiement_id',
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
            ->integer('extra_page_payee')
            ->requirePresence('extra_page_payee', 'create')
            ->notEmpty('extra_page_payee');

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
        $rules->add($rules->existsIn(['page_payee_id'], 'PagePayees'));
        $rules->add($rules->existsIn(['article_id'], 'Articles'));
        $rules->add($rules->existsIn(['auteur_id'], 'Participants'));
        $rules->add($rules->existsIn(['paiement_id'], 'Paiements'));

        return $rules;
    }
}
