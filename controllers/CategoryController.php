<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Category;

class CategoryController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
    public function actionCreate()
    {
    $category = new Category();

    if ($category->load(Yii::$app->request->post())) {
        // validate
        if ($category->validate()) {
            // save record
            $category->save();

            // flash message
            Yii::$app->getSession()->setFlash('success', 'Category Added');
            return $this->redirect('index.php?r=category');
        }
    }

    return $this->render('create', [
        'category' => $category,
    ]);
    }

    public function actionIndex()
    {
        // create query
        $query = Category::find();
        

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count()
        ]);

        $categories = $query->orderBy('name')
                    ->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();
                    
                    // print_r($categories);
                    // die();
        return $this->render('index', [
            'categories' => $categories,
            'pagination' => $pagination
        ]);
    }

}
