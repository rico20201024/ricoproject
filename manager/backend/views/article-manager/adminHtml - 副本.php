<?
		use yii\helpers\Html;
		use yii\widgets\LinkPager;
		use yii\widgets\Pjax; 
		use yii\widgets\ActiveForm;
?>
<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hover Data Table</h3>
            </div>
            <!-- /.box-header -->

            <!-- /.box-body -->
          </div>
          <!-- /.box -->

				<? Pjax::begin()?> 
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">显示文章列表</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				  <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
						<div class="row"><div class="col-sm-6">
								<div class="dataTables_length" id="example1_length">
									<label>显示 <select name="example1_length" aria-controls="example1" class="form-control input-sm">
										<option value="10">10</option>
										<option value="25">25</option>
										<option value="50">50</option>
										<option value="100">100</option>
										</select> 文章</label>
							</div>
						</div>
							<div class="col-sm-6">
								<div id="example1_filter" class="dataTables_filter">
								<?$form = ActiveForm::begin([
									'action' => ['article-manager/admin'],
									 'id' => 'search-form',
									 'method' => 'get',
								]);?>

								<?=$form->field($articleSearch, 'title', ['inputOptions'=>['value'=>'','class'=>'form-control input-sm']]);?>
							    <div class="form-group" style="margin-top:-10px;">
	
										<?= Html::submitButton('查询!', ['class' => 'btn btn-sm btn-primary']) ?>
								
								</div>
								<?ActiveForm::end();?>
								</div>
						</div>
					</div>
						<div class="row">
							<div class="col-sm-12">
						<table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
						<thead>
					<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 197px;">标题</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 242px;">作者</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 216px;">Platform(s)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 169px;">Engine version</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 123px;">操 作</th></tr>
					</thead>
					<tbody> 
					<?foreach($articles as $article){?>
					<tr role="row" class="odd">
					  <td class="sorting_1" title='<?=$article->title?>'><?=getTenStr($article->title)?></td>
					  <td>Firefox 1.0</td>
					  <td>Win 98+ / OSX.2+</td>
					  <td>1.7</td>
					  <td>A</td>
					</tr>
					<?}?>
					</tbody>
							
				  </table>
					</div>
				</div>
						<div class="row">
							<div class="col-sm-5">
								<div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
									显示 10- 57 条信息
								</div>
							</div>
							<div class="col-sm-7">
								<div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
									<?= LinkPager::widget(['pagination' => $pagination,'nextPageLabel' => '下一页', 'prevPageLabel' => '上一页', ]) ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			
            <!-- /.box-body -->
          </div>
	<? Pjax::end()?>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

