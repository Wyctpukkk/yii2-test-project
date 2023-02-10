<?php

namespace frontend\controllers;


use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Articles;
use yii\data\ActiveDataProvider;



class ArticlesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
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
                'class' => VerbFilter::class,
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
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        $articles = Articles::find()->all();

        return $this->render('articles', [
            'articles' => $articles
        ]);
    }


    public function actionArticle()
    {
        $article = Articles::find()->where(['id' => Yii::$app->request->get()['id']])->one();
        return $this->render('article', [
            'article' => $article
        ]);
    }

    public function actionAdd()
    {
        $model = new Articles();
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('upgrade', [
            'model' => $model
        ]);
    }

    public function actionCrud()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Articles::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('crud', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
        $model = Articles::findOne($id);
        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Articles::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('upgrade', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        $model = Articles::findOne($id);
        if ($model) $model->delete();
        return $this->redirect(['crud']);
    }
}
