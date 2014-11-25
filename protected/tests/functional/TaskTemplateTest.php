<?php

class TaskTemplateTest extends WebTestCase
{
	public $fixtures=array(
		'taskTemplates'=>'TaskTemplate',
	);

	public function testShow()
	{
		$this->open('?r=taskTemplate/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=taskTemplate/create');
	}

	public function testUpdate()
	{
		$this->open('?r=taskTemplate/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=taskTemplate/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=taskTemplate/index');
	}

	public function testAdmin()
	{
		$this->open('?r=taskTemplate/admin');
	}
}
