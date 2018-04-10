<?php

namespace api\controllers;

use Yii;
use common\models\PosisiNow;
use common\models\Motor;
use common\models\History;
use common\models\PosisiNowSearch;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Transaction;
use yii\db\Query;

/**
 * PosisiNowController implements the CRUD actions for PosisiNow model.
 */
class PosisiNowController extends Controller
{
    /**
     * Lists all PosisiNow models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PosisiNowSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $dataProvider->getModels();
    }

    /**
     * Displays a single PosisiNow model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->findModel($id);
    }

    /**
     * Creates a new PosisiNow model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PosisiNow();



        if ($model->load(Yii::$app->request->post(),'')){
            $request = Yii::$app->request;
            $model->lat = floatval($request->post('lat'));
            $model->longi = floatval($request->post('longi'));
            if($model->save()){
                return [
                    'success' => 1,
                    'message' => 'Synkronisasi berhasil'
                ];
            }else{
                return [
                    'success' => 0,
                    'message' => 'Synkronisasi tidak berhasil'
                ]; 
            }
        }
        return $model;
    }

    /**
     * Updates an existing PosisiNow model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   
        $response = [];
        // $model dan variabel lainya untuk menyimpan data sebelum terjadi update
        $model = $this->findModel($id);
        $lat_awal = $model->lat;
        $long_awal = $model->longi;
        $posisi_awal = $model->nama_posisi;

        $objekMotor = new Motor();
        $motor = $objekMotor::findById($id);
        $nama_motor = $motor->nama_motor;

        if($motor->status == '1'){
            return [
                'message' => 'Mesin Motor Menyala'
            ];
        }else{
            if ($model->load(Yii::$app->request->post(), '')) {
                if($model->save()){
                    // $model untuk menyimpan data setelah terjadi update
                    $model = $this->findModel($id);
                    // $distance 
                    $distance = $model::getDistance($lat_awal, $long_awal, $model->lat, $model->longi);
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('l, d-m-Y  h:i:s a'); 

                    $connection = Yii::$app->db;
                    $transaction = $connection->beginTransaction();
                    try{
                        $connection->createCommand()
                                    ->insert('tabel_history',[
                                        'id_plat'   => "$id",
                                        'lat_awal'  => $lat_awal,
                                        'long_awal' => $long_awal,
                                        'lat_akhir' => $model->lat,
                                        'long_akhir'=> $model->longi,
                                        'tanggal'   => "$tanggal",
                                        'jarak'     => $distance,
                                    ])
                                    ->execute();
                        $transaction->commit();
                    }catch (\Exception $e) {
                        $transaction->rollBack();
                        throw $e;
                    } catch (\Throwable $e) {
                        $transaction->rollBack();
                        throw $e;
                    }

                    $response = [
                        'id_plat' => $id,
                        'nama_motor' => $nama_motor,
                        'waktu'      => $tanggal,
                        'distance'   => $distance,
                        'message'    => "Motor berpindah ".$distance."m di ". $posisi_awal 
                    ];

                    return $response;

                } 
            }
            return $response;
        }
    }

    /**
     * Deletes an existing PosisiNow model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if($this->findModel($id)->delete()){
            return [
                'message' => 'Berhasil hapus posisi'
            ];
        }else{
            return [
                'message' => 'Gagal hapus posisi'
            ];
        }
    }

    /**
     * Finds the PosisiNow model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PosisiNow the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PosisiNow::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function getDistance($lat_a, $long_a, $lat_b, $long_b){
        $lat    = $lat_a - $lat_b;
        $long   = $long_a - $long_b;
        $result = sqrt($lat*$lat - $long*$long);
        $distance = floor($result);
        
        return $distance;

    }
}
