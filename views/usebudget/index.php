<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

use kartik\dynagrid\DynaGrid;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\FormAutoUsebdgtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerCss("
.grid-view td {
    white-space: unset;
}
");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-usebdgt-index">

<?= DynaGrid::widget([
    'columns' => [
        //['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'usebdgt_id',
            'headerOptions' => [
                'width' => '50px',
            ],
        ],
        //'usebdgt_stid',
        [
            'attribute' => 'usebdgt_date',
            'format' => ['date','long'],
            'headerOptions' => [
                'width' => '150px',
            ],
        ],
        'usebdgt_year',
        'usebdgt_reason:ntext',
        [
            'label' => 'รายการ',
            'format' => 'html',
            'filter' =>false,
            'enableSorting' =>false,
            'value' => function($data) {
                return $data->titleList;
            },

        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}  {pdf}',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a(' '.Html::icon('pencil').' ', $url, ['data-toggle'=>'tooltip', 'title'=>'แก้ไข']);
                },
                'pdf' => function ($url, $model, $key) {
                    if(!empty($model->formAutoUsebdgtdetails)) {
                        return Html::a(' ' . Html::icon('print') . ' ', $url, ['data-toggle' => 'tooltip', 'data-pjax' => 0, 'title' => 'พิมพ์', 'target' => '_blank']);
                    }
                },
            ],
            'headerOptions' => [
                'width' => '70px',
            ],
            'contentOptions' => [
                'class'=>'text-center',
            ],
            'header' => 'จัดการ',
            'order'=>DynaGrid::ORDER_FIX_RIGHT,
        ],
    ],	
    'theme'=>'panel-info',
    'showPersonalize'=>true,
	'storage' => 'session',
	'toggleButtonGrid' => [
		'label' => '<span class="glyphicon glyphicon-wrench">ปรับแต่งตาราง</span>'
	],
    'gridOptions'=>[
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        // 'showPageSummary'=>true,
        // 'floatHeader'=>true,
		'pjax'=>true,
		'hover'=>true,
		'pager' => [
			'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
			'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
		],
		'resizableColumns'=>true,
        'responsiveWrap'=>false,
        'panel'=>[
            'heading'=>'<h3 class="panel-title">'.Html::icon($searchModel::fn()['icon']).' '.Html::encode($this->title).'</h3>',
            // 'before' =>  '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
            'after' => false
        ],
        'toolbar' =>  [
            ['content'=>
				Html::a(Html::icon('plus').'สร้างแบบฟอร์มใหม่', ['create'], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'เพิ่ม')]).' '.
				Html::a(Html::icon('info-sign').'แสดงตัวอย่่าง', ['pdf?id=example'], ['data-pjax'=>0, 'class'=>'btn btn-danger', 'title'=>Yii::t('app', 'แสดงตัวอย่่าง'), 'target'=>'_blank']).' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['dynagrid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Reset Grid'])
            ],
            ['content'=>'{dynagrid}'],
            '{toggleData}',
		],
		
    ],
    'options'=>['id'=>'dynagrid-usebudget'] // a unique identifier is important
]); ?>

</div>
