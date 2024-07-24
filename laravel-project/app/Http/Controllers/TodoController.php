<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Todo;
use App\Models\Task;
use Auth;

use App\UseCase\Input\CreateTodoInput;
use App\UseCase\Interactor\CreateTodoInteractor;


class TodoController extends Controller
{
    // ↓関数を作成
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // モデルに定義した関数を実行する．
        $todos = Todo::getMyAllOrderByDeadline();
        return view('todo.index', [
            'todos' => $todos
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'todo' => 'required | max:191',
            'deadline' => 'required',
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('todo.create')
            ->withInput()
            ->withErrors($validator);
        }

        $input = new CreateTodoInput(
            Auth::id(),
            $request->input('todo'),
            $request->input('deadline'),
            $request->input('comment', ''),
        );

        $createTodoInteractor = new CreateTodoInteractor();
        $output = $createTodoInteractor->handle($input);
        
        return redirect()->route('todo.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
            'todo' => 'required | max:191',
            'deadline' => 'required',
        ]);
        //バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('todo.edit', $id)
            ->withInput()
            ->withErrors($validator);
        }
        //データ更新処理
        // updateは更新する情報がなくても更新が走る（updated_atが更新される）
        $result = Todo::find($id)->update($request->all());
        // fill()save()は更新する情報がない場合は更新が走らない（updated_atが更新されない）
        // $redult = Todo::find($id)->fill($request->all())->save();
        return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Todo::find($id)->delete();
        return redirect()->route('todo.index');
    }
}
