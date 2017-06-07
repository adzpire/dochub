<?php
use yii\jui\Spinner;

use kartik\widgets\DatePicker;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
?>
<div class="row bg-danger" style="padding: 15px;" >
    <p class="text-danger text-center">กรอกข้อมูลบุตรอื่นๆด้วยการคลิ้กที่แท็บด้านบน</p>
    <div class="col-md-6">
        <?= $form->field($model, 'ce_ch2name')->textInput(['maxlength' => true])->label('2. บุตร ชื่อ-นามสกุล') ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'ce_ch2birth', [
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
    <div class="col-md-4">
        <?= $form->field($model, 'ce_ch2dadorder', [
            'horizontalCssClasses' => [
                'label' => 'col-md-8',
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
        ])->label('เป็นบุตรลำดับที่(ของบิดา)'); ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'ce_ch2momorder', [
            'horizontalCssClasses' => [
                'label' => 'col-md-8',
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
        ])->label('เป็นบุตรลำดับที่(ของมารดา)'); ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'ce_ch2schlclass')->textInput([
            'maxlength' => true,
            'placeholder'=>'เช่น มัธยมศึกษาปีที่ 3',
        ])->label('ชั้นที่ศึกษา') ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'ce_ch2schl')->textInput(['maxlength' => true])->label('ชื่อสถานศึกษา') ?>
    </div>
    <div class="col-md-3">
        <?php // $form->field($model, 'ce_ch2schlamphur')->textInput(['maxlength' => true])->label('อำเภอ') ?>
        <?= $form->field($model, 'ce_ch2schlamphur')->widget(DepDrop::classname(), [
            'options'=>['id'=>'ddl-amphur2'],
            'data'=> $model->isNewRecord ? [] : $amphur,
            'pluginOptions'=>[
                'depends'=>['ddl-province2'],
                'placeholder'=> 'เลือกอำเภอ...',
                'url'=> Url::to(['/thailocale/default/get-amphur']),
            ]
        ])->label('อำเภอ'); ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'ce_ch2schlprovince')->dropdownList(
            $province,
            [
                'id'=>'ddl-province2',
                'prompt'=>'เลือกจังหวัด'
            ])->label('จังหวัด'); ?>
        <?php // $form->field($model, 'ce_ch2schlprovince')->textInput(['maxlength' => true])->label('จังหวัด') ?>
    </div>
    <div class="col-md-12 well well-sm">
        <div class="col-md-12">
            <?= $form->field($model, 'ce_ch2reporder', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-5',
                    'wrapper' => 'col-md-2',
                    'hint' => 'col-md-5',
                ],
            ])->widget(Spinner::classname(), [
                'clientOptions' => [
                    'step' => 1,
                    'min' => 0,
                ],
                'options' => [
                    'style' => 'width:100%',
                ],
            ])->label('(กรณีเป็นบุตรแทนที่บุตรซึ่งถึงแก่กรรมแล้ว) แทนที่บุตรลำดับที่')->hint('<p class="text-danger">ปล่อยส่วนนี้ว่างไว้หากไม่มี</p>'); ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'ce_ch2repname')->textInput(['maxlength' => true])->label('ชื่อ-นามสกุล') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'ce_ch2repbirth', [
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
        <div class="col-md-4">
            <?= $form->field($model, 'ce_ch2repdeath', [
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
                ]])->label('ถึงแก่กรรมเมื่อ') ?>
        </div>
    </div>

    <div class="col-md-6">
        <?= $form->field($model, 'ce_ch2fee1', [
            'horizontalCssClasses' => [
                'label' => 'col-md-6',
                'wrapper' => 'col-md-6',
            ],
            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">บาท</span></div>',
        ])->textInput()->label('ได้จ่าย [1] เงินบำรุงการศึกษา จำนวน') ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'ce_ch2fee2', [
            'horizontalCssClasses' => [
                'label' => 'col-md-6',
                'wrapper' => 'col-md-6',
            ],
            'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon">บาท</span></div>',

        ])->textInput()->label('ได้จ่าย [2] เงินค่าเล่าเรียน จำนวน') ?>
    </div>
</div>
