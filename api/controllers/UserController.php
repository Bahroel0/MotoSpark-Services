<?php

namespace api\controllers;
use Yii;
use common\models\User;
use common\models\UserSearch;
use yii\web\NotFoundHttpException;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use common\models\LoginForm;
use common\models\UserForm;
use yii\rest\Controller;
use yii\filters\VerbFilter;

class UserController extends Controller
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
                    'delete' => ['POST','DELETE'],
                ],
            ],
            'authenticator' => [
                'class' => CompositeAuth::className(),
                'authMethods' => [
                    HttpBearerAuth::className(),
                ],
                'only' => [
                    'view'
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $searchModel = new search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $dataProvider->getModels();
    }

    public function actionLogin(){
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) ) {
            // return $model;
            if($model->login()){
                $token = Yii::$app->getSecurity()->generateRandomString(25);
                $user = new User();
                $user = $user->findByEmail($model->email);
                $user->auth_key = $token;
                // return $user;
                if($user->update(false)){
                    return [
                        'message'  => 'Login sukses',
                        'id_user'  => $user->id_user,
                        'username' => $user->username,
                        'email'    => $user->email,
                        'user_pin' => $user->user_pin,
                        'success'  => 1,
                        'auth_key' => $token
                    ];   
                }
            }
        } else {
            return [
                'message' => 'Tidak sukses',
                'success' => 0
            ];
        }
    }

    // detail dari user menggunakan auth_key
    public function actionView(){
        return Yii::$app->user->identity;
    }

    public function actionCreate(){
        $form = new UserForm();
        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            $request = Yii::$app->request;
            $user = new User();
            $user->username    = $request->post('UserForm')['username'];
            $user->email       = $request->post('UserForm')['email'];
            $pass              = $request->post('UserForm')['password'];
            $user->password    = md5($pass);
            date_default_timezone_set('Asia/Jakarta');
            $user->create_at = date('l, d-m-Y  h:i:s a');
            if($user->save()) {
                return [
                    'message'  => 'Pembuatan akun berhasil',
                    'email'    => $user->email,
                    'username' => $user->username,
                    'success'  => 1
                ];
            }else{
                return [
                    'message' => 'Tidak success',
                    'success' => 0
                ];
            }
        }
    }


    public function actionMakepin(){
        $form = new UserForm();
        if ($form->load(Yii::$app->request->post())) {
            $request = Yii::$app->request;
            $email = $request->post('UserForm')['email'];
            $user = User::findByEmail($email);
            $user->user_pin = $request->post('UserForm')['user_pin'];
            if($user->save()) {
                return [
                    'message' => 'PIN berhasil terdaftarkan',
                    'success' => 1
                ];
            }else{
                return [
                    'message' => 'Tidak success',
                    'success' => 0
                ];
            }
        }
    }

    public function actionCheckpin(){
        $model = new UserForm();
        if ($model->load(Yii::$app->request->post())) {
            $request = Yii::$app->request;
            $email = $request->post('UserForm')['email'];
            $user = User::findByEmail($email);
            $pin = $request->post('UserForm')['user_pin'];
            if($user->user_pin == $pin) {
                return [
                    'username' => $user->username,
                    'email'    => $user->email,
                    'user_pin' => $user->user_pin,
                    'message' => 'PIN Benar',
                    'success' => 1
                ];
            }else{
                return [
                    'message' => 'PIN Salah',
                    'success' => 0
                ];
            }
        }
    }
}
