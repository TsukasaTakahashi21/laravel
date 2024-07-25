<?php
namespace App\ValueObject;

class Todo
{
  private string $value;

  public function __construct(string $value)
  {
    if ( 1 < strlen($value) < 20) {
      throw new \InValidArgumentException('１文字以上記入してください');
    }
    $this->value = $value;
  }

  public function getTodo(): string
  {
    return $this->value;
  }
}

