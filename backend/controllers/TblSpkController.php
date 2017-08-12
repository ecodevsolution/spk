<?php

namespace backend\controllers;

use Yii;
use backend\models\TblSpk;
use backend\models\TblSpkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\TblDetailspk;
use backend\models\Model;
use backend\models\TblPenawaran;
use mPdf;


/**
 * TblSpkController implements the CRUD actions for TblSpk model.
 */
class TblSpkController extends Controller
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
     * Lists all TblSpk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblSpkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblSpk model.
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
     * Creates a new TblSpk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblSpk();
        $spk = mt_rand(10,99);
        $spk = date('ymd').''.$spk;

        $modeldetail = [new TblDetailspk];
        
        $modeldetail = Model::createMultiple(TblDetailspk::classname());
        if ($model->load(Yii::$app->request->post()) && Model::loadMultiple($modeldetail, Yii::$app->request->post())){
            
             $price = TblPenawaran::findOne($model->idpenawaran);

             $model->tgl_mulai = date('Y-m-d',strtotime($model->tgl_mulai)); 
             $model->tgl_selesai = date('Y-m-d',strtotime($model->tgl_selesai)); 
             $model->idpegawai = Yii::$app->user->identity->id;
             $model->harga_pekerjaan = $price->total_penawaran;
             $model->save(false);

             foreach ($modeldetail as $key => $modeldetails):
                $modeldetails->idspk = $model->idspk;                
                 $modeldetails->save(false);          
                //var_dump($modeldetails);      
             endforeach;

           return $this->redirect(['view', 'id' => $model->idspk]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modeldetail' => (empty($modeldetail)) ? [new TblDetailspk] : $modeldetail,
                'spk'=> $spk,
            ]);
        }
    }

    /**
     * Updates an existing TblSpk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */

     public function actionCetak($id){
    
        $mpdf = new \Mpdf\Mpdf();        
        $content = '';
        
        $connection = \Yii::$app->db;
        
        $sqlOne = $connection->createCommand("SELECT nama_pekerjaan, area_pekerjaan, tgl_mulai, tgl_selesai FROM tbl_spk a JOIN tbl_penawaran b ON a.idpenawaran = b.idpenawaran JOIN tbl_request c ON b.idrequest = c.idrequest WHERE a.idspk = ".$id." ");
        $master = $sqlOne->queryOne();
                
        $sql = $connection->createCommand("SELECT name, nama_jabatan, no_telp FROM tbl_detailspk a JOIN `user` b ON a.idpegawai = b.id JOIN tbl_jabatan c ON b.idjabatan = c.idjabatan WHERE idspk = ".$id." ");
        $model = $sql->queryAll();


        foreach($model as $i =>$models):
        $i = $i+1;
        $content .= ' <tr>
                         <td class="service">'.$i.'</td>
                         <td class="desc">'.$models['name'].'</td>
                         <td>'.$models['nama_jabatan'].'</td>
                         <td>'.$models['no_telp'].'</td>                                               
                     </tr>';
        endforeach;

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
						<title>Data Pegawai</title>
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
                            
                            <p style="text-align:center;font-size:14px;"><b>Surat Perintah Kerja</b></p>
                            <div id="project">
                            
                                <p></p>
                                <div><span>TANGGAL : '.date('d M Y').'</span> </div>
                                <div><span>DICETAK OLEH : '.Yii::$app->user->identity->name.'</span> </div>	

                                <p></p>						
                                <p></p>						
                                <div><span>ID SPK : '.$id.'</span> </div>							
                                <div><span>NAMA PEKERJAAN : '.$master['nama_pekerjaan'].'</span> </div>							
                                <div><span>AREA PEKERJAAN : '.$master['area_pekerjaan'].'</span> </div>							
                                <div><span>TGL MULAI : '.$master['tgl_mulai'].'</span> </div>							
                                <div><span>TGL SELESAI : '.$master['tgl_selesai'].'</span> </div>							
        
                            </div>
						</header>
						<main>
						<table>
							<thead>
                                <tr>
                                    <th class="service">No</th>
                                    <th class="desc">Nama Pekerja</th>
                                    <th>Jabatan</th>
                                    <th>No. telp</th>                                    
                                </tr>
							</thead>
							<tbody>
                               '.$content.'
							
							</tbody>
						</table>
					
						</main>
						
					</body>
				</html>
		');
        $mpdf->Output();
        exit;
    }

     public function actionDetailSpk($id){

        $model = TblPenawaran::find()
                ->JoinWith('tblRequest')
                ->where(['idpenawaran'=>$id])
                ->One();


        echo "
                        <fieldset>
                            <div class='form-group'>
                                <div class='select'>
                                    <label class='col-md-2 col-form-label'>Nama Pekerjaan</label>
                                    <div class='col-md-8'>
                                        <div class='form-group'>
                                            <input type='text' class='form-control' readonly='true' value='".ucfirst($model->tblRequest->nama_pekerjaan)."'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset>
                            <div class='form-group'>
                                <div class='select'>
                                    <label class='col-md-2 col-form-label'>Total Penawaran</label>
                                    <div class='col-md-8'>
                                         <div class='form-group'>
                                            <input type='text' class='form-control' readonly='true' value='".number_format($model->total_penawaran,0,".",".")."'>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>";

    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idspk]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblSpk model.
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
     * Finds the TblSpk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TblSpk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblSpk::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
