<?php

namespace backend\controllers;

use Yii;
use common\models\TrainingUser;
use backend\models\TrainingUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TrainingUserController implements the CRUD actions for TrainingUser model.
 */
class TrainingUserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            $user = Yii::$app->user;
                            return ($user->identity->role=='administrator');
                        }
                    ],
                ],
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
     * Lists all TrainingUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrainingUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrainingUser model.
     * @param integer $training_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionView($training_id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($training_id, $user_id),
        ]);
    }

    /**
     * Creates a new TrainingUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TrainingUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'training_id' => $model->training_id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TrainingUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $training_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($training_id, $user_id)
    {
        $model = $this->findModel($training_id, $user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'training_id' => $model->training_id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TrainingUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $training_id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($training_id, $user_id)
    {
        $this->findModel($training_id, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TrainingUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $training_id
     * @param integer $user_id
     * @return TrainingUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($training_id, $user_id)
    {
        if (($model = TrainingUser::findOne(['training_id' => $training_id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
