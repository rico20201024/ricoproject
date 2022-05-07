<?
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
	use yii\widgets\LinkPager;
	use yii\widgets\Pjax; 
	use yii\widgets\ListView;
?>
<style>
body{
	color:#737373;
}
</style>
<section class="content-header">
      <h1>
       客户详细信息：
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=Url::toRoute(['customer/list'])?>"><i class="fa fa-dashboard"></i> 客户列表</a></li>
        <li><a href="javascript:void(0);" onclick="javascript :history.back(-1);">返回上一页</a></li>
        <li class="active">Examples</li>
      </ol>
    </section>
	
<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../dist/img/girl.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><i class="glyphicon glyphicon-user"></i><?=$customer->name?></h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item"><i class="fa fa-fw fa-phone"></i>
                  <b>电话:</b> <a class="pull-right"><?=$customer->phone?></a>
                </li>
                <li class="list-group-item"><i class="glyphicon glyphicon-phone"></i>
                  <b>移动电话:</b> <a class="pull-right"><?=$customer->telephone?></a>
                </li>
                <li class="list-group-item"><i class="fa fa-fw fa-home"></i>
                  <b>地址:</b> <a class="pull-right"><?=$customer->location?></a>
                </li>
                <li class="list-group-item"><i class="fa fa-fw fa-wechat"></i>
                  <b>微信:</b> <a class="pull-right"><?=$customer->phone?></a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>联系Ta</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-fw fa-clone"></i>交易数据</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-fw fa-yen"></i> 已完成交易总额：<font color='green'>￥<?=$amount['success']?>元</font></strong>

              <p class="text-muted">
                
              </p>

              <hr>
              <strong><i class="fa fa-fw fa-cc-jcb"></i> 历史交易次数 ：<font color='green'><?=$tradenum?></font></strong>

              <p class="text-muted">
                
              </p>

              <hr>
              <strong><i class="fa fa-fw fa-yen"></i> 未完成交易总额：<font color='red'>￥<?=($amount['incomplete']+$amount['ready']+$amount['ready']+$amount['wait'])?>元</font></strong>

              <p class="text-muted">
               </p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> 备注：</strong>

              <p>你做想什么东西呢？</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li   class="active"><a href="#activity" data-toggle="tab">产品需求</a></li>
              <li><a href="#timeline" data-toggle="tab">订单列表</a></li>
              <li><a href="#settings" data-toggle="tab">报表</a></li>
              <li><a href="#four" data-toggle="tab">待开发模块4</a></li>
              <li><a href="#five" data-toggle="tab">待开发模块5</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane  active" id="activity" deep="7">
                <!-- Post -->
                
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
							<?= ListView::widget([
							'dataProvider' => $productneedData,
							// 'layout'=>'{items}{pager}',
							'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
							'itemView' => '_needitem',//子视图
							'pager' => [
									// 'options' => ['class' => 'hidden'],//关闭分页（默认开启）     /* 分页按钮设置 */   
									// 'maxButtonCount' => 5,//最多显示几个分页按钮    
									'firstPageLabel' => '首页',
									'prevPageLabel' => '上一页',
									'nextPageLabel' => '下一页',
									'lastPageLabel' => '尾页' 
									],
							]);?>
	

						<!-- /.col -->
					
                </div>	
				
				<!--post clearfix-->
				
				
				
                <!-- /.post -->

                <!-- Post -->
               
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
			  
              <div class="tab-pane" id="timeline">
					  <div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> 创建新订单</h4>
						<a href="<?=Url::toRoute(['order/create','cid'=>$customer->id]);?>">新增订单</a>
						点击可创建订单
					  </div>
					  
				
						<div class="row">
						
				<? Pjax::begin()?> 
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
	

						<!-- /.col -->
					
			<? Pjax::end()?>	
						</div>

                  <!-- END timeline item -->

                  <!-- /.timeline-label -->
                  <!-- timeline item -->
			  
                  <!-- timeline item -->
  
                  <!-- /.timeline-label -->
                  <!-- timeline item -->

                  <!-- END timeline item -->

                  <!-- END timeline item -->
                  <!-- timeline time label -->

              </div>
			  

              <!-- /.tab-pane -->

			 <div class="tab-pane" id="four">
						<div class="row">
						
				<? Pjax::begin()?> 
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
	

						<!-- /.col -->
					
			<? Pjax::end()?>	
						</div>
			 </div>
			 
			<div class="tab-pane" id="five">
							模块待开发5
			 </div>


              <div class="tab-pane" id="settings">
						<div class="box box-solid">
									<div class="box-header with-border">
									  <div class=''>同期增长：
									  <h3 class="box-title">Progress bars</h3>
									</div>
									<!-- /.box-header -->
									<div class="box-body">
									  <div class="progress">
										<div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
										  <span class="sr-only">40% Complete (success)</span>
										</div>
									  </div>
									  <div class="progress">
										<div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
										  <span class="sr-only">20% Complete</span>
										</div>
									  </div>
									  <div class="progress">
										<div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
										  <span class="sr-only">60% Complete (warning)</span>
										</div>
									  </div>
									  <div class="progress">
										<div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
										  <span class="sr-only">80% Complete</span>
										</div>
									  </div>
									</div>
									<!-- /.box-body -->
						  </div>
				</div>
			  

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
	
	<?//这里导致加载缓慢?>
   <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>
