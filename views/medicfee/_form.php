<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Tabs;

use yii\widgets\MaskedInput;

use yii\helpers\Url;

use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use kartik\daterange\DateRangePicker;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoMf */
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
<div class="form-auto-mf-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' => 'form-auto-mf-form',
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
        <h4 class="text-right">แบบ กทพ. 02</h4>
        <h4 class="text-center">ใบเบิกเงินสวัสดิการเกี่ยวกับการศึกษาของบุตรพนักงานมหาวิทยาลัยฯ</h4>
        <h4 class="text-center">โปรดทำเครื่องหมาย ✓ ลงในช่องว่าง ☐ พร้อมทั้งกรอกข้อความเท่าที่จำเป็น</h4>
        <h4 class="text-center">- 1 -</h4>
    </div>
    <div class="col-md-12 _pageborder" >
        <div class="col-md-11 col-md-offset-1 well well-sm">
            <div class="col-md-6">
                <?php
                echo $form->field($model, 'mf_stid', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-4',
                        'wrapper' => 'col-md-8',
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
            <div class="col-md-6">
                <?= $form->field($model, 'mf_utelephone', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-5',
                        'wrapper' => 'col-md-5',
                    ],
                ])->widget(MaskedInput::className(), [
                    'mask' => '999-9999999',
                ]) ?>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <label>ตำแหน่ง</label>
                <mark class="_posinfo"> <?php echo $model->isNewRecord ? '-' : $model->mfSt->position->name_th; ?> </mark>
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
                    'content'=> $this->render('_mf1', [
                        'model' => $model,
                        'form' => $form,
                    ]),
                    'active'=>true,
                ],
                [
                    'label'=>'<i class="glyphicon glyphicon-user"></i> พ่อ-แม่',
                    'content'=> $this->render('_mf2', [
                        'model' => $model,
                        'form' => $form,
                    ]),
                    //'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/site/tabs-data'])],
                ],
                [
                    'label'=>'<i class="glyphicon glyphicon-user"></i> บุตร',
                    'content'=> $this->render('_mf3', [
                        'model' => $model,
                        'form' => $form,
                        'chstat' => $chstat,
                        'birthright' => $birthright,
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
            <?= $form->field($model, 'mf_ill', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-2',
                    'wrapper' => 'col-md-10',
                ],
            ])->textInput()->label('ป่วยเป็นโรค') ?>
        </div>
        <div class="col-md-11 col-md-offset-1">
            <?= $form->field($model, 'mf_hospital', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-5',
                    'wrapper' => 'col-md-7',
                ],
            ])->textInput(['maxlength' => true])->label('และได้รับการตรวจรักษาพยาบาลจาก (ชื่อสถานพยาบาล)') ?>
        </div>
        <div class="col-md-5 col-md-offset-1">
            <?= $form->field($model, 'mf_hospitaltype', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-5',
                    'wrapper' => 'col-md-7',
                ],
            ])->radioList($hosptype)->label('ประเภทโรงพยาบาล') ?>
        </div>
        <div class="col-md-6">
            <?php
            if ($model->isNewRecord) {
                $model->mf_hosbdate = date('Y-m-d');
                $model->mf_hosedate = $model->mf_hosbdate;
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
                'startAttribute' => 'mf_hosbdate',
                'endAttribute' => 'mf_hosedate',
                'pluginOptions' => [
                    //'minDate' => date('Y-m-d'),
                    //'timePickerIncrement' => 15,
                    //'timePicker24Hour' => true,
                    'locale' => ['format' => 'Y-m-d'],
                ],
            ]);
            ?>
        </div>
        <div class="col-md-11 col-md-offset-1">
            <h4>3. ข้าพเจ้ามีสิทธิได้รับเงินสวัสดิการเกี่ยวกับการรักษาพยาบาลตามระเบียบกองทุนพนักงานมหาวิทยาลัย สงขลานครินทร์ว่าด้วยการจัดสวัสดิการเกี่ยวกับการรักษาพยาบาล และการศึกษาของบุตรพนักงาน มหาวิทยาลัย พ.ศ. 2551</h4>
        </div>
        <div class="col-md-11 col-md-offset-1 well well-sm">
            <div class="col-md-6">
                <?= $form->field($model, 'mf_feeright', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-4',
                        'wrapper' => 'col-md-8',
                    ],
                    'validateOnChange' => true,
                    'enableAjaxValidation' => true,
                ])->radioList($feeright,['id'=>'cureright'])->label('ใช้สิทธิรักษาพยาบาล') ?>
            </div>
            <div class="col-md-6 _leftdivborder">
                <?= $form->field($model, 'mf_lackfor', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'wrapper' => 'col-md-9',
                    ],
                    'validateOnChange' => true,
                    'enableAjaxValidation' => true,
                    'options' => ['style' => $model->isNewRecord ? 'display: none;' : ($model->mf_feeright != 2) ? false : 'display: none;'],
                ])->radioList($lackfor)->label('ผู้ใช้สิทธิ') ?>
                <?= $form->field($model, 'mf_lackright', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'wrapper' => 'col-md-9',
                    ],
                    'validateOnChange' => true,
                    'enableAjaxValidation' => true,
                    'options' => ['style' => $model->isNewRecord ? 'display: none;' : ($model->mf_feeright != 2) ? false : 'display: none;'],
                ])->radioList($lackright)->label('สิทธิ') ?>
                <?= $form->field($model, 'mf_lackamount', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'wrapper' => 'col-md-7',
                    ],
                    'validateOnChange' => true,
                    'enableAjaxValidation' => true,
                    'options' => ['style' => $model->isNewRecord ? 'display: none;' : ($model->mf_feeright != 2) ? false : 'display: none;'],
                    'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">บาท</span></div>',
                ])->textInput()->label('เป็นเงิน') ?>
                <?= $form->field($model, 'mf_fiftyfor', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'wrapper' => 'col-md-9',
                    ],
                    'validateOnChange' => true,
                    'enableAjaxValidation' => true,
                    'options' => ['style' => $model->isNewRecord ? 'display: none;' : ($model->mf_feeright != 1) ? false : 'display: none;'],
                ])->radioList($fiftyfor)->label('ผู้ใช้สิทธิ') ?>
                <?= $form->field($model, 'mf_fiftyamount', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'wrapper' => 'col-md-7',
                    ],
                    'validateOnChange' => true,
                    'enableAjaxValidation' => true,
                    'options' => ['style' => $model->isNewRecord ? 'display: none;' : ($model->mf_feeright != 1) ? false : 'display: none;'],
                    'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">บาท</span></div>',
                ])->textInput()->label('เป็นเงิน') ?>
            </div>
        </div>
    </div>
    <h4 class="text-center">- 2 -</h4>
    <div class="col-md-12 _pageborder" >
        <div class="col-md-11 col-md-offset-1">
            <?= $form->field($model, 'mf_year', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-5',
                    'wrapper' => 'col-md-3',
                ],
            ])->label('สรุปจำนวนเงินเบิกจ่ายค่ารักษาพยาบาลในปี(ปีงบประมาณ)')->widget(DatePicker::classname(), [
                'language' => 'th',
                'options' => ['placeholder' => 'enterdate'],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy',
                    'startView' => 'years',  // start year, month, day
                    'minViewMode' => 'years', // minimum view year, month, day
                ]]) ?>
            <?= $form->field($model, 'mf_usedto', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-2',
                    'wrapper' => 'col-md-6',
                    'hint' => 'col-md-2',
                ],
            ])->inline()->radioList($usedto)->label('การใช้สิทธิ')->hint('<p class="text-danger">ในปีงบประมาณข้างต้น</p>') ?>
            <?= $form->field($model, 'mf_want', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-4',
                ],
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">บาท</span></div>',
            ])->textInput()->label('ขอเบิกค่ารักษาครั้งนี้ จำนวน') ?>
        </div>

    </div>


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
<?php

