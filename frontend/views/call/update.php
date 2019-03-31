<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Call */

$this->title = Yii::t('app', 'Calling Call: {name}', [
    'name' => $model->name,
]);
if(\Yii::$app->session->hasFlash('success')){
    echo \Yii::$app->session->getFlash('success');
}
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Calls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="call-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php /* <?= $this->render('_form', [
        'model' => $model,
    ]) ?> --> */?>

<?= $this->render('calling', [
        'model' => $model,
    ]) ?>

</div>
