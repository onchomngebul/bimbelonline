<?php

class UserController extends Controller {

       /**
        * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
        * using two-column layout. See 'protected/views/layouts/column2.php'.
        */
       public $layout = '//layouts/column2';

       /**
        * @return array action filters
        */
       public function filters() {
              return array(
                  'accessControl', // perform access control for CRUD operations
                  'postOnly + delete', // we only allow deletion via POST request
              );
       }

       /**
        * Specifies the access control rules.
        * This method is used by the 'accessControl' filter.
        * @return array access control rules
        */
       public function accessRules() {
              return array(
                  array('allow', // allow all users to perform 'index' and 'view' actions
                      'actions' => array('index', 'create', 'view', 'captcha', 'kirimemail'),
                      'users' => array('*'),
                  ),
                  array('allow', // allow authenticated user to perform 'create' and 'update' actions
                      'actions' => array('Update', 'Verifyemail', 'Listbimb', 'Lihatgrafik', 'GantiPassword'),
                      'users' => array('@'),
                  ),
                  array('allow', // allow admin user to perform 'admin' and 'delete' actions
                      'actions' => array('admin', 'delete', 'updateadmin'),
                      'expression' => '$user->getLevel() < 1',
                  ),
                  array('deny', // deny all users
                      'users' => array('*'),
                  ),
              );
       }

       public function actions() {
              return array(
                  'captcha' => array(
                      'class' => 'CCaptchaAction',
                      'backColor' => 0xFFFFFF,
                  ),
              );
       }

       /**
        * Displays a particular model.
        * @param integer $id the ID of the model to be displayed
        */
       public function actionView($id) {
              $this->render('view', array(
                  'model' => $this->loadModel($id),
              ));
       }

       /**
        * Creates a new model.
        * If creation is successful, the browser will be redirected to the 'view' page.
        */
       public function actionCreate() {
              $model = new User('reg');

              if (isset($_POST['User'])) {
                     $model->attributes = $_POST['User'];

                     if ($model->password != null) {
                            //konversi password pake md5
                            $true = $model->password;
                            $model->password2 = $model->generateSalt();
                            $model->password = $model->hashPassword($true, $model->password2);
                     }
                     //buat upluad avatar
                     if (strlen(trim(CUploadedFile::getInstance($model, 'avatar'))) > 0 && $model->save()) {
                            $sss = CUploadedFile::getInstance($model, 'avatar');
                            $model->avatar = $model->id . '.' . $sss->extensionName; //nama file diubah jadi nama username
                     }

                     if ($model->save()) {
                            if (strlen(trim($model->avatar)) > 0)
                                   $sss->saveAs(Yii::app()->basePath . '/../avatar/' . $model->avatar); //alamat penyimpanan
                            $model->Kirimemail();
                            $this->redirect(array('view', 'id' => $model->id));
                     }
                     $model->password = "";
                     $model->passworden = "";
              }

              $this->render('create', array(
                  'model' => $model,
              ));
       }

       /**
        * Updates a particular model.
        * If update is successful, the browser will be redirected to the 'view' page.
        * @param integer $id the ID of the model to be updated
        */
       public function actionUpdate() {
              $model = $this->loadModel(Yii::app()->user->id);
              if (isset($_POST['User'])) {
                     $model->attributes = $_POST['User'];
                     $model->isiTTL();
                     if (strlen(trim(CUploadedFile::getInstance($model, 'avatar'))) > 0 && $model->save()) {
                            $sss = CUploadedFile::getInstance($model, 'avatar');
                            $model->avatar = $model->id . '.' . $sss->extensionName;
                     }

                     if ($model->save()) {
                            if (strlen(trim($model->avatar)) > 0)
                                   $sss->saveAs(Yii::app()->basePath . '/../avatar/' . $model->avatar);
                            $this->redirect(array('view', 'id' => $model->id));
                     }
              }

              if ($model->tanggalLahir != null) { //klo blum ngisi ttl sama sekali, biar gk error
                     $pecah = explode("-", $model->tanggalLahir); //dipecah tanggal, bulan tahun
//                     if (strpos($pecah[1], '0') === 0 || strpos($pecah[2], '0') === 0) //tanggal atau bulan yg ada nol didepan biar gk error (defaul tanggal, bulan  harus 2 digit)
//                            $pecah = explode("-0", $model->tanggalLahir);
                     $model->thnlahir = ltrim($pecah[0], '0');
                     $model->blnlahir = ltrim($pecah[1], '0');
                     $model->tgllahir = ltrim($pecah[2], '0');
              }

              $this->render('update', array(
                  'model' => $model,
              ));
       }

       public function actionUpdateadmin($id) {
              $model = $this->loadModel($id);
              if (isset($_POST['User'])) {
                     $model->attributes = $_POST['User'];

                     if ($model->save()) {
                            $this->redirect(array('view', 'id' => $model->id));
                     }
              }

              $this->render('updateadmin', array(
                  'model' => $model,
              ));
       }

