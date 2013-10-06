<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property integer $kelas
 * @property string $email
 * @property string $password
 * @property string $password2
 * @property string $tanggalDaftar
 * @property string $jumlahUangElek
 * @property string $avatar
 * @property string $noHp
 * @property string $alamat
 * @property string $tanggalLahir
 * @property string $jenisKelamin
 * @property string $namaDepan
 * @property string $namaBelakang
 */
class User extends CActiveRecord {

       public $passworden;
       public $verifyCode;
       public $cuyy;
       public $tgllahir;
       public $blnlahir;
       public $thnlahir;

       /**
        * Returns the static model of the specified AR class.
        * @param string $className active record class name.
        * @return User the static model class
        */
       public static function model($className = __CLASS__) {
              return parent::model($className);
       }

       /**
        * @return string the associated database table name
        */
       public function tableName() {
              return 'user';
       }

       /**
        * @return array validation rules for model attributes.
        */
       public function rules() {
              // NOTE: you should only define rules for those attributes that
              // will receive user inputs.
              return array(
                  array('username, kelas, password, passworden, email', 'required', 'message' => '{attribute} Tidak Boleh Kosong', 'on' => 'reg'),
                  array('verifyCode', 'captcha', 'allowEmpty' => !extension_loaded('gd'), 'message' => '{attribute} Tidak Sesuai', 'on' => 'reg'),
//                  array('email','email','message' => '{attribute} Tidak Valid sebagai alamat Email'),
                  array('email, username', 'unique', 'message' => '{attribute} Telah Digunakan'),
                  array('kelas', 'numerical', 'integerOnly' => true),
                  array('username, noHp, jenisKelamin, namaDepan, namaBelakang', 'length', 'max' => 15),
                  array('password, passworden', 'length', 'max' => 45),
                  array('email, jumlahUangElek', 'length', 'max' => 40),
//                  array('password, passworden,', 'length', 'max' => 15),
                  array('passworden,', 'cekPass1n2', 'on' => 'reg'),
                  array('alamat', 'length', 'max' => 50),
                  array('avatar', 'file', 'types' => 'jpg', 'allowEmpty' => true),
                  array('tanggalLahir , tgllahir , blnlahir , thnlahir, level', 'safe'),
                  // The following rule is used by search().
                  // Please remove those attributes that should not be searched.
                  array('id, username, kelas, email, password, password2, tanggalDaftar, jumlahUangElek, avatar, noHp, alamat, tanggalLahir, jenisKelamin, namaDepan, namaBelakang', 'safe', 'on' => 'search'),
              );
       }

       public function validatePassword($password) {
              return $this->hashPassword($password, $this->password2) === $this->password;
              //password = pass yg asli ,,, $this->password bukan pass asli
       }

       public function hashPassword($password, $salt) {
              return md5($salt . $password);
              //diubah jd code yg disimpan di db, bukan pass asli
       }

       public function generateSalt() {
              return uniqid('', true); //acak22
       }
       
       public function encodeSCode($sc){
              return $this->hashPassword($this->username, $this->password2) === $sc;
       }

       public function listKelas() {
              return array(
                  '1' => "1 SD", '2' => "2 SD", '3' => "3 SD",
                  '4' => "4 SD", '5' => "5 SD", '6' => "6 SD",
                  '7' => "1 SMP", '8' => "2 SMP", '9' => "3 SMP",
                  '10' => "1 SMA", '11' => "2 SMA", '12' => "3 SMA");
       }

       public function isiTTL() {
              $fusion = array($this->thnlahir, $this->blnlahir, $this->tgllahir);
              $this->tanggalLahir = implode("-", $fusion);
//              $this->tanggalLahir = $this->thnlahir . "-" . $this->blnlahir . "-" . $this->tgllahir;
       }
       
       public function cekPass1n2(){
              if (!$this->validatePassword($this->passworden))
                     $this->addError ("passworden", "Password lagi tidak sama dengan password");
       }
       
       public function Kirimemail() {
              $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
              $mailer->IsSMTP();
              $mailer->IsHTML(true);
              $mailer->SMTPAuth = true;
              $mailer->SMTPSecure = "ssl";
              $mailer->SMTPDebug = 1;
              $mailer->Host = "smtp.gmail.com";
              $mailer->Port = 465;
              $mailer->Username = "buchori.12ipa6@gmail.com";
              $mailer->Password = 'lupalagi';
              $mailer->From = "Admin";
              $mailer->FromName = "Admin Bimbel Online";
              $mailer->AddAddress($this->email);
              $mailer->Subject = "Verifikasi Email";
              
              $link = "http://localhost:8081/BimbelOnline/index.php?r=ManageUser/user/verifyemail&sc=". 
                      $this->hashPassword($this->username,$this->password2);
              $mailer->Body = "Klik link berikut untuk verifikasi email anda ". $link;
              $mailer->Send();
//              if ($mailer->Send()) {
//                     echo "Message sent successfully!";
//              } else {
//                     echo "Fail to send your message!";
//              }
       }

       /**
        * @return array relational rules.
        */
       public function relations() {
              // NOTE: you may need to adjust the relation name and the related
              // class name for the relations automatically generated below.
              return array(
                  'r_bimbingan' => array(self::HAS_MANY, 'Bimbingan', 'user_id'),
              );
       }

       /**
        * @return array customized attribute labels (name=>label)
        */
       public function attributeLabels() {
              return array(
                  'id' => 'ID',
                  'username' => 'Username',
                  'kelas' => 'Kelas',
                  'email' => 'Email',
                  'password' => 'Password',
                  'password2' => 'Password2',
                  'tanggalDaftar' => 'Tanggal Daftar',
                  'jumlahUangElek' => 'Jumlah Uang Elek',
                  'jenispaket_idjenispaket' => "ID Jenis paket",
                  'avatar' => 'Avatar',
                  'noHp' => 'No Handphone',
                  'alamat' => 'Alamat',
                  'tanggalLahir' => 'Tanggal Lahir',
                  'jenisKelamin' => 'Jenis Kelamin',
                  'namaDepan' => 'Nama Depan',
                  'namaBelakang' => 'Nama Belakang',
                  'passworden' => 'Password lagi',
                  'level' => 'User Level',
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


              $criteria->compare('id', $this->id);
              $criteria->compare('username', $this->username, true);
              $criteria->compare('kelas', $this->kelas);
              $criteria->compare('email', $this->email, true);
              $criteria->compare('password', $this->password, true);
              $criteria->compare('password2', $this->password2, true);
              $criteria->compare('tanggalDaftar', $this->tanggalDaftar, true);
              $criteria->compare('jumlahUangElek', $this->jumlahUangElek, true);
              $criteria->compare('avatar', $this->avatar, true);
              $criteria->compare('noHp', $this->noHp, true);
              $criteria->compare('alamat', $this->alamat, true);
              $criteria->compare('tanggalLahir', $this->tanggalLahir, true);
              $criteria->compare('jenisKelamin', $this->jenisKelamin, true);
              $criteria->compare('namaDepan', $this->namaDepan, true);
              $criteria->compare('namaBelakang', $this->namaBelakang, true);


              return new CActiveDataProvider($this, array(
                  'criteria' => $criteria,
              ));
       }

}