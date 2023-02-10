<?php

use yii\db\Migration;

/**
 * Class m230210_091339_forms
 */
class m230210_091339_forms extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('forms', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30),
            'prename' => $this->string(30),
            'email' => $this->string(30),
            'number' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230210_091339_forms cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230210_091339_forms cannot be reverted.\n";

        return false;
    }
    */
}
