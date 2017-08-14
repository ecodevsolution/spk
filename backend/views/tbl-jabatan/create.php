<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblJabatan */

$this->title = 'Tambah Tbl Jabatan';
$this->params['breadcrumbs'][] = ['label' => 'Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-jabatan-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
