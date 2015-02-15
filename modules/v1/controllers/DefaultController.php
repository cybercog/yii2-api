<?php

namespace app\modules\v1\controllers;

class DefaultController extends \app\controllers\BaseController
{
    
    public function actionIndex()
    {
        $items = ['some', 'array', 'of', 'data' => ['associative', 'array']];
        return $items;
    }
    
}
