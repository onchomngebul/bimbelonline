<?php

class SoalController extends Controller {

       public $layout = '//layouts/column2';

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
                      'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete'),
                      'expression' => '$user->getLevel() <= 2',
                  ),
                  array('allow', // allow admin user to perform 'admin' and 'delete' actions
                      'actions' => array('update2'),
                      'expression' => '$user->getLevel() <= 1',
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

              $model = new Soal('createpersoal');

              if (isset($_POST['Soal'])) {
                     $model->attributes = $_POST['Soal'];

                     $model->klasifikasiMateri_idmateri =
                             KlasifikasiMateri::model()->findIDmateri($model->kelas, $model->mapel, $model->bab);

                     if ($model->validate()) {
                            $model->olahSoalsss();
                            $this->redirect(array('admin'));
                     }
              }

              $data = KlasifikasiMateri::model()->findAll();
              $listKelas = array_unique(CHtml::listData($data, 'kelas', 'kelas'));
              $listMapel = array_unique(CHtml::listData($data, 'matapelajaran', 'matapelajaran'));
              $listBab = array_unique(CHtml::listData($data, 'bab', 'bab'));

              $this->render('create', array(
                  'model' => $model,
                  'listKelas' => $listKelas,
                  'listMapel' => $listMapel,
                  'listBab' => $listBab,
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
              if ($model->idpj == yii::app()->user->id) {
                     if (isset($_POST['Soal'])) {
                            $model->attributes = $_POST['Soal'];
                            $model->klasifikasiMateri_idmateri =
                                    KlasifikasiMateri::model()->findIDmateri($model->kelas, $model->mapel, $model->bab);

                            $model->pilihanjawaban = rtrim(implode('-', $model->piljawa), '-');

                            if ($model->save())
                                   $this->redirect(array('view', 'id' => $model->idsoal, 'id2' => $model->klasifikasiMateri_idmateri));
                     }
                     $data = KlasifikasiMateri::model()->findAll();
                     $listKelas = array_unique(CHtml::listData($data, 'kelas', 'kelas'));
                     $listMapel = array_unique(CHtml::listData($data, 'matapelajaran', 'matapelajaran'));
                     $listBab = array_unique(CHtml::listData($data, 'bab', 'bab'));

                     $model->piljawa = explode("-", $model->pilihanjawaban);

                     $this->render('update', array(
                         'model' => $model,
                         'listKelas' => $listKelas,
                         'listMapel' => $listMapel,
                         'listBab' => $listBab,
                     ));
              }
              else
                     throw new CHttpException(404, 'Your request not valid');
       }

       public function actionUpdate2($id, $id2) {
              $model = $this->loadModel($id, $id2);
              if (isset($_POST['Soal'])) {
                     $model->attributes = $_POST['Soal'];
                     $model->klasifikasiMateri_idmateri =
                             KlasifikasiMateri::model()->findIDmateri($model->kelas, $model->mapel, $model->bab);

                     $model->pilihanjawaban = rtrim(implode('-', $model->piljawa), '-');

                     if ($model->save())
                            $this->redirect(array('view', 'id' => $model->idsoal, 'id2' => $model->klasifikasiMateri_idmateri));
              }
              $data = KlasifikasiMateri::model()->findAll();
              $listKelas = array_unique(CHtml::listData($data, 'kelas', 'kelas'));
              $listMapel = array_unique(CHtml::listData($data, 'matapelajaran', 'matapelajaran'));
              $listBab = array_unique(CHtml::listData($data, 'bab', 'bab'));

              $model->piljawa = explode("-", $model->pilihanjawaban);

              $this->render('update2', array(
                  'model' => $model,
                  'listKelas' => $listKelas,
                  'listMapel' => $listMapel,
                  'listBab' => $listBab,
              ));
       }

       public function actionIndex() {
              $criteria = new CDbCriteria;
              $total = Soal::model()->count();

              $pages = new CPagination($total);
              $pages->pageSize = 5;
              $pages->applyLimit($criteria);

              $posts = Soal::model()->findAll($criteria); 

              $this->render('index', array(
                  'dataProvider' => $posts,
                  'pages' => $pages,
              ));
//              $dataProvider = new CActiveDataProvider('Soal');
//              $this->render('index', array(
//                  'dataProvider' => $dataProvider,
//              ));
       }

       public function actionAdmin() {
              $model = new Soal('search');
              $model->unsetAttributes();  // clear any default values
              if (isset($_GET['Soal']))
                     $model->attributes = $_GET['Soal'];

              if (yii::app()->user->getLevel() <= 1)
                     $this->render('adminbimbel', array(
                         'model' => $model,
                     ));
              else if (yii::app()->user->getLevel() == 2)
                     $this->render('adminsoal', array(
                         'model' => $model,
                     ));
       }

       public function loadModel($id, $id2) {
              $model = Soal::model()->findByAttributes(array('idsoal' => $id, 'klasifikasiMateri_idmateri' => $id2));
              if ($model === null)
                     throw new CHttpException(404, 'The requested page does not exist.');
              return $model;
       }

}