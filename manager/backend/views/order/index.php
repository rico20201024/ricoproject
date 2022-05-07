<?

	use yii\helpers\Html;
	use yii\widgets\LinkPager;
	use yii\widgets\Pjax; 
	use yii\widgets\ActiveForm;
	use yii\widgets\ListView;
	use yii\helpers\Url;
	use common\models\Order;
	
?>
<script>
window.setTimeout(function(){
    $('[data-dismiss="alert"]').alert('close');
},2000);
</script>
<?
	if(\yii::$app->session->hasFlash('deleteinfo')){?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">
				&times;
			</a>
		<strong>
			<?echo \yii::$app->session->getFlash('deleteinfo');?>
		</strong>
		</div>
<?	}?>
				<? Pjax::begin()//这里影响了客户详细页面部分内容不能输出?> 
<section class="content">

<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">订单搜索</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

              <div class="box-body">
				<?$form = ActiveForm::begin([
					'action' => ['index'],
					 'id' => 'search-form',
					 'method' => 'get',
				]);?>
			<div class="invoice" style="padding-top:5px">
				<div class="row invoice-info ">

						<div class="col-sm-3 invoice-col";>
							<?=$form->field($searchModel, 'createtime', ['inputOptions'=>['value'=>'','class'=>'form-control input-sm']]);?>
						</div>
						<!-- /.col -->
						<div class="col-sm-3 invoice-col">
							<?=$form->field($searchModel, 'customer_name', ['inputOptions'=>['value'=>'','class'=>'form-control input-sm']]);?>
							<div class=''>
									<span class='aaa'></span>
							</div>
						</div>
						<!-- /.col -->
						<div class="col-sm-3 invoice-col">
							<?=$form->field($searchModel, 'product_name', ['inputOptions'=>['value'=>'','class'=>'form-control input-sm']]);?>
						</div>
						<div class="col-sm-3 invoice-col">
							<?=$form->field($searchModel, 'status')->dropDownList(Order::ShowOrderStatus(),['prompt'=>'默认查询所有']);?> 
						</div>
						<!-- /.col -->
				 </div>
				 
                <button type="submit" class="btn btn-default">Cancel</button>

				<?= Html::submitButton('<i class="glyphicon glyphicon-search"></i>搜索!', ['class' => 'btn btn-info pull-right ']) ?>
            </div>
				<?//=$form->field($searchModel, 'orderdetail_name', ['inputOptions'=>['value'=>'','class'=>'form-control input-sm']]);?>
				<?//=$form->field($searchModel, 'customer_name', ['inputOptions'=>['value'=>'','class'=>'form-control input-sm']]);?>
				<?//=$form->field($searchModel, 'product_name', ['inputOptions'=>['value'=>'','class'=>'form-control input-sm']]);?>
				<?//=$form->field($searchModel, 'orderid', ['inputOptions'=>['value'=>'','class'=>'form-control input-sm']]);?>
				<?//=$form->field($searchModel, 'status')->dropDownList(Order::ShowOrderStatus(),['prompt'=>'默认查询所有']);?> 

										
              </div>
              <!-- /.box-body -->

				<?ActiveForm::end();?>
              <!-- /.box-footer -->
          </div>
		  <div class='col-md-12'>
		  			  <?
				/*if(\yii::$app->session->hasFlash('searchInfo')){
					echo \yii::$app->session->getFlash('searchInfo');
				}*/
			  ?>
		  </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">订单列表：</h3>
			   <div style='display:inline-block;font-size:12px;'>
				<strong>字体颜色：</strong>
					  <div style='display:inline-block;width:10px;height:10px;background:#808080;'></div>
					  <span style='margin-right:20px;'>订单待处理</span>
					  <div style='display:inline-block;width:10px;height:10px;background:green;'></div>
					  <span style='margin-right:20px;'>已完成交易</span>
					  <div style='display:inline-block;width:10px;height:10px;background:red;'></div>
					  <span style='margin-right:20px;'>已付款待发货</span>
					  <div style='display:inline-block;width:10px;height:10px;background:orange;'></div>
					  <span style='margin-right:20px;'>已发货待付款</span>
				<strong>操作：</strong>	 
			  <span style='margin-right:20px;'><i class="fa fa-fw fa-check-square-o"></i>交易完成</span>
			  <span style='margin-right:20px;'><i class="fa fa-fw fa-plus-square"></i>已付款待发货</span>
			  <span style='margin-right:20px;'><i class="fa fa-fw fa-minus-square"></i>已发货待付款</span>
			</div>
			  <a href="<?=Url::toRoute(['order/create']);?>" class='btn btn-sm btn-success btn-flat  pull-right'><i class='glyphicon glyphicon-plus'></i><?=(isset($_COOKIE['id'])?"继续编辑订单":"新增订单");?></a>
            </div> 
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>商品名称</th>
                  <th>客户</th>
                  <th>商品价格</th>
                  <th>商品数量</th>
                  <th>总价</th>
                  <th>订单状态<span class=' pull-right'>操作</div></th>
                  <th>发布时间(<?=date('Y',time())?>)</th>
                  <th>操作</th>
                </tr>
                </thead>
                <tbody>
				
							<?= ListView::widget([
							'dataProvider' => $dataProvider,
							// 'layout'=>'{items}{pager}',
							'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
							'itemView' => '_item',//子视图
							'pager' => [
									// 'options' => ['class' => 'hidden'],//关闭分页（默认开启）     /* 分页按钮设置 */   
									// 'maxButtonCount' => 5,//最多显示几个分页按钮    
									'firstPageLabel' => '首页',
									'prevPageLabel' => '上一页',
									'nextPageLabel' => '下一页',
									'lastPageLabel' => '尾页' 
									],
							]);?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>合计：<span class='allcount'style='color:red;'>300</span> 元</td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						
                </tbody>
              </table>
            </div>	

            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
	
	
   <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>
 
   	<script>

		//合计（总价）
		var amounts=$('#example2').find('.amount');
		var all=0;

		$('#example2').find('.amount').each(function(){
			all+=Number($(this).attr('alt'));
		});
		$('.allcount').text(all);
	
	
	//ajax搜索
	$('#ordersearch-customer_name').keyup(function(){
		txt=$(this).val();
		$.post("index.php?r=order/customer",{suggest:txt},function(result){
			$(".aaa").html(result);
		});
		// alert(txt);
	});
	
	$(".aaa").click(function(){
		// var ttt=$('#customer-id').val();
			
			var ttext=clear($(this).text());
			$('#ordersearch-customer_name').val(ttext);
			
	});
	
	//商品的描述：
	$(".product").click(function(){
			alert($(this).attr('title'));
			//模块使用ajax获取再返回给页面使用
	});
	
	
	//去除空格和逗号
	function clear(str) {
		str = str.replace(/,/g, "");//取消字符串中出现的所有逗号  return str;
		  return str.replace(/(^\s+)|(\s+$)/g, "");
		return str;
	}



	</script>
		
	<? Pjax::end()?>
	
	
	
	
	
	
	
	