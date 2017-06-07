<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\Url;

use kartik\widgets\DatePicker;
use kartik\widgets\Select2;

use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoExm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-exm-form">

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
    <div class="col-md-12 text-center">
            <h3>ใบเบิกค่าตรวจสอบข้อสอบ</h3>
    </div>
    <div class="col-md-12 text-center">
        <h4>คณะวิทยาการสื่อสาร    มหาวิทยาลัยสงขลานครินคร์    วิทยาเขตปัตตานี</h4>
    </div>

    <div class="col-md-12">
        <div class="col-md-6">
            <?php
            echo $form->field($model, 'exmmain_stid', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
                ],
            ])->label('ผู้ตรวจ')->widget(Select2::classname(), [
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
                            url: "' . Url::to(['/dochub/borrowmoney/posinfo']) . '?id="+str,
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
            <strong>โทร.</strong>
            <mark class="_telinfo"> <?php echo $model->isNewRecord ? '-' : $intmdl->number; ?> </mark>
        </div>
        <div class="col-md-3">
            ตำแหน่ง
            <mark class="_posinfo"> <?php echo $model->isNewRecord ? '-' : $model->unpbdgtSt->position->name_th; ?> </mark>
        </div>
    </div>
    <div class="col-md-12 text-center">
        <div class="col-md-5">
            <?= $form->field($model, 'exmmain_semester', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-7',
                    'wrapper' => 'col-md-5',
                ],
            ])->inline()->radioList([1,2,3])->label('การสอบประจำภาคเรียนที่') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'exmmain_year')->widget(DatePicker::classname(), [
                'language' => 'th',
                'options' => ['placeholder' => 'enterdate'],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy',
                    'todayHighlight' => true,
                    'startView' => 'years',  // start year, month, day
                    'minViewMode' => 'years', // minimum view year, month, day
                ]]) ?>
        </div>
    </div>

    <div class="col-md-12 form-group text-center">
        <?= Html::submitButton(Html::icon('floppy-disk') . ' ' . Yii::t('app', 'บันทึก'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php
        echo ' ' . Html::a(Html::icon('ban-circle') . ' ' . Yii::t('app', 'ยกเลิก'), Yii::$app->request->referrer, ['class' => 'btn btn-warning']);
        ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
