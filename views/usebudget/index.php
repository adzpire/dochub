<?php

use yii\bootstrap\Html;
//use kartik\widgets\DatePicker;

use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\FormAutoUsebdgtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->registerCss("
.grid-view td {
    white-space: unset;
}
");
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-usebdgt-index">

<?php Pjax::begin(); ?>    <?= GridView::widget([
    //'id' => 'kv-grid-demo',
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        //['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'usebdgt_id',
            'headerOptions' => [
                'width' => '50px',
            ],
        ],
        //'usebdgt_stid',
        [
            'attribute' => 'usebdgt_date',
            'format' => ['date','long'],
            'headerOptions' => [
                'width' => '150px',
            ],
        ],
        'usebdgt_year',
        'usebdgt_reason:ntext',
        [
            'label' => 'รายการ',
            'format' => 'html',
            'filter' =>false,
            'enableSorting' =>false,
            'value' => function($data) {
                return $data->titleList;
            },

        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update}  {pdf}',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a(' '.Html::icon('pencil').' ', $url, ['data-toggle'=>'tooltip', 'title'=>'แก้ไข']);
                },
                'pdf' => function ($url, $model, $key) {
                    if(!empty($model->formAutoUsebdgtdetails)) {
                        return Html::a(' ' . Html::icon('print') . ' ', $url, ['data-toggle' => 'tooltip', 'data-pjax' => 0, 'title' => 'พิมพ์', 'target' => '_blank']);
                    }
                },
            ],
            'headerOptions' => [
                'width' => '70px',
            ],
            'contentOptions' => [
                'class'=>'text-center',
            ],
            'header' => 'จัดการ',
        ],
    ],
    'pager' => [
        'firstPageLabel' => Yii::t('app', 'รายการแรกสุด'),
        'lastPageLabel' => Yii::t('app', 'รายการท้ายสุด'),
    ],
    //'responsive'=>true,
    'hover'=>true,
    'toolbar'=> [
        ['content'=>
            Html::a(Html::icon('plus').'สร้างแบบฟอร์มใหม่', ['create'], ['class'=>'btn btn-success', 'title'=>Yii::t('app', 'เพิ่ม')]).' '.
            Html::a(Html::icon('info-sign').'แสดงตัวอย่่าง', ['pdf?id=example'], ['class'=>'btn btn-danger', 'title'=>Yii::t('app', 'แสดงตัวอย่่าง'), 'target'=>'_blank']).' '.
            Html::a(Html::icon('repeat'), ['grid-demo'], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
        ],
        //'{export}',
        '{toggleData}',
    ],
    'panel'=>[
        'type'=>GridView::TYPE_INFO,
        'heading'=> Html::icon($searchModel::fn()['icon']).' '.Html::encode($this->title),
    ],
]); ?>

<?php Pjax::end(); ?></div>
