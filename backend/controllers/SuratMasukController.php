<?php

namespace backend\controllers;

use Yii;
use backend\models\SuratMasuk;
use backend\models\SuratMasukSearch;
use backend\models\SuratmasukDocument;
use backend\models\SuratmasukDocumentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;

/**
 * SuratMasukController implements the CRUD actions for SuratMasuk model.
 */
class SuratMasukController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::classname(),
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
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
     * Lists all SuratMasuk models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SuratMasukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDashboard($year = '', $date = '') {
        if (empty($year))
            $year = date('Y');

        $model = SuratMasuk::find()
                ->select('MONTH(tgl_terima) as bulan, COUNT(id) as jumlah')
                ->where(['YEAR(tgl_terima)' => $year])
                ->groupBy('MONTH(tgl_terima)')
                ->orderBy('MONTH(tgl_terima) ASC')
                ->asArray()
                ->all();
        $suratmasuk_per_month = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($model as $value) {
            $bulan = ((int) $value['bulan']) - 1;
            $suratmasuk_per_month[$bulan] = (int) $value['jumlah'];
        }

        $date=date('y-m-d');
        //Course wise student count
//	$stuCount = (new \yii\db\Query())
//		    ->select(["CONCAT(cs.nama, ' (', COUNT( sm.disposisi ), ')') AS '0'", 'COUNT(sm.disposisi) AS "1"']) 
//		    ->from('surat_masuk sm')
//		    ->join('JOIN', 'disposisi cs', 'cs.id = sm.disposisi')
////		    ->where(['sm.is_status' => '0', 'cs.is_status' => '0'])
//		    ->groupBy('sm.disposisi')
//		    ->all();
//Recently added student list
        $stuCount = (new \yii\db\Query())
                ->select(["CONCAT(cs.nama) AS 'nama'", 'COUNT(sm.disposisi) AS "jumlah"'])
                ->from('surat_masuk sm')
                ->join('JOIN', 'disposisi cs', 'cs.id = sm.disposisi')
//		    ->join('JOIN', 'courses cs', 'cs.course_id = sm.stu_master_course_id')
//		    ->join('JOIN', 'batches b', 'b.batch_id = sm.stu_master_batch_id')
//		    ->where(['sm.is_status' => '0'])
                ->groupBy('sm.disposisi')
                ->orderBy('jumlah DESC')
                ->limit(10)
                ->all();

        //Recently added student list
        $smLast = (new \yii\db\Query())
                ->select(['sm.id', 'no_surat', 'tgl_surat', 'asal', 'hal', 'agenda_ip', "CONCAT(si.nama, ' ', si.nip) AS 'pegawai'"])
                ->from('surat_masuk sm')
                ->join('JOIN', 'disposisi si', 'si.id = sm.disposisi')
//		    ->join('JOIN', 'courses cs', 'cs.course_id = sm.stu_master_course_id')
//		    ->join('JOIN', 'batches b', 'b.batch_id = sm.stu_master_batch_id')
//		    ->where(['sm.is_status' => '0'])
                ->orderBy('agenda_ip DESC')
                ->limit(10)
                ->all();

        return $this->render('dashboard', [

                    'smLast' => $smLast,
                    'stuCount' => $stuCount,
                    'year' => $year,
                    'suratmasuk_per_month' => $suratmasuk_per_month,
                   
                    'date' => $date,
        ]);
    }

    /**
     * Displays a single SuratMasuk model.
     * @param string $id
     * @param string $agenda_ip
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionUpload() {
        $searchModel = new SuratMasukSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('upload', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new SuratMasuk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        if (Yii::$app->user->can('create-surat-masuk')) {
            $model = new SuratMasuk();
            if ($model->load(Yii::$app->request->post())) {
                if ($model->disposisi == NULL) {
                    $model->disposisi = 0;
                } else {
                    $model->disposisi;
                }
                $model->save();
                \Yii::$app->getSession()->setFlash('success', 'Data Berhasil Disimpan!');
                return $this->redirect(['view', 'id' => $model->id, 'agenda_ip' => $model->agenda_ip]);
            } else {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        } else {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Updates an existing SuratMasuk model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @param string $agenda_ip
     * @return mixed
     */
    public function actionUpdate($id) {
        if (Yii::$app->user->can('update-surat-masuk')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                \Yii::$app->getSession()->setFlash('success', 'Data Berhasil Disimpan!');
                return $this->redirect(['index']);
            } else {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function actionProses($id) {
        $searchModel = new SuratmasukDocumentSearch([
            'suratmasuk_id' => $id, // Tambahkan ini
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            \Yii::$app->getSession()->setFlash('success', 'Data Berhasil Disimpan!');
            return $this->redirect(['surat-masuk/proses', 'id' => $id]);
        } else {
            return $this->render('proses', [
                        'model' => $model,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'model' => $this->findModel($id),
            ]);
        }
    }

    public function actionUnggah($id) {
        $model = $this->findModel($id);
        $modelsSuratmasukDocument = $model->suratmasukdocument;
        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            return $this->redirect(['surat-masuk/index']);
        } else {
            return $this->render('unggah', [
                        'model' => $model,
                        'modelsSuratmasukDocument' => $modelsSuratmasukDocument,
            ]);
        }
    }

    public function actionMauarsip() {
        $nip_saya = \Yii::$app->user->identity->iddisposisi;
        $searchModel = new SuratMasukSearch([

            'status' => 1,
//            'iddisposisi' => $nip_saya,
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('mauarsip', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing SuratMasuk model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @param string $agenda_ip
     * @return mixed
     */
    public function actionDelete($id) {
        if (Yii::$app->user->can('delete-surat-masuk')) {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            throw new ForbiddenHttpException;
        }
    }

    public function actionPemeriksa() {


        $nip_saya = \Yii::$app->user->identity->iddisposisi;

        $searchModel = new SuratMasukSearch([


            'disposisi' => $nip_saya,
                ///////////masih error disini
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('pemeriksa', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionImport() {
        if (Yii::$app->user->can('upload-surat-masuk')) {
            if (!empty($_FILES)) {
                $importFile = \yii\web\UploadedFile::getInstanceByName('importFile');
                $inputFileType = \PHPExcel_IOFactory::identify($importFile->tempName);
                $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($importFile->tempName);
                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                $baseRow = 9;
                $i = 0;
                $row = $i + $baseRow;
                while (!empty($sheetData[$row]['A'])) {
                    // get data via row dan colom
                    $agenda_bukus = $sheetData[$row]['B'];
                    $tgl_terima = $sheetData[$row]['C'];
                    $no_surat = $sheetData[$row]['D'];
                    $tgl_surat = $sheetData[$row]['E'];
                    $asal = $sheetData[$row]['F'];
                    $hal = $sheetData[$row]['G'];
                    $disposisi = $sheetData[$row]['H'];
                    $Keterangan = $sheetData[$row]['I'];
                    $agenda_ip = $sheetData[$row]['J'];



                    // save database
                    $model = new SuratMasuk([
                        'agenda_bukus' => $agenda_bukus,
                        'tgl_terima' => $tgl_terima,
                        'no_surat' => $no_surat,
                        'tgl_surat' => $tgl_surat,
                        'asal' => $asal,
                        'hal' => $hal,
                        'rinci' => $disposisi,
                        'Keterangan' => $Keterangan,
                        'agenda_ip' => $agenda_ip
                    ]);
                    $model->save();
                    $i++;
                    $row = $i + $baseRow;
                }
            }
            return $this->redirect(['index']);
        } else {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Finds the SuratMasuk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @param string $agenda_ip
     * @return SuratMasuk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SuratMasuk::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Halaman yang anda tuju tidak ditemukan, periksa controler');
        }
    }

}
