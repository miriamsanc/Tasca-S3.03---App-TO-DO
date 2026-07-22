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

  public function filterTasks(string $field, string|int $value): array {
      $tasks = $this->getAllTasks();
      $newTasks = array_filter($tasks, function($task) use ($field, $value) {
         switch ($field) {
          case 'id':
            return $task['id'] == $value;
            
          case 'title':
            return $task['title'] == $value;
            
          case 'description':
            return $task['description'] == $value;
            
          case 'status':
            return $task['status'] == $value;
            
          case 'created_at':
            return $task['created_at'] == $value;

          case 'start_time':
            return $task['start_time'] == $value;

          case 'end_time':
            return $task['end_time'] == $value;

          case 'user':
            return $task['user'] == $value;

          default: 
            return false;
         }
         
     });
     return array_values($newTasks);
   }

   public function editTask(array $updatedTask): void {
    $tasks = $this->getAllTasks();
       foreach ($tasks as &$task) {
           if ($task['id'] == $updatedTask['id']) {
               $task['title'] = $updatedTask['title'] ?? $task['title'];
               $task['description'] = $updatedTask['description'] ?? $task['description'];
               $task['user'] = $updatedTask['user'] ?? $task['user'];
               
               $status = $updatedTask['status'] ?? $task['status'];

               if ($status === 'en ejecucion' && $task['status'] !== 'en ejecucion') {
                   $task['start_time'] = date("Y-m-d H:i:s");
               }

               if ($status === 'acabada' && $task['status'] !== 'acabada') {

                   if (empty($task['start_time'])) {
                       $task['start_time'] = date("Y-m-d H:i:s");
                   }
                   $task['end_time'] = date("Y-m-d H:i:s");
               }
               $task['status'] = $status;
               break;
           }
       }
       file_put_contents($this->filePath, json_encode($tasks, JSON_PRETTY_PRINT));
   }
     
   public function deleteTask(int $id): void {
     $tasks = $this->getAllTasks();
     $newTasks = array_filter($tasks, function($task) use ($id) {
            return $task["id"] != $id;
     });
     file_put_contents($this->filePath, json_encode(array_values($newTasks), JSON_PRETTY_PRINT));
   }

}