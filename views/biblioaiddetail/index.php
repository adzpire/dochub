<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\dochub\models\FormAutoLibraidetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Form Auto Libraidetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-libraidetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Form Auto Libraidetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'libraidet_id',
            'libraidet_mainid',
            'libraidet_org',
            'libraidet_recptno',
            'libraidet_amount',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
