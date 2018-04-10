<?php

namespace api\controllers;

use Yii;
use common\models\Motor;
use common\models\search;
use common\models\MotorSearch;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MotorController implements the CRUD actions for Motor model.
 */
class MotorController extends Controller
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
                    // 'delete' => ['POST','DELETE'],
                    'delete' => ['GET']
                ],
            ],
        ];
    }

    /**
     * Lists all Motor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $dataProvider->getModels();
    }

    public function actionGetmotoruser($id_user){
        $searchModel = new MotorSearch();
        $dataProvider = $searchModel->search($id_user);

        return $dataProvider->getModels();
    }

    /**
     * Displays a single Motor model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $result = $this->findModel($id);
        $response = [
            'id_plat' => $result['id_plat'],
            'id_user' => $result['id_user'],
            'nama_motor' => $result['nama_motor'],
            'status'  => $result['status'],
            'tanggal_add' => $result['tanggal_add'],
            'foto'      => $result['foto']
        ];
        return $response;
    }

    /**
     * Creates a new Motor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Motor();

        if ($model->load(Yii::$app->request->post(), '')) {
            $model->imageFile = UploadedFile::getInstanceByName('imageFile');
            date_default_timezone_set('Asia/Jakarta');
            $model->tanggal_add = date('l, d-m-Y  h:i:s a');
            $model->status = '0';
            if($model->save()) {
                return $model;
            }
        }
        return $model;
    }

    /**
     * Updates an existing Motor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post(), '')) {
            $model->imageFile = UploadedFile::getInstanceByName('imageFile');
            date_default_timezone_set('Asia/Jakarta');
            $model->tanggal_add = date('l, d-m-Y  h:i:s a');

            if($model->save()){
                return $model;
            } 
        }
        return $model;
    }

    /**
     * Deletes an existing Motor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if($this->findModel($id)->delete()){
            return [
                'success'   => 1,
                'message'   =>  'Motor berhasil dihapus'
            ];
        }else{
            return [
                'success'   => 0,
                'message'   =>  'Hapus Tidak Berhasil'
            ];
        }

        
    }

    /**
     * Finds the Motor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Motor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Motor::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
