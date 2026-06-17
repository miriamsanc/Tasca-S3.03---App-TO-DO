<?php
class TaskController extends Controller {
  private TaskModel $taskModel;

  public function init() {
      parent::init();

      $this->taskModel = new TaskModel(__DIR__ . "/../../data/tasks.json");
  }
   public function indexAction() { 
     $this->view->tasks = $this->taskModel->getAllTasks();
  }

  public function createAction() {
      if ($this->getRequest()->isPost()) {
          $task = [
             "title" => $this->getRequest()->getParam('title'),
             "description" => $this->getRequest()->getParam('description'),
             "user" => $this->getRequest()->getParam('user'),
             "status" => $this->getRequest()->getParam('status'),
             "start_time" => $this->getRequest()->getParam('start_time') ?: "",
             "end_time" => $this->getRequest()->getParam('end_time') ?: ""
          ];
        $this->taskModel->addTask($task);
        header("Location: /phpInitialDemo/web/task/index");
        exit;
    }
  }

  public function showAction() {
      $id = $this->_getParam('id');
      $filtered = $this->taskModel->filterTasks('id', $id);
      $this->view->task = array_shift($filtered);
  }

  public function editAction() {
  if ($this->getRequest()->isPost()) {
          $task = [
             "id" => $this->getRequest()->getParam('id'),
             "title" => $this->getRequest()->getParam('title'),
             "description" => $this->getRequest()->getParam('description'),
             "user" => $this->getRequest()->getParam('user'),
             "status" => $this->getRequest()->getParam('status'),
             "start_time" => $this->getRequest()->getParam('start_time') ?: "",
             "end_time" => $this->getRequest()->getParam('end_time') ?: ""
          ];
          $this->taskModel->editTask($task);
          header("Location: /phpInitialDemo/web/task/index");
          exit;
      } else {
          $id = $this->_getParam('id');
          $filtered = $this->taskModel->filterTasks('id', $id);
          $this->view->task = array_shift($filtered);
      }
   
  }
}