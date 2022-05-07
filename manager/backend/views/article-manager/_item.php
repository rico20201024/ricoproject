<?
		use yii\helpers\Html;
		
		use yii\helpers\Url;

?>
					<tr role="row" class="odd">
					  <td class="sorting_1" title='<?=$model->title?>'><?=getTenStr($model->title)?></td>
					  <td><?=($model->username? $model->username->username:'未设置')?></td>
					  <td><?=($model->category? $model->category->title:'未设置')?></td>
					  <td  title='<?=getTenStr($model->content)?>'><a href='<?=Url::toRoute(["article-manager/detailed", "id" => $model->id]);?>'><?=getTenStr($model->content,8)?></a></td>
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