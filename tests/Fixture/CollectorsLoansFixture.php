<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CollectorsLoansFixture
 */
class CollectorsLoansFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'loan_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'collector_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'loans_collectors_fk_2' => ['type' => 'index', 'columns' => ['collector_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['loan_id', 'collector_id'], 'length' => []],
            'loans_collectors_fk_1' => ['type' => 'foreign', 'columns' => ['loan_id'], 'references' => ['loans', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'loans_collectors_fk_2' => ['type' => 'foreign', 'columns' => ['collector_id'], 'references' => ['collectors', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'loan_id' => 1,
                'collector_id' => 1
            ],
        ];
        parent::init();
    }
}
