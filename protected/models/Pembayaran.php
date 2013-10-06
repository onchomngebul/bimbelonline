<?php

/**
 * This is the model class for table "pembayaran".
 *
 * The followings are the available columns in table 'pembayaran':
 * @property integer $idpembayaran
 * @property string $waktu
 * @property string $jumlahpembayaran
 * @property integer $telahdibayar
 * @property string $buktipembayaran
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Pembayaran extends CActiveRecord {

       /**
        * Returns the static model of the specified AR class.
        * @param string $className active record class name.
        * @return Pembayaran the static model class
        */
       public $username;
       public $image;

       public static function model($className = __CLASS__) {
              return parent::model($className);
       }

       /**
        * @return string the associated database table name
        */
       public function tableName() {
              return 'pembayaran';
       }

       /**
        * @return array validation rules for model attributes.
        */
       public function rules() {
              // NOTE: you should only define rules for those attributes that
              // will receive user inputs.
              return array(
                  array('jumlahpembayaran', 'required'),
                  array('telahdibayar, user_id', 'numerical', 'integerOnly' => true),
                  array('jumlahpembayaran', 'length', 'max' => 45),
                  array('keterangan, buktipembayaran', 'safe'),                  
                  array('image', 'file', 'types'=>'jpg, gif, png'),
                  // The following rule is used by search().
                  // Please remove those attributes that should not be searched.
                  array('idpembayaran, waktu, jumlahpembayaran, telahdibayar, buktipembayaran, user_id', 'safe', 'on' => 'search'),
              );
       }

       /**
        * @return array relational rules.
        */
       public function relations() {
              // NOTE: you may need to adjust the relation name and the related
              // class name for the relations automatically generated below.
              return array(
                  'r_user' => array(self::BELONGS_TO, 'User', 'user_id'),
              );
       }

       /**
        * @return array customized attribute labels (name=>label)
        */
       public function attributeLabels() {
              return array(
                  'idpembayaran' => 'Idpembayaran',
                  'waktu' => 'Waktu',
                  'jumlahpembayaran' => 'Jumlah Pembayaran',
                  'telahdibayar' => 'Telah Dibayar',
                  'buktipembayaran' => 'Bukti Pembayaran',
                  'user_id' => 'ID User',
                  'username' => 'Username'
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

              $criteria->compare('idpembayaran', $this->idpembayaran);
              $criteria->compare('waktu', $this->waktu, true);
              $criteria->compare('jumlahpembayaran', $this->jumlahpembayaran, true);
              $criteria->compare('telahdibayar', $this->telahdibayar);
              $criteria->compare('buktipembayaran', $this->buktipembayaran, true);
              $criteria->compare('user_id', $this->user_id);

              return new CActiveDataProvider($this, array(
                  'criteria' => $criteria,
              ));
       }

}