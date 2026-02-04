<?php
echo"Enter your name: ";
$inputname = readline();
echo"Enter your marks: ";
$inputMArks = readline();
echo "Enter your Class: ";
$inputClaas = readline();
echo"Here is the details of your performance based on the marks provided : ";
if ($inputMArks <= 50) {
    echo " Name: $inputname
    Marks: $inputMArks
    Class: $inputClaas
    Performance: Average";

} else {
    echo " Name: $inputname
    Marks: $inputMArks
    Class: $inputClaas
    Performance: Excellent";
}
?>


