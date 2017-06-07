<?php
use yii\helpers\Html;
use yii\widgets\MaskedInput;
?>
<div class="row" style="padding: 15px;">
    <p class="text-danger text-center">กรอกข้อมูลอื่นๆด้วยการคลิ้กที่แท็บด้านบน</p>
    <div class="col-md-11 col-md-offset-1">
        <?= $form->field($model, 'mfg_ucheck', [
            'horizontalCssClasses' => [
                'label' => 'col-md-2',
                'wrapper' => 'col-md-1',
                'hint' => 'col-md-2',
            ],
        ])->inline()->checkbox([], false)->label('ของตนเอง')->hint('เบิก') ?>
    </div>
    <div class="col-md-7">
        <?= $form->field($model, 'mfg_spname', [
            'horizontalCssClasses' => [
                'label' => 'col-md-3',
                'wrapper' => 'col-md-5',
                'hint' => 'col-md-4',
            ],
            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn"><button type="button" class="btn _spclear"><span class="glyphicon glyphicon-remove-circle text-danger"></span></button></div>',
        ])->textInput([
            'maxlength' => true,
            'placeholder' => 'ชื่อ-นามสกุลคู่สมรส',
        ])->label('ของคู่สมรส')->hint('<p class="text-danger">เว้นว่างชื่อไว้กรณีไม่ขอเบิก</p>') ?>

    </div>
    <div class="col-md-5">
    <?= $form->field($model, 'mfg_spid', [
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
</div>
