@extends('layouts.backstage-template')
@section('title','會員管理')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('main')
<br>
    <div class="container">
        <table id="user_table" class="display">
            <thead>
                <tr>
                    <th>姓名</th>
                    <th>信箱</th>
                    <th>加入時間</th>
                    <th>購買回數</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ count($item->order) }}</td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#userModal{{ $item->id }}" title="修改會員"
                                style="padding: 0; border: solid 1px transparent; background-color: transparent; color:gray;">
                                <i class="fas fa-edit"></i>
                            </button>
                            {{-- <a href="user/userlook/{{ $item->id }}" title="修改會員" style="color:gray"><i class="fas fa-edit"></i></a> --}}
                            <a href="user/userdelete/{{ $item->id }}" title="刪除會員" style="color:gray" onclick="return check()"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <div class="modal fade" id="userModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="shopping-cartsLable"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <form action="/user/userupdate/{{$item->id}}" method="post">
                                            @csrf
                                            <div>姓名:{{$item->name}}</div>
                                            <div>信箱:{{$item->email}}</div>
                                            <div>加入時間:{{$item->created_at}}</div>
                                            <div>購買回數:{{count($item->order)}}</div>
                                            <label for="password">幫助使用者重設密碼</label>
                                            <input type="password" name="password" id="password">
                                            <div class="modal-footer d-flex">
                                                <div class="edit-button-group">
                                                    <button type="submit" class="btn btn-save">修改密碼</button>
                                                    <button type="button" class="btn btn-cancel" data-dismiss="modal">取消</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // $( querySeleter裡面的條件 ).
            $('#user_table').DataTable();
        });
        var checked = document.querySelector('#user');
        checked.classList.add('checked');

        function check() {
            var check = confirm('確定刪除?');
            if (check){
                return true;
            }
            return false;
        }
    </script>
@endsection