$this->registerJs("

$(document).on('click', \"input[name$='FormAutoMf[mf_feeright]']\", function(event){
		var test = $(this).val();
		switch(test){
		    case '0':
		        $(\".field-formautomf-mf_lackfor, .field-formautomf-mf_lackright, .field-formautomf-mf_lackamount, .field-formautomf-mf_fiftyfor, .field-formautomf-mf_fiftyamount\").show();
                break;
            case '1':
                $(\".field-formautomf-mf_lackfor, .field-formautomf-mf_lackright, .field-formautomf-mf_lackamount\").show();
                $(\".field-formautomf-mf_fiftyfor, .field-formautomf-mf_fiftyamount\").hide();
                break;
            case '2':
                $(\".field-formautomf-mf_lackfor, .field-formautomf-mf_lackright, .field-formautomf-mf_lackamount\").hide();
                $(\".field-formautomf-mf_fiftyfor, .field-formautomf-mf_fiftyamount\").show();
		}
    });

$(document).on('click', \"._spclear\", function(event){
    //$(this).prev('input').val('');alert(answer);
    //var answer = $(this).parent().prev().find('input').val();
//    $(this).parent().prev().css({\"color\": \"red\", \"border\": \"2px solid red\"});
    $(this).parent().parent().find('input').val('');
});

", View::POS_READY);

?>