<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\TblJadwal;

use yii\web\View;
/* @var $searchModel backend\models\TblPenggajianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Riwayat Pembayaran';
$this->params['breadcrumbs'][] = $this->title;

    $this->registerJsFile("https://code.jquery.com/jquery-1.12.4.js",
    ['position' => View::POS_HEAD]);
    
    $this->registerJsFile("https://code.jquery.com/ui/1.12.1/jquery-ui.js",
    ['position' => View::POS_HEAD]);
    
?>


<style>
    .loading-overlay{
        position: absolute;
        left: 0; 
        top: 0; 
        right: 0; 
        bottom: 0;
        z-index: 2;
        background: rgba(255,255,255,0.7);
    }
    .overlay-content {
        position: absolute;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        top: 50%;
        left: 0;
        right: 0;
        text-align: center;
        color: #555;
    }
</style>
<script>
    $(function() {
        $("#datepicker1").datepicker({ dateFormat: 'yy-mm-dd' });
    });
    $(function() {
        $("#datepicker2").datepicker({ dateFormat: 'yy-mm-dd' });
    });

    function getUsers(tgl_awal,tgl_akhir){
        $.ajax({
            type: 'POST',
            url: '?r=tbl-pembayaran/getdata',
            data: 'tgl_awal='+tgl_awal+'&tgl_akhir='+tgl_akhir,
            beforeSend:function(html){
                $('.loading-overlay').show();
            },
            success:function(html){
                $('.loading-overlay').hide();
                $('#userData').html(html);
            }
        });
    }
</script>
<div class="tbl-penggajian-index">

    <h1><?= Html::encode($this->title) ?></h1>
     <div class="alert-media-right" style="display: inline-block;" >
        <p>
            Date Range : <input type="text"  required id="datepicker1"> To <input type="text" required id="datepicker2">
                        
             <input type="button" class="btn btn-primary" value="Search" onclick="getUsers($('#datepicker1').val(),$('#datepicker2').val())"/>
        </p>
        <p></p><hr/>
    </div>
    <table class="table">
    <div class="loading-overlay" style="display: none;"><div class="overlay-content">Loading.....</div></div>
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
        <tbody id="userData">
            <?php
                foreach($model as $models):            
            ?>
             <tr>
                 <td><?= $models->idspk ?></td>
                 <td><?= $models->tblSpk->area_pekerjaan ?></td>
                 <td><?= $models->tgl_bayar ?></td>
                 <td><?= 'Rp. '.number_format($models->total_bayar,0,".",".") ?></td>                                  
                 <td><span class="label label-success">Sudah Dibayar</span></td>                                  
                 <td><a href="?r=tbl-pembayaran/cetak&id=<?= $models->idpembayaran ?>"><i class="fa fa-print"></i></a></td>
             </tr>
             <?php endforeach; ?>

         </tbody>
     </table>
</div>
