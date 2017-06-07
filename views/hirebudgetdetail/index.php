<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\FormAutoHirbdgtdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Form Auto Hirbdgtdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-hirbdgtdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Form Auto Hirbdgtdetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'hbdgtdet_id',
            'hbdgtdet_hbid',
            'hbdgtdet_title',
            'hbdgtdet_amount',
            'hbdgtdet_unit',
            // 'hbdgtdet_xpecprice',
            // 'hbdgtdet_price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
