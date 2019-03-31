
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Call */
/* @var $form ActiveForm */
?>
<div class="calling">



<?php $form = ActiveForm::begin(); ?>
	

<div class="container">
  <h2>Calling</h2>
  
  <!-- <p><strong>Note:</strong> The <strong>data-parent</strong> attribute makes sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.</p> -->
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Summery</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6">
					<div class="box box-primary">
						<dl class="dl-horizontal">
							<dt>First Name</dt><dd><?= $model->name ?></dd>
							<dt>Email</dt><dd><?= $model->email ?></dd>
						<br>
						</dl>

					<dt>Available Numbers</dt><dd></dd>
					<li style="list-style: none;padding:2px;"> 
						<input type="radio" class="inverted-radio" name="phone_used" id="phone_used-<?= $model->phone ?>" checked="true">
						<label class="btn btn-success no-loading stopAjax call-click-label" for="phone_used-<?= $model->phone ?>">
						<span></span>
							<a style="color:white;" href="tel:<?= $model->phone ?>" class="call-click-url no-loading stopAjax"><i class="fa fa-phone"></i> <?= $model->phone ?></a>
						</label>
					</li>
					</div>
				</div>  
			</div>
		<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Disposition</h3>
					</div>
					<?php 
					echo $form->field($model, 'call_status')->radioList(
					[0 => 'Very Intrested', 1 => 'Intrested', 2 => 'Natural',3=>'Not Intrested'], 
					['custom' => false, 'id' => 'custom-radio-list','class'=>'iradio_minimal-red']
					);

					?>

					<div class="row">
						<?= $form->field($model, 'remark')->textarea()?>
					</div>

				</div>
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Contact Details</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
			<div class="row">
				contact detail section
			</div>
		
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Contact History</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
		
		<?php echo rand(0,999);?>
		
		</div>
      </div>
    </div>
  </div> 
</div>

<div class="form-group">
<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>
</div>
<?php ActiveForm::end(); ?>

</div><!-- calling -->

