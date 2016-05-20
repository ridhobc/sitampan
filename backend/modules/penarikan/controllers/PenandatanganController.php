<?php

namespace backend\modules\penarikan\controllers;

use Yii;
use backend\models\Penandatangan;
use backend\modules\penarikan\models\PenandatanganSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PenandatanganController implements the CRUD actions for Penandatangan model.
 */
class PenandatanganController extends Controller
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
     * Lists all Penandatangan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenandatanganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Penandatangan model.
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
     * Creates a new Penandatangan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Penandatangan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionCreatekakantor()
    {
        $model = new Penandatangan();
        if ($model->load(Yii::$app->request->post())) {            
            $model->category='5';
            $model->save();         
            return $this->redirect(['skep-penetapan-bcf15/create']);
        } else {
            return $this->render('createkakantor', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionCreateseksitarik()
    {
        $model = new Penandatangan();
        if ($model->load(Yii::$app->request->post())) {            
            $model->category='2';
            $model->save();         
            return $this->redirect(['pemindahan-bcf15/create']);
        } else {
            return $this->render('createseksitarik', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionCreateseksipenetapan()
    {
        
        $model = new Penandatangan();
        if ($model->load(Yii::$app->request->post())) {            
            $model->category='2';
            $model->save();         
            return $this->redirect(['penandatangan/index']);
        } else {
            return $this->render('createseksipenetapan', [
                'model' => $model,
            ]);
        }
    }
    
   


    /**
     * Updates an existing Penandatangan model.
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
    
    public function actionUpdatekakantor($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('updatekakantor', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Penandatangan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Penandatangan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Penandatangan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penandatangan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
