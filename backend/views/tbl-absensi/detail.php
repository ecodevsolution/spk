<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\TblJadwal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPenggajianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detil Absensi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-penggajian-index">

    <h1><?= Html::encode($this->title) ?></h1>
     <?php
         $connection = \Yii::$app->db;
         $sqlzz = $connection->createCommand("SELECT  COUNT(username) * c.gaji Gaji FROM tbl_absensi e JOIN tbl_detailabsensi a ON e.idabsensi = a.idabsensi JOIN `user` b ON a.idpegawai = b.id JOIN tbl_jabatan c ON b.idjabatan = c.idjabatan WHERE e.idspk = '".$model->idspk."'");
         $modelzz = $sqlzz->queryOne();
    
    ?>
    <table class="table">
         <thead class="text-primary">
             <tr>                 
                 <th>ID Spk</th>
                 <th>Area</th>
                 <th>Tanggal Mulai</th>
                 <th>Tanggal Akhir</th>                                                                                    
             </tr>
         </thead>
         <tbody>                
             <tr>
                <td><?= $model->idspk; ?></td>
                <td><?= $model->tblSpk->area_pekerjaan; ?></td>
                <td><?= $model->tblSpk->tgl_mulai; ?></td>
                <td><?= $model->tblSpk->tgl_selesai; ?></td>                
             </tr>              
         </tbody>
     </table>


     <table class="table">
         <thead class="text-primary">
             <tr>                 
                 <th>ID Pegawai</th>
                 <th>Nama</th>
                 <th>Jabatan</th>
                 <th>Status</th>                                  
             </tr>
         </thead>
         <tbody>     
            <?php
                 $connection = \Yii::$app->db;
                 $sql = $connection->createCommand("SELECT  username, name, nama_jabatan, COUNT(username) * c.gaji Gaji FROM tbl_absensi e JOIN tbl_detailabsensi a ON e.idabsensi = a.idabsensi JOIN `user` b ON a.idpegawai = b.id JOIN tbl_jabatan c ON b.idjabatan = c.idjabatan WHERE e.idspk = '".$model->idspk."' AND pengganti = '' GROUP BY username, name, nama_jabatan");
                 $modelx = $sql->queryAll();

                 foreach($modelx as $models):
            
            ?>           
             <tr>
                <td><?= $models['username']; ?></td>
                <td><?= $models['name']; ?></td>
                <td><?= $models['nama_jabatan']; ?></td>                           
                <td><span class="label label-success">masuk</span></td>                           
             </tr>  

             <?php endforeach; ?>            
         </tbody>
     </table>

     <table class="table">
         <thead class="text-primary">
             <tr>                 
                 <th>ID Pegawai</th>
                 <th>Nama</th>
                 <th>Jabatan</th>
                 <th>Status</th>
             </tr>
         </thead>
         <tbody>     
            <?php
                 $connection = \Yii::$app->db;
                 $sql = $connection->createCommand("SELECT IFNULL(username,'') username, IFNULL(name,'') name, IFNULL(nama_jabatan,'') nama_jabatan, IFNULL(COUNT(username) * r.gaji,0) Gaji FROM tbl_absensi o JOIN tbl_detailabsensi p ON o.idabsensi = p.idabsensi JOIN `user` q ON p.pengganti = q.id JOIN tbl_jabatan r ON q.idjabatan = r.idjabatan WHERE o.idspk = '".$model->idspk."'");
                 $modelx = $sql->queryAll();

                 foreach($modelx as $models):
                 if($models['username'] != ''){
            
            ?>           
             <tr>
                <td><?= $models['username']; ?></td>
                <td><?= $models['name']; ?></td>
                <td><?= $models['nama_jabatan']; ?></td> 
                <td><span class="label label-warning">pengganti</span></td>                                     
             </tr>  

             <?php } endforeach; ?>            
         </tbody>
     </table>
</div>
