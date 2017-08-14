<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblPenawaran */

$this->title = 'Tambah Penawaran';
$this->params['breadcrumbs'][] = ['label' => 'Penawaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-penawaran-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'modeldetail' => (empty($modeldetail)) ? [new TblDetailpenawaean] : $modeldetail,
        'ask' =>$ask
    ]) ?>

</div>
