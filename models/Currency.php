<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property string $code
 * @property string $name
 */
class Currency extends \yii\db\ActiveRecord
{
    public function beforeSave($insert)
    {
        parent::beforeSave($insert);

        $this->code = strtoupper($this->code);

        return true;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['code'], 'unique'],
            [['code'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'name' => 'Name',
        ];
    }
}
