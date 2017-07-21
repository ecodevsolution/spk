<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblJadwal */

$this->title = 'Create Tbl Jadwal';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Jadwals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-jadwal-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'modeldetail' => (empty($modeldetail)) ? [new TblDetailjadwal] : $modeldetail,
    ]) ?>

</div>
