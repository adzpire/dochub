<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Tabs;

use yii\helpers\Url;

use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use kartik\daterange\DateRangePicker;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoMfg */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    ._pageborder {
        border:1px solid black;
        padding: 10px;
        margin-bottom: 15px;
    }

    ._leftdivborder {
        border-left: 1px solid;
    }
</style>
<div class="form-auto-mfg-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' => 'form-auto-mfg-form',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-md-4',
                'wrapper' => 'col-sm-8',
            ],
        ],
        //'validateOnChange' => true,
        //'enableAjaxValidation' => true,
        //	'enctype' => 'multipart/form-data'
    ]); ?>
    <div class="col-md-12">
        <h4 class="text-right">แบบ 7131</h4>
        <h4 class="text-center">ใบเบิกเงินสวัสดิการเกี่ยวกับการรักษาพยาบาล</h4>
        <h4 class="text-center">โปรดทำเครื่องหมาย ✓ ลงในช่องว่าง ☐ พร้อมทั้งกรอกข้อความเท่าที่จำเป็น</h4>
    </div>
    <div class="col-md-12 _pageborder" >
        <div class="col-md-11 col-md-offset-1 well well-sm">
            <div class="col-md-12">
                <?php
                echo $form->field($model, 'mfg_stid', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-2',
                        'wrapper' => 'col-md-4',
                    ],
                ])->label('1. ข้าพเจ้า')->widget(Select2::classname(), [
                    'data' => $staff,
                    'options' => ['placeholder' => Yii::t('app', 'ค้นหา/เลือก')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    'pluginEvents' => [
                        "change" => '
                    function() {
                        var str = $(this).val();
                        console.log(str);
                        $.ajax({
                            url: "' . Url::to(['/dochub/default/posinfo']) . '?id="+str,
                            success: function(data){
                                var json = $.parseJSON(data);
                                //$("#content1").html(tmp[0]);
                                //alert(json);
                                $("._posinfo").html(json[0]);
                                $("._telinfo").html(json[1]);
                            }
                        });
                    }',
                    ]
                ]);
                ?>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <label>ตำแหน่ง</label>
                <mark class="_posinfo"> <?php echo $model->isNewRecord ? '-' : $model->mfgSt->position->name_th; ?> </mark>
            </div>
            <div class="col-md-6">
                <strong>สังกัด ...คณะวิทยาการสื่อสาร....</strong>
            </div>
        </div>
        <div class="col-md-11 col-md-offset-1">
            <h4>2. ขอเบิกเงินค่ารักษาพยาบาลของ</h4>
            <?php

            $tabitems = [
                [
                    'label'=>'<i class="glyphicon glyphicon-user"></i> ตนเอง-คู่สมรส',
                    'content'=> $this->render('_mfg1', [
                        'model' => $model,
                        'form' => $form,
                    ]),
                    'active'=>true,
                ],
                [
                    'label'=>'<i class="glyphicon glyphicon-user"></i> พ่อ-แม่',
                    'content'=> $this->render('_mfg2', [
                        'model' => $model,
                        'form' => $form,
                    ]),
                    //'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/site/tabs-data'])],
                ],
                [
                    'label'=>'<i class="glyphicon glyphicon-user"></i> บุตร',
                    'content'=> $this->render('_mfg3', [
                        'model' => $model,
                        'form' => $form,
                        'chstat' => $chstat,
                    ]),
                ],
            ];

            echo Tabs::widget([
                'items' => $tabitems,
                'encodeLabels' => false,
                'navType' => 'nav-tabs nav-justified',
                'tabContentOptions' => [
                    'style'=>'
                border-left: 1px solid #ddd; 
                border-right: 1px solid #ddd;
                border-bottom: 1px solid #ddd;
                '
                ],
            ]);
            ?>
        </div>
        <p>&nbsp;</p>
        <div class="col-md-11 col-md-offset-1">
            <?= $form->field($model, 'mfg_ill', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-2',
                    'wrapper' => 'col-md-10',
                ],
            ])->textInput()->label('ป่วยเป็นโรค') ?>
        </div>
        <div class="col-md-11 col-md-offset-1">
            <?= $form->field($model, 'mfg_hospital', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-5',
                    'wrapper' => 'col-md-7',
                ],
            ])->textInput(['maxlength' => true])->label('และได้รับการตรวจรักษาพยาบาลจาก (ชื่อสถานพยาบาล)') ?>
        </div>
        <div class="col-md-5 col-md-offset-1">
            <?= $form->field($model, 'mfg_hospitaltype', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-5',
                    'wrapper' => 'col-md-7',
                ],
            ])->radioList($hosptype)->label('ประเภทโรงพยาบาล') ?>
        </div>
        <div class="col-md-6">
            <?php
            if ($model->isNewRecord) {
                $model->mfg_hosbdate = date('Y-m-d');
                $model->mfg_hosedate = $model->mfg_hosedate;
            }
            echo $form->field($model, 'rangedatetime', [
                //'enableAjaxValidation' => true,
                //'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span></div>',
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
                ]
            ])->widget(DateRangePicker::classname(), [
                'model' => $model,
                'attribute' => 'rangedatetime',
                //'value'=>'2015-10-19 12:00 AM - 2015-11-03 01:00 PM',
                'convertFormat' => true,
                'hideInput' => true,
                'language'=>'th',
                'startAttribute' => 'mfg_hosbdate',
                'endAttribute' => 'mfg_hosedate',
                'pluginOptions' => [
                    //'minDate' => date('Y-m-d'),
                    //'timePickerIncrement' => 15,
                    //'timePicker24Hour' => true,
                    'locale' => ['format' => 'Y-m-d'],
                ],
            ]);
            ?>
