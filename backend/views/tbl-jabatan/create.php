<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblJabatan */

$this->title = 'Create Tbl Jabatan';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Jabatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-jabatan-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
