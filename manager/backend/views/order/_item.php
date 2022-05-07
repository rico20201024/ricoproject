<?
		use yii\helpers\Html;
		use common\models\Order;
		use yii\helpers\Url;

?>
					<tr role="row" class="odd">

					  <td class="product" title="<?=$model->orderdetail->productid?>">
							<?
							if(!empty($model->orderdetail->productid)){
								foreach($model->orderdetails as $product){
									echo $product->product->title.',';
								}
							}else{
								echo "未添加或错误";
							}
							
							?>
					  </td>
					  <td>
							<?
								if(isset($model->orderdetail->userid)){
									echo "<a href=".Url::toRoute(['customer/detail','id'=>$model->orderdetail->userid])." target='_blank'>".$model->orderdetail->customer->name."</a>";
								}else{
									echo "未设置或错误";
								}
									
							?>
					  </td>
					  <td>
							<?
							if(!empty($model->orderdetail)){
								foreach($model->orderdetails as $orderdetail){
									echo $orderdetail->price.'元,';
								}
							}else{
								echo "未添加或错误";
							}
							?>
					  </td>
					  <td>
					  		<?
							if(!empty($model->orderdetail)){
								foreach($model->orderdetails as $orderdetail){
									echo $orderdetail->productnum.'个,';
								}
							}else{
								echo "未添加或错误";
							}
							?>
					  </td>
					  <td>
					  	<?
							$num='';
							if(!empty($model->orderdetail)){
								foreach($model->orderdetails as $orderdetail){
									$num+=$orderdetail->productnum*$orderdetail->price;
									// echo $orderdetail->productnum.'总价,';
								}
								echo "<span class='amount' alt=".$num.">".$num."</span>.元";
							}else{
								echo "未添加或错误";
							}
							?>
					  </td>
					  <td><?
							// echo $model->status;
							$info='';
							switch($model->status){
								case 0:
									$info=Order::ShowOrderStatusHtml()[$model->status]."
									<div class='pull-right'>
									<a href='".Url::toRoute(['order/update-status','oid'=>$model->orderid,'status'=>1])."' class='fa fa-fw fa-plus-square' title='已付款代发货'></a>";
									$info.="<a href='".Url::toRoute(['order/update-status','oid'=>$model->orderid,'status'=>2])."' class='fa fa-fw fa-minus-square' title='已发货代付款'></a></div>";
									break;
								case 1:
									$info=Order::ShowOrderStatusHtml()[$model->status]."
									<div class='pull-right'>
									<a href='".Url::toRoute(['order/update-status','oid'=>$model->orderid,'status'=>2])."' class='fa fa-fw fa-minus-square' title='已发货代付款'></a>";									$info.="<a href='".Url::toRoute(['order/update-status','oid'=>$model->orderid,'status'=>0])."' class='fa fa-fw fa-check-square-o' title='点击确定交易完成'></a></div>";
									break;
								case 2:
									$info=Order::ShowOrderStatusHtml()[$model->status]."
									<div class='pull-right'>
									<a href='".Url::toRoute(['order/update-status','oid'=>$model->orderid,'status'=>0])."' class='fa fa-fw fa-check-square-o' title='点击确定交易完成'></a>";									$info.="<a href='".Url::toRoute(['order/update-status','oid'=>$model->orderid,'status'=>1])."' class='fa fa-fw fa-plus-square' title='已付款代发货'></a></div>";
									break;
								case 3:
									$info=Order::ShowOrderStatusHtml()[$model->status]."
									<div class='pull-right'>
									<a href='".Url::toRoute(['order/update-status','oid'=>$model->orderid,'status'=>0])."' class='fa fa-fw fa-check-square-o' title='点击确定交易完成'></a>";									$info.="<a href='".Url::toRoute(['order/update-status','oid'=>$model->orderid,'status'=>1])."' class='fa fa-fw fa-plus-square' title='已付款代发货'></a><a href='".Url::toRoute(['order/update-status','oid'=>$model->orderid,'status'=>1])."' class='fa fa-fw fa-minus-square' title='已付款代发货'></a></div>";
									break;			
								default:
									$info="<font color='#c5c5c5'>特殊状态处理中....</font>";
							}
							
							echo $info;
					  ?></td>
					  <td><?=date('m月d日',$model->createtime)?></td>
					  <td>       <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['detailed', 'id' => $model->orderid], ['title' => '查看']) ?>
								<?if($model->status){echo Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->orderid], ['title' => '修改']) ;}?>
								<?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->orderid], [
									'title' => '删除',
									'data' => [
										'confirm' => '您确定真的要删除(编号为: '.$model->orderid.')订单吗？',
										'method' => 'post',
									]
								]) ?>
					</td>
					</tr>