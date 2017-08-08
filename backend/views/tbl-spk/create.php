<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblSpk */

$this->title = 'Create Tbl Spk';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Spk', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-spk-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'modeldetail' => (empty($modeldetail)) ? [new TblDetailspk] : $modeldetail,
        'spk'=> $spk
    ]) ?>

</div>
