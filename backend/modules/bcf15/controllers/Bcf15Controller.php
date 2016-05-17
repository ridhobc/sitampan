<?php

namespace backend\modules\bcf15\controllers;

use Yii;
use backend\models\Bcf15;
use backend\modules\bcf15\models\Bcf15Search;
use backend\modules\setting\models\IdentitasKantor;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * Bcf15Controller implements the CRUD actions for Bcf15 model.
 */
class Bcf15Controller extends Controller {

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
     * Lists all Bcf15 models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new Bcf15Search(['status_bcf15' => '1']);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Lists all Bcf15 models.
     * @return mixed
     */
    public function actionDashboard() {
//        $searchModel = new Bcf15Search(['status_bcf15' => '1']);
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('dashboard', [
//                    'searchModel' => $searchModel,
//                    'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Lists all BCF15 baru.
     * @return mixed
     */
    public function actionSuratPengantar() {
        $searchModel = new Bcf15Search([
            'status_bcf15' => 2,
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('surat-pengantar', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing Surat Pengantar model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSuratPengantarAdd($id) {
        $model = $this->findModel($id);
        $date = date('y-m-d');
        if ($model->load(Yii::$app->request->post())) {
            $model->sp = '1';
            $model->status_bcf15 = '2'; //status siap kirim ke pabean
            $model->save();

            \Yii::$app->getSession()->setFlash('success', 'Surat Pengantar Berhasil disimpan');
            return $this->redirect(['surat-pengantar']);
        } else {
            return $this->render('surat-pengantar-add', [
                        'model' => $model,
            ]);
        }
    }

    public function actionSuratPengantarUpdate($id) {
        $model = $this->findModel($id);
        $date = date('y-m-d');
        if ($model->load(Yii::$app->request->post())) {
            $model->sp = '1';
            $model->status_bcf15 = '2'; //status siap kirim ke pabean
            $model->save();

            \Yii::$app->getSession()->setFlash('success', 'Surat Pengantar Berhasil diubah');
            return $this->redirect(['surat-pengantar']);
        } else {
            return $this->render('surat-pengantar-update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays a single Bcf15 model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bcf15 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//{
//     $model = new Bcf15();
//        $year = date('Y');
//    if($model->load(Yii::$app->request->post())){
//        $transaction = Yii::$app->db->beginTransaction();
//        try{
//            $model->bcf15Details = Yii::$app->request->post('Bcf15Detail',[]);
//            if($model->save()){
//                $transaction->commit();
//                return $this->redirect(['view','id'=>$model->id]);
//            }else{
//                $transaction->rollback();
//            }
//        }catch(Exception $e){
//            $transaction->rollback();
//            throw $e;
//        }
//    }
//    return $this->render('create',['model'=>$model]);
//}
    public function actionCreate() {
        $year = date('Y');
        $model = new Bcf15();

        if ($model->load(Yii::$app->request->post())) {

            $model->tahun = $year;
            $model->save();
            //di simpan dulu kemudian di update nomor suratnya dari format 0000/BCF1.5/YYYY menjadi 0000/BCF1.5/I/YYYY
            if ($model->save()) {
                $bcf15 = Bcf15::findOne($model->id);
                $bcf15no_unik = explode('/', $bcf15->bcf15no);
                $bcf15tgl_unik = explode('-', $bcf15->bcf15tgl);
                $romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];
//                  $bulan = $romawi[date('n')-1];                 
                $bulan = $romawi[$bcf15tgl_unik[1] - 1];
                $bcf15->bcf15no = $bcf15no_unik[0] . '/' . $bcf15no_unik[1] . '/' . $bulan . '/' . $bcf15no_unik[2];
                $bcf15->save();
                \Yii::$app->getSession()->setFlash('success', 'Data Berhasil Disimpan!');
                return $this->redirect(['bcf15-detail/tambahbc11', 'id' => $model->id]);
            }
        } else {
            return $this->renderAjax('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bcf15 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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
     * Deletes an existing Bcf15 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionCetakBcf15($id) {
        $model = $this->findModel($id);

        $modelDetailBcf15 = (new \yii\db\Query())
                ->select(['bd.id', 'bcf15_id', 'bc11no', 'bc11tgl', 'bc11pos', 'bc11subpos', 'nama_sarkut', 'jumlah_brg',
                    'satuan_brg', 'uraian_brg', 'berat_brg', 'consignee', 'alamat_consignee',
                    'kota_consignee', 'tps_id', 'namatps', 'tgl_timbun','total_cont'
                ])
                ->from('bcf15_detail bd')
                ->join('JOIN', 'tps ts', 'ts.id = bd.tps_id')
                ->where(['bcf15_id' => $id])
                ->all();

        $modelPenandatangan = (new \yii\db\Query())
                ->select(['bd.id', 'jabatan', 'namapejabat', 'nippejabat', 'ts.id', 'penandatangan_id'
                ])
                ->from('bcf15 bd')
                ->join('JOIN', 'penandatangan ts', 'bd.penandatangan_id = ts.id')
                ->where(['bd.id' => $id])
                ->all();

        $content = $this->renderPartial('cetakbcf15pdf', [

            'modelDetailBcf15' => $modelDetailBcf15,
            'model' => $model,
            'modelPenandatangan' => $modelPenandatangan,
//            'user' => $user,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:5px}',
            'options' => [
                'title' => 'Cetak BCF 1.5'
            ],
            'filename' => $model->bcf15no . '.pdf',
            'methods' => [
                'SetHeader' => [''],
//                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    public function actionCetaksp($id) {
        
        $modelindetitas = IdentitasKantor::find()
                ->where(['id' => 1])
                ->one();
        $model = $this->findModel($id);

        $modelDetailBcf15 = (new \yii\db\Query())
                ->select(['bd.id', 'bcf15_id', 'bc11no', 'bc11tgl', 'bc11pos', 'bc11subpos', 'nama_sarkut', 'jumlah_brg',
                    'satuan_brg', 'uraian_brg', 'berat_brg', 'consignee', 'alamat_consignee',
                    'kota_consignee', 'tps_id', 'namatps', 'tgl_timbun','total_cont'
                ])
                ->from('bcf15_detail bd')
                ->join('JOIN', 'tps ts', 'ts.id = bd.tps_id')
                ->where(['bcf15_id' => $id])
                ->all();

        $modelPenandatangan = (new \yii\db\Query())
                ->select(['bd.id', 'jabatan', 'namapejabat', 'nippejabat', 'ts.id', 'penandatangan_id'
                ])
                ->from('bcf15 bd')
                ->join('JOIN', 'penandatangan ts', 'bd.pejabat_sp = ts.id')
                ->where(['bd.id' => $id])
                ->all();

        $content = $this->renderPartial('cetaksppdf', [

            'modelDetailBcf15' => $modelDetailBcf15,
            'model' => $model,
            'modelPenandatangan' => $modelPenandatangan,
            'modelindetitas' => $modelindetitas,
//            'user' => $user,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'marginTop'=> '5mm',
            'marginBottom'=> '5mm',
            
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:5px}',
            'options' => [
                'title' => 'Cetak Surat Pengantar'
            ],
            'filename' => $model->bcf15no . '.pdf',
            'methods' => [
                'SetHeader' => [''],
//                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }
    
     /**
     * Untuk kirim ke pabean
     * @return Ridwan Nento
     */
    public function actionKirim($id) {
        $model = Bcf15::findOne($id);
        $model->status_bcf15 = '3'; 
        $model->nama_kirim_sp =  \Yii::$app->user->identity->name;  
        $model->tgl_kirim_sp = date('Y-m-d H:i:s');
        $model->save();
        \Yii::$app->getSession()->setFlash('danger', 'SP Nomor '. $model->no_sp .' telah dikirim!');
        return $this->redirect(['surat-pengantar']);
    }

    public function actionBatalkirim($id) {
        $model = Bcf15::findOne($id);
        $model->status_bcf15 = '2';        
        $model->save();
        \Yii::$app->getSession()->setFlash('success', 'SP Nomor  '. $model->no_sp .' BATAL dikirim!!');
        return $this->redirect(['surat-pengantar']);
    }
    /**
     * Finds the Bcf15 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bcf15 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Bcf15::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
