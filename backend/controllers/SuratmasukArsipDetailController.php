<?php

namespace backend\controllers;

use Yii;
use backend\models\SuratmasukArsipDetail;
use backend\models\SuratmasukArsipDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * SuratmasukArsipDetailController implements the CRUD actions for SuratmasukArsipDetail model.
 */
class SuratmasukArsipDetailController extends Controller {

    public function behaviors() {
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
     * Lists all SuratmasukArsipDetail models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SuratmasukArsipDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratmasukArsipDetail model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SuratmasukArsipDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id) {
        $model = new SuratmasukArsipDetail();

        if ($model->load(Yii::$app->request->post())) {
            $model->suratmasuk_arsip_id = $id;
            $model->save();
            \Yii::$app->getSession()->setFlash('success', 'Tambah File  Arsip surat ' .$model->arsip->no_surat. ' agenda IP nomor ' .$model->arsip->agenda_ip. ' sukses!');
            return $this->redirect(['suratmasuk-arsip/addfile', 'id' => $id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SuratmasukArsipDetail model.
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
     * Deletes an existing SuratmasukArsipDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id,$suratmasuk_arsip_id) {
        $this->findModel($id)->delete();
        \Yii::$app->getSession()->setFlash('danger', 'File arsip berhasil dihapus dari batch');
        return $this->redirect(['suratmasuk-arsip/addfile', 'id' => $suratmasuk_arsip_id]);
    }

    /**
     * Finds the SuratmasukArsipDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SuratmasukArsipDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SuratmasukArsipDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
