<?php

namespace backend\controllers;

use Yii;
use backend\models\Tanah;
use backend\models\TanahSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;
/**
 * TanahController implements the CRUD actions for Tanah model.
 */
class TanahController extends Controller
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
     * Lists all Tanah models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TanahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tanah model.
     * @param string $id
     * @return mixed
     */
//    public function actionView($id)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($id),
//        ]);
//    }
    
    public function actionView($id) {
        $model=$this->findModel($id);
 
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Saved record successfully');
//            // Multiple alerts can be set like below
//            Yii::$app->session->setFlash('warning', 'A last warning for completing all data.');
//            Yii::$app->session->setFlash('info', '<b>Note:</b> You can proceed by clicking <a href="#">this link</a>.');
            return $this->redirect(['view', 'id'=>$model->id]);
        } else {
            return $this->render('view', ['model'=>$model]);
        }
    }

    /**
     * Creates a new Tanah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if( Yii::$app->user->can('create-tanah') )
            {
            $model = new Tanah();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                 Yii::$app->session->setFlash('success', 'Saved record successfully');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->renderAjax('create', [
                    'model' => $model,
                ]);
            }
        }
        else 
            {
            throw new ForbiddenHttpException;
            }
        
    }

    /**
     * Updates an existing Tanah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
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
    
    public function actionSertifikat($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('sertifikat', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tanah model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    
    public function actionImport() {
        if (!empty($_FILES)) {
            $importFile = \yii\web\UploadedFile::getInstanceByName('importFile');
            $inputFileType = \PHPExcel_IOFactory::identify($importFile->tempName);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($importFile->tempName);
            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            $baseRow = 22;
            $i = 0;
            $row = $i + $baseRow;
            while (!empty($sheetData[$row]['A'])) {
                // get data via row dan colom
                $kd_upb = $sheetData[$row]['B'];
                $kd_brg = $sheetData[$row]['C'];
                $ur_brg = $sheetData[$row]['D'];
                $nup = $sheetData[$row]['E'];
                $luas = $sheetData[$row]['F'];
                $rt_rw = $sheetData[$row]['G'];
                $kel_desa = $sheetData[$row]['H'];
                $kecamatan = $sheetData[$row]['I'];
                $kota = $sheetData[$row]['J'];
                $prop = $sheetData[$row]['K'];
                $no_sertifikat = $sheetData[$row]['L'];
                $tglterbit_sertifikat = $sheetData[$row]['M'];
                $nama_sertifikat = $sheetData[$row]['N'];
                $sertifikat = $sheetData[$row]['O'];
                $an_pemri = $sheetData[$row]['P'];
                $status_sertifikat = $sheetData[$row]['Q'];
                $luas_sertifikat = $sheetData[$row]['R'];
                $perolehan_cara = $sheetData[$row]['S'];
                $perolehan_asal = $sheetData[$row]['T'];
                $perolehan_tgl = $sheetData[$row]['U'];
                $perolehan_nilai = $sheetData[$row]['V'];
                $keterangan = $sheetData[$row]['W'];



                // save database
                $model = new Tanah([
                    'kd_upb' => $kd_upb,
                    'kd_brg' => $kd_brg,
                    'ur_brg' => $ur_brg,
                    'nup' => $nup,
                    'luas' => $luas,
                    'rt_rw' => $rt_rw,
                    'kel_desa' => $kel_desa,
                    'kecamatan' => $kecamatan,
                    'kota' => $kota,
                    'prop' => $prop,
                    'no_sertifikat' => $no_sertifikat,
                    'tglterbit_sertifikat' => $tglterbit_sertifikat,
                    'nama_sertifikat' => $nama_sertifikat,
                    'sertifikat' => $sertifikat,
                    'an_pemri' => $an_pemri,
                    'status_sertifikat' => $status_sertifikat,
                    'luas_sertifikat' => $luas_sertifikat,
                    'perolehan_cara' => $perolehan_cara,
                    'perolehan_asal' => $perolehan_asal,
                    'perolehan_tgl' => $perolehan_tgl,
                    'perolehan_nilai' => $perolehan_nilai,
                    'keterangan' => $keterangan
                ]);
                $model->save();
                $i++;
                $row = $i + $baseRow;
            }
        }
        return $this->redirect(['index']);
    }
    
//    public function actionChart($year = ''){
//        if(empty($year)) $year = date('Y');
//        $model = Tanah::find()
//            ->select('MONTH(start) as bulan, COUNT(id) as jumlah')
//            ->where(['YEAR(start)'=>$year])
//            ->groupBy('MONTH(start)')
//            ->orderBy('MONTH(start) ASC')
//            ->asArray()
//            ->all();
//        $training_per_month = [0,0,0,0,0,0,0,0,0,0,0,0];  
//        foreach ($model as $value) {
//            $bulan = ((int) $value['bulan']) - 1;
//            $training_per_month[$bulan]=(int)$value['jumlah'];
//        }
//        return $this->render('chart', [
//            'year' => $year,
//            'training_per_month' => $training_per_month,
//        ]);
//    }
    
  public function actionChart(){
       return $this->render('chart');
    }
    
    /**
     * Finds the Tanah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Tanah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tanah::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
}
