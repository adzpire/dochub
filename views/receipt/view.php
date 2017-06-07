<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoRc */

$this->params['breadcrumbs'][] = ['label' => 'Form Auto Rcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-rc-view">

<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.'Delete', ['delete', 'id' => $model->fid], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.'Update', ['update', 'id' => $model->fid], ['class' => 'btn btn-primary panbtn']) ?>
	</div>
	<div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 			[
				'label' => $model->attributeLabels()['fid'],
				'value' => $model->fid,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['rc_paid'],
				'value' => $model->rc_paid,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['rc_getfrom'],
				'value' => $model->rc_getfrom,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['rc_stid'],
				'value' => $model->rc_stid,			
				//'format' => ['date', 'long']
			],
    	],
    ]) ?>
	</div>
</div>
</div>