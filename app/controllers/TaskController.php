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
}