<?php

use yii\db\Migration;

/**
 * Class m230209_155429_articles
 */
class m230209_155429_articles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('articles', [
            'id' => $this->primaryKey(),
            'title' => $this->string(200),
            'text' => $this->string(1000),
            'data' => $this->date("Y-m-d"),
            'likes' => $this->integer(),
            'views' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230209_155429_articles cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230209_155429_articles cannot be reverted.\n";

        return false;
    }
    */
}
