<?php
$this->breadcrumbs=array(
	'Task Templates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TaskTemplate', 'url'=>array('index')),
	array('label'=>'Manage TaskTemplate', 'url'=>array('admin')),
);
?>

<h1>Create TaskTemplate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>