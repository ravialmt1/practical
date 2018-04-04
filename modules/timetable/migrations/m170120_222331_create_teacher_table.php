<?php

use yii\db\Migration;

/**
 * Handles the creation of table `teacher`.
 */
class m170120_222331_create_teacher_table extends Migration
{
    protected $teacher = 20;

    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('teacher', [
            'id' => $this->primaryKey(),
            'lastname' => $this->string(50)->notNull(),
            'firstname' => $this->string(50)->notNull(),
            'fathername' => $this->string(50),
        ]);

        for($i = 1; $i <= $this->teacher; $i++) {
            $this->insert('teacher', [
                'lastname' => 'Фамилия ' . $i,
                'firstname' => 'Имя ' . $i,
                'fathername' => 'Отчество ' . $i
            ]);
        }
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        for($i = 1; $i <= $this->teacher; $i++) {
            $this->delete('teacher', [
                'lastname' => 'Фамилия ' . $i,
                'firstname' => 'Имя ' . $i,
                'fathername' => 'Отчество ' . $i
            ]);
        }

        $this->dropTable('teacher');
    }
}
