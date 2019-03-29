<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

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

    echo $form->field($model, 'whatsapp')->textInput(['maxlength' => true,])->label('Whatsapp Number');
}

    
?>
<?php 
if($model->isNewRecord == false){
    //echo $form->field($model, 'last_call_time')->textInput();
    echo $form->field($model, 'last_feedback')->textarea(['maxlength' => true])->label('Feed back');
   // echo $form->field($model, 'next_call_time')->textInput(['maxlength' => true,"class" => "form-control datePickerTodayMax",'required'=>true]);
   echo '<label>Next Shedule Date/Time</label>';
echo DateTimePicker::widget([
    'name' => 'Lead[next_call_time]',
    'options' => ['placeholder' => 'Select operating time ...'],
    'convertFormat' => true,
    'pluginOptions' => [
        //'format' => 'd-M-Y g:i A',
        'format' => 'Y-m-d g:i',
        'startDate' => '15-Mar-2019 12:00 AM',
        'todayHighlight' => true
    ]
]);
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
