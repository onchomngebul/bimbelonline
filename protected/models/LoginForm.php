<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel {

       public $username;
       public $password;
       public $rememberMe;
       public $email;
       private $_identity;

       /**
        * Declares the validation rules.
        * The rules state that username and password are required,
        * and password needs to be authenticated.
        */
       public function rules() {
              return array(
                  // username and password are required
                  array('username, password', 'required', 'on' => 'login'),
                  // rememberMe needs to be a boolean
                  array('rememberMe', 'boolean', 'on' => 'login'),
                  // password needs to be authenticated
                  array('password', 'authenticate', 'on' => 'login'),
                  array('email, username', 'required', 'on' => 'lupapass'),
                  array('email', 'email', 'on' => 'lupapass'),
                  array('email', 'exist', 'attributeName' => 'email', 'className' => 'User', 'message' => 'email belum terdaftar', 'on' => 'lupapass'),
                  array('username', 'exist', 'attributeName' => 'username', 'className' => 'User', 'message' => 'username belum terdaftar', 'on' => 'lupapass'),
                  array('username', 'usernEmail', 'on' => 'lupapass'),
              );
       }

       /**
        * Declares attribute labels.
        */
       public function attributeLabels() {
              return array(
                  'rememberMe' => 'Remember me next time',
              );
       }

       /**
        * Authenticates the password.
        * This is the 'authenticate' validator as declared in rules().
        */
       public function authenticate($attribute, $params) {
              if (!$this->hasErrors()) {
                     $this->_identity = new UserIdentity($this->username, $this->password);
                     if (!$this->_identity->authenticate())
                            $this->addError('password', 'Incorrect username or password.');
              }
       }

       /**
        * Logs in the user using the given username and password in the model.
        * @return boolean whether login is successful
        */
       public function login() {
              if ($this->_identity === null) {
                     $this->_identity = new UserIdentity($this->username, $this->password);
                     $this->_identity->authenticate();
              }
              if ($this->_identity->errorCode === UserIdentity::ERROR_NONE) {
                     $duration = $this->rememberMe ? 3600 * 24 * 30 : 0; // 30 days
                     Yii::app()->user->login($this->_identity, $duration);
                     return true;
              }
              else
                     return false;
       }

       public function usernEmail() {
              $model = User::model()->findByAttributes(array('username' => $this->username, 'email' => $this->email));
              if ($model == null)
                     $this->addError("email", "username/ email belum terdaftar");
       }

       public function kirimPass() {
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
              
              $model = User::model()->findByAttributes(array('username' => $this->username, 'email' => $this->email));
              $true = $model->generateSalt();
              $model->password2 = $model->generateSalt();
              $model->password = $model->hashPassword($true, $model->password2);
              $model->save();
              
              $mailer->Body = "Password anda yang baru ialah " . $true . ". lakukanlah perubahan password secepatnya";
              $mailer->Send();
//              if ($mailer->Send()) {
//                     echo "Message sent successfully!";
//              } else {
//                     echo "Fail to send your message!";
//              }
       }

}
