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

}