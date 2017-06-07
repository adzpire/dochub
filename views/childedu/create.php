<?php

use yii\bootstrap\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoCe */

$this->params['breadcrumbs'][] = ['label' => 'Form Auto Ces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-ce-create">

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
                'province' => $province,
                'amphur'=> $amphur,
            ]) ?>
        </div>
    </div>

</div>
