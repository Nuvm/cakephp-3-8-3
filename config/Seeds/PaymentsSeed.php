<?php
use Migrations\AbstractSeed;

/**
 * Payments seed.
 */
class PaymentsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '14',
                'notes' => '',
                'created' => '2019-11-14 15:03:31',
                'user_id' => '9',
                'payment_method_id' => '1',
                'loan_id' => '10',
            ],
        ];

        $table = $this->table('payments');
        $table->insert($data)->save();
    }
}
