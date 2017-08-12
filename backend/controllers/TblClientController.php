<?php

namespace backend\controllers;

use Yii;
use backend\models\TblClient;
use backend\models\TblClientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use mPdf;
/**
 * TblClientController implements the CRUD actions for TblClient model.
 */
class TblClientController extends Controller
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
     * Lists all TblClient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblClientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblClient model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblClient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCetak(){
    
        $mpdf = new \Mpdf\Mpdf();        
        $content = '';
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT * FROM `user` a JOIN tbl_jabatan b ON a.idjabatan = b.idjabatan WHERE a.idrole = 2");
        $model = $sql->queryAll();
        
        foreach($model as $i =>$models):
        $i = $i+1;
        $content .= ' <tr>
                         <td class="service">'.$i.'</td>
                         <td class="desc">'.$models['name'].'</td>
                         <td>'.$models['perusahaan'].'</td>            
                         <td>'.$models['tgl_lahir'].'</td>
                         <td>'.$models['jenis_kelamin'].'</td>                         
                         <td>'.$models['no_telp'].'</td>
                         <td>'.$models['email'].'</td>
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
                            
                            <p style="text-align:center;font-size:14px;"><b>Data Client</b></p>
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
                                    <th class="desc">Nama</th>
                                    <th>Perusahaan</th>
                                    <th>Tanggal Lahir</th>                  
                                    <th>Jenis Kelamin</th>                                    
                                    <th>No Tlp</th>
                                    <th>Email</th>
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
    public function actionCreate()
    {
        $model = new TblClient();

        if ($model->load(Yii::$app->request->post())){
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
            $model->created_at = date('Ydmh'); 
            $model->tgl_lahir = date('Y-m-d',strtotime($model->tgl_lahir));         
            $model->generateAuthKey();
            $model->idrole = 2;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblClient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){
            $model->password_hash = $model->password_hash;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblClient model.
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
     * Finds the TblClient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblClient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblClient::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
