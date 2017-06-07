<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\bootstrap\Tabs;

use yii\widgets\MaskedInput;

use yii\helpers\Url;

use kartik\widgets\DatePicker;
use kartik\widgets\Select2;

use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoCe */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    ._pageborder {
        border:1px solid black;
        padding: 10px;
        margin-bottom: 15px;
    }

    .nav-tabs {
        margin-bottom: 0;
    }
</style>
<div class="form-auto-ce-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' => 'form-auto-unplnbdgt-form',
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
        <div class="col-md-11 col-md-offset-1">
            <div class="col-md-4">

                <?php
                echo $form->field($model, 'ce_stid', [
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
            <div class="col-md-3">
                ตำแหน่ง
                <mark class="_posinfo"> <?php echo $model->isNewRecord ? '-' : $model->ceSt->position->name_th; ?> </mark>
            </div>
            <div class="col-md-2">
                <strong>โทร.</strong>
                <mark class="_telinfo"> <?php echo $model->isNewRecord ? '-' : $intmdl->number; ?> </mark>
            </div>
            <div class="col-md-3">
                <strong>สังกัด ...คณะวิทยาการสื่อสาร....</strong>
            </div>
        </div>
        <div class="col-md-11 col-md-offset-1 well well-sm">
            <div class="col-md-6">
                <?= $form->field($model, 'ce_spname', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-5',
                        'wrapper' => 'col-md-7',
                    ],
                ])->textInput(['maxlength' => true])->label('2. คู่สมรสของข้าพเจ้า ชื่อ ') ?>
            </div>
            <div class="col-md-7">
                <?= $form->field($model, 'ce_spjobtype', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'wrapper' => 'col-md-9',
                    ],
                    'validateOnChange' => true,
                    'enableAjaxValidation' => true,
                ])->radioList($spwork, ['id'=>'spjtype'])->label('อาชีพ '); ?>
            </div>
            <div class="col-md-5">
                <?= $form->field($model, 'ce_spposition', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'wrapper' => 'col-md-9',
                    ],
                    'validateOnChange' => true,
                    'enableAjaxValidation' => true,
                    'options' => ['style' => $model->isNewRecord ? 'display: none;' : ($model->ce_spjobtype == 2 or $model->ce_spjobtype == 3 or $model->ce_spjobtype == 4) ? false : 'display: none;'],
                ])->textInput(['maxlength' => true])->label('ตำแหน่ง'); ?>

                <?= $form->field($model, 'ce_spbelong', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'wrapper' => 'col-md-9',
                    ],
                    'validateOnChange' => true,
                    'enableAjaxValidation' => true,
                    'options' => ['style' => $model->isNewRecord ? 'display: none;' : ($model->ce_spjobtype == 2 or $model->ce_spjobtype == 3 or $model->ce_spjobtype == 4) ? false : 'display: none;'],
                ])->textInput(['maxlength' => true])->label('สังกัด'); ?>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-11">
                <?= $form->field($model, 'ce_hasbright', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-3',
                        'wrapper' => 'col-md-9',
                    ],
                ])->radioList($birthright)->label('3. กรณีมิได้ใช้สิทธิ์ในฐานะสามี ') ?>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-11">
                <?= $form->field($model, 'ce_feetype', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-5',
                        'wrapper' => 'col-md-7',
                    ],
                ])->radioList($chfee)->label('4. ข้าพเจ้าได้จ่ายเงินสำหรับการศึกษาบุตร ดังนี้ ') ?>
            </div>
        </div>
        <div class="col-md-11 col-md-offset-1">
            <?php

            $tabitems = [
                [
                    'label'=>'<i class="glyphicon glyphicon-user"></i> บุตรคนที่ 1',
                    'content'=> $this->render('_ch1', [
                        'model' => $model,
                        'form' => $form,
                        'province' => $province,
                        'amphur' => $amphur,
                    ]),
                    'active'=>true,
                ],
                [
                    'label'=>'<i class="glyphicon glyphicon-user"></i> บุตรคนที่ 2',
                    'content'=> $this->render('_ch2', [
                        'model' => $model,
                        'form' => $form,
                        'province' => $province,
                        'amphur' => $amphur,
                    ]),
                    //'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/site/tabs-data'])],
                ],
                [
                    'label'=>'<i class="glyphicon glyphicon-user"></i> บุตรคนที่ 3',
                    'content'=> $this->render('_ch3', [
                        'model' => $model,
                        'form' => $form,
                        'province' => $province,
                        'amphur' => $amphur,
                    ]),
                ],
//                [
//                    'label'=>'<i class="glyphicon glyphicon-king"></i> Disabled',
//                    'headerOptions' => ['class'=>'disabled'],
//                ],
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
    </div>
    <h4 class="text-center">- 2 -</h4>
    <div class="col-md-12 _pageborder" >
        <div class="col-md-11 col-md-offset-1">
            <p>5. ข้าพเจ้าขอรับเงินสวัสดิการเกี่ยวกับการศึกษาของบุตร</p>
            <div class="col-md-6">
                <?= $form->field($model, 'ce_whole', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-5',
                        'wrapper' => 'col-md-7',
                    ],
                    'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">บาท</span></div>',
                ])->textInput()->label('เต็มจำนวน  เป็นเงิน') ?>

                <?= $form->field($model, 'ce_half', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-5',
                        'wrapper' => 'col-md-7',
                    ],
                    'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">บาท</span></div>',
                ])->textInput()->label('ครึ่งจำนวน   เป็นเงิน ') ?>

                <?= $form->field($model, 'ce_piece', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-5',
                        'wrapper' => 'col-md-7',
                    ],
                    'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">บาท</span></div>',
                ])->textInput()->label('เฉพาะส่วนที่ยังขาด เป็นเงิน ') ?>

                <?= $form->field($model, 'ce_sum', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-5',
                        'wrapper' => 'col-md-7',
                    ],
                    'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">บาท</span></div>',
                ])->textInput()->label('รวมเป็นเงิน ') ?>
            </div>
        </div>
        <div class="col-md-11 col-md-offset-1 well well-sm">
            <?= $form->field($model, 'ce_agree', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-2',
                    'wrapper' => 'col-md-10',
                ],
                'validateOnChange' => true,
                'enableAjaxValidation' => true,
            ])->radioList($confirm, ['id'=>'agreetype'])->label('6. ข้าพเจ้าของรับรองว่า'); ?>
            <?= $form->field($model, 'ce_agreemoney', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-2  col-md-offset-1',
                    'wrapper' => 'col-md-4',
                ],
                'validateOnChange' => true,
                'enableAjaxValidation' => true,
                'options' => ['style' => $model->isNewRecord ? 'display: none;' : ($model->ce_agreemoney != 3) ? 'display: none;' : false],
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">บาท</span></div>',
            ])->textInput()->label('จำนวนเงิน') ?>
        </div>
        <div class="col-md-11 col-md-offset-1">
            <div class="col-md-8">
                <?= $form->field($model, 'ce_accname', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-8',
                        'wrapper' => 'col-md-4',
                    ],
                ])->textInput(['maxlength' => true])->label('ทั้งนี้ข้าพเจ้าจะรับเงินโอนเงินสวัสดิการข้างต้นเข้าบัญชีเงินฝากชื่อบัญชี'); ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'ce_accnum', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-4',
                        'wrapper' => 'col-md-8',
                    ],
                ])->widget(MaskedInput::className(), [
                    'mask' => '999-9-99999-9',
                ])->label('บัญชีเลขที่') ?>
            </div>
        </div>
    <?php // $form->field($model, 'ce_date')->textInput() ?>

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

$(document).on('click', \"input[name$='FormAutoCe[ce_spjobtype]']\", function(event){
		var test = $(this).val();
        if(test == 2 || test == 3 || test == 4){
            $(\".field-formautoce-ce_spposition, .field-formautoce-ce_spbelong\").show();
        }else{
            $(\".field-formautoce-ce_spposition, .field-formautoce-ce_spbelong\").hide();
        }
    });
$(document).on('click', \"input[name$='FormAutoCe[ce_agree]']\", function(event){
		var test2 = $(this).val();
        if(test2 == 3){
            $(\".field-formautoce-ce_agreemoney\").show();
        }else{
            $(\".field-formautoce-ce_agreemoney\").hide();
        }
    });

$(document).on('change', \"#formautoce-ce_whole, #formautoce-ce_half, #formautoce-ce_piece\", function(event){
		var w = parseInt($( \"#formautoce-ce_whole\" ).val());
		var h = parseInt($( \"#formautoce-ce_half\" ).val());
		var p = parseInt($( \"#formautoce-ce_piece\" ).val());
		$(\"#formautoce-ce_sum\").val(parseInt(w+h+p));
    });
    
", View::POS_READY);

?>
