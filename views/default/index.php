<?php

use yii\bootstrap\Html;

use backend\components\Monav;

use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\FormAutoSessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="col-md-12">
    <h3 class="text-center">แบบฟอร์มอัตโนมัติ</h3>
    <div class="col-md-5">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo Html::icon('piggy-bank').' งานการเงิน' ?></h3>
            </div>
            <div class="table">
                <?php
                echo Monav::widget([
                    'encodeLabels' => false,
                    'items' => [
                        [
                            'label' => Html::icon($searchModel::farr(2)['borrowmoney']).' '.$searchModel::farr()['borrowmoney'],
                            'url' => ['/dochub/'.'borrowmoney'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['usebudget']).' '.$searchModel::farr()['usebudget'],
                            'url' => ['/dochub/'.'usebudget'],
                            //'count' => 'backend\modules\tc\models\DefaultUncompleteSearch',
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['biblioaid']).' '.$searchModel::farr()['biblioaid'],
                            'url' => ['/dochub/'.'biblioaid'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['examfee']).' '.$searchModel::farr()['examfee'],
                            'url' => ['/dochub/'.'examfee'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['childedu']).' '.$searchModel::farr()['childedu'],
                            'url' => ['/dochub/'.'childedu'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['medicfee']).' '.$searchModel::farr()['medicfee'],
                            'url' => ['/dochub/'.'medicfee'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['childedugov']).' '.$searchModel::farr()['childedugov'],
                            'url' => ['/dochub/'.'childedugov'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['medicfeegov']).' '.$searchModel::farr()['medicfeegov'],
                            'url' => ['/dochub/'.'medicfeegov'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['receipt']).' '.$searchModel::farr()['receipt']. Html::tag('span', 'new', ['class' => 'badge pull-right']),
                            'url' => ['/dochub/'.'receipt'],
                        ],
                    ],
                    'options' => ['class' => 'nav-stacked'], // set this to nav-tab to get tab-styled navigation
                ]); ?>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo Html::icon('scissors').' งานพัสดุ' ?></h3>
            </div>
            <div class="table">
                <?php
                echo Monav::widget([
                    'encodeLabels' => false,
                    'items' => [
                        [
                            'label' => Html::icon($searchModel::farr(2)['unplanbudget']).' '.$searchModel::farr()['unplanbudget'],
                            'url' => ['/dochub/'.'unplanbudget'],
                        ],
                        [
                            'label' => Html::icon($searchModel::farr(2)['hirebudget']).' '.$searchModel::farr()['hirebudget'],
                            'url' => ['/dochub/'.'hirebudget'],
                            //'count' => 'backend\modules\tc\models\DefaultUncompleteSearch',
                        ],
                    ],
                    'options' => ['class' => 'nav-stacked'], // set this to nav-tab to get tab-styled navigation
                ]); ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo Html::icon('education').' งานวิชาการ' ?></h3>
            </div>
            <div class="table">
                <?php
//                echo Monav::widget([
//                    'encodeLabels' => false,
//                    'items' => [
//                        [
//                            'label' => Html::icon('copy').' แบบฟอร์มขอเปิดรายวิชาเพิ่มเติม',
//                            'url' => ['default/create'],
//                        ],
//                        [
//                            'label' => Html::icon('copy').' แบบฟอร์มขอปิดรายวิชา',
//                            'url' => ['default/uncomplete'],
//                            //'count' => 'backend\modules\tc\models\DefaultUncompleteSearch',
//                        ],
//                        [
//                            'label' => Html::icon('copy').' แบบฟอร์มขอเปิดกลุ่มวิชาเพิ่มเติม',
//                            'url' => ['default/index'],
//                        ],
//                        [
//                            'label' => Html::icon('copy').' แบบฟอร์มขอเปลี่ยนแปลงอาจารย์ผู้สอน',
//                            'url' => ['default/index'],
//                        ],
//                        [
//                            'label' => Html::icon('copy').' แบบฟอร์มขอเปลี่ยนแปลงวัน-เวลา และ/หรือสถานที่เรียน',
//                            'url' => ['default/index'],
//                        ],
//                        [
//                            'label' => Html::icon('copy').' แบบฟอร์มขอเปลี่ยนแปลงลักษณะวิชา/เงื่อนไขและอื่น ๆ',
//                            'url' => ['default/index'],
//                        ],
//                    ],
//                    'options' => ['class' => 'nav-stacked'], // set this to nav-tab to get tab-styled navigation
//                ]); ?>
            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo Html::icon('scissors').' งานเทคโนโลยีสารสนเทศ' ?></h3>
            </div>
            <div class="table">
                <?php
                echo Monav::widget([
                    'encodeLabels' => false,
                    'items' => [
                        [
                            'label' => Html::icon($searchModel::farr(2)['pp']).' '.$searchModel::farr()['pp'],
                            'url' => ['/dochub/'.'pp'],
                        ],
                    ],
                    'options' => ['class' => 'nav-stacked'], // set this to nav-tab to get tab-styled navigation
                ]); ?>
            </div>
        </div>

    </div>

    <div class="col-md-7">
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            //'id' => 'kv-grid-demo',
            'dataProvider'=> $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'fss_id',
                    'headerOptions' => [
                        'width' => '50px',
                    ],
                ],
                //'fss_fid',
                //'fss_type',
                [
                    'attribute' => 'fss_type',
                    'value' => function ($model) {
                        return $model->getForm();
                    },
                    'filter'=> $ftype,
                    'format' => ['html']
                ],
                //'created_at',
                //'created_by',
                //'updated_at',
                [
                    'attribute' => 'updated_at',
                    'format' => ['date', 'long']
                ],
                // 'updated_by',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{print}',
                    'buttons' => [
                        'print' => function ($url, $model, $key) {
                            return Html::a(Html::icon('print'), ['/dochub/'.$model->fss_type.'/pdf?id='.$model->fss_fid], ['data-pjax'=>0, 'target'=>'_blank']);
                        }
                    ],
                    'headerOptions' => [
                        'width' => '50px',
                    ],
                    'contentOptions' => [
                        'class' => 'text-center',
                    ],
                'header' => 'พิมพ์',
                ],
            ],
            'pager' => [
                'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
                'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
            ],
            'responsive'=>true,
            'hover'=>true,
            'toolbar'=> false,
            'panel'=>[
                'type'=>GridView::TYPE_WARNING,
                'heading'=> Html::icon('th-list').' รายการฟอร์มล่าสุด',
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

</div>