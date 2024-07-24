<?php
namespace app\UseCase\Input;

class CreateTodoInput
{
  private $userId;
  private $todo;
  private $deadline;
  private $comment;

  public function __construct(int $userId, string $todo, string $deadline, string $comment)
  {
    $this->userId = $userId;
    $this->todo = $todo;
    $this->deadline = $deadline;
    $this->comment = $comment;
  }

  public function getUserId(): int
  {
    return $this->userId;
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