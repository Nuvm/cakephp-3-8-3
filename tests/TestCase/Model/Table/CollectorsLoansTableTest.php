<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CollectorsLoansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CollectorsLoansTable Test Case
 */
class CollectorsLoansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CollectorsLoansTable
     */
    public $CollectorsLoans;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CollectorsLoans',
        'app.Loans',
        'app.Collectors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CollectorsLoans') ? [] : ['className' => CollectorsLoansTable::class];
        $this->CollectorsLoans = TableRegistry::getTableLocator()->get('CollectorsLoans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CollectorsLoans);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
