<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stu_info".
 *
 * @property int $stu_info_id
 * @property int $stu_unique_id
 * @property string $stu_title
 * @property string $stu_first_name
 * @property string $stu_middle_name
 * @property string $stu_last_name
 * @property string $stu_gender
 * @property string $stu_dob
 * @property string $stu_email_id
 * @property string $stu_bloodgroup
 * @property string $stu_birthplace
 * @property string $stu_religion
 * @property string $stu_admission_date
 * @property string $stu_photo
 * @property string $stu_languages
 * @property string $stu_mobile_no
 * @property int $stu_info_stu_master_id
 */
class StuInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stu_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stu_unique_id', 'stu_first_name', 'stu_last_name', 'stu_dob', 'stu_admission_date'], 'required'],
            [['stu_unique_id', 'stu_mobile_no', 'stu_info_stu_master_id'], 'integer'],
            [['stu_dob', 'stu_admission_date'], 'safe'],
            [['stu_title', 'stu_bloodgroup'], 'string', 'max' => 15],
            [['stu_first_name', 'stu_middle_name', 'stu_last_name', 'stu_religion'], 'string', 'max' => 50],
            [['stu_gender'], 'string', 'max' => 20],
            [['stu_email_id'], 'string', 'max' => 65],
            [['stu_birthplace'], 'string', 'max' => 45],
            [['stu_photo'], 'string', 'max' => 150],
            [['stu_languages'], 'string', 'max' => 255],
            [['stu_unique_id'], 'unique'],
            [['stu_email_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'stu_info_id' => 'ID',
            'stu_unique_id' => 'Roll No',
            'stu_title' => 'Title',
            'stu_first_name' => 'First Name',
            'stu_middle_name' => 'Middle Name',
            'stu_last_name' => 'Last Name',
            'stu_gender' => 'Gender',
            'stu_dob' => 'Dob',
            'stu_email_id' => 'Email ID',
            'stu_bloodgroup' => 'Bloodgroup',
            'stu_birthplace' => 'Birthplace',
            'stu_religion' => 'Religion',
            'stu_admission_date' => 'Admission Date',
            'stu_photo' => 'Photo',
            'stu_languages' => 'Languages',
            'stu_mobile_no' => 'Mobile No',
            'stu_info_stu_master_id' => 'Info Stu Master ID',
        ];
    }
}
