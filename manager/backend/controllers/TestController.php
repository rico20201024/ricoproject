<?php
namespace backend\controllers;
use yii\web\Controller;
use common\models\Article;
use common\models\Category;
use common\models\User;


class TestController extends Controller
{
    //添加文章
    public function actionIndex()
    {
				// $as=\yii::$app->authManager;
			
				$p=\yii::$app->user->id;
		        //设置当前view的params参数，
                $view = \Yii::$app->view;
                $view->params['layoutData']=[
					'manager'=>'管理员',
				];
				$view = \Yii::$app->view->params['p'] = '这是要传递的数据';	

				// $view->params['layoutData']='123';
				  // $view->params['layoutData']='test';
		

		return $this->render('index',['p'=>$p]);
	}
	
	public function actionButtons(){
		return $this->render('button');
	}
	public function actionDash(){
		return $this->render('dash');
	}
	public function actionMorris(){
		return $this->render('morris');
	}
	public function actionFlot(){
		return $this->render('flot');
	}
	public function actionForms(){
		return $this->render('forms');
	}
	public function actionForms2(){
		return $this->render('forms2');
	}
	public function actionForms3(){
		return $this->render('forms3');
	}
	public function actionDataTables(){
		return $this->render('data-tables');
	}
	public function actionWidgets(){
		return $this->render('widgets');
	}
	public function actionSliders(){
		return $this->render('sliders');
	}
	public function actionProfile(){
		return $this->render('profile');
	}
	public function actionInline(){
		return $this->render('inline');
	}
	public function actionSelect2(){
		return $this->render('select2');
	}
}