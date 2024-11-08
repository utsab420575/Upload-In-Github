<?php


// Simple if else 
$username="abcd";
$pass="123";

if($username=="abc" && $pass=="123"){
    echo "Login Success";
}
else{
    echo "Login Fail";
}


/*
// If else ladder 

$score=22;

if($score>=90){
    echo "A";
}
elseif($score>=80){
    echo "B";
}
else if($score>=70){
    echo "C";
}
else if($score>=60){
    echo "D";
}
else if($score>=50){
    echo "E";
}
else{
    echo "F";
}
*/



// Nested if else

$score=20;
$grade="...";

if($score>=90){
    $grade="A";
}
else{

    if($score>=80){
        $grade="B";
    }else{

        if($score>=70){
            $grade="C";
        }
        else{

            if($score>=60){
                $grade="D";
            }
            else{

                if($score>=50){
                    $grade="E";
                }
                else{
                    $grade="F";
                }
            }
        }

    }
   
}


echo "Your Grade is : $grade";




// Short hand if else/ Inline if else / Ternary Operators

// if=> ?   else=> :
/*
$age=20;
$msg="";
if($age>=19){
    $msg="You are adult";
}else{
    $msg="You are child";
}
echo $msg;

*/



// Ternary Operators

$age=12;
$msg="";
$age>=18?($msg="You are adult"):($msg="You are child");
echo $msg;



// Nested Ternary Operators
/*
$score=99;
$grade=(
    $score>=90?"A":
    ($score>=80?"B":
    ($score>=70? "C":
    ($score>=60? "D":
     "F"
    ))));

echo "Your Grade is : $grade";   

*/


$dayOfWeek=4;

switch($dayOfWeek){

    case 1:
        echo "Monday";
        break;
    
    case 2:
        echo "Tuesday";
        break;    
    
    case 3:
        echo "Wednesday";
        break;
        
    case 4:
        echo "Thursday";   
    break;  
    
    default:
        echo "Invalid Day";

}





?>