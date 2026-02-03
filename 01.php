<?php
 // Building grading system 
    $score = 85; 
 if ($score >= 90) {
     $grade = 'A';
 } elseif ($score >= 80) {
     $grade = 'B';
 } elseif ($score >= 70) {
     $grade = 'C';
 } elseif ($score >= 60) {
     $grade = 'D';
 } else {
     $grade = 'F';
 }
 echo "Your grade is: " . $grade;

// Checking the voting eligibility
 $age = 20; 
 if ($age >= 18) {
     echo "You are eligible to vote.";
 } else {
     echo "You are not eligible to vote.";
 }
 $leqp_year = 2024;
   if($leqp_year % 4 == 0 && ($leqp_year % 100 != 0 || $leqp_year % 400 == 0)) {
       echo "$leqp_year is a leap year.";
   } else {
       echo "$leqp_year is not a leap year.";
   }
   // Scholardhip eligibility
    $gpa = 3.6;
    if ($gpa >= 3.5) {
         echo "You are eligible for a scholarship.";
    } else {
         echo "You are not eligible for a scholarship.";
    } 
    
?>
