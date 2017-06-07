<?php

use yii\bootstrap\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoMfg */


$this->params['breadcrumbs'][] = ['label' => 'Form Auto Mfgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-mfg-create">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
            <?= Html::a( Html::icon('list-alt').' '.Yii::t('app', 'entry'), ['index'], ['class' => 'btn btn-success panbtn']) ?>
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
