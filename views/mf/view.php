<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormMf2016 */

$this->params['breadcrumbs'][] = ['label' => 'หน้ารายการ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-mf2016-view">

<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.'Delete', ['ลบ', 'id' => $model->fid], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => 'ต้องการลบข้อมูล?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.'แก้ไข', ['update', 'id' => $model->fid], ['class' => 'btn btn-primary panbtn']) ?>
		<?= Html::a( Html::icon('open-file').' '.'สร้างใหม่', ['create'], ['class' => 'btn btn-info panbtn']) ?>
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
				'label' => $model->attributeLabels()['mf_stid'],
				'value' => $model->mf_stid,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['mf_ill'],
				'value' => $model->mf_ill,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['mf_hospital'],
				'value' => $model->mf_hospital,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['mf_want'],
				'value' => $model->mf_want,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['mf_choice'],
				'value' => $model->mf_choice,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['mf_date'],
				'value' => $model->mf_date,			
				//'format' => ['date', 'long']
			],
    	],
    ]) ?>
	</div>
</div>
</div>