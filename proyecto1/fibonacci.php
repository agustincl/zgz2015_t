F=0,1,1,2,3,5,8,13,21,
<?php
$max = 1225;
echo "F=0,1,";
$n0=0;
$n1=1;
$n2=$n0+$n1;
while ($n2<=$max)
{
    echo $n2.","; 
    $n0=$n1;
    $n1=$n2;
    $n2=$n0+$n1;
}
