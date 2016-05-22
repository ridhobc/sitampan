<?php

namespace backend\modules\penarikan\controllers;

use Yii;
use backend\models\Bcf15Detail;
use backend\modules\penarikan\models\Bcf15DetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HanggarController implements the CRUD actions for Bcf15Detail model.
 */
class HanggarController extends Controller
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
     * Lists all Bcf15Detail models.
     * @return mixed
     */
    public function actionIndex()
    {
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
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bcf15Detail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bcf15Detail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bcf15Detail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing Bcf15Detail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    //-------------------------------------------HANGGAR TPP--------------------------------------------//
    public function actionStillInTps() {
       $searchModel = new \backend\modules\penarikan\models\Bcf15DetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('still-in-tps', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
    }
    
    public function actionInputba($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())){
            
            $model->masuk_tpp='1';
            $model->save();
        
            \Yii::$app->getSession()->setFlash('info', 'BCF 1.5 nomor ' . $model->bcf15->bcf15no . ' telah di pindahkan pada TPP ' . $model->tpp->namatpp . '!');
            return $this->redirect(['still-in-tps']);
        } else {
            return $this->render('inputba', [
                        'model' => $model,
                    ]);
        }
    }

    /**
     * Finds the Bcf15Detail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bcf15Detail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bcf15Detail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
