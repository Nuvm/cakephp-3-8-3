<?php
use Migrations\AbstractSeed;

/**
 * Loans seed.
 */
class LoansSeed extends AbstractSeed
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
                'id' => '10',
                'interest' => '0.05',
                'amount' => '1500',
                'amount_due' => '1500',
                'user_id' => '9',
                'created' => '2019-11-14 15:01:53',
                'modified' => '2019-11-14 15:01:53',
            ],
        ];

        $table = $this->table('loans');
        $table->insert($data)->save();
    }
}
