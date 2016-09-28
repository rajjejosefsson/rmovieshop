<?php

use Phinx\Migration\AbstractMigration;

class CreateCategoriesTable extends AbstractMigration
{
    public function up()
    {
        $category = $this->table('categories');

        $category
            ->addColumn('category_type', 'string')
            ->addColumn('created_at', 'datetime', ['null' => true ])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->save();

    }


    public function down()
    {
        $this->dropTable('categories');
    }
}