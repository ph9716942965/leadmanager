<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "db".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $whatsapp
 * @property string $phone
 * @property string $address
 * @property string $create_at
 *
 * @property Appointment[] $appointments
 * @property CallLog[] $callLogs
 */
class Call extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $call_status;
    public $remark;
    public $callback;
    public static function tableName()
    {
        return 'db';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'whatsapp', 'phone', 'address','call_status'], 'required'],
            [['create_at','call_status','callback','remark'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['whatsapp', 'phone'], 'string', 'max' => 15],
            [['address'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'whatsapp' => Yii::t('app', 'Whatsapp'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
            'create_at' => Yii::t('app', 'Create At'),
            'call_status'=>Yii::t('app', 'Call Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointment::className(), ['db_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCallLogs()
    {
        return $this->hasMany(CallLog::className(), ['db_id' => 'id']);
    }
}