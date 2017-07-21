<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblAbsensi */

$this->title = 'Create Tbl Absensi';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Absensis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-absensi-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
