<?php

use Phinx\Migration\AbstractMigration;

class CreateMoviesTable extends AbstractMigration
{
    /**

     */
    public function up()
    {
        $movies = $this->table('movies');

        $movies
            ->addColumn('name', 'string')
            ->addColumn('poster', 'string')
            ->addColumn('created_at', 'datetime', ['null' => true ])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->save();

    }


    public function down()
    {

    }
}
