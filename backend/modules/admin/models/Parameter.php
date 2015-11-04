<?php

namespace backend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "parameter".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $type
 * @property integer $status
 * @property integer $sort
 */
class Parameter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parameter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'type', 'status', 'sort'], 'required'],
            [['status', 'sort'], 'integer'],
            [['name', 'code', 'type'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'code' => Yii::t('backend', 'Code'),
            'type' => Yii::t('backend', 'Type'),
            'status' => Yii::t('backend', 'Status'),
            'sort' => Yii::t('backend', 'Sort'),
        ];
    }

    /**
     * @inheritdoc
     * @return \backend\models\query\ParameterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\modules\admin\models\query\ParameterQuery(get_called_class());
    }
}
