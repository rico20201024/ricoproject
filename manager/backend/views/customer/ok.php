<?

	use yii\widgets\Pjax; 
	use yii\widgets\ListView;
?> 
 <div class="tab-pane" id="activity" deep="7">
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
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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
