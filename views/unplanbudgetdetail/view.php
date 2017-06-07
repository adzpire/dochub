<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoUnplnbdgtdetail */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Auto Unplnbdgtdetails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-unplnbdgtdetail-view">

<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary panbtn']) ?>
	</div>
	<div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 			[
				'label' => $model->attributeLabels()['id'],
				'value' => $model->id,
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['unpbdgtdet_unpbid'],
				'value' => $model->unpbdgtdet_unpbid,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['unpbdgtdet_title'],
				'value' => $model->unpbdgtdet_title,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['unpbdgtdet_amount'],
				'value' => $model->unpbdgtdet_amount,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['unpbdgtdet_unit'],
				'value' => $model->unpbdgtdet_unit,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['unpbdgtdet_xpecprice'],
				'value' => $model->unpbdgtdet_xpecprice,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['unpbdgtdet_price'],
				'value' => $model->unpbdgtdet_price,			
				//'format' => ['date', 'long']
			],
    	],
    ]) ?>
	</div>
</div>
</div>