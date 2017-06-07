<?php

use yii\bootstrap\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoCeg */

$this->params['breadcrumbs'][] = ['label' => 'Form Auto Cegs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-ceg-create">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
            <?= Html::a( Html::icon('list-alt').' '.Yii::t('app', 'entry'), ['index'], ['class' => 'btn btn-success panbtn']) ?>
        </div>
        <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
            'staff' => $staff,
            'spwork' => $spwork,
            'birthright' => $birthright,
            'chfee' => $chfee,
            'confirm' => $confirm,
            'feeagree' => $feeagree,
            'province' => $province,
            'amphur'=> $amphur,
        ]) ?>
        </div>
    </div>

</div>
