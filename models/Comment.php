<?php

namespace app\models;

use yii\base\Model;
use Yii;

class Comment extends Model
{
    public $author;
    public $comment;
    public $review_id;

    public function rules()
    {
        return [
            [['comment'], 'required'],
        ];
    }

    public function addComment()
    {
        $comment = new Comments();
        $comment->review_id = $this->review_id;
        $comment->comment = $this->comment;
        $comment->author = Yii::$app->user->identity->email;
        return $comment->save();
    }
}
