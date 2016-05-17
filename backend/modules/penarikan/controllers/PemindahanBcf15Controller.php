<?php

namespace backend\modules\penarikan\controllers;

use Yii;
use backend\models\Bcf15Detail;
use backend\models\Bcf15SuratPemindahan;
use backend\modules\penarikan\models\Bcf15DetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PemindahanBcf15Controller implements the CRUD actions for Bcf15Detail model.
 */
class PemindahanBcf15Controller extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all Bcf15Detail models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new Bcf15DetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
    }

    /**
     * Displays a single Bcf15Detail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
                ]);
    }

    /**
     * Creates a new Bcf15Detail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    

    public function actionEdittpp($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('info', 'BCF 1.5 nomor ' . $model->bcf15->bcf15no . ' telah di tetapkan pada TPP ' . $model->tpp->namatpp . '!');
            return $this->redirect(['index']);
        } else {
            return $this->render('edittpp', [
                        'model' => $model,
                    ]);
        }
    }

    /**
     * Deletes an existing Bcf15Detail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bcf15Detail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bcf15Detail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Bcf15Detail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
