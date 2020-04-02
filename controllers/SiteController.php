<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Signup;
use app\models\Login;
use app\models\Reviews;
use app\models\Review;
use app\models\Comments;
use app\models\Comment;

class SiteController extends Controller
{
    // The main page of the app

    public function actionIndex()
    {
        $reviews = Reviews::getReviews();
        return $this->render('index', ['reviews' => $reviews, 'who' => $who]);
    }

    // Return the page with the one review and comments

    public function actionReview($id)
    {
        // Add $id in our function 
        $review = Reviews::getOneReview($id);
        $comments = Comments::getComment();
        return $this->render('review', ['review' => $review, 'comments' => $comments]);
    }

    // Return the page for adding a new review

    public function actionNewreview()
    {
        $review = new Review();

        // if we catch the POST files and our user is not a guest

        if (isset($_POST['Review']) && !Yii::$app->user->isGuest) {
            $review->title = $_POST['Review']['title'];
            $review->review = $_POST['Review']['review'];
            $review->author = Yii::$app->user->identity->email;

            // if validate is ok and our data was added in DB - go to the homepage 

            if ($review->validate() && $review->add()) {
                return $this->goHome();
            }
        }
        return $this->render('newreview', ['review' => $review]);
    }

    // Return the page for adding a new comment

    public function actionNewcomment($id)
    {
        $comment = new Comment();

        // if we catch the POST files and our user is not a guest

        if (isset($_POST['Comment']) && !Yii::$app->user->isGuest) {
            $comment->author = Yii::$app->user->identity->email;
            $comment->comment = $_POST['Comment']['comment'];
            $comment->review_id = $id;

            // if validate is ok and our data was added in DB - go to the review's page 

            if ($comment->validate() && $comment->addComment()) {
                $review = Reviews::getOneReview($id);
                $comments = Comments::getComment();
                return $this->render('review', ['review' => $review, 'comments' => $comments]);
            }
        }
        return $this->render('newcomment', ['comment' => $comment]);
    }

    public function actionLogout()
    {
        // if our user is not a guest run the function logout()

        if (!Yii::$app->user->isGuest) {
            Yii::$app->user->logout();
            return $this->redirect(['login']);
        }
    }

    public function actionSignup()
    {
        $model = new Signup();

        // if we catch the POST files 

        if (isset($_POST['Signup'])) {
            $model->attributes = Yii::$app->request->post('Signup');

            // if validate is ok and our data was added in DB - go to the home page

            if ($model->validate() && $model->signup()) {
                return $this->goHome();
            }
        }
        return $this->render('signup', ['model' => $model]);
    }

    public function actionLogin()
    {
        // if our user is not a guest go to the home page

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $login_model = new Login();

        if (Yii::$app->request->post('Login')) {
            $login_model->attributes = Yii::$app->request->post('Login');

            if ($login_model->validate()) {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }

        return $this->render('login', ['login_model' => $login_model]);
    }
}
