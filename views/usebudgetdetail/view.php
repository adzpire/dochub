<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoUsebdgtdetail */

$this->title = $model->usebdgtdet_id;
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Usebdgtdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-usebdgtdetail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->usebdgtdet_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->usebdgtdet_id], [
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
            'usebdgtdet_id',
            'usebdgtdet_ubid',
            'usebdgtdet_title',
            'usebdgtdet_amount',
        ],
    ]) ?>

</div>
