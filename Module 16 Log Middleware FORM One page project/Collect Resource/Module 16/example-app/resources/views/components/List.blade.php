






<h1>Sum is={{$marks}}</h1>
@if($marks>=80 && $marks<100)
    <h1>A+</h1>
@elseif($marks>=70 && $marks<80)
    <h1>A</h1>
@elseif($marks>=60 && $marks<70)
    <h1>A-</h1>
@elseif($marks>=50 && $marks<60)
    <h1>B</h1>
@else
    <h1>F</h1>
@endif


<img src="{{asset('https://captainbinary.com/images/hero-img.svg')}}"/>



@switch($marks)
    @case(100)
        <h1>A++++</h1>
        @break
    @case(70)
        <h1>A----</h1>
        @break
    @default
        <h1>Don't Know</h1>
@endswitch





