<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblAbsensi */

$this->title = 'Create Tbl Absensi';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Absensi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-absensi-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
