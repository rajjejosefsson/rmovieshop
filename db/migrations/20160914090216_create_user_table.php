<?php

use Phinx\Migration\AbstractMigration;

class CreateUserTable extends AbstractMigration
{

    /*
     *
    IF NOT COMMENTED OUT UP AND DOWN WONT GET CALLED

    public function change()
    {

    }
    */

    public function up()
    {
        $users = $this->table('users');

        $users
            ->addColumn('first_name', 'string')
            ->addColumn('last_name', 'string')
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('created_at', 'datetime', ['null' => true ])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->save();

    }


    public function down()
    {

    }



}
