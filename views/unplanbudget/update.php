<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

use yii\helpers\Url;

use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use kartik\grid\GridView;

use yii\widgets\Pjax;

use yii\web\View;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoUnplnbdgt */

$this->params['breadcrumbs'][] = ['label' => $model::fn()['name'], 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'อัพเดต');
?>
<div class="form-auto-unplnbdgt-update">

    <div class="panel panel-warning">
        <div class="panel-heading">
            <span class="panel-title"><?= Html::icon('edit') . ' ' . Html::encode($this->title) ?></span>
            <?php  /*Html::a(Html::icon('fire') . ' ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger panbtn',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])*/ ?>
            <?= Html::a(Html::icon('pencil') . ' ' . Yii::t('app', 'สร้างใหม่'), ['create'], ['class' => 'btn btn-info panbtn']) ?>
        </div>
        <div class="panel-body">
            <div class="form-auto-unplnbdgt-form">

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
                        <strong>โทร.</strong>
                        <mark class="_telinfo"> <?php echo $model->isNewRecord ? '-' : $intmdl->number; ?> </mark>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-1"><strong>ที่</strong></div>
                    <div class="col-md-1">861/ -</div>
                    <div class="col-md-4 col-md-offset-3">
                        <?= $form->field($model, 'unpbdgt_date', [
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
                                'format' => 'yyyy-mm-dd'
                            ]]) ?>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-1">
                        <strong>เรื่อง</strong>
                    </div>
                    <div class="col-md-7">ขออนุมัติจัดซื้อครุภัณฑ์นอกแผนการจัดซื้อประจําปี 2560</div>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-1">
                        <strong>เรียน</strong>
                    </div>
                    <div class="col-md-7">คณบดี</div>
                </div>
                <div class="col-md-11 col-md-offset-1">
                    <div class="col-md-5 col-md-offset-1">
                        <?php /* $form->field($model, 'brmn_stid', [
                'horizontalCssClasses' => [
                    'label' => 'col-md-3',
                    'wrapper' => 'col-md-9',
                ],
            ])->textInput()->label('ข้าพเจ้า')*/ ?>
                        <?php
                        echo $form->field($model, 'unpbdgt_stid', [
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
                        ตำแหน่ง
                        <mark class="_posinfo"> <?php echo $model->isNewRecord ? '-' : $model->unpbdgtSt->position->name_th; ?> </mark>
                    </div>

                </div>
                <div class="col-md-11 col-md-offset-1">
                    <div class="col-md-4">
                        <?= $form->field($model, 'unpbdgt_job', [
                            'horizontalCssClasses' => [
                                'label' => 'col-md-3',
                                'wrapper' => 'col-md-9',
                            ],
                        ])->textInput()->label('ด้วยงาน') ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'unpbdgt_year', [
                            'horizontalCssClasses' => [
                                'label' => 'col-md-5',
                                'wrapper' => 'col-md-4',
                            ],
                        ])->label('มีความประสงค์ขออนุมัติจัดซื้อ ครุภัณฑ์นอกแผนการจัดซื้อประจําปี')->widget(DatePicker::classname(), [
                            'language' => 'th',
                            'options' => ['placeholder' => 'enterdate'],
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy',
                                'startView' => 'years',  // start year, month, day
                                'minViewMode' => 'years', // minimum view year, month, day
                            ]])->hint('<code>ถ้าจัดซื้อเกินเดือนตุลาคมให้กรอกเป็นปีงบประมาณถัดไป</code>') ?>
                    </div>
                </div>
                <div class="col-md-11 col-md-offset-1">
                    <?= $form->field($model, 'unpbdgt_reason', [
                        'horizontalCssClasses' => [
                            'label' => 'col-md-2',
                            'wrapper' => 'col-md-9',
                        ],
                    ])->textarea(['rows' => 4]) ?>
                </div>

                <?php /*if (!$model->isNewRecord) {
                echo $form->field($model, 'unpbdgt_tax', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-1',
                        'wrapper' => 'col-md-2',
                        'hint' => 'col-md-2',
                    ],
                ])->checkBox(['label' => 'คำนวณภาษี 7% '])->hint('<code>ผลการคำนวณจะปรากฏในการพิมพ์</code>');
            }*/
                ?>
                <div class="col-md-12 form-group text-center">
                    <?= Html::submitButton(Html::icon('floppy-disk') . ' ' . Yii::t('app', 'บันทึก'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <?php
                    if (!$model->isNewRecord) {
                        echo Html::a(Html::icon('list') . ' ' . Yii::t('app', 'เพิ่มรายการ'), ['qadddetail', 'id' => $model->id], ['class' => 'btn btn-success _qdetail', 'data-pjax'=>0]);
                    }
                    echo ' ' . Html::a(Html::icon('ban-circle') . ' ' . Yii::t('app', 'ยกเลิก'), Yii::$app->request->referrer, ['class' => 'btn btn-warning']);
                    ?>

                </div>

            </div>
        </div>
    </div>
    <p class="form-auto-unplnbdgtdetail-index">
            <?php Pjax::begin(['id' => 'detailpjax']);
            ?>
        <?= GridView::widget([
            //'id' => 'kv-grid-demo',
            'dataProvider' => $dataProvider,
            //'filterModel' => false,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                //'id',
                //'unpbdgtdet_unpbid',
                'unpbdgtdet_title',
                'unpbdgtdet_amount',
                'unpbdgtdet_unit',
                'unpbdgtdet_xpecprice',
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'unpbdgtdet_price',
                    'pageSummary' => true,
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => '{updatedetail}{deletedetail}',
                    'buttons' => [
                        'updatedetail' => function ($url, $model, $key) {
                            return Html::a(Html::icon('pencil'), $url, [
                                'class' => '_qeditdetail',
                                'data-pjax' => 0,
                            ]);
                        },
                        'deletedetail' => function ($url, $model, $key) {
                            return Html::a(Html::icon('trash'), $url, [
                                'class' => '_qdeletedetail',
                                'data-pjax' => 0,
                            ]);
                        },
                    ],
                    'headerOptions' => [
                        'width' => '50px',
                    ],
                ],
            ],
            'pager' => [
                'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
                'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
            ],
            'responsive' => true,
            'hover' => true,
            'toolbar' => false,
            'showPageSummary' => true,
            'panel' => [
                'type' => GridView::TYPE_INFO,
                'heading' => Html::icon('th-list') . ' รายการรายละเอียด ',
                'before' => (($dataProvider->totalCount >0) ? Html::a(Html::icon('print') . ' ' . Yii::t('app', 'พิมพ์'), ['pdf', 'id' => $model->id], ['class' => 'btn btn-danger', 'data-pjax' => 0]) : Html::a(Html::icon('print') . ' ' . Yii::t('app', 'ไม่สามารถพิมพ์ได้(ต้องมีอย่างน้อย 1 รายการรายละเอียด)'), '', ['class' => 'btn btn-default disabled', 'data-pjax'=>0])),
                'beforeOptions' => ['class'=>'text-center kv-panel-before'],
                'after' => $form->field($model, 'unpbdgt_tax', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-1',
                        'wrapper' => 'col-md-2 col-md-offset-0 pull-right',
                        'hint' => 'col-md-3 pull-right',
                    ],
                ])->checkBox(['label' => 'คำนวณภาษี 7% ', 'class' => 'taxcheck'])->hint('<code>ผลการคำนวณภาษีจะปรากฏในการพิมพ์</code>'),
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php
Modal::begin([
    'id' => 'modal',
    'header' => 'เพิ่มรายการ',
]);
echo '<div id ="modalcontent"></div>';
Modal::end();
?>
<?php

$this->registerJs("
$('._qdetail').on('click', function(event){
		event.preventDefault();
		//alert($(this).attr('href'));
		$('.modal-header').text( \"เพิ่มรายการ\" );
		$('#modal').modal('show')
		.find('#modalcontent')
		.load($(this).attr('href'));
			return false;//just to see what data is coming to js
    });

$(document).on('click', '._qeditdetail', function(event){
//$('._qeditdetail').on('click', function(event){
		event.preventDefault();
//		alert($(this).attr('href'));
        $('.modal-header').text( \"แก้ไขรายการ\" );
		$('#modal').modal('show')
		.find('#modalcontent')
		.load($(this).attr('href'));
			return false;//just to see what data is coming to js
    });

//$('._qdeletedetail').on('click', function(event){
$(document).on('click', '._qdeletedetail', function(event){
		event.preventDefault();
		if(confirm('sure?')){
            $.get(
                $(this).attr('href')
            ).done(function(result){
                if(result == 1){
                    alert('deleted');
                    $.pjax.reload({container:'#detailpjax'});
                }else{
                    alert(result);
                }
            }).fail(function(result){
                alert('server error');
            });
		}	
        return false;
    });

//$('#formautounplnbdgt-unpbdgt_tax').val($(this).is(':checked'));

//$(document).on('change', '#formautounplnbdgt-unpbdgt_tax', function(event){
//		event.preventDefault();
//$('#formautounplnbdgt-unpbdgt_tax').change(function() {
//    if($(this).is(\":checked\")) {
//        var returnVal = confirm(\"Are you sure?\");
//        $(this).attr(\"checked\", returnVal);
//    }
//    $('#textbox1').val($(this).is(':checked'));        
//});

$('.taxcheck').change(function(){
		var checkedValue = $('.taxcheck').checked;
		var frm = $('#form-auto-unplnbdgt-form');
		$.ajax({
			url : 'updatetax?id=" . $model->id . "',
			data : frm.serialize(),
			type : 'POST',
			success : function(data){
			    alert(data);
			}
		});
		return false;
	})
", View::POS_READY);

?>
