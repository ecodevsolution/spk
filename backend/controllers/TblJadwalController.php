<?php

namespace backend\controllers;

use Yii;
use backend\models\TblJadwal;
use backend\models\TblJadwalSearch;
use backend\models\TblSpk;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\TblDetailJadwal;
use backend\models\TblDetailSpk;
use backend\models\Model;
use mPdf;

/**
 * TblJadwalController implements the CRUD actions for TblJadwal model.
 */
class TblJadwalController extends Controller
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
     * Lists all TblJadwal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblJadwalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblJadwal model.
     * @param integer $id
     * @return mixed
     */
     public function actionCetak(){
    
        $mpdf = new \Mpdf\Mpdf();        
        $content = '';
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT c.idspk, nama_pekerjaan, status_jadwal FROM tbl_jadwal c JOIN tbl_spk d ON c.idspk = d.idspk JOIN tbl_penawaran e ON d.idpenawaran = e.idpenawaran JOIN tbl_request f ON e.idrequest = f.idrequest");
        $model = $sql->queryAll();
        
        foreach($model as $i =>$models):
        $i = $i+1;
        $content .= ' <tr>
                         <td class="service">'.$i.'</td>
                         <td class="desc">'.$models['idspk'].'</td>
                         <td>'.$models['nama_pekerjaan'].'</td>            
                         <td>'.$models['status_jadwal'].'</td>                         
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
                            
                            <p style="text-align:center;font-size:14px;"><b>Jadwal Kerja</b></p>
                            <div id="project">
                            
                                <p></p>
                                <div><span>TANGGAL : '.date('d M Y').'</span> </div>
                                <div><span>DICETAK OLEH : '.Yii::$app->user->identity->name.'</span> </div>							
        
                            </div>
						</header>
						<main>
						<table>
							<thead>
                                <tr>
                                    <th class="service">No</th>
                                    <th class="service">ID Spk</th>
                                    <th class="desc">Nama Pekerjaan</th>
                                    <th>Status Jadwal</th>                                 
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
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblJadwal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblJadwal();
        
         
        if ($model->load(Yii::$app->request->post())){
            
            $model->status_jadwal ='ON GO';
            $model->save();
            
            
            // $spk = TblSpk::findOne($model->idspk);
            // $date1 = $spk->tgl_mulai;
            // $date2 = $spk->tgl_selesai;
            
            
            // $diff = date_diff($date1,$date2);
            // $date1=date_create($spk->tgl_mulai);
            // $date2=date_create($spk->tgl_selesai);
            // $diff=date_diff($date1,$date2);

            // $diff = $diff->d + 1;

            // for($i = 0; $i < $diff; $i++){

            //     echo $i;
            // }  

            // $daterange = new DatePeriod($date1, new DateInterval('P1D'), $date2);

            // foreach($daterange as $date){
            //     echo $date->format("d") . "<br>";
            // }        

            //  foreach ($modeldetail as $key => $modeldetails):
            //     $modeldetails->idjadwal = $model->idjadwal;                						                    
            //     $modeldetails->save();                    
			// endforeach;

            //return $this->redirect(['view', 'id' => $model->idjadwal]);


            // $start = $spk->tgl_mulai;
            // $end = $spk->tgl_selesai;

            // $num_days = floor((strtotime($end)-strtotime($start))/(60*60*24));
           
            // $days = array();

            $detail = TblDetailSpk::find()
                    ->where(['idspk'=> $model->idspk])
                    ->All();
             foreach($detail as $details):
             $modeldetail = new TblDetailJadwal();
            //      for ($i=0; $i<$num_days; $i++) 
            //         if (date('N', strtotime($start . "+ $i days")) < 6)
            //             $days[date('Y-m-d', strtotime($start . "+ $i days"))]= $i;
                
                $modeldetail->idpegawai = $details->idpegawai;
                $modeldetail->idjadwal = $model->idjadwal;

                $modeldetail->save();
            endforeach;           
            return $this->redirect(['view', 'id' => $model->idjadwal]);
        } else {
            return $this->render('create', [
                'model' => $model,                
            ]);
        }
    }

    /**
     * Updates an existing TblJadwal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */

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
                        </fieldset>";

    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idjadwal]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblJadwal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblJadwal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblJadwal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblJadwal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
