@extends('user_template.layouts.template')
@section('main-content')
<h2>Final step to place your order</h2>
<div class="row">
    <div class="col-8">
        <div class="box_main">
            <h3>Product will Send At-</h3>
            <p>City/Village- {{$shipping_address->city_name}}</p>
            <p>Postal Code- {{$shipping_address->postal_code}}</p>
            <p>Phone Number- {{$shipping_address->phone_number}}</p>
        </div>
    </div>
    <div class="col-4">
        <div class="box_main">
            Your Final Products Are-
            <div class="row">
            <div class="col-12">
                <div class="box_main">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                            <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            @php
                              $total=0;
                            @endphp
                            @foreach($cart_items as $item)
                            <tr>
                            @php
                            $product_name=App\Models\Product::where('id',$item->product_id)->value('product_name');
                            $img=App\Models\Product::where('id',$item->product_id)->value('product_img');
                            @endphp
                                <td><img src="{{asset($img)}}" style="height:50px"></td>
                                <td>{{$product_name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->price}}</td>
                            </tr>
                            @php
                              $total=$total+$item->price;
                            @endphp
                            @endforeach
                            @if($total>0)
                            <tr>
                                <td></td>
                                <td>Total</td>
                                <td>{{$total}}</td>
                                <td><a href="{{route('shippingaddress')}}" class="btn btn-primary">Checkout Now</a></td>

                            </tr>
                            @endif
                        </table>
                    </div>
        </div>
    </div>
</div>
@endsection
