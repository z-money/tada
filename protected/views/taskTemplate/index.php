<?php
$this->breadcrumbs=array(
	'Task Templates',
);

$this->menu=array(
	array('label'=>'Create TaskTemplate', 'url'=>array('create')),
	array('label'=>'Manage TaskTemplate', 'url'=>array('admin')),
);
?>

<script>
function cloneTask(name, description)
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
	xmlhttp.open("POST","/task/clone", true);

	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xmlhttp.send("Task[name]="+name+"&Task[description]="+description);
}
</script>

<h1>Task Templates</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'name',
		'description',
		'daily',
		array(
            'value' => 'CHtml::button("Clone Task", array("onclick"=>"cloneTask(\'$data[name]\', \'$data[description]\')"))',
            'type' => 'raw'
        ),
	),
)); ?>
