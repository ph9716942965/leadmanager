<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Software */
?>
<div class="software-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'view_url:url',
            'remote_download_url:url',
            'download',
            'local_download_url:url',
            'dropbox_url:url',
            'create_at',
            'update_at',
        ],
    ]) ?>

</div>
