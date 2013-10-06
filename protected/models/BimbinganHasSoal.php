<?php

/**
 * This is the model class for table "bimbingan_has_soal".
 *
 * The followings are the available columns in table 'bimbingan_has_soal':
 * @property integer $bimbingan_idbimbingan
 * @property integer $soal_idsoal
 * @property integer $nosoal
 * @property integer $dijawabbenar
 * @property string $jawabansiswa
 */
class BimbinganHasSoal extends CActiveRecord {

       /**
        * Returns the static model of the specified AR class.
        * @param string $className active record class name.
        * @return BimbinganHasSoal the static model class
        */
       public static function model($className = __CLASS__) {
              return parent::model($className);
       }

       /**
        * @return string the associated database table name
        */
       public function tableName() {
              return 'bimbingan_has_soal';
       }

       /**
        * @return array validation rules for model attributes.
        */
       public function rules() {
              // NOTE: you should only define rules for those attributes that
              // will receive user inputs.
              return array(
                  array('bimbingan_idbimbingan, soal_idsoal', 'required'),
                  array('bimbingan_idbimbingan, soal_idsoal, nosoal, dijawabbenar', 'numerical', 'integerOnly' => true),
                  // The following rule is used by search().
                  // Please remove those attributes that should not be searched.
                  array('nosoal, dijawabbenar, jawabansiswa', 'safe'),
                  array('bimbingan_idbimbingan, soal_idsoal, nosoal, dijawabbenar, jawabansiswa', 'safe', 'on' => 'search'),
              );
       }

       /**
        * @return array relational rules.
        */
       public function relations() {
              // NOTE: you may need to adjust the relation name and the related
              // class name for the relations automatically generated below.
              return array(
                  'r_soal' => array(self::BELONGS_TO, 'Soal', 'soal_idsoal'),
              );
       }

       /**
        * @return array customized attribute labels (name=>label)
        */
       public function attributeLabels() {
              return array(
                  'bimbingan_idbimbingan' => 'Bimbingan Idbimbingan',
                  'soal_idsoal' => 'Soal Idsoal',
                  'nosoal' => 'Nosoal',
                  'dijawabbenar' => 'Dijawabbenar',
                  'jawabansiswa' => 'Jawaban User',
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

              $criteria->compare('bimbingan_idbimbingan', $this->bimbingan_idbimbingan);
              $criteria->compare('soal_idsoal', $this->soal_idsoal);
              $criteria->compare('nosoal', $this->nosoal);
              $criteria->compare('dijawabbenar', $this->dijawabbenar);
              $criteria->compare('jawabansiswa', $this->jawabansiswa, true);

              return new CActiveDataProvider($this, array(
                  'criteria' => $criteria,
              ));
       }

}