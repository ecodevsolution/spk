<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\UserForm;
/* @var $this yii\web\View */
/* @var $model backend\models\TblRequest */

$this->title = $model->idrequest;
$this->params['breadcrumbs'][] = ['label' => 'Request Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$mode = UserForm::findOne($model->idclient);
?>
<div class="tbl-request-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idrequest',

     
            [
                'label'=>"Nama Client",
                'value'=>$mode->name

            ],
            'nama_pekerjaan',
            'status',
        ],
    ]) ?>

</div>
