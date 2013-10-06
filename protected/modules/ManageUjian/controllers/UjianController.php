<?php

class UjianController extends Controller {

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
//                  array('allow', // allow all users to perform 'index' and 'view' actions
//                      'actions' => array(),
//                      'users' => array('*'),
//                  ),
//                  array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                      'actions' => array(),
//                      'users' => array('@'),
//                  ),
                  array('allow', // allow admin user to perform 'admin' and 'delete' actions
                      'actions' => array('admin', 'delete', 'index', 'view', 'create', 'update'),
                      'expression'=>'$user->getLevel() <= 1',
                  ),
                  array('deny', // deny all users
                      'users' => array('*'),
                  ),
              );
       }

       /**
        * Displays a particular model.
        * @param integer $id the ID of the model to be displayed
        */
       public function actionView($id) {
              $model2 = new KlasifikasiMateri('search');
              $model2->unsetAttributes();  // clear any default values
              if (isset($_GET['KlasifikasiMateri']))
                     $model2->attributes = $_GET['KlasifikasiMateri'];

              $this->render('view', array(
                  'model' => $this->loadModel($id),
                  'model2' => $model2,
              ));
       }

       /**
        * Creates a new model.
        * If creation is successful, the browser will be redirected to the 'view' page.
        */
       public function actionCreate() {
              $model = new Ujian;

              if (isset($_POST['Ujian'])) {
                     $model->attributes = $_POST['Ujian'];
//                     $list = explode(";", $model->listklasfmat);
                     $list = array();
                     if (isset($_POST['kelas'])) {
                            $total = count($_POST['kelas']);
                            for ($i = 0; $i <= $total; $i++) {
                                   if (isset($_POST['kelas'][$i])) {
                                          $kelas = $_POST['kelas'][$i];
                                          $mapel = $_POST['mapel'][$i];
                                          $bab = $_POST['bab'][$i];
                                          $idmateri = KlasifikasiMateri::model()->findIDmateri($kelas, $mapel, $bab);
                                          array_push($list, $idmateri);
                                   }
                            }
                     }

                     $model->setRelationRecords('r_klasfmat', $list);
                     if ($model->save()) {
                            $this->redirect(array('view', 'id' => $model->idujian));
                     }
              }

              $data = KlasifikasiMateri::model()->findAll();
              $model->listkelas = array_unique(CHtml::listData($data, 'kelas', 'kelas'));
              $model->listmapel = array_unique(CHtml::listData($data, 'matapelajaran', 'matapelajaran'));
              $model->listbab = array_unique(CHtml::listData($data, 'bab', 'bab'));

              $this->render('create', array(
                  'model' => $model,
              ));
       }

       /**
        * Updates a particular model.
        * If update is successful, the browser will be redirected to the 'view' page.
        * @param integer $id the ID of the model to be updated
        */
       public function actionUpdate($id) {
              $model = $this->loadModel($id);
              $model2 = new KlasifikasiMateri('search');
              $model2->unsetAttributes();  // clear any default values
              if (isset($_GET['KlasifikasiMateri']))
                     $model2->attributes = $_GET['KlasifikasiMateri'];

              if (isset($_POST['Ujian'])) {
                     $model->attributes = $_POST['Ujian'];

//                     $list = explode(";", $model->listklasfmat);
//                     $model->setRelationRecords('r_klasfmat', $list);
                     if ($model->save())
                            $this->redirect(array('view', 'id' => $model->idujian));
              }

              $this->render('update', array(
                  'model' => $model,
                  'model2' => $model2,
              ));
       }

       public function actionCreateKlasfmat($id) {
              $modelrelasi = new UjianHasKlasifikasimateri();
              $modelrelasi->ujian_idujian = $id;
              $modelklasfmat = new KlasifikasiMateri();

              if (isset($_POST['KlasifikasiMateri'])) {
                     $modelklasfmat->attributes = $_POST['KlasifikasiMateri'];

                     $this->addNewrelasi($modelrelasi, $modelklasfmat);
              }

              $this->editingKlasfmat($modelrelasi, $modelklasfmat);
       }

       public function actionUpdateKlasfmat($id1, $id2) {
//              $modelrelasi = UjianHasKlasifikasimateri::model()->findByAttributes(
//                      array('ujian_idujian' => $id2, 'klasifikasiMateri_idmateri' => $id1));
              $modelrelasi = new UjianHasKlasifikasimateri();
              $modelrelasi->ujian_idujian = $id2;
              $modelklasfmat = KlasifikasiMateri::model()->findByPk($id1);

              if (isset($_POST['KlasifikasiMateri'])) {
                     $modelklasfmat->attributes = $_POST['KlasifikasiMateri'];

                     
                     $this->deleteViasql($id1, $id2);
                     $this->addNewrelasi($modelrelasi, $modelklasfmat);
              }

              $this->editingKlasfmat($modelrelasi, $modelklasfmat);
       }

       public function actionDeleteKlasfmat($id1, $id2) {
//              $this->deleteViasql($id1, $id2);
              $model = UjianHasKlasifikasimateri::model()->findByAttributes(
                      array('ujian_idujian' => $id2, 'klasifikasiMateri_idmateri' => $id1));
              $model->delete();

              if (!isset($_GET['ajax']))
                     $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
       }

       /**
        * Deletes a particular model.
        * If deletion is successful, the browser will be redirected to the 'admin' page.
        * @param integer $id the ID of the model to be deleted
        */
       public function actionDelete($id) {

              $model = $this->loadModel($id);
              $model2 = $model->r_klasfmat;
              foreach ($model2 as $emodel2) {
                     $this->deleteViasql($emodel2->idmateri, $id);
              }
              $model->delete();

              // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
              if (!isset($_GET['ajax']))
                     $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
       }

       /**
        * Lists all models.
        */
       public function actionIndex() {
              $dataProvider = new CActiveDataProvider('Ujian');
              $this->render('index', array(
                  'dataProvider' => $dataProvider,
              ));
       }

       /**
        * Manages all models.
        */
       public function actionAdmin() {
              $model = new Ujian('search');
              $model->unsetAttributes();  // clear any default values
              if (isset($_GET['Ujian']))
                     $model->attributes = $_GET['Ujian'];

              $this->render('admin', array(
                  'model' => $model,
              ));
       }

       public function loadModel($id) {
              $model = Ujian::model()->findByPk($id);
              if ($model === null)
                     throw new CHttpException(404, 'The requested page does not exist.');
              return $model;
       }

       protected function performAjaxValidation($model) {
              if (isset($_POST['ajax']) && $_POST['ajax'] === 'ujian-form') {
                     echo CActiveForm::validate($model);
                     Yii::app()->end();
              }
       }

       public function deleteViasql($id1, $id2) { //menghapus data pada tabel relasi menggunakan sql
              $sql = 'DELETE FROM `bimbel`.`ujian_has_klasifikasimateri` 
                     WHERE `ujian_has_klasifikasimateri`.`ujian_idujian` = ' . $id2 . ' 
                     AND `ujian_has_klasifikasimateri`.`klasifikasiMateri_idmateri` = ' . $id1;
              Yii::app()->db->createCommand($sql)->query();
       }

       public function addNewrelasi($modelrelasi, $modelklasfmat) { //menambah relasi dengan model baru
              $idmateri = $modelklasfmat->findIDmateri(
                      $modelklasfmat->kelas, $modelklasfmat->matapelajaran, $modelklasfmat->bab);

              $modelrelasi->klasifikasiMateri_idmateri = $idmateri;
              if ($modelrelasi->save())
                     $this->redirect(array('update', 'id' => $modelrelasi->ujian_idujian));
       }

       private function editingKlasfmat($modelrelasi, $modelklasfmat) { //cuman coding yg diulang2 biasa, jd dibuat method biar rapi
              $data = KlasifikasiMateri::model()->findAll();
              $listkelas = array_unique(CHtml::listData($data, 'kelas', 'kelas'));
              $listmapel = array_unique(CHtml::listData($data, 'matapelajaran', 'matapelajaran'));
              $listbab = array_unique(CHtml::listData($data, 'bab', 'bab'));

              $this->render('klasfmat', array(
                  'model1' => $modelrelasi,
                  'model2' => $modelklasfmat,
                  'listKelas' => $listkelas,
                  'listMapel' => $listmapel,
                  'listBab' => $listbab,
              ));
       }

}
