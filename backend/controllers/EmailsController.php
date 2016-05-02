<?php

namespace backend\controllers;

use Yii;
use backend\models\Emails;
use backend\models\EmailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmailsController implements the CRUD actions for Emails model.
 */
class EmailsController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Emails models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new EmailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Emails model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Emails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Emails();
                $message="<p>Email :".$model->receiver_email ."</p>";
                $message="<p>Name :".$model->receiver_name ."</p>";
                $message="<p>Subject :".$model->subject ."</p>";
                $message="<p>content :".$model->content ."</p>";
        if ($model->load(Yii::$app->request->post())) {
            $model->attachment = \yii\web\UploadedFile::getInstance($model, 'attachment');
            if ($model->attachment) {
                $time = time();
                $model->attachment->saveAs('attachments/' . $time . '.' . $model->attachment->extension);
                $model->attachment = 'attachments/' . $time . '.' . $model->attachment->extension;
            }
            if ($model->attachment) {
                
                $value = Yii::$app->mailer->compose("@app/mail/layouts/html", ["message"=>$message])
                        ->setFrom(['ridhobc@gmail.com' => 'Sub Bagian IP Sekretaris DJBC'])
                        ->setTo($model->receiver_email)
                        ->setSubject($model->subject)
                        ->setHtmlBody($model->content)
                        ->attach($model->attachment)
                        ->send();
            } else {
                $value = Yii::$app->mailer->compose("@app/mail/layouts/html", ["message"=>$message])
                        ->setFrom(['ridhobc@gmail.com' => 'Sub Bagian IP Sekretaris DJBC'])
                        ->setTo($model->receiver_email)
                        ->setSubject($model->subject)
                        ->setHtmlBody($model->content)
                        ->send();
            }
            if ($value) {
                Yii::$app->getSession()->setFlash('success', 'Check Your email!');
            } else {
                Yii::$app->getSession()->setFlash('warning', 'Failed, contact Admin!');
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Emails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Emails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Emails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Emails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Emails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
