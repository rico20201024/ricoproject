<?php
namespace backend\controllers;
use yii\web\Controller;
use common\models\Article;
use common\models\Category;
use yii\data\Pagination;  //使用小部件
use backend\models\ArticleSearch;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile; 
use backend\models\UploadForm;

class ArticleManagerController extends Controller
{
  //actions的作用主要是共用功能相同的方法
  public function actions()
  {
	  return [
			'test' => [
				'class' => 'app\common\TestAction',
				'param1' => 'hello',
				'param2' => 'world',
				'param3' => '!!!',
			],
			'ueditor'=>[
					'class' => 'app\common\widgets\ueditor\UeditorAction',
					'config'=>[
						//上传图片配置
						'imageUrlPrefix' => "", /* 图片访问路径前缀 */
						"imagePathFormat" => "/manager/backend/web/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}",//上传保存路径

					]
			],

			// 'test' => [
				// 'class' => 'app\common\widgets\upload\TestAction',
				// 'param1' => 'hello',
				// 'param2' => 'world',
				// 'param3' => '!!!',
			// ],
		];
	} 	

	
	
    //添加文章
    public function actionCreate()
    {
		$model = new UploadForm();
        //创建文章模型
		// if($id=\yii::$app->request->get('id')===null){
			$article = new Article();
		
		// if($id=\yii::$app->request->get('id')){
			// $article=$article->find()->where('id=:id',[':id'=>$id])->one();
		// }
        //创建栏目模型，传递分类信息 
        $categorys = new Category();
        if(isset($_POST['Article']))
        {
			// var_dump(\yii::$app->request->post());
			// exit;
            // $article->attributes=$_POST['Article'];//安全块赋值
            //执行保存，写入数据库 
			
			if($article->UploadImg($model)){
				// $article->create_time=time();
				// $article->content=htmlspecialchars($article->contet);
					// $article->create_time=time();
				if($article->load(\yii::$app->request->post()) && $article->save()){
					$id=\Yii::$app->db->getLastInsertID();
					//数据写入成功，提示保存成功
					\Yii::$app->session->setFlash('info',"新增成功");
					// return $this->redirect(['/article-manager/admin']);
					return $this->redirect(['/article-manager/detailed','id'=>$id]); 					
				}else{
					\Yii::$app->session->setFlash('info',"新增失败");
				}
			}
        }
		$article->hits =0;
		$article->recommend =0;
		$article->status =0;
        //渲染视图
        return  $this->render('update',['article'=>$article,'categorys'=>$categorys,'model'=>$model]);
    }
    //管理文章
    public function actionAdmin()
     {
		 // echo DEFAULT_IMG_URL;		
		// $article=Article::find()->Where('id=1')->one();
	// echo $article->username;
	// exit;
		// var_dump(\yii::$app->request->get('searchModel'));
		//实例化搜索对象
		$searchModel=new ArticleSearch;
		//获取所有文章带搜索的
		$query=Article::find();
		
		//给search传值
		$dataProvider=$searchModel->search(\yii::$app->request->get());
		
		//问题来自这里totalCount是总数


			
			
		return $this->render('adminHtml', [
			// 'pagination'=>$pagination,
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
    }
    //文章删除 用于测试
    public function actionDelete()
    {
		$id=\yii::$app->request->get('id');
		$article=Article::find()->where('id=:id',[':id'=>$id])->one();
		if($article){
			$article->delete();
			\yii::$app->session->setFlash('deleteinfo','删除成功');
			return $this->redirect(\Yii::$app->request->referrer);
		}	
			echo "不存在该用户";
    }
	
	    //删除
    // public function actionDelete($id){
        // $model=Auth::find()->where("id = $id")->one();
        // if($model->delete()){
            // \Yii::$app->session->setFlash('actionInfo',"删除成功");
        // }else {
            // \Yii::$app->session->setFlash('actionInfo',"删除失败");
        // }
        // return $this->redirect(['/admin/auth/list']);
    // }
	
	
    public function actionUpload()
    {
        $model = new UploadForm();

        if (\Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // 文件上传成功
                return true;
            }
        }

    }

	public function actionDetailed(){
		$id=\yii::$app->request->get('id');
		$article=Article::findOne($id);
		return $this->render('detailed',['model'=>$article]);
	}
	
	
	
	//更新
	public function actionUpdate(){
		
		$id=\yii::$app->request->get('id');
		 $categorys = new Category();
		 $model = new UploadForm();
		 $article=Article::find()->where('id=:id',[':id'=>$id])->one();

		if(\yii::$app->request->post()){
			// $article->attributes=$_POST['Article'];
			// $article->updateArticle($_POST['Article']);
			
			if($article->updateArticle(\yii::$app->request->post())){
					//数据写入成功，提示保存成功
					\Yii::$app->session->setFlash('info',"修改wenz成功");
					//防止重复提交
					return $this->redirect(['/article-manager/detailed','id'=>$article->id]); 
					// return $this->render('adminHtml');
					// return $this->redirect(\Yii::$app->request->getReferrer());
				}else{
					\Yii::$app->session->setFlash('info',"修改失败");
			}
		}
		
        //渲染视图
        return  $this->render('update',['article'=>$article,'categorys'=>$categorys,'model'=>$model]);
	}
	
	public function actionTesst(){
		$a=Article::findOne(11);
		if(\yii::$app->request->post()){
		
			$a->attributes=$_POST['Article'];
			if($a->save()){
				\yii::$app->session->setFlash('info','修改成功');
				 return $this->redirect(\Yii::$app->request->getReferrer());
			}else{
				echo '修改失败';
			}
			exit;
		}
		return $this->render('test',['a'=>$a]);
	}
	
	public function actionCut(){
		return $this->render('cut');
	}

}