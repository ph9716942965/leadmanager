<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','m'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','m'],
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

    /**
     * {@inheritdoc}
     */

    public function actionM(){
        $tbl[]='CREATE TABLE if not exists `db` (
            `id` smallint(6) NOT NULL AUTO_INCREMENT,
            `name` varchar(50) NOT NULL,
            `email` varchar(100) NOT NULL,
            `whatsapp` varchar(15) NOT NULL,
            `phone` varchar(15) NOT NULL,
            `address` varchar(250) NOT NULL,
            `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1';
        $tbl[]='CREATE TABLE if not exists `appointment` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `db_id` smallint(6) NOT NULL,
            `appointment_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            KEY `db_id` (`db_id`),
            CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`db_id`) REFERENCES `db` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
           ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1
           ';
        $tbl[]='CREATE TABLE if not exists `call_log` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `db_id` smallint(6) NOT NULL,
            `review` varchar(250) DEFAULT NULL,
            `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            KEY `db_id` (`db_id`),
            CONSTRAINT `call_log_ibfk_1` FOREIGN KEY (`db_id`) REFERENCES `db` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
           ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1';
       // $tbl[]='';
        foreach($tbl as $migrate_tbl){
            $connection = Yii::$app->getDb();
            $command = $connection->createCommand($migrate_tbl);
            $res=$command->execute();
            //$res=$command->queryAll();
            echo $migrate_tbl."<br>";
        }
        echo "hi";exit;
    }  


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
