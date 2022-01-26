@extends('layouts.backstage-template')
@section('title','訂單管理')
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
                            <button type="button" data-toggle="modal" data-target="#orderModal{{ $item->id }}" title="查看訂單詳情"
                                style="padding: 0; border: solid 1px transparent; background-color: transparent; color:gray;">
                                <i class="fas fa-list-alt"></i>
                            </button>
                            {{-- <a href="/order/orderlook/{{ $item->id }}" title="查看訂單詳情" style="color:gray"><i class="fas fa-list-alt"></i></a> --}}
                            {{-- <a href="" title="修改訂單" style="color:gray"><i class="fas fa-edit"></i></a> --}}
                            <a href="/order/orderdelete/{{ $item->id }}" title="刪除訂單" style="color:gray"><i class="fas fa-trash-alt" onclick="return check()"></i></a>
                        </td>
                    </tr>
                    <div class="modal fade" id="orderModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="shopping-cartsLable"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div>金流單號:{{ $item->order_number }}</div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div>
                                            @foreach ($item->order_detail as $detail)
                                                <div>
                                                    <div>商品名:{{ $detail->product->name }} X {{ $detail->qty }}</div>
                                                    <div>單價:{{ $detail->price }}</div>
                                                    <div>小計:{{ $detail->qty * $detail->price }}</div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                        <form action="/order/orderupdate/{{ $item->id }}" method="post">
                                            @csrf
                                            <div>購買人:{{ $item->user->name }}</div>
                                            <div>地址:{{ $item->address }}</div>
                                            <div>電話:{{ $item->phone }}</div>
                                            <div>運費:{{ $item->shipping_fee }}</div>
                                            <div>總計:{{ $item->total_price }}</div>
                                            <label for="status">狀態</label>
                                            <select name="status" id="status">
                                                <option value="1" @if ($item->status == 1) selected @endif>未付款</option>
                                                <option value="2" @if ($item->status == 2) selected @endif>已付款</option>
                                                <option value="3" @if ($item->status == 3) selected @endif>已出貨</option>
                                                <option value="4" @if ($item->status == 4) selected @endif>已取消</option>
                                            </select>
                                            <div class="modal-footer d-flex">
                                                <div class="edit-button-group">
                                                    <button type="submit" class="btn btn-save">修改狀態</button>
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
    <script>
        $(document).ready(function() {
            $('#order_table').DataTable();
        });
        var checked = document.querySelector('#order');
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
