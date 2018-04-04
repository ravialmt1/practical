<?php

use yii\db\Migration;

/**
 * Handles the creation of table `bell`.
 */
class m170120_222736_create_bell_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('bell', [
            'id' => $this->primaryKey(),
            'time_start' => $this->time(),
            'time_end' => $this->time(),
        ]);

        $this->insert('bell', [
            'time_start' => '8:00',
            'time_end' => '8:45',
        ]);

        $this->insert('bell', [
            'time_start' => '9:00',
            'time_end' => '9:45',
        ]);

        $this->insert('bell', [
            'time_start' => '10:00',
            'time_end' => '10:45',
        ]);

        $this->insert('bell', [
            'time_start' => '11:00',
            'time_end' => '11:45',
        ]);

        $this->insert('bell', [
            'time_start' => '12:00',
            'time_end' => '12:45',
        ]);

        $this->insert('bell', [
            'time_start' => '13:00',
            'time_end' => '13:45',
        ]);

        $this->insert('bell', [
            'time_start' => '14:00',
            'time_end' => '14:45',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->delete('bell', [
            'time_start' => '8:00',
            'time_end' => '8:45',
        ]);

        $this->delete('bell', [
            'time_start' => '9:00',
            'time_end' => '9:45',
        ]);

        $this->delete('bell', [
            'time_start' => '10:00',
            'time_end' => '10:45',
        ]);

        $this->delete('bell', [
            'time_start' => '11:00',
            'time_end' => '11:45',
        ]);

        $this->delete('bell', [
            'time_start' => '12:00',
            'time_end' => '12:45',
        ]);

        $this->delete('bell', [
            'time_start' => '13:00',
            'time_end' => '13:45',
        ]);

        $this->delete('bell', [
            'time_start' => '14:00',
            'time_end' => '14:45',
        ]);

        $this->dropTable('bell');
    }
}
