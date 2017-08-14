<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblJadwal */

$this->title = 'Tambah Jadwal';
$this->params['breadcrumbs'][] = ['label' => 'Jadwal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-jadwal-create">

    <h2><?= Html::encode($this->title) ?></h2> 

    <?= $this->render('_form', [
        'model' => $model,        
    ]) ?>

</div>
