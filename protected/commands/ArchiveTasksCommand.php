<?php

class ArchiveTasksCommand extends CConsoleCommand
{
	public function actionFailDailyTasks()
	{
		$dataProvider=new CActiveDataProvider('Task', array(
		    'criteria'=>array(
		        'condition'=>'finished IS NULL and daily = 1',
		    ),
		    'pagination'=>array(
		        'pageSize'=>100,
		    ),
		));

		foreach($dataProvider->getData() as $data)
		{
			
		}
	}
	public function actionCloneDailyTasks()
	{
		Yii::import('application.controllers.TaskController');

		$dataProvider=new CActiveDataProvider('TaskTemplate', array(
		    'criteria'=>array(
		        'condition'=>'daily = 1',
		    ),
		    'pagination'=>array(
		        'pageSize'=>100,
		    ),
		));

		foreach($dataProvider->getData() as $data)
		{
			$task = new Task;

			$task->name = $data->name;
			$task->description = $data->description;
			$task->daily = $data->daily;

			TaskController::actionClone($task);
		}
	}

	public function actionArchiveCompleted()
	{
		$dataProvider=new CActiveDataProvider('Task', array(
		    'criteria'=>array(
		        'condition'=>'finished IS NULL',
		    ),
		    'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));
	}

	public function actionInit()
	{

	}
}