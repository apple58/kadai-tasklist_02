@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
<h1>タスク一覧</h1>
<?php $statuses = ['Todo', 'Done']; ?>

@if (count($tasks) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>タスク</th>
                <th>ステイタス</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                    <td>{{ $task->content }}</td>
                    <!-- {{dump($task->status)}} -->
                    <td>{{ ~$task->status ? $statuses[$task->status] : '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

{!! link_to_route('tasks.create', '新規タスクの追加', null, ['class' => 'btn btn-primary']) !!}

        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Tasks</h1>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection