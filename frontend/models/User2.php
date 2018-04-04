<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $email
 * @property string $school
 * @property string $password_hash
 * @property integer $status
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $account_activation_token
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Article[] $articles
 * @property Clas[] $clas
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'username', 'email', 'school', 'password_hash', 'status', 'auth_key', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 100],
            [['username', 'email', 'password_hash', 'password_reset_token', 'account_activation_token'], 'string', 'max' => 255],
            [['school'], 'string', 'max' => 500],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'email' => 'Email',
            'school' => 'School',
            'password_hash' => 'Password Hash',
            'status' => 'Status',
            'auth_key' => 'Auth Key',
            'password_reset_token' => 'Password Reset Token',
            'account_activation_token' => 'Account Activation Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClas()
    {
        return $this->hasMany(Clas::className(), ['teacher_id' => 'id']);
    }
}
$gridColumns = [
// the name column configuration
[
    'class'=>'kartik\grid\EditableColumn',
    'attribute'=>'name',
    'pageSummary'=>true,
    'editableOptions'=> function ($model, $key, $index) {
        return [
            'header'=>'Name',
            'size'=>'md',
            'afterInput'=>function ($form, $widget) use ($model, $index) {
                return $form->field($model, "color")->widget(\kartik\widgets\ColorInput::classname(), [
                    'showDefaultPalette'=>false,
                    'options'=>['id'=>"color-{$index}"],
                    'pluginOptions'=>[
                        'showPalette'=>true,
                        'showPaletteOnly'=>true,
                        'showSelectionPalette'=>true,
                        'showAlpha'=>false,
                        'allowEmpty'=>false,
                        'preferredFormat'=>'name',
                        'palette'=>[
                            ["white", "black", "grey", "silver", "gold", "brown"],
                            ["red", "orange", "yellow", "indigo", "maroon", "pink"],
                            ["blue", "green", "violet", "cyan", "magenta", "purple"],
                        ]
                    ],
                ]);
            }
        ];
    }
],
// the buy_amount column configuration
[
    'class'=>'kartik\grid\EditableColumn',
    'attribute'=>'buy_amount',
    'editableOptions'=>[
        'header'=>'Buy Amount',
        'inputType'=>\kartik\editable\Editable::INPUT_SPIN,
        'options'=>['pluginOptions'=>['min'=>0, 'max'=>5000]]
    ],
    'hAlign'=>'right',
    'vAlign'=>'middle',
    'width'=>'100px',
    'format'=>['decimal', 2],
    'pageSummary'=>true
],
];

// the GridView widget (you must use kartik\grid\GridView)
echo \kartik\grid\GridView::widget([
    'dataProvider'=>$dataProvider,
    'filterModel'=>$searchModel,
    'columns'=>$gridColumns
]);
