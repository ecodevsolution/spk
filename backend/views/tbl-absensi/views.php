<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\TblJadwal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPenggajianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lihat Absensi';
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
            <?php
                foreach($model as $models):

                $jadwal = TblJadwal::find()
                        ->where(['idspk'=>$models->idspk])
                        ->One();
            ?>
             <tr>
                 <td><?= $models->idspk ?></td>
                 <td><?= $models->tblSpk->area_pekerjaan ?></td>
                 <td><?= $models->tblSpk->tgl_mulai ?></td>
                 <td><?= $models->tblSpk->tgl_selesai ?></td>                 
                 <td><?= $jadwal->status_jadwal; ?></td>
                 <td><a href="?r=tbl-absensi/detail&id=<?= $models->idspk ?>"><i class="fa fa-pencil"></i></a></td>
             </tr>
             <?php endforeach; ?>

         </tbody>
     </table>
</div>
