<?php

use yii\bootstrap\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormAutoBrrvmn */

$this->params['breadcrumbs'][] = ['label' => 'หน้ารายการ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-auto-brrvmn-create">

    <div class="panel panel-primary">
		<div class="panel-heading">
			<span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
			<?= Html::a( Html::icon('list-alt').' กลับหน้ารายการ', ['index'], ['class' => 'btn btn-success panbtn']) ?>
		</div>
		<div class="panel-body">
		 <?= $this->render('_form', [
            'model' => $model,
            'staff' => $staff
		 ]) ?>
		</div>
	</div>

</div>
