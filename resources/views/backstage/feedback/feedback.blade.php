@extends('layouts.backstage-template')
@section('title','意見回饋')
@section('main')
    <br>
    <div class="container">
        <table id="feedback_table" class="display">
            <thead>
                <tr>
                    <th>編號</th>
                    <th>姓名</th>
                    <th>電話</th>
                    <th>電子郵件</th>
                    <th>意見</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedback as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->desc }}</td>
                        <td>
                            <a href="/feedback/delete/{{ $item->id }}" onclick="return check()" title="刪除意見"
                                style="color:gray"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#feedback_table').DataTable();
        });
        var checked = document.querySelector('#feedback');
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
