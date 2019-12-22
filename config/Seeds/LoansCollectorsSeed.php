<?php
use Migrations\AbstractSeed;

/**
 * LoansCollectors seed.
 */
class LoansCollectorsSeed extends AbstractSeed
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
                'loan_id' => '10',
                'collector_id' => '2',
            ],
        ];

        $table = $this->table('loans_collectors');
        $table->insert($data)->save();
    }
}
