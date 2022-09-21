<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Barcode for:</h1>
    <h4>{{ $data->products->name }}</h4>
    <h5>No. ({{ $data->bar_num }})</h5>
    @php
        $generate = new Picqer\Barcode\BarcodeGeneratorHTML();
    @endphp
    {!! $generate->getBarcode($data->bar_num, $generate::TYPE_CODE_128) !!}
</body>

</html>
