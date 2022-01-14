@extends('layouts.backstage-template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/user-look.css')}}">
@endsection
  @section('main')
  <div class="container">
    <form action="/user/update/{{$user->id}}" method="post">
       
        <div>姓名</div>
        <div>{{$user->name}}</div>
        <div>信箱</div>
        <div>{{$user->email}}</div>
        <div>加入時間</div>
        <div>{{$user->created_at}}</div>
        <div>購買回數</div>
        <div>{{count($user->order)}}</div>
        <label for="password">幫助使用者重設密碼</label>
        <input type="password" name="password" id="password">
        <div>
            <a href="/user">回列表頁</a>
            <button type="submit">修改密碼</button>
        </div>
        @csrf
    </form>
</div>
  @endsection
 