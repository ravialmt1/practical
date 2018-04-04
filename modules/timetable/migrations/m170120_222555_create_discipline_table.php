<?php

use yii\db\Migration;

/**
 * Handles the creation of table `discipline`.
 */
class m170120_222555_create_discipline_table extends Migration
{
    protected $dicipline = 20;

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('discipline', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'name_short' => $this->string(10)->notNull(),
        ]);

        for ($i = 1; $i <= $this->dicipline; $i++) {
            $this->insert('discipline', [
                'name' => 'Дисциплина ' . $i,
                'name_short' => 'дисц' . $i . '. '
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        for ($i = 1; $i <= $this->dicipline; $i++) {
            $this->delete('discipline', [
                'name' => 'Дисциплина ' . $i,
                'name_short' => 'дисц' . $i . '. '
            ]);
        }

        $this->dropTable('discipline');
    }
}
