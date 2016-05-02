<?php

namespace backend\controllers;

use Yii;
use backend\models\SuratmasukArsip;
use backend\models\SuratmasukArsipSearch;
use backend\models\SuratmasukArsipDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SuratmasukArsipController implements the CRUD actions for SuratmasukArsip model.
 */
class SuratmasukArsipController extends Controller
{
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=> AccessControl::classname(),
                'only'=>['index'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all SuratmasukArsip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuratmasukArsipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratmasukArsip model.
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
     * Creates a new SuratmasukArsip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratmasukArsip();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', 'Data Berhasil Disimpan!');
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SuratmasukArsip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             \Yii::$app->getSession()->setFlash('success', 'Data Berhasil Disimpan!');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SuratmasukArsip model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    
    public function actionAddfile($id) {
        $searchModel = new SuratmasukArsipDetailSearch([
            'suratmasuk_arsip_id' => $id, // Tambahkan ini
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
             \Yii::$app->getSession()->setFlash('success', 'Data Berhasil Disimpan!');
            return $this->redirect(['surat-masuk/proses','id'=>$id]);
        } else {
            return $this->render('addfile', [
                        'model' => $model,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'model' => $this->findModel($id),
            ]);
        }
    }

    public function actionUnggah($id) {
        $model = $this->findModel($id);
        $modelsSuratmasukDocument = $model->suratmasukdocument;
        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            return $this->redirect(['surat-masuk/index']);
        } else {
            return $this->render('unggah', [
                        'model' => $model,
                        'modelsSuratmasukDocument' => $modelsSuratmasukDocument,
            ]);
        }
    }
    

    /**
     * Finds the SuratmasukArsip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SuratmasukArsip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratmasukArsip::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
