<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'id' => '9',
                'email' => 'admin@admin.admin',
                'password' => '$2y$10$az0dto6QFPfsE37cVIRFbe3oFqF43p1QvCQXG1YY5EIjn6nNJN0AO',
                'permission_level' => '2',
                'created' => '2019-11-14 14:49:42',
                'uuid' => 'e1165680-3b54-4ebc-9bbc-7f7192b7d09f',
                'confirmed' => '1',
            ],
            [
                'id' => '10',
                'email' => 'user@user.user',
                'password' => '$2y$10$EzpkfIR4yIHsxlymG90L8OckQQxfmlvTqeq5W2iFHEuOgXBCig.2S',
                'permission_level' => '1',
                'created' => '2019-11-14 14:52:38',
                'uuid' => 'eddb90ea-3dba-452c-8726-40490c9d0d65',
                'confirmed' => '1',
            ],
            [
                'id' => '11',
                'email' => 'noemail@noemail.noemail',
                'password' => '$2y$10$c29d8nPHNWdMj7YnkwNVuOj7NRriRVFUWl/r6yHkIGFARQW8q.yBi',
                'permission_level' => '0',
                'created' => '2019-11-14 14:53:41',
                'uuid' => '5ab7b3f5-f3b4-456a-8982-1904381b8a6f',
                'confirmed' => '0',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
