<?php

use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoPp */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Auto Pps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pp_id, 'url' => ['view', 'id' => $model->pp_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="form-auto-pp-update">

<div class="panel panel-warning">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.Yii::t('app', 'Delete'), ['delete', 'id' => $model->pp_id], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.Yii::t('app', 'createnew'), ['create'], ['class' => 'btn btn-info panbtn']) ?>
	</div>
	<div class="panel-body">
	<?= $this->render('_form', [
	  'model' => $model,
	]) ?>
	</div>
</div>

</div>
