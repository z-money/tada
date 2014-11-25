<?php
$this->breadcrumbs=array(
	'Task Templates'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TaskTemplate', 'url'=>array('index')),
	array('label'=>'Create TaskTemplate', 'url'=>array('create')),
	array('label'=>'Update TaskTemplate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TaskTemplate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TaskTemplate', 'url'=>array('admin')),
);
?>

<h1>View TaskTemplate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
		'daily',
	),
)); ?>
