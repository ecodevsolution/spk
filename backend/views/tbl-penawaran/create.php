<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblPenawaran */

$this->title = 'Create Tbl Penawaran';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Penawarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-penawaran-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'modeldetail' => (empty($modeldetail)) ? [new TblDetailpenawaean] : $modeldetail,
        'ask' =>$ask
    ]) ?>

</div>
