<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 25.10.17
 * Time: 0:52
 */

namespace app\controllers;


use app\models\Transaction;
use yii\base\Model;
use yii\web\Controller;
use app\models\MyForm;

class CalculatorController extends Controller
{
    public $layout = 'calculator';
    public function actionIndex()
    {
        $model = new MyForm();
        $post = \Yii::$app->request->post();
        if($model->load($post)){

            $expression = str_replace("^","**",$post['MyForm']['expression']);
            $result = eval('return '.$expression.';');
            //debug($result);

            $transacts = Transaction::find()->all();

            return $this->render('result',compact('result','transacts'));
        }
        return $this->render('index',compact('model'));
    }

    public function actionResult()
    {
        return $this->render('result');
    }

    public function actionAjax()
    {
        if(\Yii::$app->request->isAjax){
            \Yii::$app->request->post();
            $post = \Yii::$app->request->post();
            //debug($post['expression']);
            $expression = str_replace("^","**",$post['expression']);
            $result = eval('return '.$expression.';');

            $newTransaction = new Transaction();
            $newTransaction->expression = $post['expression'];
            $newTransaction->result = $result;
            $newTransaction->save();
            return $result;
        }

    }

    public function actionOperations(){
        if(\Yii::$app->request->isAjax){
            \Yii::$app->request->post();
            $post = \Yii::$app->request->post();
            //debug($post['expression']);
            $operation = $post['operation'];

            $operationsKeys = [
                'add'=>'+',
                'div'=>'/',
                'sub'=>'-',
                'mul'=>'*',
                'exp'=>'^',
            ];
            $query = "SELECT * FROM `transactions` where `expression` LIKE '%+%' ";
            //$transacts = Transaction::find()->asArray()->all();
            $transacts = Transaction::find()->where(['LIKE', 'expression', $operationsKeys[$operation]])->asArray()->all();
            //$transacts = Model::findBySql($query)->all();
            //debug($transacts);
            $result = $transacts;
            return json_encode($result);
        }
    }

}