<?php

use yii\bootstrap\Html;

use yii\web\View;

use yii\widgets\Pjax;

use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoRc */

$this->params['breadcrumbs'][] = ['label' => $model::fn()['name'], 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fid, 'url' => ['view', 'id' => $model->fid]];
$this->params['breadcrumbs'][] = 'อัพเดต';
?>
<div class="form-auto-rc-update">

    <div class="panel panel-warning">
        <div class="panel-heading">
            <span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
            <?php /*echo Html::a( Html::icon('fire').' '.'ลบ', ['delete', 'id' => $model->fid], [
                'class' => 'btn btn-danger panbtn',
                'data' => [
                    'confirm' => 'ต้องการลบข้อมูล?',
                    'method' => 'post',
                ],
            ])*/ ?>
            <?= Html::a( Html::icon('pencil').' '.'สร้างใหม่', ['create'], ['class' => 'btn btn-info panbtn']) ?>
        </div>
        <div class="panel-body">
            <?php Pjax::begin(['id' => 'detailpjax']); ?>
            <?= $this->render('_form', [
                'model' => $model,
                'staff' => $staff,
                'addr' => $addr,
                'intmdl' => $intmdl,
                'dataProvider' => $dataProvider,
            ]) ?>
        </div>
    </div>
    <div class="form-auto-rcdetail-index">

        <?= GridView::widget([
            //'id' => 'kv-grid-demo',
            'dataProvider'=> $dataProvider,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                'rcd_id',
                'rcd_detail',
                [
                    'class' => '\kartik\grid\DataColumn',
                    'attribute' => 'rcd_amount',
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
                'firstPageLabel' => 'รายการแรกสุด',
                'lastPageLabel' => 'รายการท้ายสุด',
            ],
            'responsive'=>true,
            'hover'=>true,
            'showPageSummary' => true,
            'toolbar'=> false,
            'panel'=>[
                'type'=>GridView::TYPE_INFO,
                'heading'=> Html::icon('th-list').' '. ' รายการรายละเอียด ',
                'before' => (($dataProvider->totalCount >0) ? Html::a(Html::icon('print') . ' ' . Yii::t('app', 'พิมพ์'), ['pdf', 'id' => $model->fid], ['class' => 'btn btn-danger', 'data-pjax' => 0]) : Html::a(Html::icon('print') . ' ' . Yii::t('app', 'ไม่สามารถพิมพ์ได้(ต้องมีอย่างน้อย 1 รายการรายละเอียด)'), '', ['class' => 'btn btn-default disabled', 'data-pjax'=>0])),
                'beforeOptions' => ['class'=>'text-center kv-panel-before'],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
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

", View::POS_READY);

?>