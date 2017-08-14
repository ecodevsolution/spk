<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblClient */

$this->title = 'Tambah Data Client';
$this->params['breadcrumbs'][] = ['label' => 'Client', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-client-create">

    <h2><?= Html::encode($this->title) ?></h2> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
