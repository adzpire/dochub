<?php
use yii\helpers\Url;
use yii\jui\Spinner;
use yii\widgets\MaskedInput;
use kartik\widgets\DatePicker;
?>
<div class="row bg-warning" style="padding: 15px;">
    <p class="text-danger text-center">กรอกข้อมูลอื่นๆด้วยการคลิ้กที่แท็บด้านบน</p>
    <div class="col-md-7">
        <?= $form->field($model, 'mfg_chname', [
            'horizontalCssClasses' => [
                'label' => 'col-md-3',
                'wrapper' => 'col-md-5',
                'hint' => 'col-md-4',
            ],
            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn"><button type="button" class="btn _spclear"><span class="glyphicon glyphicon-remove-circle text-danger"></span></button></div>',
        ])->textInput([
            'maxlength' => true,
            'placeholder' => 'ชื่อ-นามสกุลบุตร',
        ])->label('ของบุตร')->hint('<p class="text-danger">เว้นว่างชื่อไว้กรณีไม่ขอเบิก</p>') ?>

    </div>
    <div class="col-md-5">
        <?= $form->field($model, 'mfg_chid', [
            'horizontalCssClasses' => [
                'label' => 'col-md-5',
                'wrapper' => 'col-md-5',
            ],
            'validateOnChange' => true,
            'enableAjaxValidation' => true,
        ])->widget(MaskedInput::className(), [
            'mask' => '9-9999-99999-99-9',
        ])->label('เลขประจำตัวประชาชน') ?>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <?= $form->field($model, 'mfg_chbirth', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-4',
                    'wrapper' => 'col-md-8',
                ],
            ])->widget(DatePicker::classname(), [
                'language' => 'th',
                'options' => ['placeholder' => 'enterdate'],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                    'todayHighlight' => true,
                ]])->label('เกิดเมื่อ') ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'mfg_chorder', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-4',
                    'wrapper' => 'col-md-4',
                ],
            ])->widget(Spinner::classname(), [
                'clientOptions' => [
                    'step' => 1,
                    'min' => 0,
                ],
                'options' => [
                    'style' => 'width:100%',
                ],
            ])->label('เป็นบุตรคนที่'); ?>
        </div>
    </div>
    <div class="col-md-12">
        <?= $form->field($model, 'mfg_chstatus', [
            'horizontalCssClasses' => [
                'label' => 'col-md-3',
                'wrapper' => 'col-md-9',
            ],
        ])->radioList($chstat)->label('สถานะของบุตร') ?>
    </div>
</div>