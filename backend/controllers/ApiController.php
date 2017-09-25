<?php

namespace backend\controllers;

use yii\web\Controller;
use common\models\Messages;

class ApiController extends Controller {

	/**
	 * Counts the messages which have not yet been seen.
	 */
	public function actionIndex() {

		$unseenMessages = Messages::find()->where(['seen' => (int) 0])->count();

		return json_encode($unseenMessages);
	}

}