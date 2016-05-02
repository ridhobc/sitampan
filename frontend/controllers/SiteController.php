<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Komentar;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAbout() {
        return $this->render('about');
    }

//    public function actionSignup()
//    {
//        $model = new SignupForm();
//        if ($model->load(Yii::$app->request->post())) {
//            if ($user = $model->signup()) {
//                if (Yii::$app->getUser()->login($user)) {
//                    return $this->goHome();
//                }
//            }
//        }
//
//        return $this->render('signup', [
//            'model' => $model,
//        ]);
//    }

    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $email = \Yii::$app->mailer->compose()
                        ->setTo($user->email)
                        ->setFrom(['ridhobc@gmail.com'])
                        ->setSubject('Signup Confirmation')
                        ->setTextBody("
                        Click this link " . \yii\helpers\Html::a('confirm', Yii::$app->urlManager->createAbsoluteUrl(
                                                ['site/confirm', 'id' => $user->id, 'key' => $user->auth_key]
                                ))
                        )
                        ->send();
                if ($email) {
                    Yii::$app->getSession()->setFlash('success', 'Check Your email!');
                } else {
                    Yii::$app->getSession()->setFlash('warning', 'Failed, contact Admin!');
                }
                return $this->goHome();
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    public function actionConfirm($id, $key) {
        $user = \common\models\User::find()->where([
                    'id' => $id,
                    'auth_key' => $key,
                    'status' => 0,
                ])->one();
        if (!empty($user)) {
            $user->status = 10;
            $user->save();
            Yii::$app->getSession()->setFlash('success', 'Success!');
        } else {
            Yii::$app->getSession()->setFlash('warning', 'Failed!');
        }
        return $this->goHome();
    }

    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

    public function actionHelloword() {
        return "Hello word";
    }

    public function actionSay($target = 'World') {
        return $this->render('say', ['target' => $target]);
    }

    public function actionKomentar() {
        $model = new Komentar();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Komentar berhasil disimpan');
            } else {
                Yii::$app->session->setFlash('error', 'Ada yang error kaka');
            }
            return $this->refresh();
        } else {
            return $this->render('komentar', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLihatKomentar() {

        // Query untuk mendapatkan semua record
        $list_komentar = Komentar::find()->all();
        foreach ($list_komentar as $komentar) {
            echo $komentar->nama . " : " . $komentar->pesan . "<br>";
        }

        // Query untuk mendapatkan satu record
        $komentar = Komentar::find()->one();
        echo $komentar->nama . " : " . $komentar->pesan;

        // Query untuk mendapatkan jumlah record
        $count_komentar = Komentar::find()->count();
        echo $count_komentar;

        // Query menselect hanya field tertentu
        $list_komentar = Komentar::find()->select('pesan')->all();
        foreach ($list_komentar as $komentar) {
            echo $komentar->pesan . "<br>";
        }

        // Query untuk mendapatkan record menggunakan where
        $list_komentar = Komentar::find()->where(['nama' => 'budi'])->all();
        // dimana nama ada huruf e nya
        $list_komentar = Komentar::find()->where(['like', 'nama', 'e'])->all();
        // dimana pesan ada huruf e nya, dan nama = Elok
        $list_komentar = Komentar::find()
                        ->where(['like', 'pesan', 'i'])
                        ->andWhere(['nama' => 'elok'])->all();
        // Query sort record data 
        $list_komentar = Komentar::find()->orderBy('nama DESC')->all();
        // Query mengambil 2 record data 
        $list_komentar = Komentar::find()->limit(2)->all();

        // menghitung jumlah record
        foreach ($list_komentar as $komentar) {
            echo $komentar->nama . " : " . $komentar->pesan . "<br>";
        }
    }

}
