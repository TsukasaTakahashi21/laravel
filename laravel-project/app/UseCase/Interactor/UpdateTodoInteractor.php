<?php
namespace App\UseCase\Interactor;

use App\UseCase\Input\UpdateTodoInput;
use App\UseCase\Output\UpdateTodoOutput;
use App\Models\Todo;

class UpdateTodoInteractor
{
  public function handle(UpdateTodoInput $input): UpdateTodoOutput
  {
    $todo = Todo::findOrFail($input->getId());

    $todo->update([
      'todo' => $input->getTodo($input->getTodo()),
      'deadline' => $input->getDeadline(),
      'comment' => $input->getComment(),
    ]);

    return new UpdateTodoOutput($todo);
  }
}