<?php

/**
 * This is the model class for table "bimbingan".
 *
 * The followings are the available columns in table 'bimbingan':
 * @property integer $idbimbingan
 * @property integer $ujian_idujian
 * @property string $waktubimbingan
 * @property integer $nilai
 * @property string $catatan
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Ujian $ujianIdujian
 * @property BimbinganHasSoal[] $bimbinganHasSoals
 */
class Bimbingan extends CActiveRecord {

       /**
        * Returns the static model of the specified AR class.
        * @param string $className active record class name.
        * @return Bimbingan the static model class
        */
       public $alljawa;
       public $allsoal;
       public $namaujian;

       public static function model($className = __CLASS__) {
              return parent::model($className);
       }

       /**
        * @return string the associated database table name
        */
       public function tableName() {
              return 'bimbingan';
       }

       /**
        * @return array validation rules for model attributes.
        */
       public function rules() {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
              return array(
                  array('ujian_idujian, user_id', 'required'),
                  array('ujian_idujian, nilai, user_id', 'numerical', 'integerOnly' => true),
                  array('catatan, alljawa, allsoal, namaujian', 'safe'),
                  // The following rule is used by search().
// Please remove those attributes that should not be searched.
                  array('idbimbingan, ujian_idujian, waktubimbingan, nilai, catatan, user_id, namaujian', 'safe', 'on' => 'search'),
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
                  'r_ujian' => array(self::BELONGS_TO, 'Ujian', 'ujian_idujian'),
                  'r_bimbnnsoal' => array(self::HAS_MANY, 'BimbinganHasSoal', 'bimbingan_idbimbingan'),
              );
       }

       public function getSoalss($modelbimbel) {
              $jumsoal = $modelbimbel->r_ujian->jumlahsoal;
              $materi = $modelbimbel->r_ujian->r_klasfmat;
              $jummateri = count($materi);
              $koef = floor($jumsoal / $jummateri); //berapa soal per materi
              $sisa = $jumsoal - ($koef * $jummateri); //sisanya dibagi rata untuk setiap materi
              $jumsoalpermateri = array();

              for ($i = 0; $i < $jummateri; $i++) {
                     if ($sisa == 0) {
                            $jumsoalpermateri[$i] = $koef;
                     } else {
                            $jumsoalpermateri[$i] = $koef + 1;
                            $sisa -= 1;
                     }

                     if ($modelbimbel->r_user->jenispaket_idjenispaket != 1)
                            $sql = 'SELECT * FROM `soal` where `klasifikasiMateri_idmateri` = ' . $materi[$i]->idmateri . '
                     AND `confirmed`= "1" ORDER BY RAND()';
                     else if ($modelbimbel->r_user->jenispaket_idjenispaket == 1)
                            $sql = 'SELECT * FROM `soal` where `klasifikasiMateri_idmateri` = ' . $materi[$i]->idmateri . '
                     AND `tipe`= "free" AND `confirmed`= "1" ORDER BY RAND()';
                     
                     $dataprovider = new CSqlDataProvider($sql, array(
                         'keyField' => 'id',
                         'pagination' => array(
                             'pageSize' => $jumsoalpermateri[$i],
                         ),
                     ));

//data2 dari db langsung dibuat model relasi antara bimbingan dan soal
                     foreach ($dataprovider->getData() as $edata) {
                            $model2 = new BimbinganHasSoal();
                            $model2->bimbingan_idbimbingan = $modelbimbel->idbimbingan;
                            $model2->soal_idsoal = $edata['idsoal'];
                            $model2->save();
                     }
              }
       }

       /**
        * @return array customized attribute labels (name=>label)
        */
       public function attributeLabels() {
              return array(
                  'idbimbingan' => 'ID Bimbingan',
                  'ujian_idujian' => 'ID Ujian',
                  'waktubimbingan' => 'Taggal & Waktu',
                  'nilai' => 'Nilai',
                  'catatan' => 'Catatan',
                  'user_id' => 'Nama User',
                  'namaujian' => 'Nama Ujian',
              );
       }

       /**
        * Retrieves a list of models based on the current search/filter conditions.
        * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
        */
       public function search() {
              $criteria = new CDbCriteria;

              $criteria->compare('idbimbingan', $this->idbimbingan);
              $criteria->compare('ujian_idujian', $this->ujian_idujian);
              $criteria->compare('waktubimbingan', $this->waktubimbingan, true);
              $criteria->compare('nilai', $this->nilai);
              $criteria->compare('catatan', $this->catatan, true);
              $criteria->compare('user_id', $this->user_id);

              return new CActiveDataProvider($this, array(
                  'criteria' => $criteria,
              ));
       }

       public function searchViaID($id) {
              $criteria = new CDbCriteria;

              $criteria->with = array('r_ujian');
              $criteria->compare('idbimbingan', $this->idbimbingan);
              $criteria->compare('waktubimbingan', $this->waktubimbingan, true);
              $criteria->compare('nilai', $this->nilai);
              $criteria->compare('catatan', $this->catatan, true);
              $criteria->compare('user_id', $id);

              $criteria->compare('r_ujian.namaujian', $this->namaujian, true);

              return new CActiveDataProvider($this, array(
                  'criteria' => $criteria,
              ));

//              return new CActiveDataProvider(get_class($this), array(
//                  'criteria' => $criteria,
//                  'sort' => array(
//                      'attributes' => array(
//                          'namaujian' => array(
//                              'asc' => 'r_ujian.namaujian',
//                              'desc' => 'r_ujian.namaujian DESC',
//                          ),
//                          '*',
//                      ),
//                  ),
//              ));
       }

}