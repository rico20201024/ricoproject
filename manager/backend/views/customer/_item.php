<?
	use yii\helpers\Url;
	use common\models\Order;
?>
						<div class="col-md-6">
									  <div class="box box-solid" style='border:1px solid #e3e3e3;'>
										<p class="box-header with-border" style='background: #f4f4f4;'>
										  <i class="fa fa-fw fa-clone"></i>
											<span>订单号:<?=$model->orderid;?></span>
										  
										  <span class="time pull-right" style='font-size:12px;color:#9e9e9e;'><i class="fa fa-clock-o"></i> <?=date('m-d',$model->createtime)?></span>
										</p>
										<!-- /.box-header -->
										<div class="box-body">
										  <ul class="todo-list ui-sortable">
											<li style='font-size:16px;'>订单状态：<?
												$status=$model->status;
												if($model->status>3){
													$status=3;
												}
												echo Order::ShowOrderStatusHtml()[$status];
											
											?></li>
											<li><i class="fa fa-fw fa-cc-jcb"></i> 产品名称：<cite title="Source Title"></cite>
											<span style='color:#3c8dbc;'><strong><?
												$title='';
												foreach($model->orderdetails as $product){
													$title.=$product->product->title;
													$title.="，";
												}
												echo getTenStr($title,20);
											?></strong></span>
											</li>
											<li><i class="fa fa-fw fa-briefcase"></i> 产品类别：<cite title="Source Title"></cite>
											<span><?
												$classfy='';
												foreach($model->orderdetails as $product){
													$classfy=$product->product->classify->title;
													$classfy.="，";
												}
												
													echo getTenStr($classfy,20);
											?></span>
											</li>
											<li><i class="fa fa-fw fa-yen"></i> 产品单价：<cite title="Source Title"></cite>
											<span><?
												foreach($model->orderdetails as $orderdetail){
													echo $orderdetail->price;
													echo "，";
												}
											?></span>
											</li>
											<li><i class="fa fa-fw fa-yen"></i> 订单总价：<cite title="Source Title"></cite>
											<span><?
												$amount=0;
												foreach($model->orderdetails as $orderdetail){
													$amount+=($orderdetail->price*$orderdetail->productnum);	
												}
												echo $amount;
											?></span>
											</li>
											<li><i class="fa fa-fw fa-archive"></i>产品数量：<cite title="Source Title"></cite>
											<span><?
												foreach($model->orderdetails as $orderdetail){
													echo $orderdetail->productnum;
													echo "，";
												}
											?></span>



										  <li><a href="<?=Url::toRoute(['order/detailed','id'=>$model->orderid])?>" class="btn btn-primary btn-xs "><i class="glyphicon glyphicon-search"></i>查看</a>
										  <a href="<?=Url::toRoute(['order/update','id'=>$model->orderid])?>" class="btn btn-danger btn-xs"><i class="fa fa-fw fa-wrench"></i>修改</a></li>
										  
										  </ul>
										</div>
										<!-- /.box-body -->
									  </div>
									  <!-- /.box -->
							</div>