@extends('layouts.login')

@section('content')

@if(isset(Auth::user()->image)){{ Auth::user()->image}}@endif


{!! Form::open(['url' => '/profileUpdate',"enctype" => "multipart/form-data"]) !!}
UserName
{!! Form::input('text', 'username', Auth::user()->name, ['class' => 'form-control' ]) !!}

MailAdress
{!! Form::input('text','mail',Auth::user()->mail,['class' => 'form-control'])!!}

Password
{!! Form::input('password','password',null,['class' => 'form-control','readonly'])!!}

new Password
{!! Form::input('password','new_password',Auth::user()->password,['class' => 'form-control'])!!}

Bio
{!! Form::input('text','bio',Auth::user()->bio,['class' => 'form-control'])!!}

Icon image
{!! Form::file('image',['class' => 'form-control'] )!!}

{!! Form::close() !!}





@endsection
