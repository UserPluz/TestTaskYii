<?php

   namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\models\LoginForm;
use app\models\User;
use yii\helpers\Url;

class AuthorizationController extends Controller
{

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
            if($model->user->getIsAdmin() == '1')
            {
                return $this->redirect(['/admin']);
            }
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('/site/login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
?>