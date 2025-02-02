<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;


class Todo extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public static function getAllOrderByDeadline()
    {
    return self::orderBy('deadline', 'asc')->get();
    }

    public static function getMyAllOrderByDeadline()
    {
        $todos = self::where('user_id', Auth::user()->id)
        ->orderBy('deadline', 'asc')
        ->get();
        return $todos;
    }
}
