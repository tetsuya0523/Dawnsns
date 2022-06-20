@extends('layouts.login')

@section('content')

<h1>followList</h1>

@foreach($followicons as $followicon)
<tr>
<td><a href="/{{$followicon->id}}/otherProfile">
  <img src="/images/{{$followicon -> images}}">
</a></td>
</tr>

@endforeach


@foreach($followlists as $followlist)
<tr>
 <td><a href="/{{$followlist->id}}/otherProfile">
  <img src="/images/{{$followlist -> images}}">
 </a></td>
  <td>{{$followlist -> username}}</td>
  <td>{{$followlist -> posts}}<td>
  <td>{{$followlist -> created_at}}<td>
</tr>
@endforeach


@endsection
