<?
	namespace backend\models;
	use common\models\Order;
	use yii\data\ActiveDataProvider;
	use yii\base\Model;
	use common\models\Orderdetail;
	
	class OrderSearch extends Order{
		public $status;
		public function rules(){
			return [
				[['orderid','orderdetail_name','customer_name','product_name','status','createtime'],'safe'],
			];
		}
		
		
		/*public function attributes ()
		{
			$attributes = parent::attributes();
			$attributes[] = 'order.orderdetail';
			return $attributes;
		}*/
		
		public function attributeLabels(){
			return [
				'orderdetail_name'=>'名称',
				'customer_name'=>'客户名称',
				'product_name'=>'商品名称',
				'status'=>'订单状态',
				'createtime'=>'订单创建时间',
			];
		}
		
		//增加数据的字段属性
		public function attributes()
		{
			return array_merge(parent::attributes(), ['orderdetail_name','customer_name','product_name']);
		}
		
		  public function scenarios(){
			 return Model::scenarios(); 
		  }
		
		public function search($params){
				//找到所有的文章条数
				// $query = Order::find()->orderBy('status ASC');
				$query = Order::find()->orderBy('createtime DESC');					//按日期
				// var_dump($params);
				// exit;
				//如果没有值获得就输出所有条数
				$dataProvider = new ActiveDataProvider([
					'query' => $query,
					 'pagination' => [
							//分页
								'pagesize' =>\yii::$app->params['ordersize'],
							],
				]);

			
			      // 从参数的数据中加载过滤条件，并验证-数据都合格并且赋值成功
				if (!($this->load($params) && $this->validate())) {
					//不执行下面 直接返回给控制器
					return $dataProvider;
				}


				  // 添加下面这行代码

				//供我解决这个问题的网址：https://www.cnblogs.com/chrdai/p/7966640.html
				
				 // 增加过滤条件来调整查询对象
				// $query->andFilterWhere(['orderid' => $this->orderid])
				// $query->andFilterWhere(['status' => $this->status]);
				// ->andFilterWhere(['like', 'status', $this->status]);
				
				
				 //增加自定义查询   
				$query->join('INNER JOIN', 'ds_orderdetail', 'ds_order.orderid = ds_orderdetail.orderid');
				$query->join('INNER JOIN', 'ds_customer', 'ds_orderdetail.userid = ds_customer.id');
				$query->join('INNER JOIN', 'ds_product', 'ds_orderdetail.productid = ds_product.id');
				
				$query->andFilterWhere(['like', 'ds_orderdetail.text', $this->orderdetail_name])
				->andFilterWhere(['like', 'ds_customer.name', trim($this->customer_name)])
				->andFilterWhere(['like', 'ds_product.title', $this->product_name])
				// ->andFilterWhere(['like', 'ds_orderdetail.createtime', strtotime($this->createtime)])
				->andFilterWhere(['like', 'ds_orderdetail.createtime', $this->createtime])
				// ->andFilterWhere(['between', 'ds_order.createdat', 0(参数1), 1433088000(参数2)])
				->andFilterWhere(['like', 'ds_order.status', $this->status]);

				// \yii::$app->session->setFlash('searchInfo','以下是：<span style="color:red;">'.$this->customer_name.'</span>数据：');

				//增加自定义的索引字段
				$dataProvider->sort->attributes['orderdetail_name'] = [
					'asc' => ['orderdetail_name'=>SORT_ASC],
					'desc' => ['orderdetail_name'=>SORT_DESC],
				];
				return $dataProvider;
		}
		
		
		
		
		
		//客户详细页面使用搜索 通过客户id查找所有的分类
		public function searchCustomer($id){
				//找到所有的文章条数
				// $query = Order::find()->orderBy('status ASC');
				$query = Order::find()->orderBy('createtime DESC');					//按日期
				
				
				$dataProvider = new ActiveDataProvider([
					'query' => $query,
					 'pagination' => [
							//分页
								'pagesize' =>\yii::$app->params['ordersize'],
							],
				]);
				
				 //增加自定义查询   
				$query->join('INNER JOIN', 'ds_orderdetail', 'ds_order.orderid = ds_orderdetail.orderid');
				$query->join('INNER JOIN', 'ds_customer', 'ds_orderdetail.userid = ds_customer.id');
				
				$query->andFilterWhere(['ds_customer.id'=>$id]);
				
				return $dataProvider;
				
		}
		
		//获取所有已经交易成功的订单
		public function showAllOrderAmonut($status,$customerid){
	
				$amount=0;
				
				$connection  = \Yii::$app->db;
				$sql="select o.*,od.*,c.*
				from `ds_order` o
				inner join `ds_orderdetail` od
				on o.orderid=od.orderid
				inner join `ds_customer` c
				on od.userid =c.id Where status=:status and userid=:customerid";

				
				$params = [':status' => $status, ':customerid' =>$customerid];
				$command = $connection->createCommand($sql)
				->bindValues($params);
;
				$posts = $command->queryAll();
				foreach($posts as $post){
					$amount+=($post['productnum']*$post['price']);
				}
				return $amount;
		}
		
		
		//获取所有已经交易成功的订单
		/*public function showAllOrderAmonut($status,$customerid){
			//不惊动订单
			$amount=0;
			$orderdetails=Orderdetail::find()->select(['productnum','price'])->where('userid=:userid',['userid'=>$customerid])->all();
			foreach($orderdetails as $orderdetail){
				$amount+=($orderdetail->price*$orderdetail->productnum);
			}
			return $amount;

		}*/
		
		


	}
	
	
	/*
		select * from `ds_orderdetail` where createtime between UNIX_TIMESTAMP('2020-05-29') and UNIX_TIMESTAMP('2020-05-30');
	*/
?>