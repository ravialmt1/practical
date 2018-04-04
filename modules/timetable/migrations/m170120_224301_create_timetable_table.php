<?php

use yii\db\Migration;

/**
 * Handles the creation of table `timetable`.
 * Has foreign keys to the tables:
 *
 * - `days_week`
 * - `bell`
 * - `teacher`
 * - `classroom`
 * - `discipline`
 */
class m170120_224301_create_timetable_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('timetable', [
            'id' => $this->primaryKey(),
            'day_id' => $this->integer()->notNull(),
            'bell_id' => $this->integer()->notNull(),
            'teacher_id' => $this->integer()->notNull(),
            'class_id' => $this->integer()->notNull(),
            'subject_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `day_id`
        $this->createIndex(
            'idx-timetable-day_id',
            'timetable',
            'day_id'
        );

        // add foreign key for table `days_week`
        $this->addForeignKey(
            'fk-timetable-day_id',
            'timetable',
            'day_id',
            'days_week',
            'id',
            'CASCADE'
        );

        // creates index for column `bell_id`
        $this->createIndex(
            'idx-timetable-bell_id',
            'timetable',
            'bell_id'
        );

        // add foreign key for table `bell`
        $this->addForeignKey(
            'fk-timetable-bell_id',
            'timetable',
            'bell_id',
            'bell',
            'id',
            'CASCADE'
        );

        // creates index for column `teacher_id`
        $this->createIndex(
            'idx-timetable-teacher_id',
            'timetable',
            'teacher_id'
        );

        // add foreign key for table `teacher`
        $this->addForeignKey(
            'fk-timetable-teacher_id',
            'timetable',
            'teacher_id',
            'teacher',
            'id',
            'CASCADE'
        );

        // creates index for column `class_id`
        $this->createIndex(
            'idx-timetable-class_id',
            'timetable',
            'class_id'
        );

        // add foreign key for table `classroom`
        $this->addForeignKey(
            'fk-timetable-class_id',
            'timetable',
            'class_id',
            'class',
            'id',
            'CASCADE'
        );

        // creates index for column `subject_id`
        $this->createIndex(
            'idx-timetable-subject_id',
            'timetable',
            'subject_id'
        );

        // add foreign key for table `discipline`
        $this->addForeignKey(
            'fk-timetable-subject_id',
            'timetable',
            'subject_id',
            'discipline',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `days_week`
        $this->dropForeignKey(
            'fk-timetable-day_id',
            'timetable'
        );

        // drops index for column `day_id`
        $this->dropIndex(
            'idx-timetable-day_id',
            'timetable'
        );

        // drops foreign key for table `bell`
        $this->dropForeignKey(
            'fk-timetable-bell_id',
            'timetable'
        );

        // drops index for column `bell_id`
        $this->dropIndex(
            'idx-timetable-bell_id',
            'timetable'
        );

        // drops foreign key for table `teacher`
        $this->dropForeignKey(
            'fk-timetable-teacher_id',
            'timetable'
        );

        // drops index for column `teacher_id`
        $this->dropIndex(
            'idx-timetable-teacher_id',
            'timetable'
        );

        // drops foreign key for table `classroom`
        $this->dropForeignKey(
            'fk-timetable-class_id',
            'timetable'
        );

        // drops index for column `class_id`
        $this->dropIndex(
            'idx-timetable-class_id',
            'timetable'
        );

        // drops foreign key for table `discipline`
        $this->dropForeignKey(
            'fk-timetable-subject_id',
            'timetable'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            'idx-timetable-subject_id',
            'timetable'
        );

        $this->dropTable('timetable');
    }
}
