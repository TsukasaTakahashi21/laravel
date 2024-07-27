<?php
namespace App\UseCase\Output;

use App\Models\Todo;

class UpdateTodoOutput
{
  private $todo;

  public function __construct(Todo $todo)
  {
    $this->todo = $todo;
  }

  public function getTodo(): Todo
  {
    return $this->todo;
  }
}