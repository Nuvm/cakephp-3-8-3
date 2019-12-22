<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FoodsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FoodsTable Test Case
 */
class FoodsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FoodsTable
     */
    public $Foods;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Foods',
        'app.FoodTypes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Foods') ? [] : ['className' => FoodsTable::class];
        $this->Foods = TableRegistry::getTableLocator()->get('Foods', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Foods);

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
