<?php

class BimbinganController extends Controller {

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
                      'actions' => array('Create', 'SubmitJawaban', 'Index', 'view'),
                      'users' => array('@'),
                  ),
                  array('allow', // allow admin user to perform 'admin' and 'delete' actions
                      'actions' => array('update', 'admin', 'delete'),
                      'expression' => '$user->getLevel() <= 1',
                  ),
                  array('deny', // deny all users
                      'users' => array('*'),
                  ),
              );
       }

       public function actionAdmin() {
              $model = new Bimbingan('search');
              $model->unsetAttributes();  // clear any default values
              if (isset($_GET['Bimbingan']))
                     $model->attributes = $_GET['Bimbingan'];

              $this->render('admin', array(
                  'model' => $model,
              ));
       }

       public function actionCreate($idujian) {
              $model = new Bimbingan;
              $model->ujian_idujian = $idujian;
              $model->user_id = Yii::app()->user->id; //ngambil id user yg lagi login
              $model->save();

              $model->getSoalss($model);

              //pagination
              $criteria = new CDbCriteria;
//              $total = $model->r_ujian->jumlahsoal;

//              $pages = new CPagination($total);
//              $pages->pageSize = 5;
//              $pages->applyLimit($criteria);

              $soalss = BimbinganHasSoal::model()->findAllByAttributes(array('bimbingan_idbimbingan' => $model->idbimbingan), $criteria);

              $this->render('simulasiujian', array(
                  'model' => $model,
//                  'pages' => $pages,
                  'soalss' => $soalss,
              ));
       }

       public function actionSubmitJawaban($id1, $id2, $id3) {
              $model = $this->loadModel($id1, $id2, $id3);

              if (isset($_POST['Bimbingan'])) {
                     $model->attributes = $_POST['Bimbingan'];

                     $jumbenar = 0;
                     if ($model->save())
                            for ($no = 1; $no <= count($model->r_bimbnnsoal); $no++) {
                                   $model2 = BimbinganHasSoal::model()->findByAttributes(array(
                                       'bimbingan_idbimbingan' => $model->idbimbingan,
                                       'soal_idsoal' => $model->r_bimbnnsoal[$no - 1]->soal_idsoal));
                                   $model2->nosoal = $no;
                                   $model2->jawabansiswa = $model->alljawa[$no];
                                   if ($model2->jawabansiswa == $model2->r_soal->jawaban) {
                                          $model2->dijawabbenar = 1;
                                          $jumbenar+=1;
                                   }
                                   else
                                          $model2->dijawabbenar = 0;

                                   $model2->save();
                            }

                     $model->nilai = round(100 * ($jumbenar / $model->r_ujian->jumlahsoal));

                     if ($model->save())
                            $this->redirect(array('Index'));
              }
       }

       public function actionView($id1, $id2, $id3) {
              $model = $this->loadModel($id1, $id2, $id3);
              $this->render('view', array(
                  'model' => $model,
                  'model2' => $model->r_bimbnnsoal,
              ));
       }

       public function actionDelete($id1, $id2, $id3) {
              $model = $this->loadModel($id1, $id2, $id3);
//              $model->r_bimbnnsoal->delete();
              foreach ($model->r_bimbnnsoal as $model2) {
                     $model2->delete();
              }
              $model->delete();
              // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
              if (!isset($_GET['ajax']))
                     $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
       }

       public function actionUpdate($id1, $id2, $id3) {
              $model = $this->loadModel($id1, $id2, $id3);
              $model2 = $model->r_bimbnnsoal;
              // Uncomment the following line if AJAX validation is needed
              // $this->performAjaxValidation($model);

              if (isset($_POST['Bimbingan'])) {
                     $model->attributes = $_POST['Bimbingan'];
                     if ($model->save())
                            $this->redirect(array('admin'));
              }

              $this->render('update', array(
                  'model' => $model,
                  'model2' => $model2,
              ));
       }

       public function actionIndex() {

              $siswa = User::model()->findByPk(yii::app()->user->id);
              $criteria = new CDbCriteria;
              $criteria->compare('kelas', $siswa->kelas);

              $dataProvider = new CActiveDataProvider('Ujian', array('criteria' => $criteria));

              $this->render('index', array(
                  'dataProvider' => $dataProvider,
              ));
       }

       public function loadModel($id1, $id2, $id3) {
              $model = Bimbingan::model()->findByAttributes(array('idbimbingan' => $id1, 'ujian_idujian' => $id2, 'user_id' => $id3));
              if ($model === null)
                     throw new CHttpException(404, 'The requested page does not exist.');
              return $model;
       }

       // Uncomment the following methods and override them if needed
       /*
         public function filters()
         {
         // return the filter configuration for this controller, e.g.:
         return array(
         'inlineFilterName',
         array(
         'class'=>'path.to.FilterClass',
         'propertyName'=>'propertyValue',
         ),
         );
         }

         public function actions()
         {
         // return external action classes, e.g.:
         return array(
         'action1'=>'path.to.ActionClass',
         'action2'=>array(
         'class'=>'path.to.AnotherActionClass',
         'propertyName'=>'propertyValue',
         ),
         );
         }
        */
}