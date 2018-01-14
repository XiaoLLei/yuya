<?php

namespace app\controllers;

use Yii;
// use yii\filters\ContentNegotiato;
// use yii\filters\VerbFilter;

// use yii\rest\ActiveController;
use yii\base\Controller;

use app\models\UserAR;


class UserController extends Controller
{
    public function actionIndex()
    {
        // Yii::error("actionIndex");
        $post_data = Yii::$app->request->post();
        return var_export($post_data, true);
    }

    public function actionJoin()
    {
        $post_data = Yii::$app->request->post();

        $user = new UserAR;
        $user->party = $post_data['party'];
        $user->nickName = $post_data['nickName'];
        $user->avatarUrl = $post_data['avatarUrl'];

        $user->save();

        $ret = array(
            'code'  => 0,
            'msg'   => 'OK',
            'data'  => null,
        );

        return json_encode($ret);
    }

    public function actionInfo()
    {
        $post_data = Yii::$app->request->post();

        $id = $post_data['id'];
        $party = $post_data['party'];

        $info = UserAR::find()->where(
            array(
                'and',
                ['party' => $party],
                ['>', 'id', $id]
            )
        )->asArray()->all();

        return json_encode($info);
    }
}
