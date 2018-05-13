@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <h1>id: {{ $task->id }} のタスク詳細ページ</h1>

    @if (count($task) > 0)
    <?php $statuses = ['Todo', 'Done']; ?>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>ステイタス</th>
            <td>{{ ~$task->status ? $statuses[$task->status] : '' }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>
        </tr>
    </table>

    {!! link_to_route('tasks.edit', 'このタスクの編集', ['id' => $task->id]) !!}

    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}
    @endif
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Tasks</h1>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection