<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CallLog */
?>
<div class="call-log-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'db_id',
            'review',
            'create_at',
        ],
    ]) ?>

</div>
