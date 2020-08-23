<?php

use yii\db\Migration;

/**
 * Class m200821_120634_create_data_model
 */
class m200821_120634_create_data_model extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('data',[
            'id'=>$this->primaryKey(),
            'page_uid'=>$this->text()->notNull(),
            'field_string'=>$this->text()->notNull(),
            'field_integer'=>$this->integer()->notNull(),
            'field_boolean'=>$this->boolean()->notNull(),
            'created'=>$this->dateTime()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('data');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200821_120634_create_data_model cannot be reverted.\n";

        return false;
    }
    */
}
