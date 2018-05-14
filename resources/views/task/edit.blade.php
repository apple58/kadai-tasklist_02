@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <h1>id: {{ $task->id }} のタスク編集ページ</h1>
    
    @if ($task)
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

            <div class="form-group">
            {!! Form::label('status', 'ステイタス:') !!}
            {!! Form::select('status', ['ToDo', 'Done'], null) !!} 
            </div>
        
            <div class="form-group">
            {!! Form::label('content', 'タスク:') !!}
            {!! Form::text('content', null, ['class' => 'form-control']) !!}
            </div>

        {!! Form::submit('更新', ['class' => 'btn btn-default']) !!}

        {!! Form::close() !!}
        </div>
    </div>
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