<?php

namespace app\models;

use yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Forms extends ActiveRecord
{

    public function rules()
    {
        return [
            [['name', 'prename', 'email', 'number'], 'required']
        ];
    }
}
