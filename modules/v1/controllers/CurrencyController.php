<?php

namespace app\modules\v1\controllers;

use Yii;
use app\models\Currency;

class CurrencyController extends DefaultController
{

    public function actionIndex()
    {
        $model = Currency::find();
        Yii::$app->response->statusCode = 200;
        return $model->asArray()->all();
    }

    public function actionCreate()
    {
        $model = new Currency();
        $model->attributes = Yii::$app->request->post();
        if ($model->validate()) {
            $model->save();
            Yii::$app->response->statusCode = 201;
            return $model->toArray();
        } else {
            throw new \yii\web\HttpException(400);
        }
    }

    public function actionEdit($code)
    {
        $model = Currency::findOne(['code' => strtoupper($code)]);
        $model->attributes = $this->getPutVars();
        if ($model->validate()) {
            $model->update();
            Yii::$app->response->statusCode = 200;
            return $model->toArray();
        } else {
            throw new \yii\web\HttpException(400);
        }
    }

    public function actionDelete($code)
    {
        $model = Currency::deleteAll(['code' => strtoupper($code)]);
        if ($model) {
            Yii::$app->response->statusCode = 204;
        } else {
            throw new \yii\web\HttpException(400);
        }
    }

    public function actionSwap($code,$code2)
    {
        $httpAdapter = new \Ivory\HttpAdapter\FileGetContentsHttpAdapter();
        // Create the Yahoo Finance provider
        $chainProvider = new \Swap\Provider\ChainProvider([
            new \Swap\Provider\YahooFinanceProvider($httpAdapter),
            new \Swap\Provider\GoogleFinanceProvider($httpAdapter)
        ]);
        // Create Swap with the provider
        $swap = new \Swap\Swap($chainProvider);
        $rate = $swap->quote(new \Swap\Model\CurrencyPair(
            strtoupper($code),
            strtoupper($code2)
        ));

        return [
            'rate' => $rate->getValue(),
            'date' => $rate->getDate()
        ];
    }

}
