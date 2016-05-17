<?php

namespace backend\modules\penarikan\controllers;

use Yii;
use backend\models\Bcf15SuratPemindahan;
use backend\modules\penarikan\models\Bcf15SuratPemindahanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * SuratPemindahanController implements the CRUD actions for Bcf15SuratPemindahan model.
 */
class SuratPemindahanController extends Controller {

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
     * Lists all Bcf15SuratPemindahan models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new Bcf15SuratPemindahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
    }

    /**
     * Displays a single Bcf15SuratPemindahan model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
                ]);
    }

    /**
     * Creates a new Bcf15SuratPemindahan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Bcf15SuratPemindahan();
        //detail yang sudah konek idnya
        $searchModeldet = new \backend\modules\penarikan\models\Bcf15Search(['status_bcf15' => 5, 'bcf15_surat_pemindahan_id' => '0']);
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
     * Updates an existing Bcf15Detail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        //detail yang sudah konek idnya
        $searchModeldet = new \backend\modules\penarikan\models\Bcf15Search(['status_bcf15' => 6, 'bcf15_surat_pemindahan_id' => $model->id]);
        $dataProviderdet = $searchModeldet->search(Yii::$app->request->queryParams);

        //detail yang belum konek mau ditambahkan
        $searchModel = new \backend\modules\penarikan\models\Bcf15Search(['status_bcf15' => 5]);
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

    public function actionTbhlampsrt($id, $idsk) {
        $model = \backend\models\Bcf15::findOne($id);
        $model->bcf15_surat_pemindahan_id = $idsk;
        $model->status_bcf15 = 6;

        $model->save();
        \Yii::$app->getSession()->setFlash('success', 'BCF 1.5 nomor ' . $model->bcf15no . ' telah ditambahkan ke Lampiran!');
        return $this->redirect(['surat-pemindahan/update', 'id' => $idsk]);
    }

    public function actionBtllampsrt($id, $idsk) {
        $model = \backend\models\Bcf15::findOne($id);
        $model->bcf15_surat_pemindahan_id = '';
        $model->status_bcf15 = 5;

        $model->save();
        \Yii::$app->getSession()->setFlash('warning', 'BCF 1.5 nomor ' . $model->bcf15no . ' telah dihapus dari Lampiran!');
        return $this->redirect(['surat-pemindahan/update', 'id' => $idsk]);
    }

    /**
     * Deletes an existing Bcf15SuratPemindahan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Displays a export ke word skep penetapan.
     * @param integer $id
     * @return mixed
     */
    public function actionExportSuratWord($id) {

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
        $surat = Bcf15SuratPemindahan::findOne($id);
        $tgl = explode("-", $surat->tgl_surat);
        $tahun = $tgl[0];
        $bulan = bulan(date($tgl[1]));
        $suratttd = \backend\models\Penandatangan::findOne(['id' => $surat->nd_penandatangan_kasipab]);

        $tpp = \backend\modules\setting\models\Tpp::findOne(['id' => $surat->tpp_id]);
        $tps = \backend\modules\setting\models\Tps::findOne(['id' => $surat->tps_id]);

//        $suratttd= \backend\models\Bcf15::

        $searchModelBcf = new \backend\modules\penarikan\models\Bcf15Search(['bcf15_surat_pemindahan_id' => $id]);
        $dataProviderBcf = $searchModelBcf->search(Yii::$app->request->queryParams);

        $OpenTBS = new \hscstudio\export\OpenTBS;
        $template = \Yii::getAlias('@backend/modules/penarikan/views/surat-pemindahan') . '/_surat_export.docx';

        $OpenTBS->LoadTemplate($template);
        $OpenTBS->VarRef['kanwil'] = $identitaskantor->kanwil;
        $OpenTBS->VarRef['kppbc'] = $identitaskantor->kppbc;
        $OpenTBS->VarRef['kppbckec'] = ucwords(strtolower($identitaskantor->kppbc));
        $OpenTBS->VarRef['alamat1'] = $identitaskantor->alamat1;
        $OpenTBS->VarRef['alamat2'] = $identitaskantor->alamat2;

        $OpenTBS->VarRef['no_surat'] = $surat->no_surat;
        $OpenTBS->VarRef['tgl_surat'] = $surat->tgl_surat;
        $OpenTBS->VarRef['bulan'] = $bulan;
        $OpenTBS->VarRef['tahun'] = $tahun;
        $OpenTBS->VarRef['nd_dari_kasipab'] = $surat->nd_dari_kasipab;
        $OpenTBS->VarRef['nd_daftar_bcf15'] = $surat->nd_daftar_bcf15;
        $OpenTBS->VarRef['nd_daftar_sp'] = $surat->nd_daftar_sp;
        $OpenTBS->VarRef['nd_penandatangan_kasipab'] = $surat->nd_penandatangan_kasipab;


        $OpenTBS->VarRef['jabatan'] = $suratttd->jabatan;
        $OpenTBS->VarRef['namapejabat'] = $suratttd->namapejabat;
        $OpenTBS->VarRef['nippejabat'] = $suratttd->nippejabat;

        $OpenTBS->VarRef['namatpp'] = $tpp->namatpp;
        $OpenTBS->VarRef['alamattpp'] = $tpp->alamattpp;

        $OpenTBS->VarRef['namatps'] = $tps->namatps;
        $OpenTBS->VarRef['alamattps'] = $tps->alamattps;


        $databcf = [];
        $no = 1;
        foreach ($dataProviderBcf->getModels() as $bcf15) {
            $databcf[] = [
                'no' => $no++,
                'bcf15no' => $bcf15->bcf15no,
                'bcf15tgl' => $bcf15->bcf15tgl,
                'no_sp' => $bcf15->no_sp,
                'tgl_sp' => $bcf15->tgl_sp,
            ];
        }

        $OpenTBS->MergeBlock('databcf', $databcf);
        $OpenTBS->Show(OPENTBS_DOWNLOAD, '_surat_export.docx');
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
                    'kota_consignee', 'tps_id', 'namatps', 'tgl_timbun', 'total_cont'
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
                    'marginTop' => '5mm',
                    'marginBottom' => '5mm',
                    'marginLeft' => '30mm',
                    'marginRight' => '30mm',
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

    public function actionExportSuratLampPdf($id) {


        $modelskep = Bcf15SuratPemindahan::findOne($id);
        $modelIdentitas = (new \yii\db\Query())
                ->select(['kppbc', 'kanwil', 'id'])
                ->from('identitas_kantor bd')
                ->where(['id' => 1])
                ->one();

        $modelbcf15 = (new \yii\db\Query())
                ->select(['tahun', 'bcf15no', 'bcf15tgl', 'penandatangan_id', 'bcf15pos', 'bc11no', 'bc11tgl', 'bc11pos', 'bc11subpos', 'nobl',
                    'tglbl', 'tgl_timbun', 'nama_sarkut', 'jumlah_brg', 'satuan_brg', 'uraian_brg', 'berat_brg', 'total_cont', 'consignee',
                    'alamat_consignee', 'kota_consignee', 'tpp_id', 'tps_id', 'ts.id', 'namatps', 'alamattps', 'namatpp', 'alamattpp'])
                ->from('bcf15 bd')
                ->join('JOIN', 'bcf15_detail ts', 'bd.id = ts.bcf15_id')
                ->join('JOIN', 'tps tp', 'tp.id = ts.tps_id')
                ->join('JOIN', 'tpp tk', 'tk.id = ts.tpp_id')
                ->where(['bcf15_surat_pemindahan_id' => $modelskep->id])
                ->orderBy('bd.id', 'bcf15pos')
                ->all();


        $modelPenandatangan = (new \yii\db\Query())
                ->select(['bd.id', 'jabatan', 'namapejabat', 'nippejabat', 'ts.id', 'surat_penandatangan_kakantor'
                ])
                ->from('bcf15_surat_pemindahan bd')
                ->join('JOIN', 'penandatangan ts', 'bd.surat_penandatangan_kakantor = ts.id')
                ->where(['bd.id' => $id])
                ->all();

        $content = $this->renderPartial('_suratlamp_exportpdf', [


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
                    'marginTop' => '5mm',
                    'marginBottom' => '5mm',
                    'marginLeft' => '5mm',
                    'marginRight' => '5mm',
                    'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                    'cssInline' => '.kv-heading-1{font-size:5px}',
                    'options' => [
                        'title' => 'Surat Pemindahan BCF 1.5'
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
     * Finds the Bcf15SuratPemindahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Bcf15SuratPemindahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Bcf15SuratPemindahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
