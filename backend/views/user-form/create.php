<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserForm */

$this->title = 'Create Data Pegawai';
$this->params['breadcrumbs'][] = ['label' => 'User Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-form-create">

    <h2><?= Html::encode($this->title) ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'nik' => $nik,
    ]) ?>

</div>
