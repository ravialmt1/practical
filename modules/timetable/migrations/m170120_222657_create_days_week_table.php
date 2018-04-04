<?php

use yii\db\Migration;

/**
 * Handles the creation of table `days_week`.
 */
class m170120_222657_create_days_week_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('days_week', [
            'id' => $this->primaryKey(),
            'name' => $this->string(4)->notNull(),
        ]);

        $this->insert('days_week', [
            'name' => 'Mon.',
        ]);

        $this->insert('days_week', [
            'name' => 'Tue.',
        ]);

        $this->insert('days_week', [
            'name' => 'Wed.',
        ]);

        $this->insert('days_week', [
            'name' => 'Thu.',
        ]);

        $this->insert('days_week', [
            'name' => 'Fri.',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {

        $this->delete('days_week', [
            'name' => 'Пнд.',
        ]);

        $this->delete('days_week', [
            'name' => 'Втр.',
        ]);

        $this->delete('days_week', [
            'name' => 'Срд.',
        ]);

        $this->delete('days_week', [
            'name' => 'Чтв.',
        ]);

        $this->delete('days_week', [
            'name' => 'Птн.',
        ]);

        $this->dropTable('days_week');
    }
}
