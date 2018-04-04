<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\LoginForm;
use app\models\FeedbackStudents;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\helpers\url;
use yii\helpers\html;
use yii\web\UrlManager;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['course'],
                'rules' => [
				
				[
                        'actions' => ['course'],
						'controllers' =>['Course'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    
	public function actionFeedback()
    {
        
        return $this->render('feedback');
    }
	public function actionProcess()
    {
        
        return $this->render('process');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
	public function actionMail()
    {
		$students = new FeedbackStudents();
		

        if ($students->load(Yii::$app->request->post())) {
		$university = $students->university;
		$course = $students->course_name;
		//$course = str_replace('','spacereplace',$course);
		$batch=$students->batch;
		$sem = $students->semester;
		$mails=FeedbackStudents::find()->where(['university' => $university,'course_name' => "$course", 'batch'=>$batch,'semester'=>$sem])->all();	
			foreach($mails as $mail)
    {
		
		$regNo = $mail->registration_no;
		//$url = "http://localhost/practical/feedback/create2?university=$university&course=$course&batch=$batch&sem=$sem&amp;regNo=$regNo";
		$url = Url::to(['/feedback/create2', 'university' => $mail->university,'course'=>$mail->course_name,'batch'=>$mail->batch,'sem'=>$sem,'regNo'=>$regNo],TRUE);
		//$url = urlencode($url);
		echo $url;
		
		$feed_link = "<a href = $url>Enter Your Feedback</a>";
		//echo $feed_link;
		
														
		//http://localhost/practical/feedback/create2?university=tmu&course=btech&batch=2016-17&sem=4
        //$url = "http://localhost/practical/feedback/create_temp/university=TMU";
		//university=".$mail->university."/course=".$mail->course_name."/batch=".$mail->batch."/semester =".$mail->semester;
        
		
		//$url2 = "http://localhost/practical/feedback/create";
		//$url2.="2?university=$university&course=$course&batch=2016-17&sem=4";
		
		//$url2 = Yii::$app->urlManager->createUrl(['feedback/create2','university'=>$university,'course'=>$course, 'batch'=>'2016-17','sem'=>'4']);
		//$url2 = Html::a( 'Enter your feedback' , $url = 'feedback/create2', $options = ['university'=>$university,'course'=>$course, 'batch'=>'2016-17','sem'=>'4'] );
		$content = "<h1>Congratulations!</h1>
						<p>You have Entered Into the iNurture Online Feedback System.</p>";
						
						
		//$content= $content. $url2;				
                //send mail here
            $message =\Yii::$app->mailer->compose();
               if( $message->setFrom('ravialmt1@gmail.com')
                        ->setTo($mail->email_id)
                        ->setSubject('Message subject')
						->setTextBody('Plain text content')
						->setHtmlBody($feed_link)
						
						->send())


						{
				//echo "Sent the mail to $mail->email_id.$url2<br />";
				echo $content;
						}
			else
				echo "Unable to send the mail";
			
	}
	
	
            
        } else {
            return $this->render('create', [
                'model' => $students,
            ]);
        }
		
    
				
	}
}