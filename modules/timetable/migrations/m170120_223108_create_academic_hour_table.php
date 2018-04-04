<?php

use yii\db\Migration;

/**
 * Handles the creation of table `academic_hour`.
 * Has foreign keys to the tables:
 *
 * - `class`
 * - `subject`
 */
class m170120_223108_create_academic_hour_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('academic_hour', [
            'id' => $this->primaryKey(),
            'class_id' => $this->integer()->notNull(),
            'subject_id' => $this->integer()->notNull(),
            'num_of_hours' => $this->integer(2)->notNull(),
        ]);

        // creates index for column `class_id`
        $this->createIndex(
            'idx-academic_hour-class_id',
            'academic_hour',
            'class_id'
        );

        // add foreign key for table `classroom`
        $this->addForeignKey(
            'fk-academic_hour-class_id',
            'academic_hour',
            'class_id',
            'class',
            'id',
            'CASCADE'
        );

        // creates index for column `subject_id`
        $this->createIndex(
            'idx-academic_hour-discipline_id',
            'academic_hour',
            'subject_id'
        );

        // add foreign key for table `discipline`
        $this->addForeignKey(
            'fk-academic_hour-discipline_id',
            'academic_hour',
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
        // drops foreign key for table `class`
        $this->dropForeignKey(
            'fk-academic_hour-class_id',
            'academic_hour'
        );

        // drops index for column `classroom_id`
        $this->dropIndex(
            'idx-academic_hour-class_id',
            'academic_hour'
        );

        // drops foreign key for table `subject`
        $this->dropForeignKey(
            'fk-academic_hour-discipline_id',
            'academic_hour'
        );

        // drops index for column `discipline_id`
        $this->dropIndex(
            'idx-academic_hour-discipline_id',
            'academic_hour'
        );

        $this->dropTable('academic_hour');
    }
}
