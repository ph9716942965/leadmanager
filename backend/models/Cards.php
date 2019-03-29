<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cards".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $contact_number
 * @property string $email
 * @property string $whatsapp
 * @property string $gmap
 * @property string $payme
 * @property string $about
 * @property string $skill
 * @property string $education
 * @property string $awards
 * @property string $testimonials
 * @property string $compny_name
 * @property string $service
 * @property string $website_url
 * @property string $image_url
 */
class Cards extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'title', 'contact_number', 'email', 'whatsapp', 'gmap', 'payme', 'about', 'skill', 'education', 'awards', 'testimonials', 'compny_name', 'service', 'image_url'], 'required'],
            [['name'], 'string', 'max' => 30],
            [['title'], 'string', 'max' => 20],
            [['contact_number'], 'string', 'max' => 12],
            ['email', 'email'],
            [['whatsapp'], 'string', 'max' => 16],
            [['gmap', 'compny_name', 'website_url'], 'safe'],
            [['payme', 'about', 'skill', 'education', 'awards', 'testimonials', 'service', 'image_url'], 'string', 'max' => 1000],
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
            'title' => 'Title',
            'contact_number' => 'Contact Number',
            'email' => 'Email',
            'whatsapp' => 'Whatsapp',
            'gmap' => 'Gmap',
            'payme' => 'Payme',
            'about' => 'About',
            'skill' => 'Skill',
            'education' => 'Education',
            'awards' => 'Awards',
            'testimonials' => 'Testimonials',
            'compny_name' => 'Compny Name',
            'service' => 'Service',
            'website_url' => 'Website Url',
            'image_url' => 'Image Url',
        ];
    }
}
