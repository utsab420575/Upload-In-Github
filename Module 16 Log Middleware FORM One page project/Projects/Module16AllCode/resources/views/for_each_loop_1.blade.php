<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ul>
        {{-- category define:Fruits,Vegetables
        items define: for Fruits
            [name,color,price]
            [name,color,price]
         for vegetables
            [name,color,price]
            [name,color,price] --}}
        @foreach ($data as $category=>$items)
            <li>{{$category}}</li>
            <ul>
                @foreach ($items as $singleItem)
                    <li>
                        Name : {{$singleItem['name']}} |
                        Name : {{$singleItem['color']}} |
                        Name : {{$singleItem['price']}}
                    </li>
                @endforeach
            </ul>
        @endforeach
    </ul>
</body>
</html>
