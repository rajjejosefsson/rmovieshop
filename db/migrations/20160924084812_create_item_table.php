<?php

use Phinx\Migration\AbstractMigration;

class CreateItemTable extends AbstractMigration
{
    public function up()
    {
        $item = $this->table('items');

        $item
            ->addColumn('name', 'string')
            ->addColumn('price', 'integer')
            ->addColumn('description', 'string')
            ->addColumn('image', 'string')
            ->addColumn('category_id', 'integer')
            ->addForeignKey('category_id', 'categories', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
            ->addColumn('created_at', 'datetime', ['null' => true ])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->save();

    }


    public function down()
    {
        $this->dropTable('items');
    }
}
