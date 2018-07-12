<?php

use yii\bootstrap\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\EnglishtestData */

$this->params['breadcrumbs'][] = ['label' => 'หน้ารายการ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="englishtest-data-view">

<div class="panel panel-success">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('eye').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('fire').' '.'Delete', ['ลบ', 'id' => $model->ID], [
            'class' => 'btn btn-danger panbtn',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a( Html::icon('pencil').' '.'แก้ไข', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary panbtn']) ?>
		<?= Html::a( Html::icon('open-file').' '.'สร้างใหม่', ['create'], ['class' => 'btn btn-warning panbtn']) ?>
		<?= Html::a( Html::icon('th-list').' '.'รายการ', ['index'], ['class' => 'btn btn-info panbtn']) ?>
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
				'label' => $model->attributeLabels()['ed_title'],
				'value' => $model->ed_title,			
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['ed_limitseat'],
				'value' => $model->ed_limitseat,
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['ed_note'],
				'value' => $model->ed_note,			
				'format' => ['html']
			],
            [
                'label' => $model->attributeLabels()['ed_round'],
                'value' => $model->ed_round,
                //'format' => ['date', 'long']
            ],
     			[
				'label' => $model->attributeLabels()['ed_active_till'],
				'value' => $model->ed_active_till,			
				'format' => ['datetime']
			],
            [
                'label' => 'รายการที่มีรอบเดียวกัน',
                'value' => function($model){
                    $data = $model->sameround;
                    if(!empty($data)){
                        $doc = '<ul>';
                        foreach($data as $book) {
                            $doc .= '<li>'.$book->ID.' : '.$book->ed_title.' : '.Html::a(Html::icon('share-alt'), ['view' , 'id'=> $book->ID], ['title' => Yii::t('app', 'ไปยังรายการ')]).'</li>';
                        }
                        $doc .= '</ul>';
                        return $doc;
                    }else{
                        return 'ไม่มี';
                    }
//                             .' <span class="text-danger">('.($model->year+543).')</span>';
                },
                'format' => 'html',
            ],
     			[
				'label' => $model->attributeLabels()['created_at'],
				'value' => $model->created_at,			
				'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['created_by'],
				'value' => $model->createdBy->fullname,
				//'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['updated_at'],
				'value' => $model->updated_at,			
				'format' => ['date', 'long']
			],
     			[
				'label' => $model->attributeLabels()['updated_by'],
				'value' => $model->updatedBy->fullname,
				//'format' => ['date', 'long']
			],
    	],
    ]) ?>
	</div>
</div>
</div>