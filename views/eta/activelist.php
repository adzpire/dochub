<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\EnglishtestAttendeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->params['breadcrumbs'][] = $this->title;
$this->registerCss('
.grid-view td {
    white-space: unset;
}
');
?>
<div class="englishtest-attendee-index">

    <?php //echo 'dsds'.$_SESSION['ldapData']['accountname']; ?>

    <?php Pjax::begin(); ?>    <?= GridView::widget([
        //'id' => 'kv-grid-demo',
        'dataProvider'=> $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            [
//                'attribute' => 'ID',
//                'headerOptions' => [
//                    'width' => '50px',
//                ],
//            ],
            'ed_title',
            'ed_active_till:date',
            //'ed_round',
            [
                'attribute'=>'ed_round',
//                'group'=>true,
            ],
            [
                'attribute' => 'ed_limitseat',
                'value' => function ($model) {
                    return $model->remainseat[1];
                },
                'format' => 'html',
                'filter' => false,
            ],
            'ed_note:html',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{enrol}',
                'buttons' => [
//                    'view' => function ($url, $model, $key) {
////                        $tmp = $model->Checkexist($_SESSION['ldapData']['accountname']);
//                        $tmp = $model::getCheckexist($key, $_SESSION['ldapData']['accountname']);
//                        if(!empty($tmp)){
//                            return Html::a(Html::icon('eye-open'), $url, ['class' => 'btn btn-success', 'data-pjax' => 0]);
//                        }
//                    },
                    'enrol' => function ($url, $model, $key) {
                        $tmp = $model::getCheckexist($key, $_SESSION['ldapData']['accountname']);
//                        echo $model::getCheckround($model->ed_round);
//                        print_r($tmp->attendee);exit();
                        if(empty($tmp)){
                            if($model->remainseat[0]){
                                if($model->getCheckround($model->ed_round) and $model->ID != $model->getCheckround($model->ed_round)){
                                    return 'ลงชื่อไม่ได้ '.Html::a(Html::icon('info-sign'), '#', ['title' => 'ซำ้รอบกัน']);
                                }else{
                                    return Html::a(Html::icon('edit').' สมัคร', $url, ['class' => 'btn btn-primary', 'data-pjax' => 0]);
                                }
                            }else{
                                return '<span class="text-danger">ที่นั่งเต็มแล้ว</span>';
                            }
                        }else{
                            return Html::a(Html::icon('remove').'ยกเลิก', ['deleteenrol', 'id' => $tmp->attendee->ID], ['class' => 'btn btn-danger', 'data-pjax' => 0, 'data-method' => 'post', 'data-confirm' => 'Are you sure you want to delete this item?']);
                        }
                    },
                ],
                'headerOptions' => [
                    'width' => '70px',
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
        'toolbar'=> false,
        'panel'=>[
            'type'=>GridView::TYPE_INFO,
            'heading'=> Html::icon('open-file').' '.Html::encode($this->title),
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
