<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;

$this->title = Yii::t('kpi/app', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('kpi/app', 'Wasterecycle Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("<span class=\"glyphicon glyphicon-triangle-right\"></span> ' . Yii::t('kpi/app', 'Wasterecycle Details') . ' : " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("<span class=\"glyphicon glyphicon-triangle-right\"></span> ' . Yii::t('kpi/app', 'Wasterecycle Details') . ' : " + (index + 1))
    });
});
';

$this->registerJs($js);
?>
<div class="customer-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form', 'layout' => 'horizontal']); ?>
    <div class="row">
        <?php
        echo $form->field($model, 'we_uid')->widget(Select2::classname(), [
            'data' => $attndlist,
            'options' => ['placeholder' => Yii::t('kpi/app', 'PleaseSelect')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>
        <?php
        echo $form->field($model, 'we_date')->widget(DatePicker::classname(), [
            'language' => 'th',
            'options' => ['placeholder' => Yii::t('kpi/app', 'enterdate')],
            'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
        ?>
        <?= $form->field($model, 'we_money')->textInput() ?>
    </div>
    <div class="padding-xxs">
        <div class="line line-dashed"></div>
    </div>
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 12, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsAddress[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'wd_tid',
            'wd_amount',
            //'address_line2',
            //'city',
            // 'state',
            // 'postal_code',
        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> Address Book
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add
                address
            </button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($modelsAddress as $index => $modelAddress): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-address">Address: <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i
                                class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                        // necessary for update action.
                        if (!$modelAddress->isNewRecord) {
                            echo Html::activeHiddenInput($modelAddress, "[{$index}]id");
                        }
                        ?>
                        <?php echo $form->field($modelAddress, "[{$index}]wd_tid")->dropDownList(
                            $wsttypelist,
                            ['prompt' => 'Select...']);
                        ?>
                        <?= $form->field($modelAddress, "[{$index}]wd_amount")->textInput(['maxlength' => true]) ?>


                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton($modelAddress->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>