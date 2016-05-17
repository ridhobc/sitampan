<?php

namespace backend\modules\penarikan\controllers;

use Yii;
use backend\models\SkepPenetapanBcf15;
use backend\modules\penarikan\models\SkepPenetapanBcf15Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
/**
 * SkepPenetapanBcf15Controller implements the CRUD actions for SkepPenetapanBcf15 model.
 */
class SkepPenetapanBcf15Controller extends Controller
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
     * Lists all SkepPenetapanBcf15 models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SkepPenetapanBcf15Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SkepPenetapanBcf15 model.
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
     * Creates a new SkepPenetapanBcf15 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SkepPenetapanBcf15();
         //detail yang sudah konek idnya
        $searchModeldet = new \backend\modules\penarikan\models\Bcf15Search(['status_bcf15'=>5, 'skep_penetapan_bcf15_id'=>'0']);
        $dataProviderdet = $searchModeldet->search(Yii::$app->request->queryParams);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                 'searchModeldet' => $searchModeldet,
            'dataProviderdet' => $dataProviderdet,
            ]);
        }
    }
    
    
    /**
     * Updates an existing SkepPenetapanBcf15 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //detail yang sudah konek idnya
        $searchModeldet = new \backend\modules\penarikan\models\Bcf15Search(['skep_penetapan_bcf15_id'=>$model->id]);
        $dataProviderdet = $searchModeldet->search(Yii::$app->request->queryParams);
        
        //detail yang belum konek mau ditambahkan
        $searchModel = new \backend\modules\penarikan\models\Bcf15Search(['status_bcf15'=>4]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
                'searchModeldet' => $searchModeldet,
            'dataProviderdet' => $dataProviderdet,
            ]);
        }
    }
    
    public function actionTbharchive($id) {
        $model = SkepPenetapanBcf15::findOne($id);       
        $model->status_skep = arsip;       
        $model->save();
        \Yii::$app->getSession()->setFlash('success', 'Skep nomor '. $model->skep_no .' telah diarsipkan!');
        return $this->redirect(['bcf15/penetapan']);
    }
    
    public function actionBtlarchive($id) {
        $model = SkepPenetapanBcf15::findOne($id);        
        $model->status_skep = konsep;       
        $model->save();
         \Yii::$app->getSession()->setFlash('warning', 'Skep nomor '. $model->skep_no .' berstatus konsep');
        return $this->redirect(['bcf15/penetapan']);
    }

    /**
     * Deletes an existing SkepPenetapanBcf15 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)    {
        $this->findModel($id)->delete();
        return $this->redirect(['bcf15/penetapan']);
    }
    
    /**
     * Displays a export ke word skep penetapan.
     * @param integer $id
     * @return mixed
     */
    public function actionExportSkepWord($id)
    {
         function bulan($bln) {
            $bulan = $bln;
            Switch ($bulan) {
                case 1 : $bulan = "Januari";
                    Break;
                case 2 : $bulan = "Februari";
                    Break;
                case 3 : $bulan = "Maret";
                    Break;
                case 4 : $bulan = "April";
                    Break;
                case 5 : $bulan = "Mei";
                    Break;
                case 6 : $bulan = "Juni";
                    Break;
                case 7 : $bulan = "Juli";
                    Break;
                case 8 : $bulan = "Agustus";
                    Break;
                case 9 : $bulan = "September";
                    Break;
                case 10 : $bulan = "Oktober";
                    Break;
                case 11 : $bulan = "November";
                    Break;
                case 12 : $bulan = "Desember";
                    Break;
            }
            return $bulan;
        }
        $identitaskantor = \backend\modules\setting\models\IdentitasKantor::findOne(1);
        
        $surat = SkepPenetapanBcf15::findOne($id);
        $tgl = explode("-", $surat->skep_tgl);
        $tahun = $tgl[0];
        $bulan = bulan(date($tgl[1]));
        $suratttd = \backend\models\Penandatangan::findOne(['id' => $surat->kepala_kantor]);
         $tps = \backend\modules\setting\models\Tps::findOne(['id' => $surat->tps_id]);
       
         $kasittd = \backend\models\Penandatangan::findOne(['id' => $surat->kepala_seksi]);
          
        $searchModelBcf = new \backend\modules\penarikan\models\Bcf15Search(['skep_penetapan_bcf15_id'=>$id]);
        $dataProviderBcf = $searchModelBcf->search(Yii::$app->request->queryParams);
        
        $OpenTBS = new \hscstudio\export\OpenTBS;
        $template = \Yii::getAlias('@backend/modules/penarikan/views/skep-penetapan-bcf15').'/_skep_export.docx';
        
        $OpenTBS->LoadTemplate($template);
        $OpenTBS->VarRef['kementerian'] = $identitaskantor->kementerian;
        $OpenTBS->VarRef['eseloni'] = $identitaskantor->eseloni;
        $OpenTBS->VarRef['kanwil'] = $identitaskantor->kanwil;
        $OpenTBS->VarRef['kppbc'] = $identitaskantor->kppbc;
        $OpenTBS->VarRef['kppbckec'] = ucwords(strtolower($identitaskantor->kppbc));
        $OpenTBS->VarRef['alamat1'] = $identitaskantor->alamat1;
        $OpenTBS->VarRef['alamat2'] = $identitaskantor->alamat2;
        
        $OpenTBS->VarRef['skep_no'] = $surat->skep_no;
        $OpenTBS->VarRef['skep_tgl'] = $surat->skep_tgl;
        $OpenTBS->VarRef['bcf15'] = $surat->daftar_bcf15;
        $OpenTBS->VarRef['sp'] = $surat->daftar_sp;
        $OpenTBS->VarRef['bulan'] = $bulan;
        $OpenTBS->VarRef['tahun'] = $tahun;
        
        $OpenTBS->VarRef['jabatan'] = $suratttd->jabatan;
        $OpenTBS->VarRef['namapejabat'] = $suratttd->namapejabat;
        $OpenTBS->VarRef['nippejabat'] = $suratttd->nippejabat;
        
        $OpenTBS->VarRef['jabatanseksi'] = $kasittd->jabatan;
        $OpenTBS->VarRef['namapejabatseksi'] = $kasittd->namapejabat;
        $OpenTBS->VarRef['nippejabatseksi'] = $kasittd->nippejabat;
        
        $OpenTBS->VarRef['namatps'] = $tps->namatps;
        $OpenTBS->VarRef['alamattps'] = $tps->alamattps;
        
        
        $OpenTBS->Show(OPENTBS_DOWNLOAD,'_skep_export.docx');
        exit;
        
    }
    
    public function actionExportSkepPdf($id) {
        
        $modelindetitas = \backend\modules\setting\models\IdentitasKantor::find()
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
                ->select(['bd.id', 'jabatan', 'namapejabat', 'nippejabat', 'ts.id', 'kepala_kantor'
                ])
                ->from('skep_penetapan_bcf15 bd')
                ->join('JOIN', 'penandatangan ts', 'bd.kepala_kantor = ts.id')
                ->where(['bd.id' => $id])
                ->all();

        $content = $this->renderPartial('_skep_exportpdf', [

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
            'marginLeft'=> '30mm',
            'marginRight'=> '30mm',
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:5px}',
            'options' => [
                'title' => 'Cetak Surat Pengantar'
            ],
         //   'filename' => $model->bcf15no . '.pdf',
            'methods' => [
                'SetHeader' => [''],
//                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }
    
    public function actionExportSkepLampPdf($id) {
      
        $modelskep = $this->findModel($id);
        $modelIdentitas = (new \yii\db\Query())
                ->select(['kppbc','kanwil','id'])
                ->from('identitas_kantor bd')               
                ->where(['id' =>1])
                ->one();
        
        $modelbcf15 = (new \yii\db\Query())
                ->select(['tahun','bcf15no','bcf15tgl','penandatangan_id','bcf15pos','bc11no','bc11tgl','bc11pos','bc11subpos','nobl',
                            'tglbl','tgl_timbun','nama_sarkut','jumlah_brg','satuan_brg','uraian_brg','berat_brg','total_cont','consignee',
                            'alamat_consignee','kota_consignee','tpp_id','tps_id','ts.id','namatps','alamattps'])
                ->from('bcf15 bd')   
                 ->join('JOIN', 'bcf15_detail ts', 'bd.id = ts.bcf15_id')
                 ->join('JOIN', 'tps tp', 'tp.id = ts.tps_id')
                ->where(['skep_penetapan_bcf15_id' =>$modelskep->id])
                ->orderBy('bd.id','bcf15pos')
                ->all(); 
        
        
        $modelPenandatangan = (new \yii\db\Query())
                ->select(['bd.id', 'jabatan', 'namapejabat', 'nippejabat', 'ts.id', 'kepala_kantor'
                ])
                ->from('skep_penetapan_bcf15 bd')
                ->join('JOIN', 'penandatangan ts', 'bd.kepala_kantor = ts.id')
                ->where(['bd.id' => $id])
                ->all();

        $content = $this->renderPartial('_skeplamp_exportpdf', [

            
            'modelIdentitas' => $modelIdentitas,
            'modelskep' => $modelskep,
            'modelbcf15' => $modelbcf15,
            'modelPenandatangan' => $modelPenandatangan,
//            'user' => $user,
        ]);

        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $content,
            'marginTop'=> '5mm',
            'marginBottom'=> '5mm',
            'marginLeft'=> '5mm',
            'marginRight'=> '5mm',
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
    
    /**
     * Finds the SkepPenetapanBcf15 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SkepPenetapanBcf15 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SkepPenetapanBcf15::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
