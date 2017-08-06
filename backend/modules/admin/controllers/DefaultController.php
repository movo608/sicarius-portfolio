<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {

    	if (!Yii::$app->user->isGuest) {
    		return $this->render('index');
    	} else {
            // throw HttpException - forbidden
    		throw new HttpException('401', 'You are not authorized to access this part of the website.');
    	}
    }
}
