<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model backend\models\Cards */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cards-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true,'oninput'=>"validity.valid||(value='');",'type' => 'number']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'whatsapp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gmap')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'about')->widget(CKEditor::className(), [
		'options' => ['rows' => 2],
		'preset' => 'basic'
	]) ?>

<?= $form->field($model, 'skill')->widget(CKEditor::className(), [
		'options' => ['rows' => 6],
		'preset' => 'basic'
	]) ?>

<?= $form->field($model, 'education')->widget(CKEditor::className(), [
		'options' => ['rows' => 6],
		'preset' => 'basic'
	]) ?>

<?= $form->field($model, 'awards')->widget(CKEditor::className(), [
		'options' => ['rows' => 6],
		'preset' => 'basic'
	]) ?>

<?= $form->field($model, 'testimonials')->widget(CKEditor::className(), [
		'options' => ['rows' => 6],
		'preset' => 'basic'
	]) ?>


    <?php // $form->field($model, 'about')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'skill')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'education')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'awards')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'testimonials')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'compny_name')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'service')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service')->widget(CKEditor::className(), [
		'options' => ['rows' => 6],
		'preset' => 'basic'
	]) ?>

    <?= $form->field($model, 'website_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
