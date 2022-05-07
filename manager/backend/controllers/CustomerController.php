<?php
namespace backend\controllers;
use yii\web\Controller;
use common\models\Product;
use common\models\Customer;
use common\models\Order;
use common\models\Orderdetail;
use yii\data\Pagination;  //使用小部件
use backend\models\CustomerSearch;
use yii\data\ActiveDataProvider;
use common\models\Productneed;
use backend\models\ProductneedSearch;
use yii\web\UploadedFile; 
use backend\models\UploadForm;
use backend\models\OrderSearch;
use yii\base\ErrorException;
use yii\web\NotFoundHttpException;


class CustomerController extends Controller
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



	//更新
	public function actionUpdate(){

		$id=\yii::$app->request->get('id');
		
		 $customer=Customer::find()->where('id=:id',[':id'=>$id])->one();

		if(\yii::$app->request->post()){
			// $customer->attributes=$_POST['customer'];
			// $customer->updatecustomer($_POST['customer']);
			
			if($customer->updateCustomer(\yii::$app->request->post())){
					//数据写入成功，提示保存成功
					\Yii::$app->session->setFlash('info',"修改成功");
					//防止重复提交
					return $this->redirect(['/customer/list']); 
					// return $this->render('adminHtml');
					// return $this->redirect(\Yii::$app->request->getReferrer());
				}else{
					\Yii::$app->session->setFlash('info',"修改失败");
			}
		}
		return $this->render('create',['customer'=>$customer]);
	}



	public function actionCreate(){
		$customer=new Customer;
		if(\yii::$app->request->isPost){
			// var_dump(\yii::$app->request->post());
			$customer->create_time=time();
			$customer->update_time=time();
			if($customer->load(\yii::$app->request->post()) && $customer->save()){
				\yii::$app->session->setFlash('info','新增客户成功');
				return $this->redirect(['/customer/list']); 
			}
		}
		return $this->render('create',['customer'=>$customer]);
	}
	
	
	
	public function actionList(){
		        //分页读取类别数据
        $model=Customer::find();
		
		$search=new CustomerSearch;
		
		$dataProvider=$search->search(\Yii::$app->request->queryParams);
		



        return $this->render('list', [
            'model' => $model,
			'cstomerSearch'=>$search,
            'dataProvider' => $dataProvider,
        ]);
	}
	
	
    //文章删除 用于测试
    public function actionDelete()
    {
		$id=\yii::$app->request->get('id');
		$customer=Customer::find()->where('id=:id',[':id'=>$id])->one();
		if($customer){
			$customer->delete();
			\yii::$app->session->setFlash('deleteinfo','删除成功');
			return $this->redirect(\Yii::$app->request->referrer);
		}	
			echo "不存在该用户";
    }
	
	
	
	
	
	
	
	//客户详细
