<?php

use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoRcdetail */

$this->params['breadcrumbs'][] = ['label' => 'Form Auto Rcdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rcd_id, 'url' => ['view', 'id' => $model->rcd_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="form-auto-rcdetail-update">

<div class="panel panel-warning">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.'Delete', ['delete', 'id' => $model->rcd_id], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.'createnew', ['create'], ['class' => 'btn btn-info panbtn']) ?>
	</div>
	<div class="panel-body">
	<?= $this->render('_form', [
	  'model' => $model,
	]) ?>
	</div>
</div>

</div>
