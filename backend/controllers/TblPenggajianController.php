<?php

namespace backend\controllers;

use Yii;
use backend\models\TblPenggajian;
use backend\models\TblPenggajianSearch;
use backend\models\TblAbsensi;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\TblJadwal;

/**
 * TblPenggajianController implements the CRUD actions for TblPenggajian model.
 */
class TblPenggajianController extends Controller
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
     * Lists all TblPenggajian models.
     * @return mixed
     */
    public function actionIndex()
    {
       $model = TblAbsensi::find()
                ->JoinWith('tblSpk')
                ->groupBy('idspk')
                ->All();

        return $this->render('index', [
            'model' => $model            
        ]);
    }

    /**
     * Displays a single TblPenggajian model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDetail($id){
        $model = TblAbsensi::find()
                ->joinWith('tblSpk')                
                ->where(['tbl_spk.idspk'=>$id])
                ->One();

         return $this->render('detail',[
             'model'=>$model
         ]);        
    }

    public function actionRiwayat(){

       $model = TblAbsensi::find()
                ->JoinWith('tblSpk')
                ->groupBy('idspk')
                ->All();

        return $this->render('riwayat', [
            'model' => $model            
        ]);

    }

    public function actionGetdata()
    {
      
      $model = TblAbsensi::find()
                ->JoinWith('tblSpk')
                ->groupBy('idspk')                
                ->Where(['between','tgl_mulai',date('Y-m-d',strtotime($_POST['tgl_awal'])), date('Y-m-d',strtotime($_POST['tgl_akhir']))])            
                ->orWhere(['between','tgl_selesai',date('Y-m-d',strtotime($_POST['tgl_awal'])), date('Y-m-d',strtotime($_POST['tgl_akhir']))])            
                ->all();
        
        if(!empty($model)){
            foreach($model as $models):                  
                $jadwal = TblJadwal::find()
                        ->where(['idspk'=>$models->idspk])
                        ->One();

                echo '<tr>';
                    echo '<td>'.$models->idspk.'</td>';
                    echo '<td>'.$models->tblSpk->area_pekerjaan.'</td>';
                    echo '<td>'.$models->tblSpk->tgl_mulai.'</td>';                    
                    echo '<td>'.$models->tblSpk->tgl_selesai.'</td>';                                        
                    echo '<td>'.$jadwal->status_jadwal.'</td>';                                                            
                    echo '<td><a href="?r=tbl-penggajian/detail&id='.$models->idspk.'"><i class="fa fa-pencil"></i></a></td>';
                echo '</tr>';        
            endforeach;
        }else{
            echo '<tr><td colspan="6">No data(s) found...</td></tr>';            
        }
    }

    /**
     * Creates a new TblPenggajian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblPenggajian();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idgaji]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblPenggajian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idgaji]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Deletes an existing TblPenggajian model.
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
     * Finds the TblPenggajian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPenggajian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblPenggajian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
