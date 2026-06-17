<?php
class TaskModel {
  private string $filePath;

  public function __construct(string $filePath) {
    $this->filePath = $filePath;
  }

  public function getAllTasks(): array {
    if (!file_exists($this->filePath)) {
         return [];
     }
     $content = file_get_contents($this->filePath);
     $tasks = json_decode($content, true);
     return is_array($tasks) ? $tasks : [];
  }
  
  public function addTask(array $task): void {
    $tasks = $this->getAllTasks();

    if (empty($tasks)) {
      $newId = 1;
    } else {
      $lastTask = end($tasks);
      $newId = $lastTask["id"] + 1;
    }

    $task["id"] = $newId; 
    $task["status"] = $task["status"] ?? "pendiente";

    if ($task["status"] === "en ejecucion") {
      
      $task["start_time"] = date("Y-m-d H:i:s");

    } elseif ($task["status"] === "acabada") {
              $now = date("Y-m-d H:i:s");
              $task["start_time"] = $now;
              $task["end_time"] = $now;

    } else {

      $task["start_time"] = $task["start_time"] ?? "";
    }

    $task["end_time"] = $task["end_time"] ?? "";
    $task["created_at"] = date("Y-m-d H:i:s");

    $tasks[] = $task;
     
    file_put_contents($this->filePath, json_encode($tasks, JSON_PRETTY_PRINT));
  }

  
}