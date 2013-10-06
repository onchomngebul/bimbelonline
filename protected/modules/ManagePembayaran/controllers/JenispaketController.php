<?php

class JenispaketController extends Controller {

       public $layout = '//layouts/column2';

       public function filters() {
              return array(
                  'accessControl', // perform access control for CRUD operations
                  'postOnly + delete', // we only allow deletion via POST request
              );
       }

       public function accessRules() {
              return array(
                  array('allow', // allow all users to perform 'index' and 'view' actions
                      'actions' => array('view'),
                      'users' => array('*'),
                  ),
                  array('allow', // allow authenticated user to perform 'create' and 'update' actions
                      'actions' => array('pilihPaket', 'index'),
                      'users' => array('@'),
                  ),
                  array('allow', // allow admin user to perform 'admin' and 'delete' actions
                      'actions' => array('create', 'update', 'admin', 'delete'),
                      'expression' => '$user->getLevel() == 3 || $user->getLevel() == 0',
                  ),
                  array('deny', // deny all users
                      'users' => array('*'),
                  ),
              );
       }

       public function actionPilihPaket($id) {
              if ($id != Yii::app()->user->getJenispaket()) {
                     $model = $this->loadModel($id);
                     $modeluser = User::model()->findByPk(Yii::app()->user->id); //buat model dg id user yg lagi login
                     $modeluser->jumlahUangElek -= $model->biaya;
                     $modeluser->jenispaket_idjenispaket = $id;
                     $modeluser->save();
                     echo "terima kasih, paket anda telah berubah";
              }
              else echo "Anda sedang berada pada paket ini, silahkan pilih paket yang lain";
       }

       public function actionView($id) {
              $this->render('view', array(
                  'model' => $this->loadModel($id),
              ));
       }

       public function actionCreate() {
              $model = new Jenispaket;

              if (isset($_POST['Jenispaket'])) {
                     $model->attributes = $_POST['Jenispaket'];
                     if ($model->save())
                            $this->redirect(array('view', 'id' => $model->idjenispaket));
              }

              $this->render('create', array(
                  'model' => $model,
              ));
       }

       public function actionUpdate($id) {
              $model = $this->loadModel($id);

              if (isset($_POST['Jenispaket'])) {
                     $model->attributes = $_POST['Jenispaket'];
                     if ($model->save())
                            $this->redirect(array('view', 'id' => $model->idjenispaket));
              }

              $this->render('update', array(
                  'model' => $model,
              ));
       }

       public function actionDelete($id) {
              $this->loadModel($id)->delete();

              // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
              if (!isset($_GET['ajax']))
                     $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
       }

       public function actionIndex() {
              $criteria = new CDbCriteria;

              $criteria->compare('idjenispaket', '>1');
              
              $dataProvider = new CActiveDataProvider('Jenispaket', array('criteria' => $criteria));
//              $dataProvider = Jenispaket::model()->findAll();
              $this->render('index', array(
                  'dataProvider' => $dataProvider,
              ));
       }

       public function actionAdmin() {
              $model = new Jenispaket('search');
              $model->unsetAttributes();  // clear any default values
              if (isset($_GET['Jenispaket']))
                     $model->attributes = $_GET['Jenispaket'];

              $this->render('admin', array(
                  'model' => $model,
              ));
       }

       public function loadModel($id) {
              $model = Jenispaket::model()->findByPk($id);
              if ($model === null)
                     throw new CHttpException(404, 'The requested page does not exist.');
              return $model;
       }

       protected function performAjaxValidation($model) {
              if (isset($_POST['ajax']) && $_POST['ajax'] === 'jenispaket-form') {
                     echo CActiveForm::validate($model);
                     Yii::app()->end();
              }
       }

}
