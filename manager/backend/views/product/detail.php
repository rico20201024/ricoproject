<?
	use yii\helpers\Url;
?>
<section class="content">


<div id="p0" data-pjax-container="" data-pjax-push-state="" data-pjax-timeout="1000"><section class="content">

<div class="box">
            <div class="box-header">
              <h3 class="box-title">产品管理：
			<small>产品详情</small></h3>
			  <a href="/manager/backend/web/index.php?r=product%2Fcreate"  class="btn btn-info pull-right">添加新产品</a>
            </div>
            <!-- /.box-header -->

            <!-- /.box-body -->
          </div>
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">热销产品：</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" >
                <tbody>
					<tr >
					  <th>编号</th>
					  <th>名称</th>
					  <th>单价(元)</th>
					  <th>型号</th>
					  <th>库存</th>
					  <th>材质</th>
					  <th>规格</th>
					  <th>销量(件)</th>
					</tr>
					
								
					<?foreach($hot as $k=>$p){?>
					<tr>
					  <td><?=$p->id?></td>
					  <td><?=$p->title?></td>
					  <td><?=$p->monovalent?></td>
					  <td><span class="label label-success"><?=$p->costs?></span></td>
					  <td><?=$p->stock?></td>
					  <td><?=$p->classify->title?></td>
					  <td><?=$p->specs?></td>
					  <td><?=$p->sales?></td>
					</tr>
					<?}?>
				</tbody>
			  </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
	  <div class="box" style='padding:15px;text-align:right;'>
			  <h4 class='pull-left'>
				产品详情:
			  </h4>
			  <a href="<?=Url::toRoute(['product/index'])?>" class="btn btn-primary ">返回列表页</a>
			  <a href="javascript:;" onclick="javascript :history.back(-1);" class="btn btn-primary ">返回上一页</a>
      </div>
		  
      <div class="row">

          <!-- /.box -->
          <!-- /.box -->

	<!-- /.col -->

	<div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">

              <h3 class="box-title"><?=$product->title;?></h3>
			  <!-- <a href='#' style='float:right;' class="btn btn-">编辑该产品</a>-->
			  <a href="<?=Url::toRoute(['product/update','id'=>$product->id])?>" style="float:right;" class="btn btn-success">编辑产品</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">	
				<div class="col-md-4">
					<img src="../dist/img/140x140.png" class="img-thumbnail" onclick="javascript:alert(this.src);">
					<img src="../dist/img/girl.jpg" class="img-thumbnail" onclick="javascript:alert(this.src);">
					<img src="../dist/img/cuishi.jpg" class="img-thumbnail" onclick="javascript:alert(this.src);">
					<img src="../dist/img/140x140.png" class="img-thumbnail" onclick="javascript:alert(this.src);">
					
				</div>
				<div class="col-md-8">
					<h4>产品描述：</h4><p style='line-height:25px;text-indent:20px;'><?=$product->content?><a href="#">&nbsp;&nbsp;&nbsp;详情</a></p>
				</div>
					<table class="table table-bordered  col-md-8" style="margin-top:15px;">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>产品信息</th>
                  <th></th>
                  <th style="width: 40px">数据</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>重量</td>
                  <td>
                   <span class="label label-success">150克&nbsp;/&nbsp;件</span>
                  </td>
                  <td><span class="badge bg-red">150克&nbsp;/&nbsp;件</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>单价</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-yellow">30&nbsp;/&nbsp;件</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>造价</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue">20&nbsp;/&nbsp;件</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>库存</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">2&nbsp;&nbsp;件</span></td>
                </tr>
                <tr>
                  <td>5.</td>
                  <td>总销量</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">12&nbsp;&nbsp;件</span></td>
                </tr>
                <tr>
                  <td>6.</td>
                  <td>型号</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">90%</span></td>
                </tr>
                <tr>
                  <td>7.</td>
                  <td>材质</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">90%</span></td>
                </tr>
                <tr>
                  <td>8.</td>
                  <td>规格</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green">10</span></td>
                </tr>
              </tbody></table>

            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
        </div>


	</div>
	
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Reason</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-success">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>219</td>
                  <td>Alexander Pierce</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-warning">Pending</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>657</td>
                  <td>Bob Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-primary">Approved</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
                <tr>
                  <td>175</td>
                  <td>Mike Doe</td>
                  <td>11-7-2014</td>
                  <td><span class="label label-danger">Denied</span></td>
                  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>




<script>
window.onload=function(){
	function test(){
		return false;
		alert('1');
	}
}
</script><script>jQuery('#cateadd-form').yiiActiveForm([], []);</script></div>

    </section>