<?php

use yii\grid\GridView;
use yii\helpers\Html;

echo Html::a("Добавить новость", ['add'], ['class' => 'btn btn-success']);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    "columns" => [
        'title',
        'text',
        'data',
        'likes',
        'hits',
        ['class' => 'yii\grid\ActionColumn']
    ]

]);
