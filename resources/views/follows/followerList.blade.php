@extends('layouts.login')

@section('content')

<h1>followerList</h1>

@foreach($followericons as $followericon)
<table>
 <tr>
  <td><a href="/{{$followericon->id}}/otherProfile">
  <img src="/images/{{$followericon-> images}}">
  </a></td>
 </tr>
</table>
@endforeach


@foreach($followerlists as $followerlist)
<table>
 <tr>
  <td><a href="/{{$followerlist->id}}/otherProfile">
  <img src="/images/{{$followerlist -> images}}">
  </a></td>
  <td>{{$followerlist -> username}}</td>
  <td>{{$followerlist -> posts}}<td>
  <td>{{$followerlist -> created_at}}<td>
 </tr>
</table>
@endforeach






@endsection
