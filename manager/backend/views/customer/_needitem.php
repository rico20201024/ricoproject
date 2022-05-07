<?
	use yii\helpers\Url;
?>
<style>
.colorblue{
	color:#579ec7;
}
</style>
					<div class="col-md-12">
							  <div class="info-box">
								<span class="info-box-icon bg-aqua"><i class="fa fa-files-o"></i></span>

								<ul class="info-box-content" style="padding:0 0 10px 10px;">
								  <li class="info-box-text list-group-item">
										<i class="fa fa-fw fa-cc-jcb"></i>
										产品名称：
										<strong class='margin r 20 colorblue'>
										<?=$model->product->title?>
										</strong>
								 </li>
								  <li class="info-box-text list-group-item">
										<i class="fa fa-fw fa-yen"></i>
										产品原价：
										<strong class='margin r 20 colorblue'>
										<?=$model->product->monovalent?>
										</strong>
								 </li>
								  <li class="info-box-text list-group-item">
									<i class="fa fa-fw fa-yen"></i>
									产品报价：<strong class='margin r 20 colorblue danjia'>
									<?=$model->exclusiveprice?> 
									</strong>元
									<input type='text' value='' style='display:none;' class='priceint'>
									<input type='hidden' value='<?=$model->id?>' style='width:0;height:0;' class='priceid'>
									<a href="javascrript:void(0);" type="button" class="btn btn-default btn-xs pull-right updateprice">
									<i class="glyphicon glyphicon-wrench"></i> 修改单价</a>
								 </li>
								  <li class="info-box-text list-group-item"><i class="fa fa-pencil margin-r-5"></i>产品规格：<strong class='margin r 20 colorblue'><?=$model->product->specs?></strong><a href="<?=Url::toRoute(['order/create','id'=>1]);?>" type="button" class="btn btn-default btn-xs pull-right"><i class="glyphicon glyphicon-plus"></i> 添加规格</a></li>
								  <li class="info-box-text list-group-item"><i class="fa fa-file-text-o margin-r-5"></i>产品库存：<strong class='margin r 20 colorblue'><?=$model->product->stock?></strong></li>
								  <li class="info-box-text list-group-item"><i class="fa fa-fw fa-yen"></i>成交金额：<strong class='margin r 20 colorblue'><?=$model->trademoney?></strong></li>
								  <li class="info-box-text list-group-item"><i class="fa fa-fw fa-archive"></i>交易次数：<strong class='margin r 20 colorblue'><?=$model->tradenum?></strong></li>
								  <li class="info-box-text list-group-item">
											<a href="<?=Url::toRoute(['order/create','cid'=>$model->customerid,'pid'=>$model->productid,'prid'=>$model->id]);?>" type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> 生成订单</a>
											<a href="<?=Url::toRoute(['order/delete','cid'=>$model->customerid,'pid'=>$model->productid,'prid'=>$model->id]);?>" type="button" class="btn btn-default btn-xs pull-right"><i class="fa fa-share"></i> 移除</a>
											
									</li>
								</ul>
								<!-- /.info-box-content -->
							  </div>
							  <!-- /.info-box -->
					</div>