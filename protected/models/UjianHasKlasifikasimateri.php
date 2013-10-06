<?php

/**
 * This is the model class for table "ujian_has_klasifikasimateri".
 *
 * The followings are the available columns in table 'ujian_has_klasifikasimateri':
 * @property integer $ujian_idujian
 * @property integer $klasifikasiMateri_idmateri
 */
class UjianHasKlasifikasimateri extends CActiveRecord {

       /**
        * Returns the static model of the specified AR class.
        * @param string $className active record class name.
        * @return UjianHasKlasifikasimateri the static model class
        */
       public static function model($className = __CLASS__) {
              return parent::model($className);
       }

       /**
        * @return string the associated database table name
        */
       public function tableName() {
              return 'ujian_has_klasifikasimateri';
       }

       /**
        * @return array validation rules for model attributes.
        */
       public function rules() {
              // NOTE: you should only define rules for those attributes that
              // will receive user inputs.
              return array(
                  array('ujian_idujian, klasifikasiMateri_idmateri', 'required'),
                  array('klasifikasiMateri_idmateri', 'cekEntitas'),
              );
       }

       /**
        * @return array relational rules.
        */
       public function relations() {
              // NOTE: you may need to adjust the relation name and the related
              // class name for the relations automatically generated below.
              return array(
              );
       }

       /**
        * @return array customized attribute labels (name=>label)
        */
       public function attributeLabels() {
              return array(
                  'ujian_idujian' => 'Ujian Idujian',
                  'klasifikasiMateri_idmateri' => 'Klasifikasi Materi Idmateri',
              );
       }

       public function cekEntitas() {
              $model = UjianHasKlasifikasimateri::model()->findByAttributes(array(
                  'ujian_idujian' => $this->ujian_idujian,
                  'klasifikasiMateri_idmateri' => $this->klasifikasiMateri_idmateri));
              if ($model != null)
                     $this->addError("klasifikasiMateri_idmateri", "Klasifikasi materi untuk ujian ini telah ada");
       }

}