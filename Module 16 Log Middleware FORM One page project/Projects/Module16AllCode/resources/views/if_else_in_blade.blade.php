<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($result>=80)
        <p>Your result is A+</p>
    @elseif ($result>=70)
    <p>Your result is A</p>
    @elseif ($result>=60)
        <p>Your result is A-</p>
    @else
        <p>Fail</p>
    @endif
</body>
</html>
