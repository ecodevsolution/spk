<?php

namespace backend\controllers;

use Yii;
use backend\models\TblAbsensi;
use backend\models\TblAbsensiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\TblDetailspk;
use backend\models\TblSpk;


/**
 * TblAbsensiController implements the CRUD actions for TblAbsensi model.
 */
class TblAbsensiController extends Controller
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
     * Lists all TblAbsensi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblAbsensiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblAbsensi model.
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
     * Creates a new TblAbsensi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblAbsensi();

        if (isset($_POST['spk'])){
            
             $absent = TblAbsensi::find()
                    ->where(['idspk'=>$_POST['spk']])
                    ->count();
            if($absent <= 0){                
                //var_dump($_POST['spk']);
                foreach($_POST['hours_in'] as $key => $hours_ins):
                    //$time_in = $hours_ins[$key];
                    var_dump($hours_ins);
                endforeach;
            }
            //$model->save();
            //return $this->redirect(['view', 'id' => $model->idabsensi]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblAbsensi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idabsensi]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblAbsensi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionListAbsensi($id){

        $loop = '';
        global $verifikasi;
        $model = TblDetailspk::find()
                ->JoinWith('userForm')
                ->where(['idspk'=>$id])
                ->all();
        
        $date = date('Y-m-d');
        $spk = TblSpk::find()
                ->where(['idspk'=>$id])
                ->AndWhere(['<=','tgl_mulai',$date])
                ->AndWhere(['>=','tgl_selesai',$date])
                ->count();
        if($spk > 0){

            $hours_in = '';
            $hours_in .= '<select name="hours_in[]">';
            for($i = 1 ; $i <= 24; $i++){
                $hours_in .= '<option value='.$i.'>'.$i.'</option>';
            }
            $hours_in .= '</select>';
            
            $minute_in = '';
            $minute_in .=  '<select name="minute_in[]">';
            for($i = 0 ; $i <= 60; $i++){
                if($i < 10){
                    $i = '0'.$i;
                }
                $minute_in .= '<option value='.$i.'>'.$i.'</option>';
            }
            $minute_in .= '</select>';


            $hours_out = '';
            $hours_out .= '<select name="hours_out[]">';
            for($i = 1 ; $i <= 24; $i++){
                $hours_out .= '<option value='.$i.'>'.$i.'</option>';
            }
            $hours_out .= '</select>';
            
            $minute_out = '';
            $minute_out .=  '<select name="minute_out[]">';
            for($i = 0 ; $i <= 60; $i++){
                if($i < 10){
                    $i = '0'.$i;
                }
                $minute_out .= '<option value='.$i.'>'.$i.'</option>';
            }
            $minute_out .= '</select>';



            $absent = TblAbsensi::find()
                    ->where(['idspk'=>$id])
                    ->count();
            
            $verifikasi = '';

            if($absent <= 0){
                $minute_out ='';
                $hours_out = '';

                 $verifikasi .= '<fieldset>';
                    $verifikasi .= '<div class="form-group row">';
                        $verifikasi .= '<label class="col-md-2 col-form-label">Verifikasi 1</label>';
                        $verifikasi .= '<div class="col-md-8">';
                             $verifikasi .= '<input type="text" class="form-control" name="verifikasi1" >';
                        $verifikasi .= '</div>';
                    $verifikasi .= '</div>';
                 $verifikasi .= '</fieldset>';
               
            }else{

                $verifikasi .= '<fieldset>';
                    $verifikasi .= '<div class="form-group row">';
                        $verifikasi .= '<label class="col-md-2 col-form-label">Verifikasi 2</label>';
                        $verifikasi .= '<div class="col-md-8">';
                             $verifikasi .= '<input type="text" class="form-control" name="verifikasi2" >';
                        $verifikasi .= '</div>';
                    $verifikasi .= '</div>';
                 $verifikasi .= '</fieldset>';
            }

            
             $connection = \Yii::$app->db;
             $sql = $connection->createCommand("SELECT * FROM `user` WHERE id NOT IN (SELECT DISTINCT b.idpegawai FROM tbl_spk a join tbl_detailspk b ON a.idspk = b.idspk WHERE DATE(NOW()) <=  a.tgl_selesai) AND idrole <> 2");
             $modelx = $sql->queryAll();

             $pengganti = '';
             $pengganti .= '<select name="sub[]">';
             foreach($modelx as $modelxs):
                $pengganti .= '<option value='.$modelxs['idpegawai'].'>'.$modelxs['username'].'-'.$modelxs['name'].'</option>';
             endforeach;
             $pengganti .= '</select>';

            foreach($model as $models):
                $loop .= '<tr>';
                $loop .= '<td>'.$models->userForm->username.'</td>';
                $loop .= '<td>'.$models->userForm->name.'</td>';
                $loop .= '<td>'.$hours_in.' '.$minute_in.'</td>';
                $loop .= '<td class="text-primary">'.$hours_out.' '.$minute_out.'</td>';
                $loop .= '<td class="text-primary">'.date('d M Y').'</td>';
                $loop .= '<td class="text-primary"><select name="keterangan[]"><option value="1">Masuk</option><option value="2">Tidak Masuk</option><option value="3">Digantikan</option></td>';
                $loop .= '<td class="text-primary">'.$pengganti.'</td>';
                $loop .= '<tr>';
            endforeach;
        }else{
            $loop='Tidak ada data pegawai masuk';
        }        

        echo '<table class="table">
                <thead class="text-primary">
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>tanggal</th>
                        <th>Keterangan</th>
                        <th>Pengganti</th>
                    </tr>
                </thead>
                <tbody>
                    '.$loop.'
                    
                </tbody>
            </table>
            <br/>
            <hr/><br/>
            <input type="hidden" name="spk" value='.$id.' />
            
            '.$verifikasi.'
           
            ';
    }

    /**
     * Finds the TblAbsensi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblAbsensi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblAbsensi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
