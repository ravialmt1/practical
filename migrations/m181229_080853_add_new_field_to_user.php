<?php

use yii\db\Migration;

class m181229_080853_add_new_field_to_user extends Migration
{
    public function safeUp()
    {

        $this->addColumn('{{%user}}', 'role', $this->string());
    
    }

    public function safeDown()
    {
         $this->dropColumn('{{%user}}', 'role');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181229_080853_add_new_field_to_user cannot be reverted.\n";

        return false;
    }
    */
}
