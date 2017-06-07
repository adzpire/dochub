<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FormAutoHirbdgt */

$this->title = $model->hbdgt_id;
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Hirbdgts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-hirbdgt-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->hbdgt_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->hbdgt_id], [
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
            'hbdgt_id',
            'hbdgt_stid',
            'hbdgt_date',
            'hbdgt_job',
            'hbdgt_org',
            'hbdgt_reason:ntext',
            'hbdgt_tax',
        ],
    ]) ?>

</div>
