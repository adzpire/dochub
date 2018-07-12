<?php

use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\dochub\models\FormMf2016 */

$this->params['breadcrumbs'][] = ['label' => 'หน้ารายการ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fid, 'url' => ['view', 'id' => $model->fid]];
$this->params['breadcrumbs'][] = 'อัพเดต';
?>
<div class="form-mf2016-update">

<div class="panel panel-warning">
	<div class="panel-heading">
		<span class="panel-title"><?= Html::icon('edit').' '.Html::encode($this->title) ?></span>
		<?= Html::a( Html::icon('pencil').' '.'สร้างใหม่', ['create'], ['class' => 'btn btn-info panbtn']) ?>
	</div>
	<div class="panel-body">
	<?= $this->render('_form', [
        'model' => $model,
        'staff' => $staff,
        'choice' => $choice,
        'intmdl' => $intmdl,
	]) ?>
	</div>
</div>

</div>
