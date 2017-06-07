<?php

use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoMfg */

$this->params['breadcrumbs'][] = ['label' => $model::fn()['name'], 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fid, 'url' => ['view', 'id' => $model->fid]];
$this->params['breadcrumbs'][] = 'อัพเดต';
?>
<div class="form-auto-mfg-update">

    <div class="panel panel-warning">
        <div class="panel-heading">
            <span class="panel-title"><?= Html::icon('edit') . ' ' . Html::encode($this->title) ?></span>
            <?php /*echo Html::a(Html::icon('fire') . ' ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->fid], [
                'class' => 'btn btn-danger panbtn',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])*/ ?>
            <?= Html::a(Html::icon('pencil') . ' ' . Yii::t('app', 'สร้างใหม่'), ['create'], ['class' => 'btn btn-info panbtn']) ?>
        </div>
        <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
            'staff' => $staff,
            'chstat' => $chstat,
            'hosptype' => $hosptype,
            'feeright' => $feeright,
            'uright' => $uright,
            'relright' => $relright,
        ]) ?>
        </div>
    </div>
</div>
