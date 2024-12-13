<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>All Product List(Simple Multidimensional Array) </h1>
    <ul>
        @foreach ($products as $singleProduct)
            <li>
                Name: {{$singleProduct['name']}} |
                Color: {{$singleProduct['color']}} |
                Price: {{$singleProduct['price']}}
            </li>
        @endforeach
    </ul>
</body>
</html>
