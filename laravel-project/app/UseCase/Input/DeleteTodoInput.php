<?php
namespace App\UseCase\Input;

class DeleteTodoInput
{
  private int $id;

    public function __construct(int $id)
    {
      $this->id = $id;
    }

    public function getId(): int
    {
      return $this->id;
    }
}
