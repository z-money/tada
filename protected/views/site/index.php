<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<a href="/task/create">New Task</a>

<br>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=> new CActiveDataProvider('Task');,
	'itemView'=>'_view',
)); ?>
