<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    public $enableCsrfValidation = false;
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function getPutVars()
    {
        parse_str(file_get_contents("php://input"), $put_vars);
        return $put_vars;
    }
    
}