<?php
namespace app\UseCase\Interactor;

use App\UseCase\Input\CreateTodoInput;
use App\UseCase\Output\CreateTodoOutput;
use App\Models\Todo;

class CreateTodoInteractor
{
  public function handle(CreateTodoInput $input): CreateTodoOutput
  {
    $todo = Todo::create([
      'user_id' => $input->getUserId(),
      'todo' => $input->getTodo(),
      'deadline' => $input->getDeadline(),
      'comment' => $input->getComment(),
    ]);

    return new CreateTodoOutput($todo);
  }
}