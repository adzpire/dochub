<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoUnplnbdgt */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Auto Unplnbdgts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-unplnbdgt-view">

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
				'label' => $model->attributeLabels()['unpbdgt_stid'],
				'value' => $model->unpbdgt_stid,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['unpbdgt_date'],
				'value' => $model->unpbdgt_date,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['unpbdgt_job'],
				'value' => $model->unpbdgt_job,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['unpbdgt_material'],
				'value' => $model->unpbdgt_year,
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['unpbdgt_reason'],
				'value' => $model->unpbdgt_reason,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['unpbdgt_tax'],
				'value' => $model->unpbdgt_tax,			
				//'format' => ['date', 'long']
			],
    	],
    ]) ?>
	</div>
</div>
</div>