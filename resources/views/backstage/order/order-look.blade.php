@extends('layouts.backstage-template')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/user-look.css') }}">
@endsection

@section('main')
    <div class="container">
        <table id="product_table" class="display">
            <thead>
                <tr>
                    <th>商品名</th>
                    <th>單價</th>
                    <th>數量</th>
                    <th>小記</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->order_detail as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->qty * $item->price }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <form action="/order/orderupdate/{{ $order->id }}" method="post">
            <div>金流單號</div>
            <div>{{ $order->order_number }}</div>
            <div>購買人</div>
            <div>{{ $order->user->name }}</div>
            <div>地址</div>
            <div>{{ $order->address }}</div>
            <div>電話</div>
            <div>{{ $order->phone }}</div>
            <div></div>
            <div>運費</div>
            <div>{{ $order->shipping_fee }}</div>
            <div>總計</div>
            <div>{{ $order->total_price }}</div>
            <label for="status">狀態</label>
            <select name="status" id="status">
                <option value="1" @if ($order->status == 1) selected @endif>未付款</option>
                <option value="2" @if ($order->status == 2) selected @endif>已付款</option>
                <option value="3" @if ($order->status == 3) selected @endif>已出貨</option>
                <option value="4" @if ($order->status == 4) selected @endif>已取消</option>
            </select>
            @csrf
            <div>
                <a href="/order">回列表頁</a>
                <button type="submit">修改狀態</button>
            </div>

        </form>
    </div>
@endsection


@section('js')
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // $( querySeleter裡面的條件 ).
            $('#product_table').DataTable();
        });
    </script>
@endsection
