<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;

class UserController extends \yii\web\Controller
{
    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionRegister()
    {
        $user = new User();

        if ($user->load(Yii::$app->request->post())) {
            if ($user->validate()) {
                $user->save();

            // flash message
            Yii::$app->getSession()->setFlash('success', 'You are now registered');
            return $this->redirect('index.php');
            }
        }

        return $this->render('register', [
            'user' => $user,
        ]);
    }

}
