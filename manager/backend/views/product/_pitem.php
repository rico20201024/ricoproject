<?
	use yii\helpers\Url;
?>
<script>
window.onload=function(){
	function test(){
		return false;
		alert('1');
	}
}
</script>

	<div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?=($model->title)?></h3>
			  <!-- <a href='#' style='float:right;' class="btn btn-<?//=($k%2==0?'success':'warning')?>">编辑该产品</a>-->
			  <a href='<?=Url::toRoute(['product/update','id'=>$model->id]);?>' style='float:right;' class="btn btn-<?='success'?>">编辑产品</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">	
				<div class='col-md-4'>
					<img src="../dist/img/<?=$model->imgurl?>" class="img-thumbnail" onclick='javascript:alert(this.src);'>
					
				</div>
				<div class='col-md-8' >
					<h4>产品描述：</h4><p><?=(getTenStr($model->content,105));?><a href='#'>&nbsp&nbsp&nbsp详情</a></p>
				</div>
					<table class="table table-bordered  col-md-8" style='margin-top:15px;'>
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
                   <span class="label label-success"><?=$model->weight?>克&nbsp/&nbsp件</span>
                  </td>
                  <td><span class="badge bg-red"><?=$model->weight?>克&nbsp/&nbsp件</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>单价</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-yellow"><?=$model->monovalent?>&nbsp/&nbsp件</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>造价</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-light-blue"><?=$model->costs?>&nbsp/&nbsp件</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>库存</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green"><?=$model->stock?>&nbsp&nbsp件</span></td>
                </tr>
                <tr>
                  <td>5.</td>
                  <td>总销量</td>
                  <td>
                    <div class="progress progress-xs progress-striped active">
                      <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green"><?=$model->sales?>&nbsp&nbsp件</span></td>
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
                  <td><span class="badge bg-green"><?=$model->specs?></span></td>
                </tr>
              </tbody></table>

            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
        </div>
