<?php

use yii\db\Migration;

/**
 * Handles the creation of table `discipline_teacher`.
 * Has foreign keys to the tables:
 *
 * - `discipline`
 * - `teacher`
 */
class m170121_154537_create_discipline_teacher_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('discipline_teacher', [
            'id' => $this->primaryKey(),
            'discipline_id' => $this->integer()->notNull(),
            'teacher_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `discipline_id`
        $this->createIndex(
            'idx-discipline_teacher-discipline_id',
            'discipline_teacher',
            'discipline_id'
        );

        // add foreign key for table `discipline`
        $this->addForeignKey(
            'fk-discipline_teacher-discipline_id',
            'discipline_teacher',
            'discipline_id',
            'discipline',
            'id',
            'CASCADE'
        );

        // creates index for column `teacher_id`
        $this->createIndex(
            'idx-discipline_teacher-teacher_id',
            'discipline_teacher',
            'teacher_id'
        );

        // add foreign key for table `teacher`
        $this->addForeignKey(
            'fk-discipline_teacher-teacher_id',
            'discipline_teacher',
            'teacher_id',
            'teacher',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `discipline`
        $this->dropForeignKey(
            'fk-discipline_teacher-discipline_id',
            'discipline_teacher'
        );

        // drops index for column `discipline_id`
        $this->dropIndex(
            'idx-discipline_teacher-discipline_id',
            'discipline_teacher'
        );

        // drops foreign key for table `teacher`
        $this->dropForeignKey(
            'fk-discipline_teacher-teacher_id',
            'discipline_teacher'
        );

        // drops index for column `teacher_id`
        $this->dropIndex(
            'idx-discipline_teacher-teacher_id',
            'discipline_teacher'
        );

        $this->dropTable('discipline_teacher');
    }
}
