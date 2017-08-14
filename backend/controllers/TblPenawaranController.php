<?php

namespace backend\controllers;

use Yii;
use backend\models\TblPenawaran;
use backend\models\TblPenawaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Model;
use backend\models\TblDetailpenawaran;
use backend\models\TblRequest;
use backend\models\TblDaftarharga;
use mPdf;

/**
 * TblPenawaranController implements the CRUD actions for TblPenawaran model.
 */
class TblPenawaranController extends Controller
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
     * Lists all TblPenawaran models.
     * @return mixed
     */

    public function actionDetailPenawaran($id){

        $model = TblRequest::find()
                ->JoinWith('userForm')
                ->where(['idrequest'=>$id])
                ->One();


        echo "
                        <fieldset>                            
                            <div class='select'>
                                <label class='col-md-2 col-form-label'>Nama Client</label>
                                <div class='col-md-8'>
                                    <div class='form-group'>
                                            <input type='text' class='form-control' readonly='true' value='".ucfirst($model->userForm->name)."'>
                                    </div>
                                </div>
                            </div>                            
                        </fieldset>";

    }
    public function actionIndex()
    {
        $searchModel = new TblPenawaranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPenawaran model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

     public function actionCetak($id){
    
        $mpdf = new \Mpdf\Mpdf();        
        $content = '';
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT item_pekerjaan,satuan,satuan_harga, quantity, satuan_harga * quantity total FROM tbl_detailpenawaran a JOIN tbl_daftarharga b ON a.kode_pekerjaan = b.kode_pekerjaan WHERE idpenawaran = ".$id." ");
        $model = $sql->queryAll();
        
        $master = TblPenawaran::find()
                ->joinWith('tblRequest')
                ->Where(['idpenawaran'=>$id])
                ->One();
 
        $total = 0;
        foreach($model as $i =>$models):
        $i = $i+1;
        $content .= ' <tr>
                         <td class="service">'.$i.'</td>
                         <td class="desc">'.$models['item_pekerjaan'].'</td>
                         <td>'.$models['quantity'].$models['satuan'].'</td>
                         <td>'.number_format($models['satuan_harga'],0,".",".").'</td>
                         <td>'.number_format($models['total'],0,".",".").'</td>                         
                     </tr>';
            $total += $models['total'];
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
                            
                            <p style="text-align:center;font-size:14px;"><b>Penawaran</b></p>
                            <div id="project">
                            
                                <p></p>
                                <div><span>TANGGAL : '.date('d M Y').'</span> </div>
                                <div><span>DICETAK OLEH : '.Yii::$app->user->identity->name.'</span> </div>	

                                <p></p>						
                                <p></p>						
                                <div><span>ID PENAWARAN : '.$master->idpenawaran.'</span> </div>							
                                <div><span>NAMA PEKERJAAN : '.$master->tblRequest->nama_pekerjaan.'</span> </div>							
        
                            </div>
						</header>
						<main>
						<table>
							<thead>
                                <tr>
                                    <th class="service">No</th>
                                    <th class="desc">Item Pekerjaan</th>
                                    <th>Volume</th>
                                    <th>Satuan Harga</th>
                                    <th>Total</th>                                   
                                </tr>
							</thead>
							<tbody>
                               '.$content.'
							
                                <tr>
                                    <td colspan="4" class="grand total">GRAND TOTAL</td>
                                    <td class="grand total">'.number_format($total,0,".",".").'</td>
                                </tr>
							</tbody>
                             
						</table>
					
						</main>
						
					</body>
				</html>
		');
        $mpdf->Output();
        exit;
    }

    /**
     * Creates a new TblPenawaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPenawaran();
        $modeldetail = [new TblDetailpenawaran];
        $ask = mt_rand(10,99);
        $ask = date('ymd').''.$ask;
        
        $modeldetail = Model::createMultiple(TblDetailpenawaran::classname());
        if ($model->load(Yii::$app->request->post()) && Model::loadMultiple($modeldetail, Yii::$app->request->post())){
            
            

            $model->save();

            $total = 0;
            foreach ($modeldetail as $key => $modeldetails):
            
            $brg = TblDaftarharga::find()
                ->where(['kode_pekerjaan'=>$modeldetails->kode_pekerjaan])
                ->One();

					$modeldetails->idpenawaran = $model->idpenawaran;
                    $modeldetails->satuan_harga = $brg->harga_pekerjaan;						                    
                    $modeldetails->save();                    
			endforeach;
            
            $loop = TblDetailpenawaran::find()
                    ->where(['idpenawaran'=>$model->idpenawaran])
                    ->all();
            foreach($loop as $loops):
                $temp_a = $loops->satuan_harga * $loops->quantity;
                $total += $temp_a;                
            endforeach;

            $update = TblPenawaran::find()
                    ->where(['idpenawaran'=>$model->idpenawaran])
                    ->One();
            $update->total_penawaran = $total;
            $update->save();
            
           return $this->redirect(['view', 'id' => $model->idpenawaran]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modeldetail' => (empty($modeldetail)) ? [new TblDetailpenawaran] : $modeldetail,
                'ask' =>$ask,
            ]);
        }
    }

    /**
     * Updates an existing TblPenawaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){
            $modeldetail = Model::createMultiple(TblDetailpenawaran::classname());
            $model->save();
            return $this->redirect(['view', 'id' => $model->idpenawaran]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modeldetail' => (empty($modeldetail)) ? [new TblDetailpenawaran] : $modeldetail,
            ]);
        }
    }

    /**
     * Deletes an existing TblPenawaran model.
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
     * Finds the TblPenawaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TblPenawaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPenawaran::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
