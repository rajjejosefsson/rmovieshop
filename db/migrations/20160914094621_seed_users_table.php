<?php

use Phinx\Migration\AbstractMigration;

class SeedUsersTable extends AbstractMigration
{

    public function up()
    {

        $password_hash = password_hash('secret', PASSWORD_DEFAULT);


        $this->execute("
            INSERT INTO users (first_name, last_name, email, password) 
            VALUES 
            ('Rasmus', 'Josefsson', 'josefssonrasmus@hotmail.se', '$password_hash')
        ");


    }


    public function down()
    {

    }
}
