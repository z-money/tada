<?php
$this->breadcrumbs=array(
	'Tasks',
);

$this->menu=array(
	array('label'=>'Create Task', 'url'=>array('create')),
	array('label'=>'Manage Task', 'url'=>array('admin')),
);
?>

<script>
function completeTask(task_id)
{
	var xmlhttp;
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var elem = document.getElementById('finished_' + task_id);
			elem.innerText = xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST","/task/complete/" + task_id, true);
	xmlhttp.send();
}
</script>

<h1>Tasks For <?php echo Yii::app()->user->id; ?></h1>

<?php

$dataProvider=new CActiveDataProvider('Task', array(
    'criteria'=>array(
        'condition'=>'finished IS NULL',
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
		array(
			'name' => 'finished',
			'value' => 'CHtml::tag("span", array("id" => "finished_$data[id]"), "$data[finished]")',
			'type' => 'raw',
		),
		array(
            'value' => 'CHtml::button("Complete Task", array("onclick"=>"completeTask($data[id])"))',
            'type' => 'raw'
        ),
	),
));

?>