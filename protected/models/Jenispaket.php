<?php

/**
 * This is the model class for table "jenispaket".
 *
 * The followings are the available columns in table 'jenispaket':
 * @property integer $idjenispaket
 * @property string $namapaket
 * @property integer $masaaktif
 * @property integer $biaya
 * @property string $keterangan
 */
class Jenispaket extends CActiveRecord {

       /**
        * Returns the static model of the specified AR class.
        * @param string $className active record class name.
        * @return Jenispaket the static model class
        */
       public static function model($className = __CLASS__) {
              return parent::model($className);
       }

       /**
        * @return string the associated database table name
        */
       public function tableName() {
              return 'jenispaket';
       }

       /**
        * @return array validation rules for model attributes.
        */
       public function rules() {
              // NOTE: you should only define rules for those attributes that
              // will receive user inputs.
              return array(
                  array('namapaket, masaaktif, biaya', 'required'),
                  array('masaaktif, biaya', 'numerical', 'integerOnly' => true),
                  array('namapaket, keterangan', 'length', 'max' => 45),
                  // The following rule is used by search().
                  // Please remove those attributes that should not be searched.
                  array('idjenispaket, namapaket, masaaktif, biaya, keterangan', 'safe', 'on' => 'search'),
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
                  'idjenispaket' => 'Idjenispaket',
                  'namapaket' => 'Namapaket',
                  'masaaktif' => 'Masaaktif',
                  'biaya' => 'Biaya',
                  'keterangan' => 'Keterangan',
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

              $criteria->compare('idjenispaket', $this->idjenispaket);
              $criteria->compare('namapaket', $this->namapaket, true);
              $criteria->compare('masaaktif', $this->masaaktif);
              $criteria->compare('biaya', $this->biaya);
              $criteria->compare('keterangan', $this->keterangan, true);

              return new CActiveDataProvider($this, array(
                  'criteria' => $criteria,
              ));
       }

}