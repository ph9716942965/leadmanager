<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Software */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="software-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textarea(['maxlength' => true])->label('Software Disctiption') ?>

    <?= $form->field($model, 'view_url')->textInput(['maxlength' => true])->label('Code Rayn Url') ?>

    <?= $form->field($model, 'remote_download_url')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'download')->textInput() ?>

    <?php $form->field($model, 'local_download_url')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'dropbox_url')->textInput() ?>

    <?php $form->field($model, 'create_at')->textInput() ?>

    <?php $form->field($model, 'update_at')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
