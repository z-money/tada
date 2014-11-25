<?php
$this->breadcrumbs=array(
	'Task Templates',
);

$this->menu=array(
	array('label'=>'Create TaskTemplate', 'url'=>array('create')),
	array('label'=>'Manage TaskTemplate', 'url'=>array('admin')),
);
?>

<h1>Task Templates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
