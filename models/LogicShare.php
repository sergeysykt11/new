<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logic_share".
 *
 * @property int $id
 * @property string $name
 *
 * @property Share[] $shares
 */
class LogicShare extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logic_share';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 155],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShares()
    {
        return $this->hasMany(Share::className(), ['logic' => 'id']);
    }
}
