<?php

use Phinx\Migration\AbstractMigration;

class CreateCartItemsTable extends AbstractMigration
{

    public function up()
    {
        $cartitems = $this->table('cart_items');

        $cartitems
            ->addColumn('cart_id', 'integer')
            ->addForeignKey('cart_id', 'shopping_carts', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
            ->addColumn('movie_id', 'string')
            ->addColumn('category_id', 'integer')
            ->addForeignKey('category_id', 'categories', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
            ->addColumn('created_at', 'datetime', ['null' => true])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->save();
    }


    public function down()
    {
        $this->dropTable('cart_items');
    }
}