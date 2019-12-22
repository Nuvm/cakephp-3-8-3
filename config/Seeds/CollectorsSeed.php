<?php
use Migrations\AbstractSeed;

/**
 * Collectors seed.
 */
class CollectorsSeed extends AbstractSeed
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
                'name' => 'jean delaroses',
            ],
            [
                'id' => '2',
                'name' => 'bob delabrosse',
            ],
        ];

        $table = $this->table('collectors');
        $table->insert($data)->save();
    }
}
