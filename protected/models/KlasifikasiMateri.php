<?php

/**
 * This is the model class for table "klasifikasi_materi".
 *
 * The followings are the available columns in table 'klasifikasi_materi':
 * @property integer $idmateri
 * @property integer $kelas
 * @property string $matapelajaran
 * @property string $bab
 *
 * The followings are the available model relations:
 * @property Soal[] $soals
 */
class KlasifikasiMateri extends CActiveRecord {

       /**
        * Returns the static model of the specified AR class.
        * @param string $className active record class name.
        * @return KlasifikasiMateri the static model class
        */
       public $newmapel;
       public $newbab;

       public static function model($className = __CLASS__) {
              return parent::model($className);
       }

       /**
        * @return string the associated database table name
        */
       public function tableName() {
              return 'klasifikasimateri';
       }

       /**
        * @return array validation rules for model attributes.
        */
       public function rules() {
              // NOTE: you should only define rules for those attributes that
              // will receive user inputs.
              return array(
//                  array('matapelajaran', 'required'),
                  array('kelas', 'numerical', 'integerOnly' => true),
                  array('matapelajaran, bab', 'length', 'max' => 20),
                  array('idmateri', 'cekKlasifikasiMateri'),
                  array('newmapel, newbab', 'safe'),
                  array('idmateri, kelas, matapelajaran, bab', 'safe', 'on' => 'search'),
              );
       }

       /**
        * @return array relational rules.
        */
       public function relations() {
              // NOTE: you may need to adjust the relation name and the related
              // class name for the relations automatically generated below.
              return array(
                  'soals' => array(self::HAS_MANY, 'Soal', 'klasifikasiMateri_idmateri'),
                  'r_ujian' => array(self::MANY_MANY, 'Ujian', 'ujian_has_klasifikasimateri(ujian_idujian, klasifikasiMateri_idmateri)'),
              );
       }

       /**
        * @return array customized attribute labels (name=>label)
        */
       public function attributeLabels() {
              return array(
                  'idmateri' => 'Idmateri',
                  'kelas' => 'Kelas',
                  'matapelajaran' => 'Mata Pelajaran',
                  'bab' => 'Bab',
              );
       }

       public function getSpesificmodel($kelas, $mapel, $bab) {
              $criteria = new CDbCriteria;
              $criteria->condition = 'kelas=:kelas AND bab=:bab AND matapelajaran=:matapelajaran';
              $criteria->params = array(':kelas' => $kelas, ':bab' => $bab, ':matapelajaran' => $mapel);

              return KlasifikasiMateri::model()->find($criteria);
       }

       public function cekKlasifikasiMateri() {
              $compare = $this->getSpesificmodel($this->kelas, $this->matapelajaran, $this->bab);
//              $compare = $compare->findAll('bab=?', array($this->bab));
              if ($compare != null)
                     $this->addError('idmateri', 'Klasifikasi materi yg anda masukkan telah ada di database');
       }

       public function findIDmateri($kelas, $mapel, $bab) {

//              $onemodel = $this->getSpesificmodel($kelas, $mapel, $bab);
              $onemodel = $this->getSpesificmodel($kelas, $mapel, $bab); 
              if ($onemodel != null)
                     return $onemodel->idmateri;
              else {
                     $model = new KlasifikasiMateri();
                     $model->kelas = $kelas;
                     $model->matapelajaran = $mapel;
                     $model->bab = $bab;
                     if ($model->save())
                            return $model->idmateri;
              }
       }

       /**
        * Retrieves a list of models based on the current search/filter conditions.
        * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
        */
       public function search() {
              // Warning: Please modify the following code to remove attributes that
              // should not be searched.

              $criteria = new CDbCriteria;

              $criteria->compare('idmateri', $this->idmateri);
              $criteria->compare('kelas', $this->kelas);
              $criteria->compare('matapelajaran', $this->matapelajaran, true);
              $criteria->compare('bab', $this->bab, true);

              return new CActiveDataProvider($this, array(
                  'criteria' => $criteria,
              ));
       }
       
       public function searchViaID($model) {
              $kumpIDmateri = array();
              
              foreach ($model as $mod){
                     array_push($kumpIDmateri, $mod->idmateri);
              }//dari model dijadiin kumpulan array idmateri
              
              $criteria = new CDbCriteria;
              
              $criteria->addInCondition('idmateri', $kumpIDmateri, 'OR');

              $criteria->compare('idmateri', $this->idmateri);
              $criteria->compare('kelas', $this->kelas);
              $criteria->compare('matapelajaran', $this->matapelajaran, true);
              $criteria->compare('bab', $this->bab, true);

              return new CActiveDataProvider($this, array(
                  'criteria' => $criteria,
              ));
       }

}