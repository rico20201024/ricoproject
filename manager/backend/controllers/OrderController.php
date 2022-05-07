<?php
namespace backend\controllers;
use yii\web\Controller;
use common\models\Customer;
use common\models\Order;
use common\models\Product;
use common\models\Orderdetail;
use yii\data\Pagination;  //使用小部件
use backend\models\OrderSearch;
use backend\models\ProductSearch;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile; 
use backend\models\UploadForm;
use common\models\Provisional;
use common\models\Productneed;

class OrderController extends Controller
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

	
	public function actionIndex(){
		//获取所有订单
		//实例化搜索对象
		$searchModel=new OrderSearch;
		//获取所有的客户
		$customers=Customer::find()->select('id')->asArray()->all();
		// var_dump($customers);
		
		//给search传值
		$dataProvider=$searchModel->search(\yii::$app->request->get());
		


			
			
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}
	
	
	
	
	
	
	
	
	/*
		更新页面产品可以完全没有关系 可以不使用
	*/

	//订单更新
	public function actionUpdate(){
		$this->cookie('id','',time()-3600);
		$id=\yii::$app->request->get('id');

		if(!is_numeric($id)){
			return $this->redirect(array('/order/index')); 
		}
		$order=Order::findOne($id);

		if(!$order){
			return $this->redirect(array('/order/index')); 
		}
		// var_dump($order);
		$orderdetail=Orderdetail::find()->where('orderid=:orderid',[':orderid'=>$order->orderid])->one();

		$customer=Customer::findOne($order->orderdetail->userid);
		//只作为显示的？
		$product=Product::findOne($order->orderdetail->productid);
		
		//未作修改的那个对象
		$orderdetailCon=clone $orderdetail;
		$productCon=clone $product;
		//或者客户不能随便修改


		if(\yii::$app->request->isPost){

			// var_dump(\yii::$app->request->post());
			// exit;
			//判断是否有赋值成功
			// $isVal=$customer->load(\yii::$app->request->post());
			// $isVal=$product->load(\yii::$app->request->post());
			$isVal=$orderdetail->load(\yii::$app->request->post());
			//最新的获取的id

			$product=Product::findOne($orderdetail->productid);
			// $customerOne=$customer->findOne($customer->id);
		// var_dump($orderdetail->attributes);
		// exit;

			//修改页面客户不允许修改

				// $orderdetail->userid=$customerOne->id;
				
				//订单总价
				$order->amount=($orderdetail->price*$orderdetail->productnum);
				// $order->addressid=$customer->location;
				// $order->status=1;
				$order->expressid=1;
				$order->expressno=time();
				// $order->createtime=time();
				$order->updatetime=time();
				
				// echo $product->id;
				if($orderdetail->productid==$orderdetailCon->productid){
					// $orderdetail->productnum;		//当前的
					// echo "<br>";
					// echo $orderdetailCon->productnum;	//原来的
					// echo "<br>";
					// echo $n=$orderdetail->productnum-$orderdetailCon->productnum;
					// echo "<br>";
					// echo $product->stock-$n;
					// exit;
					//当前输入的数量-原来的数量 如果增加就是库存需要基础上再减
					$product->stock-=($orderdetail->productnum-$orderdetailCon->productnum);

				}else{
					// echo "不是原来的产品";把原来订单的数量清空返回给产品库存
					$productCon->stock+=$orderdetailCon->productnum;
					$productCon->save();
					//新点击的产品-输入的订单数量
					$product->stock-=$orderdetail->productnum;
					
				}

				$product->save();

				// echo $productCon->id;

					// var_dump($product->errors);
					// exit;
				if($order->save()){
					// $orderdetail->orderid=\Yii::$app->db->getLastInsertID();
					
					// echo $a='已经存在的';
					$orderdetail->productid=$product->id;
					// $orderdetail->createtime=time();
					//最后再新建订单详细
					if($orderdetail->save()){
						// echo "修改订单成功";
						// 获取一条订单信息
						$order=Order::findOne($orderdetail->orderid);
						// var_dump($order->orderdetails);

						//跳转到订单详细页面
						\yii::$app->session->setFlash('ordercreateinfo','订单修改成功');
						// return $this->render('detail',['order'=>$order,'customer'=>$customer]);
						return $this->redirect(array('/order/detailed','id'=>$order->orderid,'order'=>$order));   
						
					}
				}
			
		}
		
		
		
		
		//产品搜索
		$searchModel=new ProductSearch;
		$dataProvider=$searchModel->search(\yii::$app->request->get());
		
		//显示所有产品 带筛选
		return $this->render('create',[
										'searchModel'=>$searchModel,
										'dataProvider'=>$dataProvider,
										'order'=>$order,
										'customer'=>$customer,
										'product'=>$product,
										'orderdetail'=>$orderdetail,
										'readonly'=>'readonly',
									]);
	
	
	}	


	
	
	
	
	
	
	
	public function actionList(){
		echo "订单展示";
	}
	
	
	//删除订单
	public function actionDelete(){
		//细节：订单删除  先删除订单详细  或者创建一个回收站
		$id=\yii::$app->request->get('id');
		$order=Order::find()->where('orderid=:id',[':id'=>$id])->one();
		$orderdetail=new Orderdetail;

		if($order){
			echo "存在该订单";
			//找寻订单详情里的订单也删除
			// $os=$orderdetail->find()->where('orderid=:orderid',[':orderid'=>$order->orderid])->all();
			$orderdetail->deleteAll(['orderid'=>$order->orderid]);
			$order->delete();
			\yii::$app->session->setFlash('deleteinfo','删除订单<strong>编号为：('.$order->expressno.')</strong>成功');
			return $this->redirect(\Yii::$app->request->referrer);
		}	
	}
	
	
	
	
	
	//创建订单
	/*public function actionCreate(){
		
		$order=new Order;
		$orderdetail=new Orderdetail;
		$product=new Product;
		$customer=new Customer;
		$readonly=false;
		
		if($cid=\yii::$app->request->get('cid')){
			
			$customer=Customer::findOne($cid);

			if(!$customer){
				return $this->redirect(array('/order/create'));   
			}
			$readonly=true;
		}else{
			$customer=new Customer;
			$readonly=false;

		}
		
		//提交
		if(\yii::$app->request->isPost){
			//如果是从客户详细页面过来的
			if(isset($customer->id)){
				$customerOne=$customer;
			}else{
				$customer->load(\yii::$app->request->post());
				//看是否找到信息
				$customerOne=Customer::findOne($customer->id);
			}
			
			//上面读取不了客户的资料怎么样 因为不是post过来的数据
			
			//无论客户是否存在
			// $isVal=$product->load(\yii::$app->request->post());

			$isVal=$orderdetail->load(\yii::$app->request->post());
			$productOne=Product::findOne($orderdetail->productid);

			if(!$isVal){
				echo "表单赋值失败";
				//返回上一页
				exit;
			}

			//如果该客户不存在，先新建一个客户
			if(!$customerOne || $customer->id==''){
				// 新建一个客户
				$customer->create_time=time();
				$customer->update_time=time();
				if(!$customer->save()){
					echo "新增失败";
					exit;
				}
				//把新增的客户id传到订单详细表
				
					// 1.先创建客户
					// 2.再创建订单
					// 3.再创建订单明细
				
				$orderdetail->userid=\Yii::$app->db->getLastInsertID();
			}else{
				$orderdetail->userid=$customerOne->id;
			}

				$order->amount=($orderdetail->price*$orderdetail->productnum);
				$order->addressid=$customer->location;
				$order->status=1;
				$order->expressid=1;
				$order->expressno=time();
				$order->createtime=time();
				$order->updatetime=time();

				$productOne->stock-=$orderdetail->productnum;
				$productOne->save();
				
				if($order->save()){
					//将新增的orderid赋予给订单详细的orderid
					$orderdetail->orderid=\Yii::$app->db->getLastInsertID();
					
					// echo $a='已经存在的';
					$orderdetail->createtime=time();
					//最后再新建订单详细
					if($orderdetail->save()){
						//获取一条订单信息
						$order=Order::findOne($orderdetail->orderid);
						// var_dump($order->orderdetails);

						\yii::$app->session->setFlash('ordercreateinfo','订单新增成功');
						// return $this->render('detail',['order'=>$order,'customer'=>$customer]);
						return $this->redirect(array('/order/detailed','id'=>$order->orderid,'order'=>$order));   
					}
				}
			
		}
		
		//产品搜索
		$searchModel=new ProductSearch;
		$dataProvider=$searchModel->search(\yii::$app->request->get());
		//显示所有产品 带筛选
		return $this->render('create',[
										'searchModel'=>$searchModel,
										'dataProvider'=>$dataProvider,
										'order'=>$order,
										'customer'=>$customer,
										'product'=>$product,
										'orderdetail'=>$orderdetail,
										'readonly'=>$readonly,
									]);
	
	
	}*/
	
	
	
	//创建订单2
	public function actionCreate(){
		
		$order=new Order;
		$orderdetail=new Orderdetail;
		$readonly=false;
		$product=new Product;
		$customer=new Customer;

		
		//如果有缓存
		if(isset($_COOKIE['id'])){
			$orderdetail->productid=$_COOKIE['id'];
			$productCookie=Product::findOne($_COOKIE['id']);
			if(!$productCookie){
				echo "不存在该商品";
				exit;
			}
			$product->title=$productCookie->title;
			$product->monovalent=$productCookie->monovalent;
			$product->weight=$productCookie->weight;
		}
		
		//如果已经输入过了就读出缓存
		if(isset($_COOKIE['customername'])){
			// echo $_COOKIE['customername'];
			$customer=$customer->find()->where('name=:name',[':name'=>$_COOKIE['customername']])->one();
			// var_dump($customer);
			// exit;
			if(!$customer){
				echo "不存在该客户";
				exit;
			}
		}

		//从客户产品需求跳转过来
		if(($pid=\yii::$app->request->get('pid'))&&($prid=\yii::$app->request->get('prid'))){
			$this->cookie('id','',time()-3600);
			
			$product=Product::findOne($pid);
			$productneed=Productneed::findOne($prid);

			if(!$product||!$productneed){
				return $this->redirect(array('/order/create'));   
			}
			$orderdetail->productid=$product->id;
			$orderdetail->price=$productneed->exclusiveprice;
			$readonly=true;
		}
		
		
		//判断是否从客户界面跳转过来
		if($cid=\yii::$app->request->get('cid')){
			// $this->cookie('id','',time()-3600);
		
			$customer=Customer::findOne($cid);

			if(!$customer){
				return $this->redirect(array('/order/create'));   
			}
			$readonly=true;
		}
		
		
		//提交
		if(\yii::$app->request->isPost){
			//如果是从客户详细页面过来的
			if(isset($customer->id)){
				$customerOne=$customer;
			}else{
				$customer->load(\yii::$app->request->post());
				//看是否找到信息
				$customerOne=Customer::findOne($customer->id);
			}
			
			//上面读取不了客户的资料怎么样 因为不是post过来的数据
			
			//无论客户是否存在
			// $isVal=$product->load(\yii::$app->request->post());

			$isVal=$orderdetail->load(\yii::$app->request->post());
			$productOne=Product::findOne($orderdetail->productid);


			if(!$isVal){
				echo "表单赋值失败";
				//返回上一页
				exit;
			}

			//如果该客户不存在，先新建一个客户
			if(!$customerOne || $customer->id==''){
				// 新建一个客户
				$customer->create_time=time();
				$customer->update_time=time();
				if(!$customer->save()){
					echo "新增失败";
					exit;
				}
				//把新增的客户id传到订单详细表
				/*
					1.先创建客户
					2.再创建订单
					3.再创建订单明细
				*/
				$orderdetail->userid=\Yii::$app->db->getLastInsertID();
			}else{
				$orderdetail->userid=$customerOne->id;
			}

				$order->amount=($orderdetail->price*$orderdetail->productnum);
				$order->addressid=$customer->location;
				$order->status=3;								//默认为未处理
				$order->expressid=1;
				$order->expressno=time();
				$order->createtime=time();
				$order->updatetime=time();

				$productOne->stock-=$orderdetail->productnum;
				$productOne->save();
				
				if($order->save()){
					//将新增的orderid赋予给订单详细的orderid
					$orderdetail->orderid=\Yii::$app->db->getLastInsertID();
					
					// echo $a='已经存在的';
					$orderdetail->createtime=time();
					//最后再新建订单详细
					if($orderdetail->save()){
						//获取一条订单信息
						$order=Order::findOne($orderdetail->orderid);
						// var_dump($order->orderdetails);
						
						//订单生产成功后删除cookie
						$this->cookie('id','',time()-3600);
						$this->cookie('customername','',time()-3600);
						\yii::$app->session->setFlash('ordercreateinfo','订单新增成功');
						// return $this->render('detail',['order'=>$order,'customer'=>$customer]);
						return $this->redirect(array('/order/detailed','id'=>$order->orderid,'order'=>$order));   
					}
				}
			
		}
		
		//产品搜索
		$searchModel=new ProductSearch;
		$dataProvider=$searchModel->search(\yii::$app->request->get());
		//显示所有产品 带筛选
		return $this->render('create',[
										'searchModel'=>$searchModel,
										'dataProvider'=>$dataProvider,
										'order'=>$order,
										'customer'=>$customer,
										'product'=>$product,
										'orderdetail'=>$orderdetail,
										'readonly'=>$readonly,
									]);
	
	
	}
	
	
	
	
	
	public function actionDetailed(){
		$id=\yii::$app->request->get('id');
		if($id==''||!is_numeric($id)){
			return $this->redirect(array('/order/index')); 
		}
		$order=Order::findOne($id);
		if(!$order){
			return $this->redirect(array('/order/index')); 
		}
		//获取一条订单信息
		// var_dump($order->orderdetails);
		/*foreach($order->orderdetails as $customer){
			//查找所有商品
			$id=$customer->userid;
		}*/
		$customer=Customer::findOne($id);
		return $this->render('detail',['order'=>$order]);
	}

	public function actionProducts($id){
		
		$this->cookie('id',$id,time()+180);
		
		$product=new Product;

		$products=$product->find()->where('id=:id',[':id'=>$id])->asArray()->one();
		
		
		
		$arr=[
			['username'=>'xiaoqiang','age'=>'18'],
			['username'=>'xiaodong','age'=>'17'],
			['username'=>'xiaorui','age'=>'16'],
			['username'=>'xiaoxin','age'=>'15'],
		];
		//写入数据购物车
		/*$provisional=new Provisional;
		$provisional->productid=$id;
		$provisional->createtime=time();
		$isIn=$provisional->find()->where('productid=:id',[':id'=>$id])->one();
		if(!$isIn){
			if($provisional->save()){

				//获取一条数据
				// $productOne=Product::find()->select(['id','title','weight'])->where('id=:id',[':id'=>$id])->asArray()->one();
				// return json_encode(['result' => $productOne]);
				// return $id;
					echo "添加成功";
			}
		}else{
					echo "该预选已存在";
		}*/
		// $arr=['username'=>'xiaoqiang','age'=>'18','sex'=>'man'];
		// $json_obj = json_encode($products);
		// echo $json_obj;
		// echo "123";
		
		$json_obj = json_encode($products);
		echo $json_obj;
	}
	
	
	
	
	
	public function actionCustomer2(){
				$customer=new Customer;
			$customers=$customer->find()->select('name')->asArray()->all();
					
			$a=[];
			foreach($customers as $k=>$c){
				$a[$k+1]=$c['name'];
			}
			
			/*$a[1]="谭先生";
			$a[2]="??";
			$a[3]="李小姐";
			$a[4]="Diana";
			$a[5]="Eva";
			$a[6]="Fiona";
			$a[7]="Gunda";
			$a[8]="Hege";
			$a[9]="Inga";
			$a[10]="Johanna";
			$a[11]="Kitty";
			$a[12]="Linda";
			$a[13]="Nina";
			$a[14]="Ophelia";
			$a[15]="Petunia";
			$a[16]="Amanda";
			$a[17]="Raquel";
			$a[18]="Cindy";
			$a[19]="Doris";
			$a[20]="Eve";
			$a[21]="Evita";
			$a[22]="Sunniva";
			$a[23]="Tove";
			$a[24]="Unni";
			$a[25]="Violet";
			$a[26]="Liza";
			$a[27]="Elizabeth";
			$a[28]="Ellen";
			$a[29]="Wenche";
			$a[30]="Vicky";*/

			$suggest = isset($_POST['suggest']) ? htmlspecialchars($_POST['suggest']) : '';
			$suggest = strtolower($suggest);			//大写转成小写

			$hint = '';
			$responseTxt = '';
			if(strlen($suggest) > 0) {		//长度
				$suggest = substr($suggest, 0 ,1);			//截取第一个字符
				for($i=1; $i<count($a)+1; $i++) {
					$hint = substr(strtolower($a[$i]), 0, 1 );
					if($suggest == $hint) {
						$responseTxt .= '<a href="javascript:void(0);" class="ddd">'. $a[$i] . '</a> , ';
					}
				}
				$responseTxt = substr($responseTxt, 0, -2);
			if(empty($responseTxt)) {
					echo '没有匹配项';
			} else {
				echo $responseTxt;
				}
			} else {
				echo '没有匹配项';
			}	
	}
	
	
	//ajax 
	public function actionCustomer(){
			$this->cookie('customername','',time()-3600);
			$customer=new Customer;
			$suggest = isset($_POST['suggest']) ? htmlspecialchars($_POST['suggest']) : '';
			$suggest = strtolower($suggest);			//大写转成小写
			$suggest=trim($suggest);					//除去空格
			//查找数据一个客户
			$str='';
			if(empty($suggest)){
				echo "请输入关键字";
				return;
			}
			$all=$customer->find()->where(['like', 'name', $suggest])->asArray()->all();
			if(empty($all)){
				echo '没有匹配项';
			}else{
				foreach($all as $cust){
					// echo $cust->
					$str.='<a href="javascript:void(0);" class="ddd">'. $cust['name'] . '</a> , ';
				}
				// echo "zai ma ";
				echo $str;
			}
	}
	
	
	
	
	
	
	
	//修改状态-并且修改产品需求 如果交易成功 查看数据是否已存在 存在就更新 不存在就新增
	public function actionUpdateStatus(){
		$oid=\yii::$app->request->get('oid');
		$status=\yii::$app->request->get('status');
		$order=Order::findOne($oid);
		$productneed=new Productneed;

		$customerid=$order->orderdetail->customer->id;	
		$productid=$order->orderdetail->product->id;	
		
		$needCustomer=Productneed::find()->where('customerid=:customerid',[':customerid'=>$customerid])
		->andWhere('productid=:productid',[':productid'=>$productid])->one();

		//判断是否确定交易完成
		if($status==0){

				//产品id和客户id都存在 
				if($needCustomer){
					$needCustomer->exclusiveprice=$order->orderdetail->price;								//单价
					$needCustomer->tradenum+=1;																//交易次数
					$needCustomer->tradeproductnum+=$order->orderdetail->productnum;						//交易商品数量
					$needCustomer->trademoney+=$order->orderdetail->price*$order->orderdetail->productnum;	//交易金额
					$needCustomer->save();
					if(!$needCustomer->save()){
						echo "更新数据失败";
						exit;
					}															//更新数据
				}else{
					$productneed->productid=$productid;														//商品id
					$productneed->customerid=$customerid;													//客户id
					$productneed->exclusiveprice=$order->orderdetail->price;								//单价
					$productneed->tradenum=1;																//交易次数
					//交易商品数量
					$productneed->tradeproductnum=$order->orderdetail->productnum;														
					$productneed->trademoney+=$order->orderdetail->price*$order->orderdetail->productnum;		//交易金额
					$productneed->createtime=time();															//创建时间
					//更新数据
					if(!$productneed->save()){
						echo "更新数据失败";
						exit;
					}
				}
			\yii::$app->session->setFlash('deleteinfo','订单状态修改成功');
		}else{
			if($needCustomer){
					$needCustomer->tradenum-=1;																//交易次数
					
					//如果交易次数为0 就删除订单
					if($needCustomer->tradenum==0){
						$needCustomer->delete();
						\yii::$app->session->setFlash('deleteinfo','该客户交易次数为：0');
					}else{
						
						//如果交易次数减了也大于1 就更改其他数据
						// echo "减了还有".$needCustomer->tradenum."次交易";
						// exit;							//单价
						//tradeproductnum出现-数错误 改变表中的属性
						$needCustomer->tradeproductnum-=$order->orderdetail->productnum;						//交易商品数量
						$needCustomer->trademoney-=$order->orderdetail->price*$order->orderdetail->productnum;	//交易金额
						$needCustomer->save();
					}
			}
		}
		if(!$order){
			echo "不存在该订单";
			exit;
		}
		$order->status=$status;
		$order->save();
		
			
		
		
		return $this->redirect(\Yii::$app->request->referrer);
		
	}
	
	
	
	
	
	
	//ajax
	public function actionCust($name){
		//查询一个客户
		// $customer=new Customer;
		$customerOne=Customer::find()->where('name=:name',[':name'=>$name])->asArray()->one();
		/*if(!$customerOne){
			echo "不存在该客户";
			exit;
		}*/
		$this->cookie('customername',$name,time()+180);
		$json_obj = json_encode($customerOne);
		echo $json_obj;
	}

	//用于测试的ajax
	function actionAjaxTest($title){
		// $arry_original = array('title'=>'产品1','id'=>1,'price'=>50); 
		// $arrt_string = serialize($arry_original); 						//储存为数组
		// setcookie("name",$arrt_string,time()+3600);						//设置缓存
		// var_dump(unserialize($_COOKIE['name']));						//还原为数组
		// $json_obj = json_encode(unserialize($_COOKIE['name']));
		// echo $json_obj;
		// setcookie('productid','',time()-3600);
		
		// var_dump($_COOKIE);
		// $this->cookie('id','',time()-3600);
		
		if(isset($_COOKIE['id'])){
			// echo $_COOKIE['id'];
			// $this->cookie('id','',time()-3600);
			var_dump($_COOKIE);
		}else{
			echo json_encode($title);
		}
		// var_dump($_COOKIE);


	}
	
	//实时更新cookies
	function cookie($var, $value = '', $time = 0, $path = '', $domain = '', $s = false)
	{
		$_COOKIE[$var] = $value;
		if (is_array($value)) {
			foreach ($value as $k => $v) {
				setcookie($var . '[' . $k . ']', $v, $time, $path, $domain, $s);
			}
		} else {
			setcookie($var, $value, $time, $path, $domain, $s);
		}
	}
}
