@extends('layouts.backstage-template')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

 @section('main')
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
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{count($item->order)}}</td>
                <td>
                    <a href="/user/look/{{$item->id}}">查看客戶詳情</a>
                </td>
            </tr>
            @endforeach
         
        </tbody>
    </table>
</div>
 @endsection

@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready( function () {
            // $( querySeleter裡面的條件 ).
            $('#user_table').DataTable();
        } );
    </script>
@endsection
    
