<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FormAutoHirbdgtdetail */

$this->title = $model->hbdgtdet_id;
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Hirbdgtdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-hirbdgtdetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->hbdgtdet_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->hbdgtdet_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'hbdgtdet_id',
            'hbdgtdet_hbid',
            'hbdgtdet_title',
            'hbdgtdet_amount',
            'hbdgtdet_unit',
            'hbdgtdet_xpecprice',
            'hbdgtdet_price',
        ],
    ]) ?>

</div>
