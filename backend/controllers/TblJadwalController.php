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
use backend\models\Model;
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
        $modeldetail = [new TblDetailJadwal];

         $modeldetail = Model::createMultiple(TblDetailJadwal::classname());
        if ($model->load(Yii::$app->request->post()) && Model::loadMultiple($modeldetail, Yii::$app->request->post())){
            
            $model->save();
            $model->status_jadwal = 'ON GOING';
             foreach ($modeldetail as $key => $modeldetails):
                $modeldetails->idjadwal = $model->idjadwal;                						                    
                $modeldetails->save();                    
			endforeach;

            return $this->redirect(['view', 'id' => $model->idjadwal]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modeldetail' => (empty($modeldetail)) ? [new TblDetailjadwal] : $modeldetail,
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
                        </fieldset>
                        
                        <fieldset>
                            <div class='form-group'>
                                <div class='select'>
                                    <label class='col-md-2 col-form-label'>Total Biaya</label>
                                    <div class='col-md-8'>
                                         <div class='form-group'>
                                            <input type='text' class='form-control' readonly='true' value='".number_format($model->harga_pekerjaan,0,",",",")."'>
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
