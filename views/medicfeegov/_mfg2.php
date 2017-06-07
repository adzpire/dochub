<?php
use yii\helpers\Url;
use yii\widgets\MaskedInput;
?>
<div class="row bg-info" style="padding: 15px;">
    <p class="text-danger text-center">กรอกข้อมูลอื่นๆด้วยการคลิ้กที่แท็บด้านบน</p>
    <div class="col-md-7">
        <?= $form->field($model, 'mfg_dadname', [
            'horizontalCssClasses' => [
                'label' => 'col-md-3',
                'wrapper' => 'col-md-5',
                'hint' => 'col-md-4',
            ],
            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn"><button type="button" class="btn _spclear"><span class="glyphicon glyphicon-remove-circle text-danger"></span></button></div>',
        ])->textInput([
            'maxlength' => true,
            'placeholder' => 'ชื่อ-นามสกุลบิดา',
        ])->label('ของบิดา')->hint('<p class="text-danger">เว้นว่างชื่อไว้กรณีไม่ขอเบิก</p>') ?>

    </div>
    <div class="col-md-5">
        <?= $form->field($model, 'mfg_dadid', [
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
    <div class="col-md-7">
        <?= $form->field($model, 'mfg_momname', [
            'horizontalCssClasses' => [
                'label' => 'col-md-3',
                'wrapper' => 'col-md-5',
                'hint' => 'col-md-4',
            ],
            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn"><button type="button" class="btn _spclear"><span class="glyphicon glyphicon-remove-circle text-danger"></span></button></div>',
        ])->textInput([
            'maxlength' => true,
            'placeholder' => 'ชื่อ-นามสกุลมารดา',
        ])->label('ของมารดา')->hint('<p class="text-danger">เว้นว่างชื่อไว้กรณีไม่ขอเบิก</p>') ?>

    </div>
    <div class="col-md-5">
        <?= $form->field($model, 'mfg_momid', [
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