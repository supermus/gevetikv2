<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EvenementTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EvenementTable Test Case
 */
class EvenementTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EvenementTable
     */
    public $Evenement;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.evenement',
        'app.evenements'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Evenement') ? [] : ['className' => 'App\Model\Table\EvenementTable'];
        $this->Evenement = TableRegistry::get('Evenement', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Evenement);

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
