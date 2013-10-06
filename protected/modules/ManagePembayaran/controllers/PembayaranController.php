<?php

class PembayaranController extends Controller {

       public $layout = '//layouts/column2';

       public function filters() {
              return array(
                  'accessControl', // perform access control for CRUD operations
                  'postOnly + delete', // we only allow deletion via POST request
              );
       }

       public function accessRules() {
              return array(
//                  array('allow', // allow all users to perform 'index' and 'view' actions
//                      'actions' => array(),
//                      'users' => array('*'),
//                  ),
                  array('allow', // allow authenticated user to perform 'create' and 'update' actions
                      'actions' => array('Create', 'View'),
                      'users' => array('@'),
                  ),
                  array('allow', // allow admin user to perform 'admin' and 'delete' actions
                      'actions' => array('Index', 'Update', 'admin', 'Delete'),
                      'expression' => '$user->getLevel() == 3 || $user->getLevel() == 0',
                  ),
                  array('deny', // deny all users
                      'users' => array('*'),
                  ),
              );
       }

       public function actionView($id, $id2) {
              $this->render('view', array(
                  'model' => $this->loadModel($id, $id2),
              ));
       }

       public function actionCreate() {

              $model = new Pembayaran ();

              if (isset($_POST['Pembayaran'])) {
                     $model->attributes = $_POST['Pembayaran'];

                     $model->user_id = Yii::app()->user->id; //ngambil id user yg lagi login
//                     if (strlen(trim(CUploadedFile::getInstance($model, 'buktipembayaran'))) > 0 && $model->save()) {
//                            $sss = CUploadedFile::getInstance($model, 'buktipembayaran');
//                            $model->buktipembayaran = $model->idpembayaran . '.' . $sss->extensionName; //nama file diubah jadi nama username
//                     }
                     if ($model->save()){                            
                            $model->image = CUploadedFile::getInstance($model, 'image');
                            $model->buktipembayaran = $model->idpembayaran . '.' . $model->image->extensionName; 
                     }

                     if ($model->save()) {
                            if (strlen(trim($model->buktipembayaran)) > 0) {
//                                   $sss = CUploadedFile::getInstance($model, 'buktipembayaran');
                                   $model->image->saveAs(Yii::app()->basePath . '/../buktipembayaran/' . $model->buktipembayaran);
                            }
                            $this->redirect(array('view', 'id' => $model->idpembayaran, 'id2' => $model->user_id));
                     }
              }

              $this->render('create', array(
                  'model' => $model,
              ));
       }

       public function actionDelete($id, $id2) {
              if (Yii::app()->request->isPostRequest) {
                     $this->loadModel($id, $id2)->delete();
                     if (!isset($_GET['ajax']))
                            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
              }
              else
                     throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
       }

       public function actionUpdate($id, $id2) {
              $model = $this->loadModel($id, $id2);
              if (isset($_POST['Pembayaran'])) {
                     $model->attributes = $_POST['Pembayaran'];

                     if ($model->telahdibayar == 1) {
                            $modeluser = User::model()->findByPk($id2);
                            $modeluser->jumlahUangElek += $model->jumlahpembayaran;
                            $modeluser->save();
                     }

                     if ($model->save())
                            $this->redirect(array('view', 'id' => $model->idpembayaran, 'id2' => $model->user_id));
              }

              $this->render('update', array(
                  'model' => $model,
              ));
       }

       public function actionIndex() {
              $dataProvider = new CActiveDataProvider('Pembayaran');
              $this->render('index', array(
                  'dataProvider' => $dataProvider,
              ));
       }

       public function actionAdmin() {
              $model = new Pembayaran('search');
              $model->unsetAttributes();  // clear any default values
              if (isset($_GET['Pembayaran']))
                     $model->attributes = $_GET['Pembayaran'];

              $this->render('admin', array(
                  'model' => $model,
              ));
       }

       public function loadModel($id, $id2) {
              $model = Pembayaran::model()->findByAttributes(array('idpembayaran' => $id, 'user_id' => $id2));
              if ($model === null)
                     throw new CHttpException(404, 'The requested page does not exist.');
              return $model;
       }

}