<?php

namespace app\modules\v1;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\v1\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        if (strtoupper(Yii::$app->request->getQueryParam('format')) === 'XML') {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
        } else {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        }
    }
}
