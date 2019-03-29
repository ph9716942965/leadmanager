<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CardsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cards-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'contact_number') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'whatsapp') ?>

    <?php // echo $form->field($model, 'gmap') ?>

    <?php // echo $form->field($model, 'payme') ?>

    <?php // echo $form->field($model, 'about') ?>

    <?php // echo $form->field($model, 'skill') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'awards') ?>

    <?php // echo $form->field($model, 'testimonials') ?>

    <?php // echo $form->field($model, 'compny_name') ?>

    <?php // echo $form->field($model, 'service') ?>

    <?php // echo $form->field($model, 'website_url') ?>

    <?php // echo $form->field($model, 'image_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
