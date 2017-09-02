<?php

namespace app\modules\admin;

use Yii;
use common\models\Messages;

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

        // custom initialization code goes here
        Yii::$app->session->setFlash('success', 'MERE BA');
    }
}
