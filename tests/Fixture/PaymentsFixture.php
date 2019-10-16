<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentsFixture
 */
class PaymentsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'notes' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => 'NULL', 'collate' => 'utf8_general_mysql500_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'payment_method_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'loan_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'paiement_ibfk_1' => ['type' => 'index', 'columns' => ['payment_method_id'], 'length' => []],
            'payments_ibfk_2' => ['type' => 'index', 'columns' => ['loan_id'], 'length' => []],
            'payments_ibfk_3' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'payments_ibfk_1' => ['type' => 'foreign', 'columns' => ['payment_method_id'], 'references' => ['payment_methods', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'payments_ibfk_2' => ['type' => 'foreign', 'columns' => ['loan_id'], 'references' => ['loans', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'payments_ibfk_3' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_mysql500_ci'
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
                'id' => 1,
                'notes' => 'Lorem ipsum dolor sit amet',
                'created' => '2019-09-28 14:41:48',
                'user_id' => 1,
                'payment_method_id' => 1,
                'loan_id' => 1
            ],
        ];
        parent::init();
    }
}
