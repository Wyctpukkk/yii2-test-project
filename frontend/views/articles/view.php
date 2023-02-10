<?php

use yii\widgets\DetailView;



echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'title',
        'text',
        'author_id',
        'data',
        'likes',
        'hits',
    ],
]);
