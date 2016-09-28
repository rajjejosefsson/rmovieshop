<?php

use Phinx\Migration\AbstractMigration;

class CreateShoppingCartTable extends AbstractMigration
{
    public function up()
    {
        $shoppingcarts = $this->table('shopping_carts');

        $shoppingcarts
            ->addColumn('user_id', 'integer')
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
            ->addColumn('created_at', 'datetime', ['null' => true ])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->save();

    }


    public function down()
    {

    }
}
