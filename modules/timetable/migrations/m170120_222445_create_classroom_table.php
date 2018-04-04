<?php

use yii\db\Migration;

/**
 * Handles the creation of table `classroom`.
 */
class m170120_222445_create_classroom_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('class', [
            'id' => $this->primaryKey(),
            'number' => $this->integer(2)->notNull(),
            'letter' => $this->string(1)->null()
        ]);

        for($i = 1; $i <= 11; $i++) {
            $this->insert('class', [
                'number' => $i
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        for($i = 1; $i <= 11; $i++) {
            $this->delete('class', [
                'number' => $i
            ]);
        }

        $this->dropTable('class');
    }
}
