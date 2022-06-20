@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/create']) !!}
{!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容']) !!}
<button type="submit" class="btn btn-success pull-right">
<img src="/images/post.png">
</button>
{!! Form::close() !!}

<!-- 編集内容を更新しようとした時にエラー文を表示させる記述 -->
@if($errors->has('upPost'))
{{$errors->first('upPost')}}
@endif

<table>
@foreach($timelines as $timeline)
  <tr>
    <td>
      <img src="/images/{{$timeline -> images}}">
    </td>
    <td>{{$timeline -> username}}</td>
    <td>{{$timeline -> posts}}<td>
    <td>{{$timeline -> created_at}}<td>


    @if($user_id == $timeline->user_id)
    <td>
      <a class="modalopen" data-target="{{$timeline->id}}">
        <img src="images/edit.png">
      </a>
    </td>


    <div class="update_form" id="{{$timeline->id}}">

    {!! Form::open(['url' => '/post/update']) !!}
          <div class="form-group">
              {!! Form::hidden('id', $timeline->id) !!}
              {!! Form::input('text', 'upPost', $timeline->posts, ['required', 'class' => 'form-control']) !!}
          <input type="image" src="images/edit.png">
          </div>
    {!! Form::close() !!}
    </div>



    <td>
      <a href="/post/{{$timeline->id}}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')">
        <img src="/images/trash_h.png">
      </a>
    </td>
  </tr>
@endif
@endforeach
</table>

@endsection
