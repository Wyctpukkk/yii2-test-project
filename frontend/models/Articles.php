<?php

namespace app\models;

use yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Articles extends ActiveRecord
{
    public function getFullTitle()
    {
        return $this->title;
    }
    public function getShortText($text)
    {
        $text = mb_substr($text, 0, 250);
        $firsPos = strripos($text, ' ');
        $text = mb_substr($text, 0, $firsPos);
        return $text . '...';
    }
    public function getDescription($hits, $value)
    {
        $description = array(
            'like' => array('лайков'),
            'hit' => array('просмотров')
        );


        return $hits . ' ' . $description[$value][0];
    }


    public function rules()
    {
        return [
            [['title', 'text', 'data', 'likes', 'hits'], 'required']
        ];
    }
}
