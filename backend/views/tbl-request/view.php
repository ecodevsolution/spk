<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblRequest */

$this->title = $model->idrequest;
$this->params['breadcrumbs'][] = ['label' => 'Request Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-request-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idrequest',
            'idclient',
            'nama_pekerjaan',
            'status',
        ],
    ]) ?>

</div>
