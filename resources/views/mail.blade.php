<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
    <style>
        table thead th, table tr td, table tr th{
            text-align: center;
            border: 1px solid gray;
        }
    </style>
    <div>

        <h2 style="text-align:center">{{ Auth::user()->name }}'s Invoice </h2>
    </div>
    <div>

    <table style="margin:0 auto;">
        <thead>
            <tr>
                <th style="border: 1px solid green; text-align: center">Id</th>
                <th style="border: 1px solid green; text-align: center">Name</th>
                <th style="border: 1px solid green; text-align: center">QTY</th>
                <th style="border: 1px solid green; text-align: center">Price</th>
            </tr>
        </thead>
            <tbody>
                @foreach ($billing as $value)
                <tr>
                    <td style="border: 1px solid gray; text-align: center">{{$value->id}}</td>
                    <td style="border: 1px solid gray; text-align: center">{{$value->get_product->product_name}}</td>
                    <td style="border: 1px solid gray; text-align: center">{{$value->product_quantity}}</td>
                    <td style="border: 1px solid gray; text-align: center">${{$value->get_product->product_price}}</td>
                </tr>
                @endforeach
                <br>
                <tr>
                    <th style="border: 1px solid green; text-align: center">Discount {{session('coupon_discount') ? session('coupon_discount'):'0'}}%</th>
                    <td colspan="2" style="border: 1px solid gray; text-align: center">${{$discount?$discount:'0'}}</td>
                </tr>
                <tr>
                    <th style="border: 1px solid green; text-align: center">VAT 0%</th>
                    <td colspan="2" style="border: 1px solid gray; text-align: center">0%</td>
                </tr>
                <tr>
                    <th style="border: 1px solid green; text-align: center">Total</th>
                    <td colspan="2" style="border: 1px solid gray; text-align: center">${{$grand_total}}</td>
                </tr>

            </tbody>
        </table>

    </div>
</body>
</html>




