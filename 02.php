 <!-- Buildin  - availability of the professor in the university  toatal minus absent then we need to coutput->
<?php
 $toal_faculties = 90;
 $absent = 15;
 $min_faculty = 5;
 $present = $toal_faculties - $absent;
 $approved_leave = 5;
 $unapproved_leave = 6;
if ($approved_leave and $unapproved_leave ==0) {
    echo "The department is functioning well with all professors present.";
}else if ($present>=$min_faculty) {
    echo "The department is functioning adequately with sufficient professors present.";
}else if ($present <$min_faculty) {
    echo "The department is not functioning adequately due to insufficient professors present.";
}
?>
