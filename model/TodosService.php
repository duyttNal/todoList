<?php

require_once 'TodosGateway.php';
require_once 'ValidationException.php';
require_once 'Database.php';

class TodosService extends TodosGateway
{

	private $todosGateway = null;

	public function __construct()
	{
		$this->TodosGateway = new TodosGateway();
	}

	public function getAllTodos($order)
	{
		try
		{
			self::connect();
			$result = $this->TodosGateway->selectAll($order);
			self::disconnect();
			return $result;
		}
		catch(Exception $e)
		{	
			self::disconnect();
			throw $e;
		}
	}

	public function getTodo($id)
	{
		try
		{
			self::connect();
			$result = $this->TodosGateway->selectById($id);
			self::disconnect();
		}
		catch(Exception $e)
		{	
			self::disconnect();
			throw $e;
		}
		return $this->TodosGateway->selectById($id);
	}

	private function validateTodoParams($work_name, $start_date, $end_date)
	{
		$errors = array();

		if ( !isset($work_name) || empty($work_name) ) {
		    $errors[] = 'Word Name is required';
		}
		if ( !isset($start_date) || empty($start_date) ) {
		    $errors[] = 'Start Date is required';
		}
		if ( !isset($end_date) || empty($end_date) ) {
		    $errors[] = 'End date is required';
		}
		if (empty($errors))
		{
			return;
		}
		throw new ValidationException($errors);
	}

	public function createNewTodo($work_name, $start_date, $end_date,$status)
	{
		try 
		{
			self::connect();
			$this->validateTodoParams($work_name, $start_date, $end_date);
			$result = $this->TodosGateway->insert($work_name, $start_date, $end_date, $status);
			self::disconnect();
			return $result;
		}
		catch(Exception $e)
		{
			self::disconnect();
			throw $e;
		}
	}

	public function editTodo($work_name, $start_date, $end_date, $id, $status)
	{
		try 
		{
			self::connect();
			$result = $this->TodosGateway->edit($work_name, $start_date, $end_date, $id, $status);
			self::disconnect();
		}
		catch(Exception $e) {

			self::disconnect();
			throw $e;
		}
	}
	public function deleteTodo($id)
	{
		try
		{
			self::connect();
			$result = $this->TodosGateway->delete($id);
			self::disconnect();
		}
		catch(Exception $e)
		{
			self::disconnect();
			throw $e;
		}
	}

}

?>