/*	public function actionDetail(){
		
		$product=new Product;
		$customer=Customer::findOne(\yii::$app->request->get('id'));
		//新建订单
		$order=new Order;
		$orderdetail=new Orderdetail;
		$oArrDate=[];
		$arr=[];

		$products=$product->find()->limit(4)->all();
		
		
		
		//获取订单列表
		$orders=Orderdetail::find()->all();
		
		//首先获取序列日期
		

		foreach($orders as $a){
			$oArrDate[]=substr($a->createtime,0,5);
		}
		
		if(!$customer){
			$customer=Customer::find()->orderBy('id')->one();
			//找出最小的用户并且显示 或者返回
		}
			
		$oArrDate=array_unique($oArrDate);

		$data = Orderdetail::find()->where('userid=:id',[':id'=>$customer->id]);  //Field为model层,在控制器刚开始use了field这个model,这儿可以直接写Field,开头大小写都可以,为了规范,我写的是大写
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '2']);    //实例化分页类,带上参数(总条数,每页显示条数)
        $model = $data->offset($pages->offset)->orderBy('createtime DESC')->limit($pages->limit)->all();



	
		

		
			if(\yii::$app->request->isPost){
						try {
							// if($order->save()){
								// if(\Yii::$app->db->getLastInsertID()){
							if($orderdetail->load(\Yii::$app->request->post())) {
									// $isValid = $order->validate();
									$isValid = $orderdetail->validate();

									if ($isValid) {
											$orderdetail->userid=$customer->id;									//下单人
											$order->status=0;												//状态
											$order->addressid=$customer->location;							//地址
											$order->expressid=1;											//订单
											$order->amount=($orderdetail->price*$orderdetail->productnum);	//总价
											$order->expressno=time();										//订单号
											$order->createtime=time();										//创建时间
											$order->updatetime=time();										//更新时间
										
										
										$order->save(false);
										$orderdetail->orderid=\Yii::$app->db->getLastInsertID();

										$orderdetail->createtime=time();
				
										$orderdetail->save();
										echo "新增订单成功";
										echo  "<br>";
										//跳转到订单详细页面
										// return $this->render();
									}
							
									// $orderdetail->load(\yii::$app->request->post());
									// $orderdetail->validate();
							}
					} catch(\Exception $e) {
						// return $this->render('detail',['customer'=>$customer,'product'=>$product]);
						echo $e->getMessage();
						//即使有错误也不影响往下执行
					}

			
		}
		
		return $this->render('detail',[
							'customer'=>$customer,
							'product'=>$product,
							'order'=>$order,
							'orderdetail'=>$orderdetail,
							'orders'=>$orders, 
							'model' => $model,
							'pages' => $pages,
							'products'=>$products,
						]);
	}*/
	
	
	
	//客户详细
	public function actionDetail(){
		
		setcookie('id','',time()-3600);
		//产品需求
		// $productneed=new Productneed;
		// $product=new Product;
		
		
		$customer=Customer::findOne(\yii::$app->request->get('id'));
		//新建订单
		$order=new Order;

		$orderdetail=new Orderdetail;
		$oArrDate=[];
		$arr=[];
		if(!$customer){
			$customer=Customer::find()->orderBy('id')->one();
			//找出最小的用户并且显示 或者返回
		}
		// $products=$product->find()->limit(4)->all();
		
		
		$productneedSearch=new ProductneedSearch;
		$productneedData=$productneedSearch->search($customer->id);

		//交易总次数
		$productneed=Productneed::find()->where('customerid=:customerid',[':customerid'=>$customer->id])->all();
		$tradenum=0;
		
		foreach($productneed as $v ){
			$tradenum+=$v->tradenum;
		}
		
		//获取订单列表
		$orders=Orderdetail::find()->all();
		
		$searchModel=new OrderSearch;
		
		//已完成订单总价
		$amount['success']=$searchModel->showAllOrderAmonut(0,$customer->id);
		
		//未完成订单
		$amount['incomplete']=$searchModel->showAllOrderAmonut(1,$customer->id);
		$amount['ready']=$searchModel->showAllOrderAmonut(2,$customer->id);
		$amount['wait']=$searchModel->showAllOrderAmonut(3,$customer->id);
		
		
		// echo $amount['incomplete'];
		// exit;
		// echo $customer->id;
		
		$dataProvider=$searchModel->searchCustomer($customer->id);
		//首先获取序列日期
		

		foreach($orders as $a){
			$oArrDate[]=substr($a->createtime,0,5);
		}
		

			
		$oArrDate=array_unique($oArrDate);

		$data = Orderdetail::find()->where('userid=:id',[':id'=>$customer->id]);  //Field为model层,在控制器刚开始use了field这个model,这儿可以直接写Field,开头大小写都可以,为了规范,我写的是大写
        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '2']);    //实例化分页类,带上参数(总条数,每页显示条数)
        $model = $data->offset($pages->offset)->orderBy('createtime DESC')->limit($pages->limit)->all();



	
		

		
			if(\yii::$app->request->isPost){
						try {
							// if($order->save()){
								// if(\Yii::$app->db->getLastInsertID()){
							if($orderdetail->load(\Yii::$app->request->post())) {
									// $isValid = $order->validate();
									$isValid = $orderdetail->validate();

									if ($isValid) {
											$orderdetail->userid=$customer->id;									//下单人
											$order->status=0;												//状态
											$order->addressid=$customer->location;							//地址
											$order->expressid=1;											//订单
											$order->amount=($orderdetail->price*$orderdetail->productnum);	//总价
											$order->expressno=time();										//订单号
											$order->createtime=time();										//创建时间
											$order->updatetime=time();										//更新时间
										
										
										$order->save(false);
										$orderdetail->orderid=\Yii::$app->db->getLastInsertID();

										$orderdetail->createtime=time();
				
										$orderdetail->save();
										echo "新增订单成功";
										echo  "<br>";
										//跳转到订单详细页面
										// return $this->render();
									}
							
									// $orderdetail->load(\yii::$app->request->post());
									// $orderdetail->validate();
							}
					} catch(\Exception $e) {
						// return $this->render('detail',['customer'=>$customer,'product'=>$product]);
						echo $e->getMessage();
						//即使有错误也不影响往下执行
					}

			
		}
		
		return $this->render('detail',[
							'customer'=>$customer,
							// 'product'=>$product,
							'order'=>$order,
							'dataProvider'=>$dataProvider,
							'orderdetail'=>$orderdetail,
							'productneedData'=>$productneedData,
							'orders'=>$orders, 
							'model' => $model,
							'pages' => $pages,
							'tradenum'=>$tradenum,
							'amount'=>$amount,
							// 'products'=>$products,
						]);
	}

}


/*
	先找出所有数据
	获取不重复的年月日
	找该年月日对应的数据
	数组格式如下:
	

	
	[
		[05-23]=>[[],[],[]],
		[05-22]=>[[],[],[]],
		[05-21]=>[[],[],[]],
	]
	
	
*/