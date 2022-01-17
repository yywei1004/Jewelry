@extends('layouts.backstage-template')

@section('main')
    <br>
    <div class="container">
        <table id="order_table" class="display">
            <thead>
                <tr>
                    <th>金流單號</th>
                    <th>購買人</th>
                    {{-- <th>地址</th>
                    <th>電話</th> --}}
                    <th>總價</th>
                    <th>狀態</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $item)
                    <tr>
                        <td>{{ $item->order_number }}</td>
                        <td>{{ $item->user->name }}</td>
                        {{-- <td>{{ $item->address }}</td>
                        <td>{{ $item->phone }}</td> --}}
                        <td>{{ $item->total_price }}</td>
                        <td>
                            @if ($item->status == 1)
                                未付款
                            @elseif ($item->status == 2)
                                已付款
                            @elseif ($item->status == 3)
                                已出貨
                            @elseif ($item->status == 4)
                                已取消
                            @endif
                        </td>
                        <td>
                            <a href="/order/look/{{ $item->id }}" title="查看訂單詳情" style="color:gray"><i class="fas fa-list-alt"></i></a>
                            <a href="" title="修改訂單" style="color:gray"><i class="fas fa-edit"></i></a>
                            <a href="" title="刪除訂單" style="color:gray"><i class="fas fa-trash-alt"></i></a>
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
            $('#order_table').DataTable();
        });
        var checked = document.querySelector('#order');
        checked.classList.add('checked');
    </script>
@endsection
