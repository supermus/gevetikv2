<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReservationsFixture
 *
 */
class ReservationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'evenement_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'paiement_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'participant_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_paiement_reservation' => ['type' => 'index', 'columns' => ['paiement_id'], 'length' => []],
            'FK_participant_reservation' => ['type' => 'index', 'columns' => ['participant_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'unique' => ['type' => 'unique', 'columns' => ['evenement_id', 'participant_id', 'paiement_id'], 'length' => []],
            'FK_evenement_reservation' => ['type' => 'foreign', 'columns' => ['evenement_id'], 'references' => ['evenements', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_paiement_reservation' => ['type' => 'foreign', 'columns' => ['paiement_id'], 'references' => ['paiement', 'paiement_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_participant_reservation' => ['type' => 'foreign', 'columns' => ['participant_id'], 'references' => ['participants', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'evenement_id' => 1,
            'paiement_id' => 1,
            'participant_id' => 1
        ],
    ];
}
