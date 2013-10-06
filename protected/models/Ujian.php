<?php

/**
 * This is the model class for table "ujian".
 *
 * The followings are the available columns in table 'ujian':
 * @property integer $idujian
 * @property string $namaujian
 * @property integer $kelas
 * @property integer $jumlahsoal
 *
 * The followings are the available model relations:
 * @property Bimbingan[] $bimbingans
 * @property Klasifikasimateri[] $klasifikasimateris
 */
class Ujian extends CActiveRecord {

       public $listklasfmat;
       public $kelas;
       public $mapel;
       public $bab;
       public $listkelas;
       public $listmapel;
       public $listbab;

       /**
        * Returns the static model of the specified AR class.
        * @param string $className active record class name.
        * @return Ujian the static model class
        */
       public static function model($className = __CLASS__) {
              return parent::model($className);
       }

       /**
        * @return string the associated database table name
        */
       public function tableName() {
              return 'ujian';
       }

       /**
        * @return array validation rules for model attributes.
        */
       public function rules() {
              // NOTE: you should only define rules for those attributes that
              // will receive user inputs.
              return array(
                  array('namaujian, kelas, jumlahsoal', 'required'),
                  array('kelas, jumlahsoal, waktu', 'numerical', 'integerOnly' => true),
                  array('namaujian', 'length', 'max' => 25),
                  array('kelas, matpel, bab', 'safe'),
                  // The following rule is used by search().
                  // Please remove those attributes that should not be searched.
                  array('idujian, namaujian, kelas, jumlahsoal', 'safe', 'on' => 'search'),
              );
       }

       /**
        * @return array relational rules.
        */
       public function relations() {
              // NOTE: you may need to adjust the relation name and the related
              // class name for the relations automatically generated below.
              return array(
                  'bimbingans' => array(self::HAS_MANY, 'Bimbingan', 'ujian_idujian'),
                  'r_klasfmat' => array(self::MANY_MANY, 'Klasifikasimateri', 'ujian_has_klasifikasimateri(ujian_idujian, klasifikasiMateri_idmateri)'),
              );
       }

       public function behaviors() {
              return array('CSaveRelationsBehavior' => array('class' => 'application.components.CSaveRelationsBehavior'));
       }

       /**
        * @return array customized attribute labels (name=>label)
        */
       public function attributeLabels() {
              return array(
                  'idujian' => 'Idujian',
                  'namaujian' => 'Nama Ujian',
                  'kelas' => 'Kelas',
                  'jumlahsoal' => 'Jumlah Soal',
                  'waktu' => 'Waktu (Menit)',
              );
       }

       /**
        * Retrieves a list of models based on the current search/filter conditions.
        * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
        */
       public function search() {
              // Warning: Please modify the following code to remove attributes that
              // should not be searched.

              $criteria = new CDbCriteria;

              $criteria->compare('idujian', $this->idujian);
              $criteria->compare('namaujian', $this->namaujian, true);
              $criteria->compare('kelas', $this->kelas);
              $criteria->compare('jumlahsoal', $this->jumlahsoal);
              $criteria->compare('waktu', $this->waktu);

              return new CActiveDataProvider($this, array(
                  'criteria' => $criteria,
              ));
       }

       public function cariIDberdasarkanNama($namaujian) {

              $criteria = new CDbCriteria;
              $criteria->compare('namaujian', $namaujian, true);
              $dataprovider = new CActiveDataProvider($this, array(
                  'criteria' => $criteria,
              ));

              $datas = $dataprovider->getData();
              return $datas; 
       }

}