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

        $modeldetail = [new TblDetailspk];
        
        $modeldetail = Model::createMultiple(TblDetailspk::classname());
        if ($model->load(Yii::$app->request->post()) && Model::loadMultiple($modeldetail, Yii::$app->request->post())){
            
            
             $model->save();

             foreach ($modeldetail as $key => $modeldetails):

                $modeldetails->save();
             endforeach;

            return $this->redirect(['view', 'id' => $model->idspk]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modeldetail' => (empty($modeldetail)) ? [new TblDetailspk] : $modeldetail,
            ]);
        }
    }

    /**
     * Updates an existing TblSpk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
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
                                            <input type='text' class='form-control' readonly='true' value='".ucfirst($model->tblRequest->nama_pekerjaan)."'>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset>
                            <div class='form-group'>
                                <div class='select'>
                                    <label class='col-md-2 col-form-label'>Total Penawaran</label>
                                    <div class='col-md-8'>
                                            <input type='text' class='form-control' readonly='true' value='".number_format($model->total_penawaran,0,".",".")."'>
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
