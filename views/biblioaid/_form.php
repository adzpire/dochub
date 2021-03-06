<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\Url;

use kartik\widgets\DatePicker;
use kartik\widgets\Select2;

use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoLibraid */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-libraid-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' => 'form-auto-libraid-form',
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
        <div class="col-md-1 col-md-offset-1">
            <?php
            echo Html::img('/old/images/PSU.png', ['width' => '75px']);
            ?>
        </div>
        <div class="col-md-8 text-center">
            <h3>บันทึกข้อความ</h3>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-1">
            ส่วนงาน
        </div>
        <div class="col-md-2">
            คณะวิทยาการสื่อสาร
        </div>
        <div class="col-md-2 col-md-offset-1">
            <strong>โทร.</strong><mark class="_telinfo"> <?php echo $model->isNewRecord ? '-' : $intmdl->number; ?> </mark>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-1"><strong>ที่</strong></div>
        <div class="col-md-1">861/ -</div>
        <div class="col-md-5 col-md-offset-2">
            <?= $form->field($model, 'libaid_date')->widget(DatePicker::classname(), [
                'language' => 'th',
                'options' => ['placeholder' => 'enterdate'],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ]]) ?>
        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-1">
            <strong>เรื่อง</strong>
        </div>
        <div class="col-md-10">
            <?= $form->field($model, 'libaid_year', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-8',
                    'wrapper' => 'col-md-4',
                ],
            ])->widget(DatePicker::classname(), [
                'language' => 'th',
                'options' => ['placeholder' => 'enterdate'],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy',
                    'todayHighlight' => true,
                    'startView' => 'years',  // start year, month, day
                    'minViewMode' => 'years', // minimum view year, month, day
                ]])->label('ขออนุมัติเบิกเงินค่าบรรณสารสงเคราะห์ จากเงินรายได้ หมวดเงินอุดหนุน ปีงบประมาณ') ?>

        </div>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-1">
            <strong>เรียน</strong>
        </div>
        <div class="col-md-7">คณบดี</div>
    </div>
    <div class="col-md-11 col-md-offset-1">
        <div class="col-md-6">
            <?php
            echo $form->field($model, 'libaid_stid', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
                ],
            ])->label('ข้าพเจ้า')->widget(Select2::classname(), [
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
            <?= $form->field($model, 'libaid_reqamount', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-5',
                    'wrapper' => 'col-md-5',
                ],
                'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" >บาท</span></div>',
            ])->textInput()->label('ขออนุมัติเบิกเงินจำนวน') ?>
        </div>
    </div>
    <div class="col-md-12 form-group text-center">
        <?= Html::submitButton(Html::icon('play') . ' ' . Yii::t('app', 'ต่อไป'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        <?php
        echo ' ' . Html::a(Html::icon('ban-circle') . ' ' . Yii::t('app', 'ยกเลิก'), Yii::$app->request->referrer, ['class' => 'btn btn-warning']);
        ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
