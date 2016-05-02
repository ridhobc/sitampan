<?php

namespace backend\controllers;

use Yii;
use backend\models\SuratmasukDocument;
use backend\models\SuratmasukDocumentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * SuratmasukDocumentController implements the CRUD actions for SuratmasukDocument model.
 */
class SuratmasukDocumentController extends Controller
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
     * Lists all SuratmasukDocument models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SuratmasukDocumentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SuratmasukDocument model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id,$suratmasuk_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id,$suratmasuk_id),
        ]);
    }

    /**
     * Creates a new SuratmasukDocument model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SuratmasukDocument();

        if ($model->load(Yii::$app->request->post())){
            // get file upload
            $filename = \yii\web\UploadedFile::getInstance($model, 'filename'); 
            if ($filename) {                
                // simpan ke folder backend/web/uploads/..
                $filename->saveAs('uploads/' . $filename->baseName . '.' . $filename->extension);
                // set field filename = nama file upload
                $model->filename = $filename->baseName . '.' . $filename->extension;
                $model->save();
                \Yii::$app->getSession()->setFlash('success', 'Upload data sukses!');
                return $this->redirect(['surat-masuk/proses', 'id' => $model->suratmasuk_id]);
            }
            else{
                \Yii::$app->getSession()->setFlash('error', 'Upload data gagal!');
                $this->refresh();
            }            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SuratmasukDocument model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();           
             
            return $this->redirect(['view', 'id' => $model->suratmasuk_id]);
            
           
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SuratmasukDocument model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
     public function actionDelete($id,$suratmasuk_id,$filename)
    {
        $this->findModel($id,$suratmasuk_id)->delete();
        \Yii::$app->getSession()->setFlash('danger', 'Hapus dokumen '.$filename.'  sukses!');
       unlink(getcwd().'/uploads/'.'/'.$filename);
//        unlink('uploads/');
        return $this->redirect(['surat-masuk/proses', 'id' => $suratmasuk_id]);
        
    }

    /**
     * Finds the SuratmasukDocument model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SuratmasukDocument the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SuratmasukDocument::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
