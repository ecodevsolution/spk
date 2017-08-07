<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPenggajianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbl Penggajians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-penggajian-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table">
         <thead class="text-primary">
             <tr>
                 <th>SPK</th>
                 <th>Area</th>
                 <th>Tanggal Mulai</th>
                 <th>Tanggal Akhir</th>                 
                 <th>Status</th>
                 <th>Action</th>
             </tr>
         </thead>
         <tbody>
             <tr>
                 <td>SPK</td>
                 <td>Area</td>
                 <td>Tanggal Mulai</td>
                 <td>Tanggal Akhir</td>                 
                 <td>Status</td>
                 <td><a href="#"><i class="fa fa-pencil"></i></a></td>
             </tr>
         </tbody>
     </table>
</div>
