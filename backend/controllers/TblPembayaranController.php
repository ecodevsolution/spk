<?php

namespace backend\controllers;

use Yii;
use backend\models\TblPembayaran;
use backend\models\TblSpk;
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
            
            
            $model->save();
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
                                            <input type='text' class='form-control'id='total' readonly='true' value='".number_format($model->harga_pekerjaan,0,".",".")."'>
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
