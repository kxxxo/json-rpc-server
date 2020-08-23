<?php

namespace app\controllers;


use app\models\Data;
use app\models\dto\DataDTO;
use JsonRpc2\Controller;
use JsonRpc2\Exception;

class DataController extends Controller
{
    /**
     * Создание
     * @param $data
     * @throws Exception
     */
    public function actionCreate($data)
    {
        $data_model = new Data();
        $data_model->setAttributes((array)$data);
        if (!$data_model->validate() || !$data_model->save()) {
            throw new Exception(
                \Yii::t('yii', 'Invalid Params'),
                Exception::INVALID_PARAMS,
                $data_model->errors
            );
        }
    }

    /**
     * Получение
     * @param $pager
     * @return DataDTO[]
     */
    public function actionGet($pager)
    {
        $models = Data::find()
            ->where(['page_uid' => $pager->page_uid])
            ->orderBy(['id'=>SORT_DESC])
            ->asArray()
            ->all();
        return array_map(function ($elem) {
            /** @var $elem Data */
            return new DataDTO($elem);
        }, $models);

    }
}