<?php
$student_name = isset($_POST["student_name"]) && $_POST["student_name"] !== "" ? $_POST["student_name"] : "Kaushik";
$attendance = isset($_POST["attendance"]) && $_POST["attendance"] !== "" ? (int)$_POST["attendance"] : 60;
$internal_marks = isset($_POST["internal_marks"]) && $_POST["internal_marks"] !== "" ? (int)$_POST["internal_marks"] : 45;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Result</title>
</head>
<body>
    <h2>Student Result</h2>
    <p>Name: <?php echo htmlspecialchars($student_name); ?></p>
    <p>Attendance: <?php echo $attendance; ?>%</p>

    <?php if ($attendance < 75): ?>
        <p>Status: Student is not allowed to sit in the exam</p>
    <?php else: ?>
        <p>Status: Allowed to sit in exam</p>

        <?php if ($internal_marks < 50): ?>
            <p>Performance: Poor Performance</p>
        <?php elseif ($internal_marks >= 50 && $internal_marks <= 70): ?>
            <p>Performance: Satisfactory</p>
        <?php elseif ($internal_marks > 70 && $internal_marks < 85): ?>
            <p>Performance: Very Good Performance</p>
        <?php else: ?>
            <p>Performance: Outstanding</p>
        <?php endif; ?>
    <?php endif; ?>

    <p><a href="Attendenc.html">Go back to form</a></p>
</body>
</html>