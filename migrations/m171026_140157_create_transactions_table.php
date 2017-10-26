<?php

use yii\db\Migration;

/**
 * Handles the creation of table `transactions`.
 */
class m171026_140157_create_transactions_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('transactions', [
            'id' => $this->primaryKey(),
            'expression' => $this->char(255),
            'result' => $this->double(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('transactions');
    }
}
