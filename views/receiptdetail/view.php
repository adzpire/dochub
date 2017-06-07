<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoRcdetail */

$this->params['breadcrumbs'][] = ['label' => 'Form Auto Rcdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-rcdetail-view">

<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.'Delete', ['delete', 'id' => $model->rcd_id], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.'Update', ['update', 'id' => $model->rcd_id], ['class' => 'btn btn-primary panbtn']) ?>
	</div>
	<div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 			[
				'label' => $model->attributeLabels()['rcd_id'],
				'value' => $model->rcd_id,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['rcd_rcid'],
				'value' => $model->rcd_rcid,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['rcd_detail'],
				'value' => $model->rcd_detail,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['rcd_amount'],
				'value' => $model->rcd_amount,			
				//'format' => ['date', 'long']
			],
    	],
    ]) ?>
	</div>
</div>
</div>