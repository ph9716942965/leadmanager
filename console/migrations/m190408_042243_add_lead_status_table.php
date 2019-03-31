<?php

use yii\db\Migration;

/**
 * Class m190408_042243_add_lead_status_table
 */
class m190408_042243_add_lead_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190408_042243_add_lead_status_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190408_042243_add_lead_status_table cannot be reverted.\n";

        return false;
    }
    */
}
