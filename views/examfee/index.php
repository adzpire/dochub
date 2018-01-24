<?php

use yii\bootstrap\Html;

use kartik\grid\GridView;

use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\FormAutoExmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-exm-index">

<?php Pjax::begin(); ?>    <?= GridView::widget([
    //'id' => 'kv-grid-demo',
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [

        [
            'attribute' => 'exmmain_id',
            'headerOptions' => [
                'width' => '50px',
            ],
        ],
        [
            'attribute' => 'exmmain_semester',
            'headerOptions' => [
                'width' => '90px',
            ],
        ],
        [
            'attribute' => 'exmmain_year',
            'headerOptions' => [
                'width' => '90px',
            ],
        ],
        [
            'label' => 'วิชา',
            'format' => 'html',
            'filter' =>false,
            'enableSorting' =>false,
            'value' => function($data) {
                return $data->courseList;
            },

        ],
        [
            'label' => 'ชนิดข้อสอบ',
            'format' => 'html',
            'filter' =>false,
            'enableSorting' =>false,
            'value' => function($data) {
                return $data->degreeList;
            },

        ],
        [
            'label' => 'เวลา(ชม.)',
            'format' => 'html',
            'filter' =>false,
            'enableSorting' =>false,
            'value' => function($data) {
                return $data->timeList;
            },

        ],
        [
            'label' => 'จำนวน นศ.',
            'format' => 'html',
            'filter' =>false,
            'enableSorting' =>false,
            'value' => function($data) {
                return $data->stdamountList;
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
                    if(!empty($model->formAutoExmDetails)) {
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
            Html::a(Html::icon('info-sign').'แสดงตัวอย่่าง', ['pdf?id=example'], ['class'=>'btn btn-danger', 'title'=>Yii::t('app', 'แสดงตัวอย่่าง'), 'target'=>'_blank']).' '.
            Html::a(Html::icon('repeat'), ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
        ],
        //'{export}',
        '{toggleData}',
    ],
    'panel'=>[
        'type'=>GridView::TYPE_INFO,
        'heading'=> Html::icon($searchModel::fn()['icon']).' '.Html::encode($this->title),
    ],
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
?> <?php Pjax::end(); ?>
</div>
