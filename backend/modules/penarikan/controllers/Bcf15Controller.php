<?php

namespace backend\modules\penarikan\controllers;

use Yii;
use backend\models\Bcf15;
use backend\modules\penarikan\models\Bcf15Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Bcf15Controller implements the CRUD actions for Bcf15 model.
 */
class Bcf15Controller extends Controller
{
    public function behaviors()
    {
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
     * Lists all Bcf15 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Bcf15Search([]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionPemindahan() {
        $searchModel = new \backend\modules\bcf15\models\Bcf15Search(
         [ 'status_bcf15' => 5,]
                );
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //Recently added student list             
        

        return $this->render('pemindahan', [
                   
            'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bcf15 model.
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
     * Displays a export ke word skep penetapan.
     * @param integer $id
     * @return mixed
     */
    public function actionExportSkepWord($id)
    {
       
        $searchModel = new \backend\modules\bcf15\models\Bcf15DetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $OpenTBS = new \hscstudio\export\OpenTBS;
        $template = \Yii::getAlias('@backend/modules/penarikan/views/bcf15').'/_skep_export.docx';
        
        $OpenTBS->LoadTemplate($template);
        
        $data=[];
        $no=1;
        foreach($dataProvider->getModels() as $skep){
            $data[]=[
                'no'=>$no++,
                'bc11no'=>$skep->bc11no,
                'bc11tgl'=>$skep->bc11tgl,
            ];
        }
        $OpenTBS->MergeBlock('data',$data);
        $OpenTBS->Show(OPENTBS_DOWNLOAD,'_skep_export.docx');
        exit;
        
    }
    
    public function actionPenetapan() {
        
        $searchModel = new \backend\modules\penarikan\models\SkepPenetapanBcf15Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('penetapan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Creates a new Bcf15 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSkepcreate()
    {
        $model = new \backend\models\SkepPenetapanBcf15();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('skepcreate', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Menerima BCF 1.5
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTerimabcf15($id) {
        $model = Bcf15::findOne($id);
        $model->status_bcf15 = '4';   
        $model->nama_terima_sp =  \Yii::$app->user->identity->name;  
        $model->tgl_terima_sp = date('Y-m-d H:i:s');
        $model->save();
        \Yii::$app->getSession()->setFlash('info', 'BCF 1.5 nomor '. $model->bcf15no .' telah diterima!');
        return $this->redirect(['index']);
    }
    
    /**
     * tambah detail skep 
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
     public function actionTbhdetailkep($id,$idsk) {
        $model = Bcf15::findOne($id);
        $model->skep_penetapan_bcf15_id = $idsk;
        $model->status_bcf15 = 5;
       
        $model->save();
        \Yii::$app->getSession()->setFlash('success', 'BCF 1.5 nomor '. $model->bcf15no .' telah ditambahkan ke Skep!');
        return $this->redirect(['skep-penetapan-bcf15/update', 'id' => $idsk]);
    }
    
    public function actionBtldetailkep($id,$idsk) {
        $model = Bcf15::findOne($id);
        $model->skep_penetapan_bcf15_id = '';
        $model->status_bcf15 = 4;
       
        $model->save();
        \Yii::$app->getSession()->setFlash('warning', 'BCF 1.5 nomor '. $model->bcf15no .' telah dihapus dari Skep!');
        return $this->redirect(['skep-penetapan-bcf15/update', 'id' => $idsk]);
    }
    
    

    
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
     * Deletes an existing Bcf15 model.
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
     * Finds the Bcf15 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bcf15 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bcf15::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
