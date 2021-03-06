<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

// use kartik\grid\GridView;
use kartik\dynagrid\DynaGrid;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\FormAutoPpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-pp-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php  /*GridView::widget([
		//'id' => 'kv-grid-demo',
		'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

//            'pp_id',
			[
				'attribute' => 'pp_id',
				'headerOptions' => [
					'width' => '50px',
				],
			],
            'pp_actname',
            'pp_accountnum',
            [
                'attribute' => 'pp_bdate',
                'format' => ['date','long'],
            ],
            [
                'attribute' => 'pp_edate',
                'format' => ['date','long'],
            ],
            // 'pp_stid',
            // 'pp_jid',
			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{update}  {pdf}',
				'buttons' => [
					'update' => function ($url, $model, $key) {
						return Html::a(' '.Html::icon('pencil').' ', $url, ['data-toggle'=>'tooltip', 'title'=>'แก้ไข']);
					},
					'pdf' => function ($url, $model, $key) {
						return Html::a(' '.Html::icon('print').' ', $url, ['data-toggle'=>'tooltip', 'data-pjax'=>0, 'title'=>'พิมพ์', 'target'=>'_blank']);
					},
				],
				'headerOptions' => [
					'width' => '70px',
				],
				'contentOptions' => [
					'class'=>'text-center',
				],
				'header' => 'จัดการ',
			],
        ],
		'pager' => [
			'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
			'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
		],
		'responsive'=>true,
		'hover'=>true,
		'toolbar'=> [
			['content'=>
                Html::a(Html::icon('plus').'สร้างแบบฟอร์มใหม่', ['create'], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'เพิ่ม')]).' '.
                Html::a(Html::icon('info-sign').'แสดงตัวอย่่าง', ['pdf?id=example'], ['data-pjax'=>0, 'class'=>'btn btn-danger', 'title'=>Yii::t('app', 'แสดงตัวอย่่าง'), 'target'=>'_blank']).' '.
                Html::a(Html::icon('repeat'), ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
			],
			//'{export}',
			'{toggleData}',
		],
		'panel'=>[
			'type'=>GridView::TYPE_INFO,
			'heading'=> Html::icon($searchModel::fn()['icon']).' '.Html::encode($this->title),
		],
    ]);*/ ?>

<?= DynaGrid::widget([
    'columns' => [
		[
			'attribute' => 'pp_id',
			'headerOptions' => [
				'width' => '50px',
			],
			'order'=>DynaGrid::ORDER_FIX_LEFT,
		],
		'pp_actname',
		'pp_accountnum',
		[
			'attribute' => 'pp_bdate',
			'format' => ['date','long'],
		],
		[
			'attribute' => 'pp_edate',
			'format' => ['date','long'],
		],
		[
			'attribute' => 'pp_jid',
			'visible'=>false,
		],
		[
			'class' => 'yii\grid\ActionColumn',
			'template' => '{update}  {pdf}',
			'buttons' => [
				'update' => function ($url, $model, $key) {
					return Html::a(' '.Html::icon('pencil').' ', $url, ['data-toggle'=>'tooltip', 'title'=>'แก้ไข']);
				},
				'pdf' => function ($url, $model, $key) {
					return Html::a(' '.Html::icon('print').' ', $url, ['data-toggle'=>'tooltip', 'data-pjax'=>0, 'title'=>'พิมพ์', 'target'=>'_blank']);
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
    'options'=>['id'=>'dynagrid-pp'] // a unique identifier is important
]); ?>

<?php 	 /* adzpire grid tips
		[
				'attribute' => 'id',
				'headerOptions' => [
					'width' => '50px',
				],
			],
		[
		'attribute' => 'we_date',
		'value' => 'we_date',
			'filter' => DatePicker::widget([
					'model'=>$searchModel,
					'attribute'=>'date',
					'language' => 'th',
					'options' => ['placeholder' => Yii::t('app', 'enterdate')],
					'type' => DatePicker::TYPE_COMPONENT_APPEND,
					'pickerButton' =>false,
					//'size' => 'sm',
					//'removeButton' =>false,
					'pluginOptions' => [
						'autoclose' => true,
						'format' => 'yyyy-mm-dd'
					]
				]),
			//'format' => 'html',			
			'format' => ['date']

		],	
		[
			'attribute' => 'we_creator',
			'value' => 'weCr.userPro.nameconcatened'
		],
	 */
 ?>
</div>
