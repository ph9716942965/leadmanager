<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "appointment".
 *
 * @property int $id
 * @property int $db_id
 * @property string $appointment_date_time
 * @property string $create_at
 *
 * @property Db $db0
 */
class Appointment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'appointment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['db_id'], 'required'],
            [['db_id'], 'integer'],
            [['appointment_date_time', 'create_at'], 'safe'],
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
            'appointment_date_time' => 'Appointment Date Time',
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
