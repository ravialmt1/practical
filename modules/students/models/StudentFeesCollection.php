<?php

namespace app\modules\students\models;

use Yii;

/**
 * This is the model class for table "student_fees_collection".
 *
 * @property int $id
 * @property int $student_id
 * @property string $amount
 * @property string $payment_type
 * @property string $cheque_no
 * @property string $bank_name
 * @property string $bank_branch
 * @property string $created_at
 * @property string $updated_at
 * @property string $description
 */
class StudentFeesCollection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student_fees_collection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id'], 'string','max'=>200],
            [['amount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['payment_type', 'cheque_no', 'bank_name', 'bank_branch', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'amount' => 'Amount',
            'payment_type' => 'Payment Type',
            'cheque_no' => 'Cheque No',
            'bank_name' => 'Bank Name',
            'bank_branch' => 'Bank Branch',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'description' => 'Description',
        ];
    }
}
