<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\FormAutoBrmnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
$this->registerCss("
.grid-view td {
    white-space: unset;
}
");
?>
<div class="form-auto-brmn-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
		//'id' => 'kv-grid-demo',
		'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'brmn_id',
                'headerOptions' => [
                    'width' => '50px',
                ],
            ],
            //'brmn_stid',
            //'brmn_salary',
            //'brmn_choice',
            [
                'attribute' => 'brmn_choice',
                'value' => function ($model) {
                    return $model->Showchoice($model->brmn_choice);
                },
                'filter'=> $choicearr,
                'format' => ['html']
            ],
            [
                'attribute' => 'brmn_borrow',
                'headerOptions' => [
                    'width' => '100px',
                ],
            ],
            [
                'attribute' => 'brmn_other',
                'format' => 'raw',
                'value' => 'brmn_other',
                //'contentOptions'=>['style'=>'max-width: 250px'] // <-- right here
            ],
            [
                'attribute' => 'brmn_title',
                'format' => 'raw',
                'value' => 'brmn_title',
                //'contentOptions'=>['style'=>'max-width: 250px'] // <-- right here
            ],
            // 'brmn_place',
            // 'brmn_bdate',
            // 'brmn_edate',
			[
				'class' => 'yii\grid\ActionColumn',
				'template' => '{update}  {print}',
				'buttons' => [
					'update' => function ($url, $model, $key) {
						//return Html::a('<i class="glyphicon glyphicon-ok-circle"></i>',$url);
						return Html::a(' '.Html::icon('pencil').' ', $url, ['data-toggle'=>'tooltip', 'title'=>'แก้ไข']);
					},
					'print' => function ($url, $model, $key) {
						//return Html::a('<i class="glyphicon glyphicon-ok-circle"></i>',$url);
						return Html::a(' '.Html::icon('print').' ', $url, ['data-toggle'=>'tooltip', 'title'=>'พิมพ์', 'target'=>'_blank']);
					},
				],
				'headerOptions' => [
					'width' => '70px',
				],
				'contentOptions' => [
					'class'=>'text-center',
				],
				//'header' => 'จัดการ',
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
				Html::a(Html::icon('plus').' สร้างแบบฟอร์มใหม่ ', ['create'], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'เพิ่ม')]),
				//Html::a(Html::icon('repeat'), ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
			],
			//'{export}',
			'{toggleData}',
		],
		'panel'=>[
			'type'=>GridView::TYPE_INFO,
			'heading'=> Html::icon('user').' '.Html::encode($this->title),
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
 ?> 	
</div>
