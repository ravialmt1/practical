<?php
/**
 * Created by PhpStorm.
 * User: ujin
 * Date: 22.01.17
 * Time: 0:17
 */

namespace app\modules\timetable\models;


use yii\base\Model;

class SearchTimetableClass extends Model
{
    public $class;

    /**
     * Validation rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            [['class'], 'required'],
            ['class', 'integer'],
        ];
    }

    /**
     * Settings for displaying attributes in templates
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'class' => 'Класс'
        ];
    }
}