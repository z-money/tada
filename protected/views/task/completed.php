<?php
$this->breadcrumbs=array(
	'Tasks',
);

$this->menu=array(
	array('label'=>'Create Task', 'url'=>array('create')),
	array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>

<h1>Completed Tasks</h1>

<?php

$dataProvider=new CActiveDataProvider('Task', array(
    'criteria'=>array(
        'condition'=>'finished IS NOT NULL',
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));

$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'name',
		'description',
		'created',
		'daily',
		'finished',
	),
));

?>