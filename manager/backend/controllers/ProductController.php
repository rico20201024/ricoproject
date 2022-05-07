<?php
namespace backend\controllers;
use yii\web\Controller;
use common\models\Classify;
use yii\data\Pagination;  //使用小部件
use backend\models\ProductSearch;
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
	/*public function actionIndex(){
		$classify=new Classify;
		//查询5条热销产品
		$productHot=Product::find()->limit(3)->orderBy('sales DESC')->all();
		// var_dump($productHot);
		
		$classifys=Classify::find()->limit(5)->all();
		$query = Product::find();
		$productSearch=new ProductSearch;

		$dataProvider = $productSearch->search(\Yii::$app->request->queryParams);
		//products数组用于储存所有类别的数据
		// $products=[];
		// foreach($classifys as $a){
			// $products[]=Product::find()->where('cid=:id',[':id'=>$a->id])->one();
		// }
		//找出所有产品为金属的并且分页
		// $c=Classify::findOne(2);
		// $p=Product::find()->where('cid=:cid',[':cid'=>$c->id])->all();
		// var_dump($p);
		
			// $cid='1';
		// if(\yii::$app->request->get(1)['cid']){
			// $cid=\yii::$app->request->get(1)['cid'];
		// }

		// $data = Product::find()->where('cid=:cid',[':cid'=>$cid]);  //Field为model层,在控制器刚开始use了field这个model,这儿可以直接写Field,开头大小写都可以,为了规范,我写的是大写
        // $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '2']);    //实例化分页类,带上参数(总条数,每页显示条数)
        // $model = $data->offset($pages->offset)->limit($pages->limit)->all();

		
		// var_dump($model);
		// $product=Product::findOne(2);
		
		// return $this->render('index',['classify'=>$classifys,'model'=>$model,'pages'=>$pages]);
		return $this->render('index',['classify'=>$classifys,'dataProvider'=>$dataProvider,'productSearch'=>$productSearch,'productHot'=>$productHot]);
	}*/
	
	
	
	
	
	public function actionDetailed(){
		echo '产品详细';
	}
	
	
	//新增产品
	public function actionCreate(){
			$upload=new UploadForm;										//图片上存
			$product=new Product;										//产品对象
			$classify=new Classify;										//类别对象
			$classifyArr=$classify->getOptions('product');				//类别
			//如果有信息上存

			
			if(\Yii::$app->request->isPost){
				if($product->UploadImg($upload)){
					// $Product->create_time=time();
					// $Product->content=htmlspecialchars($Product->contet);
						// $Product->create_time=time();
					if($product->load(\yii::$app->request->post()) && $product->save()){

						//数据写入成功，提示保存成功
						\Yii::$app->session->setFlash('info',"新增成功");
					}else{
						\Yii::$app->session->setFlash('info',"新增失败");
					}
				}
			}
			$colorArr=[
				'0'=>'默认（其他）',
				'red'=>'红色',
				'green'=>'绿色',
				'blue'=>'蓝色',
				'pink'=>'粉红色',
				'yellow'=>'黄色',
				'black'=>'黑色',
				'white'=>'白色',
				'orange'=>'橙色',
				'lime'=>'浅绿色',
				'saddlebrown'=>'咖啡色',
			];

			return $this->render('create',['classify'=>$classify,'classifyArr'=>$classifyArr,'product'=>$product,'upload'=>$upload,'colorArr'=>$colorArr]);
	}
	
	
	



	//更新
	public function actionUpdate(){
		$upload=new UploadForm;										//图片上存
		$classify=new Classify;										//类别对象
		$classifyArr=$classify->getOptions('product');				//类别
		$id=\yii::$app->request->get('id');
		
		 $product=Product::find()->where('id=:id',[':id'=>$id])->one();

		if(\yii::$app->request->post()){
			// $Product->attributes=$_POST['Product'];
			// $Product->updateProduct($_POST['Product']);
			
			if($product->updateProduct(\yii::$app->request->post())){
					//数据写入成功，提示保存成功
					\Yii::$app->session->setFlash('info',"修改成功");
					//防止重复提交
					return $this->refresh();
					// return $this->render('adminHtml');
					// return $this->redirect(\Yii::$app->request->getReferrer());
				}else{
					\Yii::$app->session->setFlash('info',"修改失败");
			}
		}
		
			$colorArr=[
				'0'=>'默认（无颜色）',
				'red'=>'红色',
				'green'=>'绿色',
				'blue'=>'蓝色',
				'pink'=>'粉红色',
				'yellow'=>'黄色',
				'black'=>'黑色',
				'white'=>'白色',
				'orange'=>'橙色',
				'lime'=>'浅绿色',
				'saddlebrown'=>'咖啡色',
			];
        //渲染视图
		return $this->render('create',['classify'=>$classify,'classifyArr'=>$classifyArr,'product'=>$product,'upload'=>$upload,'colorArr'=>$colorArr]);
	}





	public function actionDetail(){

			//获取3条比较热销的商品
		$hot=Product::find()->limit(3)->orderBy('sales DESC')->all();
		// var_dump($hot);

		$id=\yii::$app->request->get('id');
		$product=Product::findOne($id);
		
		
		if(!$product){
			exit;
		}
		//获取一条数据
		return $this->render('detail',['product'=>$product,'hot'=>$hot,]);
	}
	
	
	
	
	
    //文章删除 用于测试
    public function actionDelete()
    {
		$id=\yii::$app->request->get('id');
		$product=Product::find()->where('id=:id',[':id'=>$id])->one();
		if($product){
			$product->delete();
			\yii::$app->session->setFlash('deleteinfo','删除成功');
			return $this->redirect(\Yii::$app->request->referrer);
		}	
			echo "不存在该用户";
    }
	
	
	
	
	
	public function actionIndex(){
        //分页读取类别数据
        $model = Product::find();
		$classify=new Classify;
		$search=new ProductSearch;
		
		$dataProvider=$search->search(\Yii::$app->request->queryParams);
		
		$options=$classify->getOptions();
		$options[0]='请选择需要筛选的类别';


        return $this->render('index2', [
            'model' => $model,
			'productSearch'=>$search,
            'dataProvider' => $dataProvider,
			'options'=>$options,
        ]);
	}
	
	
	
	
	
	public function actionText(){
		$classify=Classify::find();
		$classify->where('id=1')->all();
		$query = Product::find();
		$productSearch=new ProductSearch;
		
	
		
		// $dataProvider = new ActiveDataProvider([
            // 'query' => $query,
            // 'pagination' => [
                // 'pageSize' => 2,
            // ],
        // ]);
		 $dataProvider = $productSearch->search(\Yii::$app->request->queryParams);
			// var_dump($dataProvider);

		 
		  // $pagination = new Pagination([
            // 'defaultPageSize' => 3,
            // 'totalCount' => $model->count(),
        // ]);
		
		
		 // $model = $model->orderBy('id ASC')
            // ->offset($pagination->offset)
            // ->limit($pagination->limit)
            // ->all();
		 // var_dump($model);
		 // 增加过滤条件来调整查询对象
        // $query->andFilterWhere([
           // 'cname' => $this->cate.cname,
            // 'title' => $this->title,
        // ]);

        // $query->andFilterWhere(['like', 'title', $this->title]);
		
		// return $this->render('test',['classify'=>$classify,'dataProvider'=>$dataProvider,'models'=>$model,'pagination' => $pagination,'productSearch'=>$productSearch]);
		return $this->render('test',['classify'=>$classify,'dataProvider'=>$dataProvider,'productSearch'=>$productSearch]);
	}

}

//思路
/*
1.先把所有产品类别找出来		Classify::find->all();
2.再从类别中找出所有的产品		product::find()->where('cid=类别的id')->all();
3.循环列出
*/
