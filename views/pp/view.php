<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoPp */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Auto Pps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-pp-view">

<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.Yii::t('app', 'Delete'), ['delete', 'id' => $model->pp_id], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.Yii::t('app', 'Update'), ['update', 'id' => $model->pp_id], ['class' => 'btn btn-primary panbtn']) ?>
	</div>
	<div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 			[
				'label' => $model->attributeLabels()['pp_id'],
				'value' => $model->pp_id,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['pp_actname'],
				'value' => $model->pp_actname,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['pp_accountnum'],
				'value' => $model->pp_accountnum,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['pp_bdate'],
				'value' => $model->pp_bdate,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['pp_edate'],
				'value' => $model->pp_edate,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['pp_stid'],
				'value' => $model->pp_stid,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['pp_jid'],
				'value' => $model->pp_jid,			
				//'format' => ['date', 'long']
			],
    	],
    ]) ?>
	</div>
</div>
</div>