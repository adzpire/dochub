<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoSession */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Auto Sessions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-session-view">

<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.Yii::t('app', 'Delete'), ['delete', 'id' => $model->fss_id], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.Yii::t('app', 'Update'), ['update', 'id' => $model->fss_id], ['class' => 'btn btn-primary panbtn']) ?>
	</div>
	<div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 			[
				'label' => $model->attributeLabels()['fss_id'],
				'value' => $model->fss_id,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['fss_fid'],
				'value' => $model->fss_fid,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['fss_type'],
				'value' => $model->fss_type,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['created_at'],
				'value' => $model->created_at,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['created_by'],
				'value' => $model->created_by,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['updated_at'],
				'value' => $model->updated_at,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['updated_by'],
				'value' => $model->updated_by,			
				//'format' => ['date', 'long']
			],
    	],
    ]) ?>
	</div>
</div>
</div>