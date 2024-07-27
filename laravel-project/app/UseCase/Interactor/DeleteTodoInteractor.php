<?php
namespace App\UseCase\Interactor;

use App\UseCase\Input\DeleteTodoInput;
use App\Models\Todo;

class DeleteTodoInteractor
{
  public function handle(DeleteTodoInput $input)
  {
    $todo = Todo::find($input->getId());
    $todo->delete();
  }
}