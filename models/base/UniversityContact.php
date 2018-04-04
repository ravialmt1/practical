<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "university_contact".
 *
 * @property integer $uni_contact_id
 * @property integer $uni_id
 * @property string $coordinator
 * @property string $contact_no
 * @property string $address
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property string $created_by
 * @property string $updated_by
 * @property string $deleted_by
 *
 * @property \app\models\University $uni
 */
class UniversityContact extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    private $_rt_softdelete;
    private $_rt_softrestore;

    public function __construct(){
        parent::__construct();
        $this->_rt_softdelete = [
            'deleted_by' => \Yii::$app->user->id,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
        $this->_rt_softrestore = [
            'deleted_by' => 0,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
    }

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'uni'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uni_id', 'coordinator', 'contact_no', 'address'], 'required'],
            [['uni_id'], 'integer'],
            [['address'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['coordinator', 'contact_no', 'created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'university_contact';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uni_contact_id' => 'Uni Contact ID',
            'uni_id' => 'University',
            'coordinator' => 'Coordinator',
            'contact_no' => 'Contact No',
            'address' => 'Address',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUni()
    {
        return $this->hasOne(\app\models\University::className(), ['uni_id' => 'uni_id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'course_id',
            ],
        ];
    }

    /**
     * The following code shows how to apply a default condition for all queries:
     *
     * ```php
     * class Customer extends ActiveRecord
     * {
     *     public static function find()
     *     {
     *         return parent::find()->where(['deleted' => false]);
     *     }
     * }
     *
     * // Use andWhere()/orWhere() to apply the default condition
     * // SELECT FROM customer WHERE `deleted`=:deleted AND age>30
     * $customers = Customer::find()->andWhere('age>30')->all();
     *
     * // Use where() to ignore the default condition
     * // SELECT FROM customer WHERE age>30
     * $customers = Customer::find()->where('age>30')->all();
     * ```
     */

    /**
     * @inheritdoc
     * @return \app\models\UniversityContactQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \app\models\UniversityContactQuery(get_called_class());
        return $query->where(['university_contact.deleted_by' => 0]);
    }
}
