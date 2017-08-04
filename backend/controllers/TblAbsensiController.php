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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idabsensi]);
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
            foreach($model as $models):
                $loop .= '<tr>';
                $loop .= '<td>'.$models->userForm->username.'</td>';
                $loop .= '<td>'.$models->userForm->name.'</td>';
                $loop .= '<td>Oud-Turnhout</td>';
                $loop .= '<td class="text-primary">$36,738</td>';
                $loop .= '<td class="text-primary">'.date('Y-m-d').'</td>';
                $loop .= '<td class="text-primary"><select name="keterangan[]"><option value="1">Masuk</option><option value="2">Tidak Masuk</option><option value="3">Digantikan</option></td>';
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
                    </tr>
                </thead>
                <tbody>
                    '.$loop.'
                    
                </tbody>
            </table>
            <br/>
            <hr/><br/>';
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
