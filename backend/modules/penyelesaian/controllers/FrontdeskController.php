<?php

namespace backend\modules\penyelesaian\controllers;

use Yii;
use backend\models\Bcf15Penyelesaian;
use backend\modules\penyelesaian\models\Bcf15PenyelesaianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FrontdeskController implements the CRUD actions for Bcf15Penyelesaian model.
 */
class FrontdeskController extends Controller
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
     * Lists all Bcf15Penyelesaian models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Bcf15PenyelesaianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all Bcf15Penyelesaian models.
     * @return mixed
     */
    public function actionLengkap()
    {
        $searchModel = new Bcf15PenyelesaianSearch(['status_penyelesaian'=>'1']);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('lengkap', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all Bcf15Penyelesaian models.
     * @return mixed
     */
    public function actionLengkapTdk()
    {
        $searchModel = new Bcf15PenyelesaianSearch(['status_penyelesaian'=>'2']);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('lengkap-tdk', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bcf15Penyelesaian model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
         $model = $this->findModel($id);
         
        $searchModel = new \backend\modules\penyelesaian\models\Bcf15DetailSearch(['id'=>$model->bcf15_detail_id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('view', [
            'model' => $model,
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Bcf15Penyelesaian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bcf15Penyelesaian();

        if ($model->load(Yii::$app->request->post())){
            $model->tgl_masuk=date('Y-m-d H:i:s');
            $model->petugas_penerima_dok=\Yii::$app->user->identity->id;
            $model->nip_petugas_penerima=\Yii::$app->user->identity->nip;
            if($model->status_lengkap=='1'){
                $model->status_penyelesaian='1';
            }  
            else                
            {
                $model->status_penyelesaian='2';
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
     * Updates an existing Bcf15Penyelesaian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post())){
            
            if($model->status_lengkap=='1'){
                $model->status_penyelesaian='1';
                $model->tgl_terima_lengkap=date('Y-m-d h:i:s');
            }  
            else                
            {
                $model->status_penyelesaian='2';
                $model->tgl_dikembalikan=date('Y-m-d h:i:s');
            }
            $model->save();
            if($model->status_penyelesaian=='1'){
                \Yii::$app->getSession()->setFlash('warning', 'Permohonan telah lengkap ');
                return $this->redirect(['view', 'id' => $model->id]);
            }
            else{
                \Yii::$app->getSession()->setFlash('danger', 'Permohonan belum lengkap ');
                return $this->redirect(['uraian-kurang', 'id' => $model->id]);
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
     /**
     * Updates an existing Bcf15Penyelesaian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUraianKurang($id)
    {
        $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post())){
           
            $model->save();
             \Yii::$app->getSession()->setFlash('warning', 'Permohonan tidak lengkap ');
                return $this->redirect(['lengkap-tdk']);
                        
        } else {
            return $this->render('uraian-kurang', [
                'model' => $model,
            ]);
        }
    }
     /**
     * Updates an existing Bcf15Penyelesaian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionProses($id)
    {
        $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post())){
           
            $model->save();
             \Yii::$app->getSession()->setFlash('warning', 'Data berhasil disimpan');
                return $this->redirect(['lengkap-tdk']);
                        
        } else {
            return $this->render('proses', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Deletes an existing Bcf15Penyelesaian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bcf15Penyelesaian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Bcf15Penyelesaian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bcf15Penyelesaian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
