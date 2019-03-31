<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Appointment */
?>
<div class="appointment-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'db_id',
            'appointment_date_time',
            'create_at',
        ],
    ]) ?>

</div>
