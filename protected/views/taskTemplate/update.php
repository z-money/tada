<?php
$this->breadcrumbs=array(
	'Task Templates'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TaskTemplate', 'url'=>array('index')),
	array('label'=>'Create TaskTemplate', 'url'=>array('create')),
	array('label'=>'View TaskTemplate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TaskTemplate', 'url'=>array('admin')),
);
?>

<h1>Update TaskTemplate <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>