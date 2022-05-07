<?
	use yii\helpers\url;
?>
<script>
window.setTimeout(function(){
   $('[data-dismiss="alert"]').alert('close');
},3000);
</script>
	<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">订单详情</h3>
			  <a href='javascript:;void(0)' onclick="javascript:history.back()"; style='margin-left:10px;' class='pull-right'>返回上一页</a>
			  <a href='<?=Url::toRoute(['order/index'])?>' class='pull-right'  >返回订单列表</a>	
            </div>

			<?if(\yii::$app->session->hasFlash('ordercreateinfo')){?>
				<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> <?=\yii::$app->session->getFlash('ordercreateinfo');?></h4>
             </div>
			<?}?>

      </div>
<section class="content"  style='letter-spacing:1px;'>

      <div class="row">

        <div class="col-xs-12" style=' font-size:13px;'>
          <div class="nav-tabs-custom">
			<div class='box-header with-border'>
					<ul class="users-list clearfix">
					<li>	
						<h5 class="box-title" style='font-size:13px;'><i class="fa fa-tag"></i>   订单号：<?=$order->expressno?></h5>
					</li>
                    <li>
                      <span class="users-list-date">
							<a href='#'>更多</a>
							
						</span>
                    </li>                    <li>
                      <span class="users-list-date">
							订单创建时间：<?=date('Y年m月d日 H:i:s',$order->createtime)?>
					</span>
                    </li>
                    <li>
                      <span class="users-list-date">
							普通订单：其他	
						</span>
                    </li>
                  </ul>

			</div>
			
            <div class="invoice" style='padding-top:5px'>
				<div class="row invoice-info ">

						<div class="col-sm-4 invoice-col" style='line-height:35px;'>
							<h3 class='box-title'>交易状态</h3>
							<p class='text-muted'>订单明细：
							<?
								$color='green';
								$info='';
								switch($order->status){
										case 0:
										$info="订单已完成";
										$color='green';
										break;
										case 1:
										$info="已发货待付款";
										$color='red';
										break;
										case 2:
										$info="已付款待发货";
										$color='orange';
										break;
										case 3:
										$info="订单待处理...";
										$color='#808080';
										break;
											default:
											$info="特殊订单处理中...";
											break;
								}
							?>
						<span href='' class='badge bg-<?=$color?>'>
						<?=$info?>
						</span></p>
							<p class='text-muted'>订单总金额：<span style='color:black;font-size:16px;font-weight:bold;'>￥<?=$order->amount?>元</span> </p>
							<p class='text-muted'>备注：</p>

						</div>
						<!-- /.col -->
						<div class="col-sm-6 invoice-col">

						</div>
						<!-- /.col -->
						<div class="col-sm-2 invoice-col">
						<p><a href='<?=Url::toRoute(["order/update",'id'=>$order->orderid])?>' class='badge bg-blue pull-right'>编辑该订单</a></p>
						</div>
						<!-- /.col -->
				 </div>
            </div>
			<div class="invoice" style='background:#f5f5f5;'>
				<div class="row invoice-info">
						<div class="col-sm-4 invoice-col">
							<p style='padding-bottom:15px;'><strong>产品信息</strong></p>
							<p class='text-muted'>产品名称：<?foreach($order->orderdetails as $detail){echo '('.$detail->product->title.')';}?></p>
							<p class='text-muted'>产品原价：<?foreach($order->orderdetails as $detail){echo '(￥'.$detail->product->monovalent.')';}?></p>
							<p class='text-muted'>客户报价：<span style='color:black;'>￥<?=$order->orderdetail->price?></span></p>
							<p class='text-muted'>产品规格：<?foreach($order->orderdetails  as $detail){echo '('.$detail->product->specs.')';}?></p>
							<p class='text-muted'>产品重量：<?foreach($order->orderdetails  as $detail){echo '('.$detail->product->weight.')';}?></p>
						</div>
						<!-- /.col -->
						<div class="col-sm-4 invoice-col">
							<p style='padding-bottom:15px;'><strong>客户信息</strong></p>
							<p class='text-muted'>客户：<a href="<?=Url::toRoute(['customer/detail','id'=>$order->orderdetail->customer->id])?>"><?=$order->orderdetail->customer->name?></a></p>
							<p class='text-muted'>地址：<?=$order->orderdetail->customer->location?></p>
							<p class='text-muted'>客户要求：质量至上</p>
						</div>
						<!-- /.col -->

						<div class="col-sm-4 invoice-col">
							<p style='padding-bottom:15px;'><strong>交易信息</strong></p>
							<p class='text-muted'>支付方式：现金/转账</p>
							<p class='text-muted'>发货时间：<?=date('Y年m月d日',$order->createtime)?></p>
							<p class='text-muted'>款项明细：已收部分订金（￥N元）</p>
						</div>
						<!-- /.col -->
				 </div>

              </div>
				<div class="invoice">
					<div class="row invoice-info">
						<div class="col-xs-12">
								  <div class="box">

									<!-- /.box-header -->
									<div class="box-body">
									  <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" >
										<thead>
											<tr role="row" >
												<th class="sorting_asc" >
												</th>
												<th class="sorting_asc" >商品</th>
												<th class="sorting" >单价/个</th>
												<th class="sorting" >数量</th>
												<th class="sorting" >产品规格</th>
												<th class="sorting">当前库存</th>
												<th class="sorting">操作</th>
											</tr>
										</thead>
										<tbody>
						<?$amount='';?>
					<?foreach($order->orderdetails as $detail){?>
					<?$amount+=($detail->price*$detail->productnum);?>
					<tr role="row" class="odd">
						<td style='line-height:150px;'>
							<input type="checkbox" name="checkbox1" value=""/>
						</td>
					  <td class="sorting_1">
						<img src='../dist/img/com.jpg' title='<?=$detail->product->title?>'>
						</td>
						<td style='line-height:150px;'>
								<span  style="color:red;"><?=$detail->price?></span>
						</td>
					   <td style='line-height:150px;'><?=$detail->productnum?></td>
					   <td style='line-height:150px;'><?=$detail->product->specs?></td>
						<td style='line-height:150px;'><?=$detail->product->stock?></td>
						<td style='line-height:150px;'><a href='javascript:void(0);' id='delete'>移除</a></td>
					</tr>
					<?}?>
				</tbody>
              </table>
				</div>
				</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		
	<div class="invoice">  
	<div class="row">
		<div class="col-md-9">

		</div>
		<div class="col-md-3" style='font-size:14px;line-height:25px;color:#9c9c9c;font-weight:bold;'>
				<div ><span class="realpay--title">运费：</span><span class='pull-right'>(免运费)</span></div>
				<div style='font-size:16px;color:black;padding:15px 0 0 0;'><span class="realpay--title">订单总金额：</span><span class='pull-right' style='color:red;'>￥<?=$amount;?></span></div>
				
		</div>
	</div>

	</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
					</div>
				
              </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
   <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>
 
   	<script>
	
	$('#delete').click(function(){
		alert(this);
	});
	</script>