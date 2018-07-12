<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\EnglishtestAttendeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="englishtest-attendee-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
        //'id' => 'kv-grid-demo',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'ID',
                'headerOptions' => [
                    'width' => '50px',
                ],
                'hidden' => true,
            ],
//            'ed_id',
            'username',
            'firstname_th',
            'lastname_th',
            'firstname_eng',
            'lastname_eng',
            'ea_date',
            // 'created_at',
            // 'created_by',
            // 'updated_at',
            // 'updated_by',
            [
                'class' => 'yii\grid\ActionColumn',
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
        'responsive' => true,
        'hover' => true,
        'toolbar' => [
            ['content' =>
                Html::a(Html::icon('export') . ' บันทึกเป็น excel', '#', ['data-format' => 'application/vnd.ms-excel', 'data-pjax' => 0, 'class' => 'btn btn-success export-xls', 'title' => Yii::t('app', 'บันทึกเป็น excel')]) . ' ' .
                Html::a(Html::icon('repeat'), ['grid-demo'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('app', 'รีเฟรชตาราง')])
            ],
            '{export}',
            '{toggleData}',
        ],
        'panel' => [
            'type' => GridView::TYPE_INFO,
            'heading' => Html::icon('user') . ' ' . Html::encode($this->title),
            'before' => DetailView::widget([
                'model' => $searchModel,
                'attributes' => [
                    [
                        'label' => $searchModel->ed->attributeLabels()['ed_title'],
                        'value' => $searchModel->ed->ed_title,
                        //'format' => ['date', 'long']
                    ],
                    [
                        'label' => $searchModel->ed->attributeLabels()['ed_round'],
                        'value' => $searchModel->ed->ed_round,
                        //'format' => ['date', 'long']
                    ],
                    [
                        'label' => $searchModel->ed->attributeLabels()['ed_limitseat'],
                        'value' => $searchModel->ed->ed_limitseat,
                        //'format' => ['date', 'long']
                    ],
                    [
                        'label' => $searchModel->ed->attributeLabels()['ed_datechoice'],
                        'value' => $searchModel->ed->ed_datechoice,
                        //'format' => ['date', 'long']
                    ],
                    [
                        'label' => $searchModel->ed->attributeLabels()['ed_active_till'],
                        'value' => $searchModel->ed->ed_active_till,
                        'format' => ['datetime']
                    ],
                    [
                        'label' => 'รายการที่มีรอบเดียวกัน',
                        'value' => function($model){
                            $data = $model->ed->sameround;
                            if(!empty($data)){
                                $doc = '<ul>';
                                foreach($data as $book) {
                                    $doc .= '<li>'.$book->ID.' : '.$book->ed_title.' : '.Html::a(Html::icon('share-alt'), ['detail' , 'id'=> $book->ID], ['title' => Yii::t('app', 'ไปยังรายการ')]).'</li>';
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
                ],
            ]),
        ],
    ]); ?>
    <?php /* adzpire grid tips
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
