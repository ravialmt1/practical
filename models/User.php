<?php
namespace app\models;

use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{
   public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
        $scenarios['create'][]   = 'role';
        $scenarios['update'][]   = 'role';
        $scenarios['register'][] = 'role';
        return $scenarios;
    }

    public function rules()
    {
        $rules = parent::rules();
        // add some rules
        $rules['fieldRequired'] = ['role', 'required'];
        $rules['fieldLength']   = ['role', 'string', 'max' => 10];
        
        return $rules;
    }
}
?>