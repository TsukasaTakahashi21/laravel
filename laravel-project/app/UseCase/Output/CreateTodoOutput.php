<?php
namespace app\UseCase\Output;

use App\Models\Todo;

class CreateTodoOutput
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