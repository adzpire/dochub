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
/* @var $model backend\models\FormAutoHirbdgt */

$this->params['breadcrumbs'][] = ['label' => $model::fn()['name'], 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hbdgt_id, 'url' => ['view', 'id' => $model->hbdgt_id]];
$this->params['breadcrumbs'][] = 'อัพเดต';
?>
<div class="form-auto-hirbdgt-update">

    <div class="panel panel-warning">
        <div class="panel-heading">
            <span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
            <?php /*Html::a( Html::icon('fire').' '.Yii::t('app', 'Delete'), ['delete', 'id' => $model->hbdgt_id], [
                'class' => 'btn btn-danger panbtn',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])*/ ?>
            <?= Html::a( Html::icon('pencil').' '.Yii::t('app', 'สร้างใหม่'), ['create'], ['class' => 'btn btn-info panbtn']) ?>
        </div>
        <div class="panel-body">
            <div class="form-auto-hirbdgt-form">

                <?php $form = ActiveForm::begin([
                    'layout' => 'horizontal',
                    'id' => 'form-auto-hirbdgt-form',
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
                        <?= $form->field($model, 'hbdgt_date', [
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
//                    'today'=> true,
                            ]]) ?>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-md-1">
                        <strong>เรื่อง</strong>
                    </div>
                    <div class="col-md-7">ขออนุมัติจัดจ้าง
                    </div>
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
                        echo $form->field($model, 'hbdgt_stid', [
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
                        <mark class="_posinfo"> <?php echo $model->isNewRecord ? '-' : $model->hbdgtSt->position->name_th; ?> </mark>
                    </div>

                </div>
                <div class="col-md-11 col-md-offset-1">
                    <div class="col-md-4">
                        <?= $form->field($model, 'hbdgt_job', [
                            'horizontalCssClasses' => [
                                'label' => 'col-md-3',
                                'wrapper' => 'col-md-9',
                            ],
                        ])->textInput()->label('ด้วยงาน') ?>
                    </div>
                    <div class="col-md-8">
                        <?= $form->field($model, 'hbdgt_org', [
                            'horizontalCssClasses' => [
                                'label' => 'col-md-5',
                                'wrapper' => 'col-md-7',
                            ],
                        ])->textInput()->label(' มีความประสงค์ขออนุมัติจัดจ้าง(องค์กร/หน่วยงาน) ') ?>
                    </div>
                </div>
                <div class="col-md-11 col-md-offset-1">
                    <?= $form->field($model, 'hbdgt_reason', [
                        'horizontalCssClasses' => [
                            'label' => 'col-md-2',
                            'wrapper' => 'col-md-9',
                        ],
                    ])->textarea(['rows' => 4]) ?>
                </div>
                <div class="col-md-12 form-group text-center">
                    <?= Html::submitButton(Html::icon('floppy-disk') . ' ' . Yii::t('app', 'บันทึก'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    <?php
                    if (!$model->isNewRecord) {
                        echo Html::a(Html::icon('list') . ' ' . Yii::t('app', 'เพิ่มรายการ'), ['qadddetail', 'id' => $model->hbdgt_id], ['class' => 'btn btn-success _qdetail']);
                    }
                    echo ' ' . Html::a(Html::icon('ban-circle') . ' ' . Yii::t('app', 'ยกเลิก'), Yii::$app->request->referrer, ['class' => 'btn btn-warning']);
                    ?>

                </div>

            </div>
        </div>
    </div>

    <div class="form-auto-unplnbdgtdetail-index">
        <?php Pjax::begin(['id' => 'detailpjax']); ?>
        <?= GridView::widget([
            //'id' => 'kv-grid-demo',
            'dataProvider' => $dataProvider,
            //'filterModel' => false,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                'hbdgtdet_title',
                'hbdgtdet_amount',
                'hbdgtdet_unit',
                'hbdgtdet_xpecprice',
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'hbdgtdet_price',
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
                'after'=> $form->field($model, 'hbdgt_tax', [
                    'horizontalCssClasses' => [
                        'label' => 'col-md-1',
                        'wrapper' => 'col-md-2 col-md-offset-0 pull-right',
                        'hint' => 'col-md-3 pull-right',
                    ],
                ])->checkBox(['label' => 'คำนวณภาษี 7% ', 'class' =>'taxcheck'])->hint('<code>ผลการคำนวณภาษีจะปรากฏในการพิมพ์</code>'),
                'before' => (($dataProvider->totalCount >0) ? Html::a(Html::icon('print') . ' ' . Yii::t('app', 'พิมพ์'), ['pdf', 'id' => $model->hbdgt_id], ['class' => 'btn btn-danger', 'data-pjax' => 0]) : Html::a(Html::icon('print') . ' ' . Yii::t('app', 'ไม่สามารถพิมพ์ได้(ต้องมีอย่างน้อย 1 รายการรายละเอียด)'), '', ['class' => 'btn btn-default disabled', 'data-pjax'=>0])),
                'beforeOptions' => ['class'=>'text-center kv-panel-before'],
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
$(document).on('click', '._qdetail', function(event){
		event.preventDefault();
		//alert($(this).attr('href'));
		$('.modal-header').text( \"เพิ่มรายการ\" );
		$('#modal').modal('show')
		.find('#modalcontent')
		.load($(this).attr('href'));
			return false;//just to see what data is coming to js
    });

$(document).on('click', '._qeditdetail', function(event){
		event.preventDefault();
		//alert($(this).attr('href'));
        $('.modal-header').text( \"แก้ไขรายการ\" );
		$('#modal').modal('show')
		.find('#modalcontent')
		.load($(this).attr('href'));
        return false;
    });

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
    });

$('.taxcheck').change(function(){
		var checkedValue = $('.taxcheck').checked;
		var frm = $('#form-auto-hirbdgt-form');
		$.ajax({
			url : 'updatetax?id=".$model->hbdgt_id."',
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
