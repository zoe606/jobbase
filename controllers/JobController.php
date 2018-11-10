<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Category;
use app\models\Job;
use app\models\User;

class JobController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $job = new Job();

        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {

                // save
                $job->save();
                
                // show msg
                Yii::$app->getSession()->setFlash('success' , 'Job Added');

                // redirect
                return $this->redirect('index.php?r=job');
            }
        }

        return $this->render('create', [
            'job' => $job,
        ]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionEdit()
    {
        return $this->render('edit');
    }

    public function actionIndex()
    {
        // create query
        $query = Job::find();
      

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count()
        ]);

        $jobs = $query->orderBy('create_date DESC')
                    ->offset($pagination->offset)
                    ->limit($pagination->limit)
                    ->all();

                    // print_r($jobs);
                    // die();

        return $this->render('index', [
            'jobs' => $jobs,
            'pagination' => $pagination
        ]);  
    }

    public function actionDetails($id)
    {
        // get job
        $job = Job::find()
        ->where(['id' => $id])
        ->one();

        // render view
        return $this->render('details', [
            'job' => $job]);
    }

}
