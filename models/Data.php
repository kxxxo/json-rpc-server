<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "data".
 *
 * @property int $id
 * @property string $page_uid
 * @property string $field_string
 * @property int $field_integer
 * @property bool $field_boolean
 * @property string $created
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_uid', 'field_string', 'field_integer', 'field_boolean'], 'required'],
            [['page_uid', 'field_string'], 'string'],
            [['field_integer'], 'default', 'value' => null],
            [['field_integer'], 'integer'],
            [['field_boolean'], 'boolean'],
            [['created'], 'safe'],
        ];
    }

    /**
     * @return array|array[]
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}
