<?php

namespace backend\controllers;

use Yii;
use backend\models\TblPembayaran;
use backend\models\TblPenawaran;
use backend\models\TblSpk;
use backend\models\TblJadwal;
use backend\models\TblPembayaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblPembayaranController implements the CRUD actions for TblPembayaran model.
 */
class TblPembayaranController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblPembayaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblPembayaranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRiwayat(){

         if($Yii::$app->user->identity->idrole == 1){
            $mod = TblPenawaran::find()
                    ->joinWith('tblRequest')                    
                    ->One();
            

            $model = TblPembayaran::find()
                    ->joinWith('tblSpk')                    
                    ->all();
         }
           if($Yii::$app->user->identity->idrole == 2){
            $mod = TblPenawaran::find()
                    ->joinWith('tblRequest')
                    ->Where(['idclient'=>Yii::$app->user->identity->id])
                    ->One();
            
            if(isset($mod)){
                 $model = TblPembayaran::find()
                    ->joinWith('tblSpk')
                    ->Where(['idpenawaran'=>$mod->idpenawaran])
                    ->all();        
            }else{
                     $model = TblPembayaran::find()
                    ->joinWith('tblSpk')                    
                    ->all();
           }

        return $this->render('riwayat',[
            'model'=>$model,
        ]);

    }

    public function actionGetdata()
    {
      
       $model = TblPembayaran::find()
            ->joinWith('tblSpk')
             ->Where(['idpenawaran'=>$mod->idpenawaran])
            ->Where(['between','tgl_bayar',date('Y-m-d',strtotime($_POST['tgl_awal'])), date('Y-m-d',strtotime($_POST['tgl_akhir']))])            
            ->all();
        
        if(!empty($model)){
            foreach($model as $models):                  
  

                echo '<tr>';
                    echo '<td>'.$models->idspk.'</td>';
                    echo '<td>'.$models->tblSpk->area_pekerjaan.'</td>';
                    echo '<td>'.$models->tgl_bayar.'</td>';                    
                    echo '<td>Rp. '.number_format($models->total_bayar,0,".",".").'</td>';
                    echo '<td><span class="label label-success">Sudah Dibayar</span></td>';                         
                    echo '<td><a href="?r=tbl-pembayaran/cetak&id='. $models->idpembayaran .'"><i class="fa fa-print"></i></a></td>';
                echo '</tr>';        
            endforeach;
        }else{
            echo '<tr><td colspan="6">No data(s) found...</td></tr>';            
        }
    }

     public function actionCetak($id){
    
        $mpdf = new \Mpdf\Mpdf();        
        $content = '';
        
        $connection = \Yii::$app->db;
        
        $sqlOne = $connection->createCommand("SELECT a.idpembayaran, b.idspk, d.nama_pekerjaan, b.area_pekerjaan, b.harga_pekerjaan, a.tgl_bayar, a.total_bayar FROM tbl_pembayaran a JOIN tbl_spk b ON a.idspk = b.idspk JOIN tbl_penawaran c ON b.idpenawaran = b.idpenawaran JOIN tbl_request d ON c.idrequest = d.idrequest WHERE a.idpembayaran = ".$id." ");
        $master = $sqlOne->queryOne();
                


        // foreach($model as $i =>$models):
        // $i = $i+1;
        // $content .= ' <tr>
        //                  <td class="service">'.$i.'</td>
        //                  <td class="desc">'.$models['name'].'</td>
        //                  <td>'.$models['nama_jabatan'].'</td>
        //                  <td>'.$models['no_telp'].'</td>                                               
        //              </tr>';
        // endforeach;

     $mpdf->WriteHTML('
			<!DOCTYPE html>
				<html lang="en">
					<head>
						<style>
							.clearfix:after {
								content: "";
								display: table;
								clear: both;
							}
								
								a {
								color: #5D6975;
								text-decoration: underline;
							}
								
								body {
								position: relative;
								width: 21cm;  
								height: 29.7cm; 
								margin: 0 auto; 
								color: #001028;
								background: #FFFFFF; 
								font-family: Arial, sans-serif; 
								font-size: 12px; 
								font-family: Arial;
							}
								
								header {
								padding: 10px 0;
								margin-bottom: 30px;
							}
								
								#logo {
								text-align: center;
								margin-bottom: 10px;
							}
								
								#logo img {
								width: 90px;
							}
								
