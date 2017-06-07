<?php
use yii\helpers\Url;
use yii\jui\Spinner;

use kartik\widgets\DatePicker;
?>
<div class="row bg-warning" style="padding: 15px;">
    <p class="text-danger text-center">กรอกข้อมูลอื่นๆด้วยการคลิ้กที่แท็บด้านบน</p>
    <?= $form->field($model, 'mf_chname', [
        'horizontalCssClasses' => [
            'label' => 'col-md-3',
            'wrapper' => 'col-md-5',
            'hint' => 'col-md-3',
        ],
        'inputTemplate' => '<div class="input-group">{input}<span class="input-group-btn"><button type="button" class="btn _spclear"><span class="glyphicon glyphicon-remove-circle text-danger"></span></button></div>',
    ])->textInput([
        'maxlength' => true,
        'placeholder' => 'ชื่อ-นามสกุลบุตร',
    ])->label('ของบุตร')->hint('<p class="text-danger">เว้นว่างชื่อไว้กรณีไม่ขอเบิก</p>') ?>
    <div class="col-md-4">
        <?= $form->field($model, 'mf_chbirth', [
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
        <?= $form->field($model, 'mf_dadorder', [
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
        <?= $form->field($model, 'mf_momorder', [
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
    <div class="col-md-12">
        <?= $form->field($model, 'mf_chstatus', [
            'horizontalCssClasses' => [
                'label' => 'col-md-3',
                'wrapper' => 'col-md-9',
            ],
        ])->radioList($chstat)->label('สถานะของบุตร') ?>
    </div>
    <div class="col-md-12">
    <?= $form->field($model, 'mf_chright', [
        'horizontalCssClasses' => [
            'label' => 'col-md-3',
            'wrapper' => 'col-md-9',
        ],
    ])->radioList($birthright)->label('กรณีไม่ได้ใช้สิทธิ์สามี') ?>
    </div>

    <div class="col-md-12 well well-sm">
        <div class="col-md-12">
            <?= $form->field($model, 'mf_repchorder', [
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
            <?= $form->field($model, 'mf_repchname')->textInput(['maxlength' => true])->label('ชื่อ-นามสกุล') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'mf_repchbirth', [
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
            <?= $form->field($model, 'mf_repchdeath', [
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
</div>