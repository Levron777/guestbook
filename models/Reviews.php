<?php

namespace app\models;

use yii\db\ActiveRecord;

class Reviews extends ActiveRecord
{
    public function getReviews()
    {
        $reviews = Reviews::find()
            ->all();
        return $reviews;
    }

    public function getOneReview($id)
    {
        $review = Reviews::findOne($id);
        return $review;
    }
}
