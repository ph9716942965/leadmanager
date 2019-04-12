<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "software".
 *
 * @property int $id
 * @property string $title
 * @property string $view_url
 * @property string $remote_download_url
 * @property int $download
 * @property string $local_download_url
 * @property int $dropbox_url
 * @property string $create_at
 * @property string $update_at
 */
class Software extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'software';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'view_url', 'remote_download_url'], 'required'],
            [['download', 'dropbox_url'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['title', 'view_url', 'remote_download_url', 'local_download_url'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'view_url' => Yii::t('app', 'View Url'),
            'remote_download_url' => Yii::t('app', 'Remote Download Url'),
            'download' => Yii::t('app', 'Download'),
            'local_download_url' => Yii::t('app', 'Local Download Url'),
            'dropbox_url' => Yii::t('app', 'Dropbox Url'),
            'create_at' => Yii::t('app', 'Create At'),
            'update_at' => Yii::t('app', 'Update At'),
        ];
    }
}
