<?php
class UserLoginWidget extends CWidget
{
    public $title='User login';
    public $visible=true; 
 
    public function init()
    {
        if($this->visible)
        {
 
        }
    }
 
    public function run()
    {
        if($this->visible)
        {
            $this->renderContent();
        }
    }
 
    protected function renderContent()
    {
        
		
		$model = new LoginForm ('login');

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			 echo CActiveForm::validate($model);
			 Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			 $model->attributes = $_POST['LoginForm'];
			 // validate user input and redirect to the previous page if valid
			 if ($model->validate() && $model->login())
					$this->controller->redirect(Yii::app()->request->baseUrl);
		}
        $this->render('UserLogin',array('form'=>$model));
    }   
}
?>