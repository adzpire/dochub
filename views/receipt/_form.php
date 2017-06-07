<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

use kartik\widgets\Select2;
use kartik\widgets\DatePicker;

use yii\helpers\Url;

use yii\widgets\Pjax;
/* @var $this yii\web\View use kartik\widgets\FileInput;
use kartik\widgets\ActiveForm;*/
/* @var $model backend\modules\dochub\models\FormAutoRc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-auto-rc-form">

    <?php $form = ActiveForm::begin([
			'layout' => 'horizontal', 
			'id' => 'form-auto-rc-form',
			//'validateOnChange' => true,
            //'enableAjaxValidation' => true,
			//	'enctype' => 'multipart/form-data'
			]); ?>
    <h4 class="text-center">ใบสำคัญรับเงิน</h4>
    <div class="col-md-4 col-md-offset-6">
        <?= $form->field($model, 'rc_date', [
            'horizontalCssClasses' => [
                'label' => 'col-md-3',
                'wrapper' => 'col-md-9',
            ],
        ])->widget(DatePicker::classname(), [
            'language' => 'th',
            'options' => ['placeholder' => 'enterdate'],
            'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                'today'=> true,
            ]]) ?>
    </div>
    <div class="col-md-12">
        <div class="col-md-4 col-md-offset-2">
            <strong>ข้าพเจ้า</strong>  <?php echo $staff->getFullname('th'); ?>
        </div>
        <div class="col-md-3">
            ตำแหน่ง <mark class="_posinfo"> <?php echo $staff->position->name_th; ?> </mark>
        </div>
        <div class="col-md-3">
            <strong>โทร.</strong><mark class="_telinfo"> <?php echo $intmdl->number; ?> </mark>
        </div>
    </div>
    <?php Pjax::begin(['id' => 'belpjax']); ?>
    <?= $form->field($model, 'rc_paid',[
        'horizontalCssClasses' => [
            'label' => 'col-md-3',
            'wrapper' => 'col-md-9',
        ],
        'inputTemplate' => '<button class="btn btn-info btn-sm _belqadd"  value="' . Url::to(['qaddbelongto']) . '"><span class="glyphicon glyphicon-home"></span> เพิ่มที่อยู่</button>{input}',
    ])->label('ที่อยู่')->radioList($addr) ?>
    <?php Pjax::end(); ?>
    <?= $form->field($model, 'rc_getfrom', [
        'horizontalCssClasses' => [
            'label' => 'col-md-3',
            'wrapper' => 'col-md-8',
        ],
        'inputTemplate' => '<div class="input-group">{input}<span class="input-group-addon" style="background-color: transparent; border: none;">ดังรายการต่อไปนี้</span></div>',
    ])->textInput()->textInput(['maxlength' => true]) ?>


<?php 		/* adzpire form tips
		$form->field($model, 'wu_tel', ['enableAjaxValidation' => true])->textInput(['maxlength' => true]);
		//file field
				echo $form->field($model, 'file',[
		'addon' => [
       
'append' => !empty($model->wt_image) ? [
			'content'=> Html::a( Html::icon('download').' '.Yii::t('app', 'download'), Url::to('@backend/web/'.$model->wt_image), ['class' => 'btn btn-success', 'target' => '_blank']), 'asButton'=>true] : false
    ]])->widget(FileInput::classname(), [
			//'options' => ['accept' => 'image/*'],
			'pluginOptions' => [
				'showPreview' => false,
				'showCaption' => true,
				'showRemove' => true,
				'initialCaption'=> $model->isNewRecord ? '' : $model->wt_image,
				'showUpload' => false
			]
]);
		*/
 ?>     <div class="form-group text-center">
        <?= Html::submitButton( Html::icon('floppy-disk').' '.Yii::t('app', 'บันทึก'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php
        if (!$model->isNewRecord) {
            echo Html::a(Html::icon('list') . ' ' . Yii::t('app', 'เพิ่มรายการ'), ['qadddetail', 'id' => $model->fid], ['class' => 'btn btn-success _qdetail', 'data-pjax'=>0]);
//            if ($dataProvider->totalCount > 0) {
//                echo ' '.Html::a(Html::icon('print') . ' ' . Yii::t('app', 'พิมพ์'), ['pdf', 'id' => $model->fid], ['class' => 'btn btn-default', 'data-pjax'=>0]);
//            }else{
//                echo ' '.Html::a(Html::icon('print') . ' ' . Yii::t('app', 'ไม่สามารถพิมพ์ได้(ต้องมีอย่างน้อย 1 รายการรายละเอียด)'), '', ['class' => 'btn btn-default disabled', 'data-pjax'=>0]);
//            }
        }
        echo ' '.Html::a( Html::icon('ban-circle').' '.Yii::t('app', 'ยกเลิก'), Yii::$app->request->referrer, ['class' => 'btn btn-warning']);
        ?>
		 
	</div>

    <?php ActiveForm::end(); ?>

</div>
<?php
Modal::begin([
    'header' => 'เพิ่มรายการใหม่',
    'id' => 'modal',
]);
echo '<div id ="modalcontent"></div>';
Modal::end();
?>
<?php
$js['quick-add'] = "
 
	 $('._belqadd').on('click', function(event){
		event.preventDefault();
		$('#modal').modal('show')
		.find('#modalcontent')
		.load($(this).attr('value'));
			return false;//just to see what data is coming to js
    });

";
?>
<?php
$this->registerJs(implode("\n", $js));
?>
