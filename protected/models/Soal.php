<?php

/**
 * This is the model class for table "soal".
 *
 * The followings are the available columns in table 'soal':
 * @property integer $idsoal
 * @property integer $klasifikasiMateri_idmateri
 * @property string $pertanyaan
 * @property string $pilihanjawaban
 * @property string $jawaban
 * @property string $bahasan
 *
 * The followings are the available model relations:
 * @property Klasifikasimateri $klasifikasiMateriIdmateri
 */
class Soal extends CActiveRecord {

       /**
        * Returns the static model of the specified AR class.
        * @param string $className active record class name.
        * @return Soal the static model class
        */
       public $soalss;
       public $kelas;
       public $mapel;
       public $bab;
       public $piljawa;

       public static function model($className = __CLASS__) {
              return parent::model($className);
       }

       /**
        * @return string the associated database table name
        */
       public function tableName() {
              return 'soal';
       }

       /**
        * @return array validation rules for model attributes.
        */
       public function rules() {
              // NOTE: you should only define rules for those attributes that
              // will receive user inputs.
              return array(
                  array('soalss', 'cekElemen', 'on' => 'createpersoal'),
                  array('klasifikasiMateri_idmateri', 'numerical', 'integerOnly' => true),
                  array('kelas, mapel, bab, pertanyaan, jawaban, pilihanjawaban, piljawa, soalss, tipe, confirmed', 'safe'),
                  // The following rule is used by search().
                  // Please remove those attributes that should not be searched.
                  array('idsoal, klasifikasiMateri_idmateri, pertanyaan, pilihanjawaban, jawaban, bahasan', 'safe', 'on' => 'search'),
              );
       }

       public function olahSoalsss() {
              $pisahpersoal = explode("$$$", $this->soalss);

              foreach ($pisahpersoal as $esoal) {

                     $pisahperelemen = explode("###", $esoal);
                     $modellagi = new Soal();
                     $modellagi->klasifikasiMateri_idmateri = $this->klasifikasiMateri_idmateri;
                     $modellagi->tipe = $this->tipe;

                     $modellagi->pertanyaan = $pisahperelemen[0];
                     $modellagi->pilihanjawaban = $pisahperelemen[1];
                     $modellagi->jawaban = $pisahperelemen[2];
                     $modellagi->bahasan = $pisahperelemen[3];
                     $modellagi->idpj = Yii::app()->user->id;
                     $modellagi->save();
              }
       }

       public function cekElemen() {
              $pisahpersoal = explode("$$$", $this->soalss);
              foreach ($pisahpersoal as $esoal) {
                     $pisahperelemen = explode("###", $esoal);

                     if (count($pisahperelemen) == 1)
                            $this->addError("soalss", "Isi Kolom Soal dengan benar");
                     if (count($pisahperelemen) == 2 || count($pisahperelemen) == 3)
                            $this->addError("soalss", "Isi format Soal dengan benar, ikutilah ketentuan yang dimaksud");
              }
       }

       public function relations() {
              return array(
                  'klasfMat' => array(self::BELONGS_TO, 'Klasifikasimateri', 'klasifikasiMateri_idmateri'),
              );
       }

       public function attributeLabels() {
              return array(
                  'idsoal' => 'Idsoal',
                  'klasifikasiMateri_idmateri' => 'Idmateri',
                  'tipe' => "Tipe",
                  'pertanyaan' => 'Pertanyaan',
                  'pilihanjawaban' => 'Pilihanjawaban',
                  'jawaban' => 'Jawaban',
                  'bahasan' => 'Bahasan',
                  'idpj' => 'ID PJ',
                  'confirmed' => 'Confirmed'
              );
       }

       public function search() {
              $criteria = new CDbCriteria;

              $criteria->compare('idsoal', $this->idsoal);
              $criteria->compare('klasifikasiMateri_idmateri', $this->klasifikasiMateri_idmateri);
              $criteria->compare('pertanyaan', $this->pertanyaan, true);
              $criteria->compare('pilihanjawaban', $this->pilihanjawaban, true);
              $criteria->compare('jawaban', $this->jawaban, true);
              $criteria->compare('bahasan', $this->bahasan, true);

              return new CActiveDataProvider($this, array(
                  'criteria' => $criteria,
              ));
       }

       public function searchbyiduser() {
              $criteria = new CDbCriteria;
              
              $criteria->compare('idpj', yii::app()->user->id);

              $criteria->compare('idsoal', $this->idsoal);
              $criteria->compare('klasifikasiMateri_idmateri', $this->klasifikasiMateri_idmateri);
              $criteria->compare('pertanyaan', $this->pertanyaan, true);
              $criteria->compare('pilihanjawaban', $this->pilihanjawaban, true);
              $criteria->compare('jawaban', $this->jawaban, true);
              $criteria->compare('bahasan', $this->bahasan, true);

              return new CActiveDataProvider($this, array(
                  'criteria' => $criteria,
              ));
       }

}