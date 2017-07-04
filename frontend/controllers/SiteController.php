<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\IndexSections;
use common\models\PhotoGalleryCategories;
use common\models\PhotoGalleryCategoryImages;
use common\models\Messages;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
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
    * Displays the index page of the website. Sends to view file the following:
    * 
    * = Index Sections (intro, bio, doing, work, contact);
    * = Featured Images;
    * = Creates a new Message model and waits for its submission through the contact form.
    *
    * @return mixed
    */
    public function actionIndex() {

        /*
        * Gets the index sections through the getIndexSections() function
        */
        $sections = $this->getIndexSections();

        /*
        * Makes a new Messages model ready for submission
        */
        $newMessage = new Messages;

        /*
        * Gets the index featured images
        */
        $featuredImages = PhotoGalleryCategoryImages::find()
            ->where(['is_featured' => 1])
            ->limit(6)
            ->offset(0)
            ->all();

        /*
        * If the contact info is submitted, the submitContactForm($defaultModelParam) function is called
        */ 
        if ($newMessage->load(Yii::$app->request->post())) {
            $this->submitContactForm($newMessage);            
        }

        return $this->render('index', [
            'intro'             => $sections['intro'],
            'doing'             => $sections['doing'],
            'bio'               => $sections['bio'],
            'work'              => $sections['work'],
            'contact'           => $sections['contact'],
            'newMessage'        => $newMessage,
            'featuredImages'    => $featuredImages
        ]);
    }

    /**
    * Gets the index sections from the database, 
    * returning them as an array of results.
    */
    private function getIndexSections() {

        $sections = [
            'intro'     => IndexSections::find()->where(['name' => 'intro'])->one(),
            'doing'     => IndexSections::find()->where(['name' => 'doing'])->one(),
            'bio'       => IndexSections::find()->where(['name' => 'bio'])->one(),
            'work'      => IndexSections::find()->where(['name' => 'work'])->one(),
            'contact'   => IndexSections::find()->where(['name' => 'contact'])->one(),
        ];

        return $sections;
    }

    /**
    * If the model is valid and after it is saved into the database,
    * a flash message is set, depending on each case:
    * = if the message could be valdiated or not;
    * = if the message could be saved in the database or not.
    */
    private function submitContactForm($model) {

        if ($model->validate()) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'The message has been successfully sent.');
            } else {
                Yii::$app->session->setFlash('error', 'The message could not be sent.');
            }
        } else {
            Yii::$app->session->setFlash('error', 'The message could not be sent.');
        }

    }

}
