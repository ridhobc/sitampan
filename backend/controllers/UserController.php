<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use backend\models\IkuUserSearch;
use backend\models\ResetPasswordForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [

                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                    $user = Yii::$app->user;
                    return ($user->identity->role == 'admin' || $user->identity->role == 'user');
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIkuPegawai() {

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('iku-pegawai', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        if (Yii::$app->user->can('create-user')) {
            $model = new User();
            if ($model->load(Yii::$app->request->post())) {

                $nip = substr($model->nip, 0, 8);
                $y = substr($nip, 0, 4);
                $m = substr($nip, 5, 2);
                $d = substr($nip, 8, 2);
                if (empty($model->password)) {
                    $password = '123456'; //default password
                } else {
                    
                    $password = $model->password;
                }
               
                $model->password_hash = Yii::$app->security->generatePasswordHash($password);
                $model->auth_key = Yii::$app->security->generateRandomString();
                //simpan ke database
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
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
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        if (Yii::$app->user->can('update-user')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post())) {
//                $nip = $model->nip;
                $nip = substr($model->nip, '0', '8');
                $y = substr($nip, '0', '4');
                $m = substr($nip, '5', '2');
                $d = substr($nip, '8', '2');
                if (empty($model->password)) {

                    
                    $password = $model->password;
                    $model->password_hash = Yii::$app->security->generatePasswordHash($password);
                } else {

               
                    //pass gak dirubah
                }
                Yii::$app->session->setFlash('success', 'Saved record successfully');
                $model->save();
                return $this->redirect(['update', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        } else {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        if (Yii::$app->user->can('update-user')) {
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        } else {
            throw new ForbiddenHttpException;
        }
    }
    
    public function actionBanned($id) {
        $model = User::findOne($id);       
        $model->status = 0;       
        $model->save();
        \Yii::$app->getSession()->setFlash('success', 'User atas nama  '. $model->name .' telah dibanned!');
        return $this->redirect(['index']);
    }
    
    public function actionUnbanned($id) {
        $model = User::findOne($id);       
        $model->status = 10;       
        $model->save();
        \Yii::$app->getSession()->setFlash('success', 'User atas nama  '. $model->name .' telah diaktifkan!');
        return $this->redirect(['index']);
    }

//    public function actionDelete() {
//        $post = Yii::$app->request->post();
//        if (Yii::$app->request->isAjax && isset($post['custom_param'])) {
//            $id = $post['id'];
//            if ($this->findModel($id)->delete()) {
//                echo Json::encode([
//                    'success' => true,
//                    'messages' => [
//                        'kv-detail-info' => 'The book # ' . $id . ' was successfully deleted. <a href="' .
//                            Url::to(['/user/profil']) . '" class="btn btn-sm btn-info">' .
//                            '<i class="glyphicon glyphicon-hand-right"></i>  Click here</a> to proceed.'
//                    ]
//                ]);
//            } else {
//                echo Json::encode([
//                    'success' => false,
//                    'messages' => [
//                        'kv-detail-error' => 'Cannot delete the user # ' . $id . '.'
//                    ]
//                ]);
//            }
//            return;
//        }
//        throw new InvalidCallException("You are not allowed to do this operation. Contact the administrator.");
//    }
//    public function actionProfil($id) {
//        return $this->render('profil', [
//                    'model' => $this->findModel($id),
//        ]);
//    }
    public function actionProfil($id) {
        $model = $this->findModel($id);
        $searchModel = new \backend\models\AuthAssignmentSearch([
            'user_id' => $id, // Tambahkan ini
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (empty($model->password)) {
                $password = $model->password;
                $model->password_hash = Yii::$app->security->generatePasswordHash($password);
            } else {
                //pass gak dirubah
            }
            Yii::$app->session->setFlash('success', 'Saved record successfully');

            return $this->redirect(['profil', 'id' => $model->id]);
        } else {
            return $this->render('profil', [
                        'model' => $model,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'model' => $this->findModel($id),
            ]);
        }
    }

    public function actionChange_password() {

       $user=  \Yii::$app->user->identity;
       $loadedPost=$user->load(\Yii::$app->request->post());
        if ($loadedPost && $user->validate()) {
            $user->password=$user->newPassword;
            
            $user->save(false);
             Yii::$app->session->setFlash('success', 'Ubah Password Berhasil');
              return $this->refresh();
        }

        return $this->render('change_password', [
                    'user' => $user,
                    
        ]);
    }
    
    public function actionReset_password($id) {

         $searchModel = new UserSearch([
            'id' => $id, // Tambahkan ini
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $user = $this->findModel($id);
       
        if ($user->load(Yii::$app->request->post()) && $user->save()) {
            $user->password='123456';            
            $user->save(false);
           # var_dump($user->errors);
             Yii::$app->session->setFlash('success', 'Reset Password Berhasil, Passwordnya 123456');
              return $this->refresh();
        }
        else {
             Yii::$app->session->setFlash('warning', 'gagal');
         
        }

        return $this->render('resetpassword', [
                    'user' => $user,
                    
        ]);
    }
    
    
    
/* -------------  update Employee's Profice picture ---------------  */
    public function actionEmpPhoto($id)
    {
	$model = $this->findModel($id);
	$info = User::findOne($model->id);
//	$info->scenario = 'photo-upload';
	$old_photo = $info->photo;

	if($info->load(Yii::$app->request->post()))
	{	
//		$info->attributes = $_POST['EmpInfo'];	
		$info->photo = UploadedFile::getInstance($info,'photo');	
				

		if($info->validate('photo') && !empty($info->photo))
		{ 				
			$ext= substr(strrchr($info->photo,'.'),1);
			$photo = $old_photo;
			$dir1 = Yii::getAlias('@webroot').'/user/';

			if(file_exists($dir1.$photo) && $photo!='no-photo' && $photo!= NULL) {
				unlink($dir1.$photo);        
			}
			if($ext!=null) { 
				$newfname = $info->name.'_'.$info->nip.'.'.$ext;
				$returnResults = $info->photo->saveAs(Yii::getAlias('@webroot').'/user/'.$info->photo = $newfname);
				if($returnResults) {
					$info->save(false);
				} 
			}    
		}
		return $this->redirect(['profil', 'id' => $model->id]);  
	  }
	  return $this->renderAjax('photo_form', ['model' => $model, 'info' => $info, ]);
      }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
