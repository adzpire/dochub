<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoExmDetail */

$this->title = $model->exminfo_id;
$this->params['breadcrumbs'][] = ['label' => 'Form Auto Exm Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-exm-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->exminfo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->exminfo_id], [
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
            'exminfo_id',
            'exminfo_exmid',
            'exminfo_course',
            'exminfo_type',
            'exminfo_degree',
            'exminfo_hour',
            'exminfo_stdamount',
            'exminfo_fee',
            'exminfo_note:ntext',
        ],
    ]) ?>

</div>
