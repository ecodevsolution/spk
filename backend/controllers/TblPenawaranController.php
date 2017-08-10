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