<!--            --><?//= $form->field($model, 'mfg_hosbdate', [
//                'horizontalCssClasses' => [
//                    'label' => 'col-md-4',
//                    'wrapper' => 'col-md-8',
//                ],
//                'validateOnChange' => true,
//                'enableAjaxValidation' => true,
//            ])->widget(DatePicker::classname(), [
//                'language' => 'th',
//                'options' => ['placeholder' => 'enterdate'],
//                'type' => DatePicker::TYPE_COMPONENT_APPEND,
//                'pluginOptions' => [
//                    'autoclose' => true,
//                    'format' => 'yyyy-mm-dd',
//                    'todayHighlight' => true,
//                ]]) ?>
<!---->
<!--            --><?//= $form->field($model, 'mfg_hosedate', [
//                'horizontalCssClasses' => [
//                    'label' => 'col-md-4',
//                    'wrapper' => 'col-md-8',
//                ],
//                'validateOnChange' => true,
//                'enableAjaxValidation' => true,
//            ])->widget(DatePicker::classname(), [
//                'language' => 'th',
//                'options' => ['placeholder' => 'enterdate'],
//                'type' => DatePicker::TYPE_COMPONENT_APPEND,
//                'pluginOptions' => [
//                    'autoclose' => true,
//                    'format' => 'yyyy-mm-dd',
//                    'todayHighlight' => true,
//                ]]) ?>
        </div>
        <div class="col-md-11 col-md-offset-1">
            <div class="col-md-6">
                <?= $form->field($model, 'mfg_hosfee', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-5',
                        'wrapper' => 'col-md-7',
                    ],
                    'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">บาท</span></div>',
                ])->textInput()->label('เป็นเงินรวมทั้งสิ้น') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'mfg_recnum', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-6',
                        'wrapper' => 'col-md-6',
                    ],
                    'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">ฉบับ</span></div>',
                ])->textInput()->label('ตามใบเสร็จรับเงินที่แนบ จำนวน') ?>
            </div>
        </div>
        <div class="col-md-11 col-md-offset-1">
            <h4>ข้าพเจ้ามีสิทธิได้รับเงินค่ารักษาพยาบาล ตามพระราชกฤษฏีกาเงินสวัสดิการเกี่ยวกับการรักษาพยาบาล </h4>
        </div>
        <div class="col-md-11 col-md-offset-1 well well-sm">
            <div class="col-md-6">

                <?= $form->field($model, 'mfg_feeright', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-4',
                        'wrapper' => 'col-md-8',
                    ],
                ])->radioList($feeright)->label('ขอใช้สิทธิรักษาพยาบาล') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'mfg_amount', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'wrapper' => 'col-md-7',
                    ],
                    'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">บาท</span></div>',
                ])->textInput()->label('เป็นเงิน') ?>
            </div>
            <div class="col-md-12">
            <?= $form->field($model, 'mfg_info', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-2',
                    'wrapper' => 'col-md-6',
                    'hint' => 'col-md-4',
                ],
            ])->textarea(['rows' => 2])->hint('<p class="text-danger">ให้มีคำชี้แจงด้วยว่ามีสิทธิเพียงใด และขาดอยู่เท่าใดกรณีได้รับจากหน่วยงานอื่นเมื่อเทียบสิทธิตามพระราชกฤษฏีกาเงินสวัสดิการเกี่ยวกับการรักษาพยาบาล หรือขาดอยู่เท่าใดเมื่อได้รับค่ารักษาพยาบาลตามสัญญาประกันภัย</p>') ?>
            </div>

        </div>
        <div class="col-md-11 col-md-offset-1">
            <?= $form->field($model, 'mfg_uright', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-2',
                    'wrapper' => 'col-md-7',
                    'hint' => 'col-md-3',
                ],
            ])->radioList($uright)->label('(1) ข้าพเจ้า')->hint('<p class="text-danger">กรณีที่เบิกให้ตัวเอง</p>') ?>
        </div>
        <div class="col-md-11 col-md-offset-1">
            <?= $form->field($model, 'mfg_relright', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-2',
                    'wrapper' => 'col-md-7',
                    'hint' => 'col-md-3',
                ],
            ])->radioList($relright)->label('(1) ญาติของข้าพเจ้า')->hint('<p class="text-danger">กรณีที่เบิกให้คู่สมรสม, พ่อ-แม่, บุตร</p>') ?>
        </div>
    </div> <!--endpageborder-->

    <div class="col-md-12 form-group text-center">
        <?= Html::submitButton(Html::icon('floppy-disk') . ' ' . Yii::t('app', 'บันทึก'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php
        if(!$model->isNewRecord) {
            echo ' ' . Html::a(Html::icon('print') . ' ' . Yii::t('app', 'พิมพ์'), ['pdf', 'id' => $model->fid], ['class' => 'btn btn-danger', 'data-pjax' => 0]);
        }
        echo ' ' . Html::a(Html::icon('ban-circle') . ' ' . Yii::t('app', 'ยกเลิก'), Yii::$app->request->referrer, ['class' => 'btn btn-warning']);
        ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
