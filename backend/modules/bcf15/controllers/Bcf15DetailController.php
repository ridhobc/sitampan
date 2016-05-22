<?php

namespace backend\modules\bcf15\controllers;

use Yii;
use backend\models\Bcf15Detail;
use backend\models\Bcf15DetailCont;
use backend\modules\bcf15\models\Bcf15DetailSearch;
use backend\models\Bcf15;
use backend\modules\bcf15\models\Bcf15Search;
use backend\models\Tabular;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Model;
use yii\helpers\ArrayHelper;

/**
 * Bcf15DetailController implements the CRUD actions for Bcf15Detail model.
 */
class Bcf15DetailController extends Controller {

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
     * Lists all Bcf15Detail models.
     * @return mixed
     */
    public function actionIndex($id) {
        $searchModel = new Bcf15DetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $modelBcf15 = new Bcf15([
            'id' => $id
        ]);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'modelBcf15' => $modelBcf15,
        ]);
    }

    /**
     * Displays a single Bcf15Detail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bcf15Detail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTambahbc11($id) {

        
        $modelBcf15Detail = new Bcf15Detail;
        $modelBcf15DetailCont = [new Bcf15DetailCont];
        $searchModel = new Bcf15DetailSearch([
            'bcf15_id' => $id,
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($modelBcf15Detail->load(Yii::$app->request->post())) {
            
            $modelBcf15DetailCont = Tabular::createMultiple(Bcf15DetailCont::classname());
            Tabular::loadMultiple($modelBcf15DetailCont, Yii::$app->request->post());
            // validate all models
            $valid = $modelBcf15Detail->validate();
            $valid = Tabular::validateMultiple($modelBcf15DetailCont) && $valid;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    $modelBcf15Detail->bcf15_id = $id;
                    $modelBcf15Detail->masuk_tpp = 0;
                    $modelBcf15Detail->status_bcf15_detail = 1;
                    if ($flag = $modelBcf15Detail->save()) {
                        foreach ($modelBcf15DetailCont as $modelBcf15DetailContS) {
                            $modelBcf15DetailContS->bcf15_detail_id = $modelBcf15Detail->id;
                            if (!($flag = $modelBcf15DetailContS->save())) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        \Yii::$app->getSession()->setFlash('success', 'Data Detail BCF 1.5 Berhasil disimpan');
                        return $this->redirect(['tambahbc11', 'id' => $id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }


        return $this->render('tambahbc11', [
//                    'model' => $model,
                    'modelBcf15Detail' => $modelBcf15Detail,
                    'modelBcf15DetailCont' => (empty($modelBcf15DetailCont)) ? [new Bcf15DetailCont] : $modelBcf15DetailCont,
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                  
        ]);
    }
    
       
    /**
     * Updates an existing Bcf15Detail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
        public function actionUpdate($id)
    {
        $modelBcf15Detail = $this->findModel($id);
        $modelBcf15DetailCont = $modelBcf15Detail->bcf15DetailConts;
        $searchModel = new Bcf15DetailSearch([
            'bcf15_id' => $modelBcf15Detail->bcf15_id,
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($modelBcf15Detail->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelBcf15DetailCont, 'id', 'id');
            $modelBcf15DetailCont = Tabular::createMultiple(Bcf15DetailCont::classname(), $modelBcf15DetailCont);
            Tabular::loadMultiple($modelBcf15DetailCont, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelBcf15DetailCont, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelBcf15DetailCont),
                    ActiveForm::validate($modelBcf15Detail)
                );
            }

            // validate all models
            $valid = $modelBcf15Detail->validate();
            $valid = Tabular::validateMultiple($modelBcf15DetailCont) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelBcf15Detail->save(false)) {
                        if (! empty($deletedIDs)) {
                            Bcf15DetailCont::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelBcf15DetailCont as $modelBcf15DetailConts) {
                            $modelBcf15DetailConts->bcf15_detail_id = $modelBcf15Detail->id;
                            if (! ($flag = $modelBcf15DetailConts->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        \Yii::$app->getSession()->setFlash('warning', 'Data Detail BCF 1.5 Berhasil diubah');
                        return $this->redirect(['tambahbc11', 'id' => $modelBcf15Detail->bcf15_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'modelBcf15Detail' => $modelBcf15Detail,
            'modelBcf15DetailCont' => (empty($modelBcf15DetailCont)) ? [new Address] : $modelBcf15DetailCont,
                'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Bcf15Detail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    //
    public function actionDetcontainer($id) {
        $modelBcf15Detail = $this->findModel($id);
        
        $modelBcf15DetailCont = new \backend\modules\bcf15\models\Bcf15DetailContSearch([
            'bcf15_detail_id' => $modelBcf15Detail->id,
        ]);
        $dataProvider = $modelBcf15DetailCont->search(Yii::$app->request->queryParams);
        return $this->renderAjax('detcontainer', [
                   'modelBcf15Detail' => $modelBcf15Detail,
            'modelBcf15DetailCont' => $modelBcf15DetailCont,
               
                    'dataProvider' => $dataProvider,
                    
        ]);
    }

    /**
     * Finds the Bcf15Detail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bcf15Detail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Bcf15Detail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
