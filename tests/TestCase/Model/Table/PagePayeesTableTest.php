<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PagePayeesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PagePayeesTable Test Case
 */
class PagePayeesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PagePayeesTable
     */
    public $PagePayees;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.page_payees',
        'app.articles',
        'app.evenements',
        'app.categories',
        'app.organisateurs',
        'app.participants',
        'app.reservation',
        'app.reservations',
        'app.paiements',
        'app.page_payee'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PagePayees') ? [] : ['className' => 'App\Model\Table\PagePayeesTable'];
        $this->PagePayees = TableRegistry::get('PagePayees', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PagePayees);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
