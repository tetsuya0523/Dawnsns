@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/userseach','method' => 'get','class' => 'userseach']) !!}
{!! Form::input('text', 'keyword', null, ['required', 'class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
<button type="submit">
<img src="/images/post.png">
</button>
{!! Form::close() !!}
<p>検索: @if(isset($keyword)) {{$keyword}} @endif</p>

<table>
@foreach($user_searchs as $user_search)
<tr>
<td>
    <img src="/images/{{$user_search -> images}}">
  </td>
  <td>{{$user_search -> username}}</td>
  <td>{{$user_search -> images}}</td>




@if(!in_array($user_search->id, array_column($followusers, 'follow')))
   {!! Form::open(['url' => '/followCreate']) !!}
    {{Form::hidden('id',$user_search->id)}}
    <td>{{Form::submit('フォローをする',['class'=>'follow-user'])}}</td>
  {!! Form::close() !!}
@else
{!! Form::open(['url' => '/followRemove']) !!}
  {{Form::hidden('id',$user_search->id)}}
  <td>{{Form::submit('フォローを解除する',['class'=>'remove-follow'])}}</tb>
{!! Form::close() !!}
@endif
@endforeach
</table>
@endsection
