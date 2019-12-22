<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FoodTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FoodTypesTable Test Case
 */
class FoodTypesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FoodTypesTable
     */
    public $FoodTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.FoodTypes',
        'app.Foods'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FoodTypes') ? [] : ['className' => FoodTypesTable::class];
        $this->FoodTypes = TableRegistry::getTableLocator()->get('FoodTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FoodTypes);

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
}