<script>
	var danjia=$('.users-list-date');
	var kuige=$('.kuige');
	var weights=$('.weight');
	
	
	$('.users-list-name').click(function(){
		$("#orderdetail-productid").val($(this).attr("title"));
		// alert(kuige[$(this).attr("alt")].innerHTML);
		$("#product-monovalent").val(danjia[$(this).attr("alt")].innerHTML);
		$("#kui").val(kuige[$(this).attr("alt")].innerHTML);
		$("#product-weight").val(weights[$(this).attr("alt")].innerHTML);
		
	});
	
	
$(document).ready(function(){
	$("#orderdetail-productid").click(function(){
		$("#productBox").fadeToggle("slow");
	});
});
	// alert('1');
	// alert(as.length);
		//获取当前浏览器信息
		// window.onload=function(){
			// browserRedirect();
		// }
		
		
	//	
	$('.updateprice').click(function(){
		$(this).siblings('.priceint').show(900).focus();
	});
	
	//所有a标签的点击
	$('.priceint').blur(function(){
			thiss=$(this);
			var priceintVal=$(this).val();								//输入框
			var priceintId=$(this).siblings('.priceid').val();			//输入框id隐藏的
			var danjia=$(this).siblings('.danjia');						//显示单价的元素
			// alert(typeof(priceintVal));
			// return ;
			if(priceintVal==''||priceintVal==NaN){
				// alert('请输入数字');
				$(this).hide(800);
				return;
			}
			priceintVal=parseFloat(priceintVal);
			if(isNaN(priceintVal)){
				alert('请输入数字');
				return;
			}
			// priceintVal=parseFloat(priceintVal);

			
			$.ajax({
						url:"index.php?r=productneed/updateprice",
						data:{price:priceintVal,id:priceintId},
						// type:'post',
						dataType:'json',
						beforeSend: function (XMLHttpRequest) {
							//发送请求前可修改 XMLHttpRequest 对象的函数
							// danjia.text("loading...");
						},
						success:function(result){
							thiss.val('');
							danjia.text(result.exclusiveprice);
						},
						error: function (jqXHR, textStatus, errorThrown) {
								//弹出jqXHR对象的信息
								alert(jqXHR.responseText);
								alert(jqXHR.status);
								alert(jqXHR.readyState);
								alert(jqXHR.statusText);
								///弹出其他两个参数的信息
								alert(textStatus);
								alert(errorThrown);
						},

			});
			$(this).hide(800);
	});
</script>


