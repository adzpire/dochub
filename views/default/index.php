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
                            'label' => Html::icon('bitcoin').' ขออนุมัติยืมเงินรายได้มหาวิทยาลัย',
                            'url' => ['default/create'],
                        ],
                        [
                            'label' => Html::icon('bitcoin').' ขออนุมัติใช้เงิน  ประจําปีงบประมาณ',
                            'url' => ['default/uncomplete'],
                            //'count' => 'backend\modules\tc\models\DefaultUncompleteSearch',
                        ],
                        [
                            'label' => Html::icon('book').' ขออนุมัติเบิกเงินค่าบรรณสารสงเคราะห์ จากเงินรายได้',
                            'url' => ['default/index'],
                        ],
                        [
                            'label' => Html::icon('ok-circle').' ใบเบิกค่าตรวจสอบข้อสอบ',
                            'url' => ['default/index'],
                        ],
                        [
                            'label' => Html::icon('education').' ใบเบิกเงินสวัสดิการเกี่ยวกับการศึกษาของบุตรพนักงานมหาวิทยาลัยฯ',
                            'url' => ['default/index'],
                        ],
                        [
                            'label' => Html::icon('bed').' ใบเบิกเงินสวัสดิการเกี่ยวกับการรักษาพยาบาลพนักงานมหาวิทยาลัยฯ',
                            'url' => ['default/index'],
                        ],
                        [
                            'label' => Html::icon('education').' ใบเบิกเงินสวัสดิการเกี่ยวกับการศึกษาของบุตรข้าราชการ',
                            'url' => ['default/index'],
                        ],
                        [
                            'label' => Html::icon('bed').' ใบเบิกเงินสวัสดิการเกี่ยวกับการรักษาพยาบาลข้าราชการ',
                            'url' => ['default/index'],
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
                            'label' => Html::icon('bitcoin').' ขออนุมัติจัดซื้อพัสดุนอกแผนการจัดซื้อประจําปี',
                            'url' => ['default/create'],
                        ],
                        [
                            'label' => Html::icon('briefcase').' ขออนุมัติจัดจ้าง',
                            'url' => ['default/uncomplete'],
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
                echo Monav::widget([
                    'encodeLabels' => false,
                    'items' => [
                        [
                            'label' => Html::icon('copy').' แบบฟอร์มขอเปิดรายวิชาเพิ่มเติม',
                            'url' => ['default/create'],
                        ],
                        [
                            'label' => Html::icon('copy').' แบบฟอร์มขอปิดรายวิชา',
                            'url' => ['default/uncomplete'],
                            //'count' => 'backend\modules\tc\models\DefaultUncompleteSearch',
                        ],
                        [
                            'label' => Html::icon('copy').' แบบฟอร์มขอเปิดกลุ่มวิชาเพิ่มเติม',
                            'url' => ['default/index'],
                        ],
                        [
                            'label' => Html::icon('copy').' แบบฟอร์มขอเปลี่ยนแปลงอาจารย์ผู้สอน',
                            'url' => ['default/index'],
                        ],
                        [
                            'label' => Html::icon('copy').' แบบฟอร์มขอเปลี่ยนแปลงวัน-เวลา และ/หรือสถานที่เรียน',
                            'url' => ['default/index'],
                        ],
                        [
                            'label' => Html::icon('copy').' แบบฟอร์มขอเปลี่ยนแปลงลักษณะวิชา/เงื่อนไขและอื่น ๆ',
                            'url' => ['default/index'],
                        ],
                    ],
                    'options' => ['class' => 'nav-stacked'], // set this to nav-tab to get tab-styled navigation
                ]); ?>
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
                            'label' => Html::icon('globe').' แบบฟอร์มขอใช้งานบัญชี PSU Passport ชั่วคราว',
                            'url' => ['default/create'],
                        ],
                    ],
                    'options' => ['class' => 'nav-stacked'], // set this to nav-tab to get tab-styled navigation
                ]); ?>
            </div>
        </div>

    </div>

    <div class="col-md-7">
        <?php Pjax::begin(); ?>    <?= GridView::widget([
            //'id' => 'kv-grid-demo',
            'dataProvider'=> $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                'fss_id',
                //'fss_fid',
                'fss_type',
                //'created_at',
                //'created_by',
                'updated_at',
                // 'updated_by',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{print}',
                    'buttons' => [
                        'print' => function ($url, $model, $key) {
                            return Html::a(Html::icon('print'), $url);
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