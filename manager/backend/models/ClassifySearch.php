<?
	namespace backend\models;
	use common\models\classify;
	use yii\data\ActiveDataProvider;
	use yii\base\Model;
	
	class ClassifySearch extends classify{
		public function rules(){
			return [
				['title','safe'],
			];
		}
		
		public function attributeLabels(){
			return[
				'title'=>'标题',
			];
		}
		
		  public function scenarios(){
			 return Model::scenarios(); 
		  }
		
		public function search($params){
				//找到所有的文章条数
				$query = Classify::find()->orderBy('id ASC,parentid ASC');
				

				//如果没有值获得就输出所有条数
				$dataProvider = new ActiveDataProvider([
					'query' => $query,
					 'pagination' => [
							//分页
								'pagesize' =>\yii::$app->params['classifysize'],
						],
					// 'sort' => [
						// 'defaultOrder' => [
							// 'id'=>SORT_ASC,
							// 'parentid' => SORT_ASC
						// ]
					// ],
				]);

			      // 从参数的数据中加载过滤条件，并验证-数据都合格并且赋值成功
				if (!($this->load($params) && $this->validate())) {
					//不执行下面 直接返回给控制器
					return $dataProvider;
				}
				

				
				 // 增加过滤条件来调整查询对象
				$query->andFilterWhere(['id' => $this->id]);
				$query->andFilterWhere(['like', 'title', $this->title])
						->andFilterWhere(['cid' => $this->cid]);


				return $dataProvider;
		}
		
	}
?>