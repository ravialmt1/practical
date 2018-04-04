<?php

use yii\db\Migration;
use yii\db\Schema;
class m170212_061155_add_new_field_to_user extends \yii\db\Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'field', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'field');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
