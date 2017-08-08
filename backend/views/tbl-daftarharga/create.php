<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblDaftarharga */

$this->title = 'Create Master Harga';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Daftarharga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-daftarharga-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
