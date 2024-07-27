<?php
namespace App\UseCase\Input;

class UpdateTodoInput
{
  private $id;
  private $todo;
  private $deadline;
  private $comment;

  public function __construct(int $id, string $todo, string $deadline, string $comment)
    {
      $this->id = $id;
      $this->todo = $todo;
      $this->deadline = $deadline;
      $this->comment = $comment;
    }

    public function getId(): int
    {
      return $this->id;
    }

    public function getTodo(): string
    {
      return $this->todo;
    }

    public function getDeadline(): string
    {
      return $this->deadline;
    }

    public function getComment(): string
    {
      return $this->comment;
    }
}