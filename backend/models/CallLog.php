<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "call_log".
 *
 * @property int $id
 * @property int $db_id
 * @property string $review
 * @property string $create_at
 *
 * @property Db $db0
 */
class CallLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'call_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['db_id'], 'required'],
            [['db_id'], 'integer'],
            [['create_at'], 'safe'],
            [['review'], 'string', 'max' => 250],
            [['db_id'], 'exist', 'skipOnError' => true, 'targetClass' => Db::className(), 'targetAttribute' => ['db_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'db_id' => 'Lead ID',
            'review' => 'Review',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDb0()
    {
        return $this->hasOne(Db::className(), ['id' => 'db_id']);
    }
}
