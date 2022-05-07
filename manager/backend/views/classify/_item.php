<?
		use yii\helpers\Html;
		
		use yii\helpers\Url;

?>
					<tr role="row" class="odd">
					  <td><?=$model->id?></td>
					  <td class="sorting_1"><a href='<?=Url::toRoute(["product/index", "cid" => $model->id]);?>'><?=$model->title?></a></td>
					  <td class="sorting_1"><a href='<?=Url::toRoute(["product/index", "parentid" => $model->parentid]);?>'><?=($model->parentname?$model->parentname->title:'顶级类别')?></a></td>

					  <td  title='<?=$model->title?>'><a href='<?=Url::toRoute(["article-/detailed", "id" => $model->id]);?>'><?=getTenStr($model->description,8)?></a></td>
					  <td>       <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', ['detailed', 'id' => $model->id], ['title' => '查看']) ?>
								<?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id], ['title' => '修改']) ?>
								<?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
									'title' => '删除',
									'data' => [
										'confirm' => '您确定真的要删除 '.date('Y年m月d日', 145974545).' 的日记吗？',
										'method' => 'post',
									]
								]) ?>
					</td>
					</tr>