<?php

namespace app\modules\admin;

use Yii;
use common\models\Messages;
use yii\web\HttpException;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // throw an error if the user is not logged in
        if (Yii::$app->user->isGuest) {
            throw new HttpException('401', 'You are not authorized to access this part of the webiste.');
        }
    }
}
