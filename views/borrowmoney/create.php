<?php

use yii\bootstrap\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoBrmn */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Auto Brmns'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-brmn-create">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <span class="panel-title"><?= Html::icon('edit') . ' ' . Html::encode($this->title) ?></span>
            <?= Html::a(Html::icon('list-alt') . ' ' . Yii::t('app', 'entry'), ['index'], ['class' => 'btn btn-success panbtn']) ?>
        </div>
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
                'choicearr' => $choicearr,
                'staff' => $staff,
            ]) ?>
        </div>
    </div>

</div>
