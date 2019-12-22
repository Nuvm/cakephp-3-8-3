<?php
use Migrations\AbstractSeed;

/**
 * PaymentMethods seed.
 */
class PaymentMethodsSeed extends AbstractSeed
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
                'id' => '1',
                'name' => 'MasterCarte Arabia Plus',
                'description' => 'Carte de credit fraudee',
                'file_id' => '2',
            ],
        ];

        $table = $this->table('payment_methods');
        $table->insert($data)->save();
    }
}
