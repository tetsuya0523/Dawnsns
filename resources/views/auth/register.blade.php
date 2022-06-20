@extends('layouts.logout')

@section('content')



{!! Form::open(['url' => '/register']) !!}

<h1>新規ユーザー登録</h1>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
@if($errors->has('username'))
{{$errors->first('username')}}
@endif

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@if($errors->has('mail'))
{{$errors->first('mail')}}
@endif

{{ Form::label('パスワード') }}
{{ Form::password('password',null,['class' => 'input']) }}
@if($errors->has('password'))
{{$errors->first('password')}}
@endif

{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
