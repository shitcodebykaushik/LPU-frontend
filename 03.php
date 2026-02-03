<?php

// Loop 3 times
for ($i = 1; $i <= 3; $i++) {

    
    if ($i == 1) {
        $student_name = "Kaushik";
        $attendance = 60; 
        $internal_marks = 45;
    } elseif ($i == 2) {
        $student_name = "Rahul";
        $attendance = 80; 
        $internal_marks = 65;
    } else {
        $student_name = "Amit";
        $attendance = 90; 
        $internal_marks = 90;
    }

    echo "Name: $student_name ";
    echo "Attendance: $attendance % ";

    if ($attendance < 75) {
        echo "Student is not allowed to sit in the exam";
    } else {
        echo "Allowed to sit in exam ";
        
        if ($internal_marks < 50) {
            echo "Performance: Poor Performance";
        } elseif ($internal_marks >= 50 && $internal_marks <= 70) {
            echo "Performance: Satisfactory";
        } elseif ($internal_marks > 70 && $internal_marks < 85) {
            echo "Performance: Very Good Performance";
        } else {
            echo "Performance: Outstanding";
        }
    }
}
?>