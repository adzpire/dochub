<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\EnglishtestDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
$this->registerCss('
.grid-view td {
    white-space: unset;
}
');
?>
<div class="englishtest-data-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
		//'id' => 'kv-grid-demo',
		'dataProvider'=> $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'ID',
                'headerOptions' => [
                    'width' => '50px',
                ],
            ],
            'ed_title',
            'ed_round',
            'ed_active_till',
            [
                'attribute' => 'ed_limitseat',
                'headerOptions' => [
                    'width' => '70px',
                ],
            ],
//            'ed_limitseat',
            'ed_note:html',
            // 'created_at',
            // 'created_by',
//            'updated_at',
            [
                'attribute' => 'created_by',
                'value' => 'createdBy.fullname'
            ],
            // 'updated_by',
				[
					'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete} {detail}',
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                                return Html::a(Html::icon('eye-open'), $url, ['class' => 'text-success', 'data-pjax' => 0, 'title'=>'แก้ไข']);
                        },
                        'delete' => function ($url, $model, $key) {
                                return Html::a(Html::icon('trash'), $url, ['class' => 'text-danger', 'data' => ['pjax' => 0, 'method' => 'post', 'confirm' => 'ต้องการลบข้อมูล?',]]);
                        },
                        'detail' => function ($url, $model, $key) {
                            return Html::a(Html::icon('th-list'), $url, ['class' => 'text-warning', 'data-pjax' => 0, 'title'=>'รายการผู้สมัคร', 'target' => '_blank']);
                        },
                    ],
                    'headerOptions' => [
                        'width' => '90px',
                    ],
					/*'visibleButtons' => [
						'view' => Yii::$app->user->id == 122,
						'update' => Yii::$app->user->id == 19,
						'delete' => function ($model, $key, $index) {
										return $model->status === 1 ? false : true;
									}
						],
					'visible' => Yii::$app->user->id == 19,*/
				],
        ],
		'pager' => [
			'firstPageLabel' => 'รายการแรกสุด',
			'lastPageLabel' => 'รายการท้ายสุด',
		],
		'responsive'=>true,
		'hover'=>true,
		'toolbar'=> [
			['content'=>
				Html::a(Html::icon('plus').' เพิ่มใหม่', ['create'], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'เพิ่ม')]).' '.
				Html::a(Html::icon('th').' ไปหน้าสมัคร', ['eta/activelist'], ['class'=>'btn btn-primary', 'title'=>Yii::t('app', 'เพิ่ม')]).' '.
				Html::a(Html::icon('repeat'), ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'รีเฟรช')])
			],
			//'{export}',
			'{toggleData}',
		],
		'panel'=>[
			'type'=>GridView::TYPE_INFO,
			'heading'=> Html::icon('file').' '.Html::encode($this->title),
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
