<?php

namespace app\models;

use yii\db\ActiveRecord;

class Comments extends ActiveRecord
{
    public function getComment()
    {
        $comments = Comments::find()
            ->all();
        return $comments;
    }
}
