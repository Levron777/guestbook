<?php

namespace app\models;

use yii\base\Model;

class Review extends Model
{
    public $title;
    public $review;
    public $author;

    public function rules()
    {
        return [
            [['title', 'review'], 'required'],
        ];
    }

    public function add()
    {
        $review = new Reviews();
        $review->title = $this->title;
        $review->review = $this->review;
        $review->author = $this->author;
        return $review->save();
    }
}
