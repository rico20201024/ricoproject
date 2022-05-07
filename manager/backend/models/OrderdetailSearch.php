<?
	namespace backend\models;
	use common\models\Orderdetail;
	use yii\data\ActiveDataProvider;
	use yii\base\Model;
	
	class OrderdetailSearch extends Orderdetail{
		public $status;
		public function rules(){
			return [
				[['detailid','orderid','userid','productid','price','productnum','status'],'safe'],
			];
		}
		
		public function attributes ()
		{
			$attributes = parent::attributes();
			$attributes[] = 'product.title';
			return $attributes;
		}

		
		  public function scenarios(){
			 return Model::scenarios(); 
		  }
		
		public function search($params){
				//找到所有的文章条数
				$query = Orderdetail::find()->orderBy('createtime DESC')->joinWith('product');
		

				//如果没有值获得就输出所有条数
				$dataProvider = new ActiveDataProvider([
					'query' => $query,
					 'pagination' => [
							//分页
								'pagesize' =>2
							],
				]);

			
			      // 从参数的数据中加载过滤条件，并验证-数据都合格并且赋值成功
				if (!($this->load($params) && $this->validate())) {
					//不执行下面 直接返回给控制器
					return $dataProvider;
				}
				


				  // 添加下面这行代码

				
				 // 增加过滤条件来调整查询对象
				$query->andFilterWhere(['detailid' => $this->detailid])
				->andFilterWhere(['like', 'orderid', $this->orderid])
				->andFilterWhere(['like', 'userid', $this->userid])
				// ->andFilterWhere(['like', 'productid', $this->productid])
				->andFilterWhere(['like', 'price', $this->price])
				->andFilterWhere(['like', 'productnum', $this->productnum]);

				return $dataProvider;
		}
		
	}
?>