<?php
namespace backend\modules\bcf15\controllers;

use Yii;
use backend\models\Bcf15DetailCont;
use backend\modules\bcf15\models\Bcf15DetailContSearch;
use backend\models\Bcf15Detail;
use backend\modules\bcf15\models\Bcf15DetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Bcf15DetailContController implements the CRUD actions for Bcf15DetailCont model.
 */
class Bcf15DetailContController extends Controller
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
     * Lists all Bcf15DetailCont models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Bcf15DetailContSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bcf15DetailCont model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $modelBcf15 = new \backend\models\Bcf15();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bcf15DetailCont model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bcf15DetailCont();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionDetcontainer($idbcf,$id)
    {
        $model = new Bcf15DetailCont();
        $modelbcfdetail = Bcf15Detail::find()
                ->where(['bcf15_id' => $idbcf, 'id' => $id])
                ->one();
        $searchModel = new Bcf15DetailSearch(['bcf15_id' => $idbcf, 'id' => $id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('detcontainer', [
                'model' => $model,
                'modelbcfdetail' => $modelbcfdetail,
                'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Updates an existing Bcf15DetailCont model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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

    /**
     * Deletes an existing Bcf15DetailCont model.
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
     * Finds the Bcf15DetailCont model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bcf15DetailCont the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bcf15DetailCont::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
