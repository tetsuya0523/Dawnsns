@extends('layouts.login')

@section('content')


<img src="/images/{{$users_profile -> images}}">

Name
{{ $users_profile ->username}}

Bio
{{$users_profile -> bio}}

@if(!in_array($users_profile->id, array_column($followusers, 'follow')))
   {!! Form::open(['url' => '/followList']) !!}
    {{Form::hidden('id',$users_profile->id)}}
    {{Form::submit('フォローをする',['class'=>'follow-user'])}}</td>
  {!! Form::close() !!}
@else
{!! Form::open(['url' => '/remove']) !!}
  {{Form::hidden('id',$users_profile->id)}}
  {{Form::submit('フォローを解除する',['class'=>'remove-follow'])}}
{!! Form::close() !!}
@endif

@foreach($users_posts as $user_post)
<tr>
  <td><img src="/images/{{$user_post -> image}}"></td>
  <td>{{$user_post -> username}}</td>
  <td>{{$user_post -> posts}}<td>
  <td>{{$user_post -> created_at}}<td>
</tr>
@endforeach





@endsection
