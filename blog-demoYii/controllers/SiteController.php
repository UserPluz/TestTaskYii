<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;



use yii\data\Pagination;
use app\models\Post;
use app\models\PostSearch;

use \yii\db\Query;

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
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                                 //['@'] - аутентифицированный пользователь
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //строит запрос к БД и извлекает все данные из таблицы post
        $query = Post::find();

        $query = $query->select(['id','name', 'content','date'])
        ->from('post')
        ->where(['active' => '1'])
        ->orderBy('date');
        
        
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count()
        ]);
        
        $posts = $query
        ->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

            return $this->render('index', [
                'posts' => $posts,
                'pagination' => $pagination,
            ]);
    }

    public function actionNews($id)
    {
        $post = Post::findOne($id);
        if($post->active)
        {
           return $this->render('news',['post' => $post]);
        }
        
        throw new \yii\web\NotFoundHttpException();
    
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
}
