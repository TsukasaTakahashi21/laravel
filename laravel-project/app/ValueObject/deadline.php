<?php
namespace App\ValueObject;

class deadline
{
  private string $value;

  public function __construct(string $value)
  {
    $this->value = $value;
  }

  public function getTodo(): string
  {
    return $this->value;
  }

}