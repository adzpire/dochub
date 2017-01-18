<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoBrmn */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Auto Brmns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-brmn-view">

<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.Yii::t('app', 'Delete'), ['delete', 'id' => $model->brmn_id], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.Yii::t('app', 'Update'), ['update', 'id' => $model->brmn_id], ['class' => 'btn btn-primary panbtn']) ?>
	</div>
	<div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 			[
				'label' => $model->attributeLabels()['brmn_id'],
				'value' => $model->brmn_id,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['brmn_stid'],
				'value' => $model->brmn_stid,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['brmn_salary'],
				'value' => $model->brmn_salary,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['brmn_borrow'],
				'value' => $model->brmn_borrow,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['brmn_choice'],
				'value' => $model->brmn_choice,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['brmn_other'],
				'value' => $model->brmn_other,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['brmn_title'],
				'value' => $model->brmn_title,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['brmn_place'],
				'value' => $model->brmn_place,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['brmn_bdate'],
				'value' => $model->brmn_bdate,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['brmn_edate'],
				'value' => $model->brmn_edate,			
				//'format' => ['date', 'long']
			],
    	],
    ]) ?>
	</div>
</div>
</div>