<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/TodosService.php';

class TodosController
{

    private $todosService = null;

    public function __construct()
    {
        $this->TodosService = new TodosService();
    }

    public function redirect($location)
    {
        header('Location: ' . $location);
    }

    public function handleRequest()
    {
        $op = isset($_GET['op']) ? $_GET['op'] : null;

        try {
            if (!$op || $op == 'list') {
                $this->listTodos();
            } elseif ($op == 'new') {
                $this->saveTodo();
            } elseif ($op == 'edit') {
                $this->editTodo();
            } elseif ($op == 'delete') {
                $this->deleteTodo();
            } elseif ($op == 'show') {
                $this->showTodo();
            } else {
                $this->showError("Page not found", "Page for execution" . $op . " was not found");
            }
        } catch (Exception $e) {
            $this->showError("Application error", $e->getMessage());
        }
    }

    public function listTodos()
    {
        $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : null;
        $todos = $this->TodosService->getAllTodos($orderby);
        include './view/todos.php';
    }

    public function saveTodo()
    {
        $title = 'Create New Todo';

        $work_name = '';
        $start_date = '';
        $end_date = '';
        $status = '';

        $errors = array();

        if (isset($_POST['form-submitted'])) {
            $work_name = isset($_POST['work_name']) ? trim($_POST['work_name']) : null;
            $start_date = isset($_POST['start_date']) ? date('Y-m-d',strtotime(trim($_POST['start_date']))) : null;
            $end_date = isset($_POST['end_date']) ? date('Y-m-d',strtotime(trim($_POST['end_date']))) : null;
            $status = isset($_POST['status']) ? trim($_POST['status']) : null;

            try {
                $this->TodosService->createNewTodo($work_name, $start_date, $end_date, $status);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        // Include view from Create form
        include './view/create.php';
    }

    public function editTodo()
    {
        $title = 'Edit Todo';

        $work_name = '';
        $start_date = '';
        $end_date = '';
        $status = '';
        $id = $_GET['id'];

        $todo = $this->TodosService->getTodo($id);

        $errors = array();

        if (isset($_POST['form-submitted'])) {
            $work_name = isset($_POST['work_name']) ? trim($_POST['work_name']) : null;
            $start_date = isset($_POST['start_date']) ? date('Y-m-d',strtotime(trim($_POST['start_date']))) : null;
            $end_date = isset($_POST['end_date']) ? date('Y-m-d',strtotime(trim($_POST['end_date']))) : null;
            $status = isset($_POST['status']) ? trim($_POST['status']) : null;
            try {
                $this->TodosService->editTodo($work_name, $start_date, $end_date, $id, $status);
                $this->redirect('index.php');
                return;
            } catch (ValidationException $e) {
                $errors = $e->getErrors();
            }
        }
        include './view/update.php';
    }

    public function deleteTodo()
    {

        $id = isset($_GET['id']) ? $_GET['id'] : null;

        if (isset($_GET['op']) == 'delete') {
            $this->TodosService->deleteTodo($id);

            $this->redirect('index.php');
        }

        if (!$id) {
            throw new Exception('Internal error');
        }
        $todo = $this->TodosService->getTodo($id);

        print_r($todo);
        die();

        include './view/delete.php';

    }

    public function showTodo()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        $errors = array();

        if (!$id) {
            throw new Exception('Internal error');
        }
        $todo = $this->TodosService->getTodo($id);

        include './view/view.php';
    }

    public function showError($title, $message)
    {
        include './view/error.php';
    }
}

?>
