<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PagePayeesFixture
 *
 */
class PagePayeesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'page_payee_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'article_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'auteur_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'paiement_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'extra_page_payee' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'FK_auteur_page_payee' => ['type' => 'index', 'columns' => ['auteur_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['page_payee_id'], 'length' => []],
            'unique' => ['type' => 'unique', 'columns' => ['article_id', 'auteur_id'], 'length' => []],
            'FK_article_page_payee' => ['type' => 'foreign', 'columns' => ['article_id'], 'references' => ['articles', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'FK_auteur_page_payee' => ['type' => 'foreign', 'columns' => ['auteur_id'], 'references' => ['participants', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'page_payee_id' => 1,
            'article_id' => 1,
            'auteur_id' => 1,
            'paiement_id' => 1,
            'extra_page_payee' => 1
        ],
    ];
}
