<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Lead */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lead-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php 

if($model->isNewRecord == false){
    echo $form->field($model, 'name')->textInput(['maxlength' => true,'readonly'=>true]);

    echo $form->field($model, 'email')->textInput(['maxlength' => true,'readonly'=>true]);

    echo $form->field($model, 'whatsapp')->textInput(['maxlength' => true,'readonly'=>true]);

}else{
    echo $form->field($model, 'name')->textInput(['maxlength' => true]);

    echo $form->field($model, 'email')->textInput(['maxlength' => true]);

    echo $form->field($model, 'whatsapp')->textInput(['maxlength' => true,]);
}

    
?>
<?php 
if($model->isNewRecord == false){
    //echo $form->field($model, 'last_call_time')->textInput();
    echo $form->field($model, 'last_feedback')->textarea(['maxlength' => true])->label('Feed back');
    echo $form->field($model, 'next_call_time')->textInput();
}

?>

    <?php // $form->field($model, 'last_call_time')->textInput() ?>

    <?php // $form->field($model, 'last_feedback')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'next_call_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