								h1 {								
								color: blue;
								font-size: 2.4em;
								line-height: 1.4em;
								font-weight: normal;
								text-align: center;
								margin: 0 0 20px 0;
								background: url(dimension.png);
							}
                            .alamat{
                                color:#000;
                                text-align:center;
                                font-size:8px;
                                padding-top:-15px;

                            }
								
								#project {
								float: left;
							}

                            #judul{
                                text-align:center;
                                font-size:14px;
                                font-weight:4px;
                                border-bottom:1px #000 solid;
                            }
								
								#project span {
								color: #5D6975;
								text-align: right;
								width: 52px;
								margin-right: 10px;
								display: inline-block;
								font-size: 0.8em;
							}
								
								#company {
								float: right;
								text-align: right;
							}
								
								#project div,
								#company div {
								white-space: nowrap;        
							}
								
								table {
								width: 100%;
								border-collapse: collapse;
								border-spacing: 0;
								margin-bottom: 20px;
							}
								
								table tr:nth-child(2n-1) td {
								background: #F5F5F5;
							}
								
								table th,
								table td {
								text-align: center;
							}
								
								table th {
								padding: 5px 20px;
								color: #5D6975;
								border-bottom: 1px solid #C1CED9;
								white-space: nowrap;        
								font-weight: normal;
							}
								
								table .service,
								table .desc {
								text-align: left;
							}
								
								table td {
								padding: 20px;
								text-align: right;
							}
								
								table td.service,
								table td.desc {
								vertical-align: top;
							}
								
								table td.unit,
								table td.qty,
								table td.total {
								font-size: 1.2em;
							}
								
								table td.grand {
								border-top: 1px solid #5D6975;;
							}
								
								#notices .notice {
								color: #5D6975;
								font-size: 1.2em;
							}
								
								footer {
								color: #5D6975;
								width: 100%;
								height: 30px;
								position: absolute;
								bottom: 0;
								border-top: 1px solid #C1CED9;
								padding: 8px 0;
								text-align: center;
							}
						</style>
						<meta charset="utf-8">
						<title>Bukti Pembayaran</title>
					</head>
					<body>
						<header class="clearfix">
                            <img src="img/logo.png" style="width:80px;display:inline;margin-left:150px">
                            <h1 style="padding-top:-80px;margin-left:50px">  PT. Wimpie Setiono</h1>
                            <div class="alamat" style="margin-left:50px">
                                General Contractor, Maintenance, & Supplier<br/>
                                Jl. Raya Kranggan No. 57A, Kranggan - Bekasi<br/>
                                Telp/Fax 021-84300223/84309711<br/>
                                Email: ptwimpiesetiono@gmail.com

                            </div>
						    <hr/>
                            
                            <p style="text-align:center;font-size:14px;"><b>Bukti Pembayaran</b></p>
                            <div id="project">
                            
                                <p></p>
                                <div><span>TANGGAL : '.date('d M Y').'</span> </div>
                                <div><span>DICETAK OLEH : '.Yii::$app->user->identity->name.'</span> </div>	

                                <p></p>						
                                <p></p>						
                                <div><span>NO INVOICE : #'.$master['idpembayaran'].'</span> </div>													
                                <div><span>TANGGAL PEMBAYARAN : '.date('d M Y',strtotime($master['tgl_bayar'])).'</span> </div>													
        
                            </div>
						</header>
						<main>
                            <table>
                                <thead>
                                <tr>
                                    <th class="service">NO SPK</th>
                                    <th class="desc">NAMA PEKERJAAN</th>
                                    <th>AREA PEKERJAAN</th>
                                    <th colspan="2" >HARGA PEKERJAAN</th>                                    
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="service">'.$master['idspk'].'</td>
                                    <td class="desc">'.$master['nama_pekerjaan'].'</td>
                                    <td class="unit">'.$master['area_pekerjaan'].'</td>
                                    <td colspan="2" class="qty">Rp. '.number_format($master['harga_pekerjaan'],0,".",".").'</td>                                    
                                </tr>
                               
                                <tr>
                                    <td colspan="4">SUBTOTAL</td>
                                    <td class="total">Rp. '.number_format($master['total_bayar'],0,".",".").'</td>
                                </tr>
                              
                                <tr>
                                    <td colspan="4" class="grand total">GRAND TOTAL</td>
                                    <td class="grand total">Rp. '.number_format($master['total_bayar'],0,".",".").'</td>
                                </tr>
                                </tbody>
                            </table>
                            
						</main>
						<footer>
						    Invoice was created on a computer and is valid without the signature and seal.
						</footer>
						
					</body>
				</html>
		');
        $mpdf->Output();
        exit;
    }
    
    /**
     * Displays a single TblPembayaran model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblPembayaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPembayaran();
        $noInvoice = mt_rand(10,99);         
        $noInvoice = date('ymd').''.$noInvoice;             

        if ($model->load(Yii::$app->request->post())){
            
            $update = TblJadwal::find()
                    ->where(['idspk'=>$model->idspk])
                    ->One();
            $update->status_jadwal = 'SELESAI';            
            $update->save();
            
           
            // Yii::$app->db->createCommand("")->execute();

            //  $connection = \Yii::$app->db;
            //  $sql = $connection->createCommand("");
            //  $sql->execute();

            $model->tgl_bayar = date("Y-m-d",strtotime($model->tgl_bayar));
            $model->save();

             Yii::$app->db->createCommand("UPDATE tbl_pembayaran a JOIN tbl_spk b ON a.idspk = b.idspk JOIN tbl_penawaran c ON b.idpenawaran = c.idpenawaran JOIN tbl_request d ON c.idrequest = d.idrequest SET d.`status` = 'SELESAI' WHERE a.idspk = '".$model->idspk."'")->execute();

            return $this->redirect(['view', 'id' => $model->idpembayaran]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'noInvoice'=>$noInvoice,
            ]);
        }
    }

    public function actionDetail($id){
        $model = TblSpk::FindOne($id);

        echo "
                        <fieldset>
                            <div class='form-group'>
                                <div class='select'>
                                    <label class='col-md-2 col-form-label'>Area Pekerjaa</label>
                                    <div class='col-md-8'>
                                        <div class='form-group'>
                                            <input type='text' class='form-control' readonly='true' value='".ucfirst($model->area_pekerjaan)."'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset>
                            <div class='form-group'>
                                <div class='select'>
                                    <label class='col-md-2 col-form-label'>Tanggal Mulai</label>
                                    <div class='col-md-8'>
                                         <div class='form-group'>
                                            <input type='text' class='form-control' readonly='true' value='".date('d M Y',strtotime($model->tgl_mulai))."'>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset>
                            <div class='form-group'>
                                <div class='select'>
                                    <label class='col-md-2 col-form-label'>Tanggal Selesai</label>
                                    <div class='col-md-8'>
                                         <div class='form-group'>
                                            <input type='text' class='form-control' readonly='true' value='".date('d M Y',strtotime($model->tgl_selesai))."'>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class='form-group'>
                                <div class='select'>
                                    <label class='col-md-2 col-form-label'>Harga Pekerjaan</label>
                                    <div class='col-md-8'>
                                         <div class='form-group'>
                                            <input type='text' class='form-control' readonly='true' value='".number_format($model->harga_pekerjaan,0,".",".")."'>
                                            <input type='hidden' class='form-control'id='total' readonly='true' value='".$model->harga_pekerjaan."'>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>";

    }

    /**
     * Updates an existing TblPembayaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpembayaran]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblPembayaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblPembayaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TblPembayaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPembayaran::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
