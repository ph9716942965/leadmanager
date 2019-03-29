<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lead".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $whatsapp
 * @property string $last_call_time
 * @property string $last_feedback
 * @property string $next_call_time
 */
class Lead extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lead';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'whatsapp', 'last_feedback'], 'required'],
            [['last_call_time', 'next_call_time'], 'safe'],
            [['name'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 50],
            [['whatsapp'], 'string', 'max' => 15],
            [['last_feedback'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'whatsapp' => 'Whatsapp',
            'last_call_time' => 'Last Call Time',
            'last_feedback' => 'Last Feedback',
            'next_call_time' => 'Next Call Time',
        ];
    }
}
