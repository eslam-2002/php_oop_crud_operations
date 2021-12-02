<?php 

class Task extends DB {
  public function getTask() {
    $sql = "SELECT * FROM tasks";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    while($result = $stmt->fetchAll()) {
      return $result;
    };
  }

  public function addTask($task_name, $task_description, $start_date,$due_date) {
    $sql = "INSERT INTO tasks(task_name, task_description,start_date,due_date) VALUES (?, ?, ?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$task_name, $task_description, $start_date,$due_date]);
  }

  public function editTask($id) {
    $sql = "SELECT * FROM tasks WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch();

    return $result;
  }

  public function updateTask($id,$task_name, $task_description, $start_date,$due_date) {
    $sql = "UPDATE tasks SET task_name = ?, task_description = ?, start_date = ? , due_date =? WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$task_name, $task_description, $start_date,$due_date,$id]);
  }

  public function delTask($id) {
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }
}