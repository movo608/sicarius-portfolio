<?php

namespace backend\controllers;

use yii\web\Controller;
use common\models\Messages;

class ApiController extends Controller {

	public function actionIndex() {

		$unseenMessages = Messages::find()->where(['seen' => (int) 0])->count();

		return json_encode($unseenMessages);

	}

}