       public function actionGantiPassword() {
              $model = $this->loadModel(Yii::app()->user->id);
              
              if (isset($_POST['User'])) {
                     $model->attributes = $_POST['User'];

//                     $model->password = "ganti";
                     $true = $model->password;
                     $model->password2 = $model->generateSalt();
                     $model->password = $model->hashPassword($true, $model->password2);


                     if ($model->save()) {
                            $this->redirect(array('view', 'id' => $model->id));
                     }
              }
              $model->password = "";
              $model->password2 = "";

              $this->render('gantipass', array(
                  'model' => $model,
              ));
       }

       public function actionDelete($id) {
              $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
              if (!isset($_GET['ajax']))
                     $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
       }

       /**
        * Lists all models.
        */
       public function actionIndex() {
              $dataProvider = new CActiveDataProvider('User');
              $this->render('index', array(
                  'dataProvider' => $dataProvider,
              ));
       }

       /**
        * Manages all models.
        */
       public function actionAdmin() {
              $model = new User('search');
              $model->unsetAttributes();  // clear any default values
              if (isset($_GET['User']))
                     $model->attributes = $_GET['User'];

              $this->render('admin', array(
                  'model' => $model,
              ));
       }

       public function actionVerifyemail($sc) {
              $model = $this->loadModel(Yii::app()->user->id);
              if ($model->encodeSCode($sc)) {
                     $model->jumlahUangElek = 0;
                     $model->save();
                     echo "berhasil verifikasi pass, redirect kemana gw bingung..";
              } else {
                     echo "sori brooo, kodenya salahh";
              }
       }

       public function actionListbimb() {
              $model = new Bimbingan('search');
//              $model = Bimbingan::model()->findAllByAttributes(array('user_id' => $id));

              $model->unsetAttributes();  // clear any default values
              if (isset($_GET['Bimbingan']))
                     $model->attributes = $_GET['Bimbingan'];

              $this->render('listbimb', array(
                  'model' => $model,
              ));
       }

       public function actionLihatgrafik() {
              $id = Yii::app()->user->id;
              OpenFlashChart2Loader::load();
              $model = $this->loadModel($id);
              $databimb = $model->r_bimbingan;
              if ($databimb != null) {
                     $jumlahline = 5;

                     $title = new title("Grafik Bimbingan " /*. date(" M d Y")*/);
                     $title->set_style('{color: #567300; font-size: 14px}');

                     $y = new y_axis();
                     $y->set_range(0, 100, 10);

                     $chart = new open_flash_chart();
                     $chart->set_title($title);
                     $chart->set_y_axis($y);

                     $listidujian = array_unique(CHtml::listData($databimb, 'ujian_idujian', 'ujian_idujian'));
                     foreach ($listidujian as $id) {
                            $data[$id] = array();
                            $namauj[$id] = array();
                     }

                     foreach ($databimb as $edatabimb) {
                            array_push($data[$edatabimb->ujian_idujian], (int) $edatabimb->nilai);
                            $namauj[$edatabimb->ujian_idujian] = $edatabimb->r_ujian->namaujian;
                     }

                     if ($jumlahline > count($listidujian))
                            $jumlahline = count($listidujian);
                     $key = array_keys($data);

                     for ($i = 0; $i < $jumlahline; $i++) {
                            $warna = $this->cariWarna($i);

                            $default_hollow_dot = new hollow_dot();
                            $default_hollow_dot->size(7)->colour($warna);

                            $line_hollow = new line();
                            $line_hollow->set_default_dot_style($default_hollow_dot);
                            $line_hollow->set_width(5);
                            $line_hollow->set_colour($warna);
                            $line_hollow->set_values($data[$key[$i]]);
                            $line_hollow->set_key($namauj[$key[$i]], 10);
                            $chart->add_element($line_hollow);
                     }
                     $this->render('lihatgrafik', array(
                         'chart' => $chart,
                     ));
              }
              else
                     echo "Anda belum melakukan simulasi ujian sama sekali";
       }

       private function cariWarna($i) {
              switch ($i) {
                     case 0: return '#ff0000';
                     case 0: return '#000ff0';
                     case 0: return '#0fff00';
                     case 0: return '#f000ff';
                     case 0: return '#000000';
                     default: return '#000000';
              }
       }

       /**
        * Returns the data model based on the primary key given in the GET variable.
        * If the data model is not found, an HTTP exception will be raised.
        * @param integer $id the ID of the model to be loaded
        * @return User the loaded model
        * @throws CHttpException
        */
       public function loadModel($id) {
              $model = User::model()->findByPk($id);
              if ($model === null)
                     throw new CHttpException(404, 'The requested page does not exist.');
              return $model;
       }

       /**
        * Performs the AJAX validation.
        * @param User $model the model to be validated
        */
       protected function performAjaxValidation($model) {
              if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
                     echo CActiveForm::validate($model);
                     Yii::app()->end();
              }
       }

}
