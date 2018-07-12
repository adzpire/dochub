<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\EnglishtestAttendee */

$this->params['breadcrumbs'][] = ['label' => 'หน้ารายการ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="englishtest-attendee-view">

<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.'Delete', ['ลบ', 'id' => $model->ID], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => 'ต้องการลบข้อมูล?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.'แก้ไข', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary panbtn']) ?>
		<?= Html::a( Html::icon('open-file').' '.'สร้างใหม่', ['create'], ['class' => 'btn btn-info panbtn']) ?>
	</div>
	<div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
 			[
				'label' => $model->attributeLabels()['ID'],
				'value' => $model->ID,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['ed_id'],
				'value' => $model->ed_id,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['person_id'],
				'value' => $model->person_id,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['username'],
				'value' => $model->username,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['firstname_th'],
				'value' => $model->firstname_th,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['lastname_th'],
				'value' => $model->lastname_th,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['firstname_eng'],
				'value' => $model->firstname_eng,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['lastname_eng'],
				'value' => $model->lastname_eng,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['ea_date'],
				'value' => $model->ea_date,			
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