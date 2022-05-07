<?php
namespace backend\controllers;
use yii\web\Controller;
use common\models\Classify;
use yii\data\Pagination;  //使用小部件
use backend\models\ArticleSearch;
use yii\data\ActiveDataProvider;
use common\models\Product;
use yii\web\UploadedFile; 
use backend\models\UploadForm;

class ProductController extends Controller
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


	//产品显示-先显示分类
	public function actionIndex(){
		$classify=new Classify;

		$classifys=Classify::find()->limit(5)->all();

		
		//products数组用于储存所有类别的数据
		// $products=[];
		// foreach($classifys as $a){
			// $products[]=Product::find()->where('cid=:id',[':id'=>$a->id])->one();
		// }
		//找出所有产品为金属的并且分页
		// $c=Classify::findOne(2);
		// $p=Product::find()->where('cid=:cid',[':cid'=>$c->id])->all();
		// var_dump($p);
		
			$cid='1';
		if(\yii::$app->request->get(1)['cid']){
			$cid=\yii::$app->request->get(1)['cid'];
		}

		$data = Product::find()->where('cid=:cid',[':cid'=>$cid]);  //Field为model层,在控制器刚开始use了field这个model,这儿可以直接写Field,开头大小写都可以,为了规范,我写的是大写
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '2']);    //实例化分页类,带上参数(总条数,每页显示条数)
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();

		
		// var_dump($model);
		$product=Product::findOne(2);
		
		return $this->render('index',['classify'=>$classifys,'model'=>$model,'pages'=>$pages]);
	}
	
	
	
	
	
	public function actionDetailed(){
		echo '产品详细';
	}
	public function actionUpdate(){
		echo "产品更新";
	}
	public function actionList(){
		echo "产品展示";
	}
	public function actionDelete(){
		echo "产品删除";
	}

}

//思路
/*
1.先把所有产品类别找出来		Classify::find->all();
2.再从类别中找出所有的产品		product::find()->where('cid=类别的id')->all();
3.循环列出
*/
