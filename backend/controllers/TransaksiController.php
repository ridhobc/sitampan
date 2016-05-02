<?php

namespace backend\controllers;

use Yii;
use backend\models\Transaksi;
use backend\models\TransaksiSearch;
use backend\models\TransaksiBarang;
use backend\models\TransaksiBarangSearch;
use backend\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/**
 * TransaksiController implements the CRUD actions for Transaksi model.
 */
class TransaksiController extends Controller {

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
     * Lists all Transaksi models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TransaksiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transaksi model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        
         $searchModel = new TransaksiBarangSearch([
        'transaksi_id' => $id,  // Tambahkan ini
               
    ]);
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
    return $this->render('view', [  // ubah ini
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'model' => $this->findModel($id),
    ]);
    }
    /**
     * Creates a new Transaksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
       public function actionCreate()
    {
        $modelTransaksi = new Transaksi;
        $modelsTransaksiBarang = [new TransaksiBarang];
        if ($modelTransaksi->load(Yii::$app->request->post())) {

            $modelsTransaksiBarang = Model::createMultiple(TransaksiBarang::classname());
            Model::loadMultiple($modelsTransaksiBarang, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsTransaksiBarang),
                    ActiveForm::validate($modelTransaksi)
                );
            }

            // validate all models
            $valid = $modelTransaksi->validate();
            $valid = Model::validateMultiple($modelsTransaksiBarang) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelTransaksi->save(false)) {
                        foreach ($modelsTransaksiBarang as $modelTransaksiBarang) {
                            $modelTransaksiBarang->transaksi_id = $modelTransaksi->id;
                            if (! ($flag = $modelTransaksiBarang->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                  
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelTransaksi->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'modelTransaksi' => $modelTransaksi,
            'modelsTransaksiBarang' => (empty($modelsTransaksiBarang)) ? [new TransaksiBarang] : $modelsTransaksiBarang
        ]);
    }

    /**
     * Updates an existing Transaksi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $modelTransaksi = $this->findModel($id);
        $modelsTransaksiBarang = $modelTransaksi->transaksiBarangss;

        if ($modelTransaksi->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsTransaksiBarang, 'id', 'id');
            $modelsTransaksiBarang = Model::createMultiple(TransaksiBarang::classname(), $modelsTransaksiBarang);
            Model::loadMultiple($modelsTransaksiBarang, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsTransaksiBarang, 'id', 'id')));

//            // ajax validation
//            if (Yii::$app->request->isAjax) {
//                Yii::$app->response->format = Response::FORMAT_JSON;
//                return ArrayHelper::merge(
//                    ActiveForm::validateMultiple($modelsTransaksiBarang),
//                    ActiveForm::validate($modelTransaksi)
//                );
//            }

            // validate all models
            $valid = $modelTransaksi->validate();
            $valid = Model::validateMultiple($modelsTransaksiBarang) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelTransaksi->save(false)) {
                        if (! empty($deletedIDs)) {
                            TransaksiBarang::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsTransaksiBarang as $modelTransaksiBarang) {
                            $modelTransaksiBarang->transaksi_id = $modelTransaksi->id;
                            if (! ($flag = $modelTransaksiBarang->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelTransaksi->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'modelTransaksi' => $modelTransaksi,
            'modelsTransaksiBarang' => (empty($modelsTransaksiBarang)) ? [new TransaksiBarang] : $modelsTransaksiBarang
        ]);
    }

   

    /**
     * Deletes an existing Transaksi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    
    public function actionDetailBarang($id)
{
    $model = TransaksiBarang::findOne($id);
    if($model!==null){
        echo $model->jumlah;
    }
    else{
        echo "Detail is empty";
    }
}
    /**
     * Finds the Transaksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transaksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Transaksi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
