<?php 
error_reporting(E_ALL & ~(E_NOTICE|E_DEPRECATED));
require_once('load.php');
?>

<?php include('checklogin.php'); ?>

<?php

$output = '';

if(isset($_POST['search'])){
    $search_sql = "SELECT * FROM papers WHERE course_code LIKE '%" . $_POST['search'] . "%' OR branch LIKE '%" . $_POST['search'] . "%' or year LIKE '%" . $_POST['search'] . "%'";
    $search_query = mysqli_query($link, $search_sql);
    if(mysqli_num_rows($search_query)!=0){
        $output .= "<table><tr><th>Course Code</th><th>Branch</th><th>Year</th><th>Exam Type</th><th>Semester</th><th>Download Link</th><tr>";
        while($all = mysqli_fetch_array($search_query)){
            $cc = $all['course_code'];
            $br = $all['branch'];
            $year = $all['year'];
            $exam = $all['exam_type'];
            $sem = $all['sem'];
            $add = urlencode($all['address']);
            switch($exam){
                case 'Q1' : $exam = "Quiz-1"; break;
                case 'Q2' : $exam = "Quiz-2"; break;
                case 'MS' : $exam = "Mid-sem"; break;
                case 'ES' : $exam = "End-sem"; break;
            }
            if($sem == "odd"){
                $sem = "Odd Semester";
            } else {
                $sem = "Even Semester";
            }
            $output .= "<tr><td>$cc</td><td>$br</td><td>$year</td><td>$exam</td><td>$sem</td><td><a href=\"down.php?file=$add\">Download</a></td></tr>";
        }
        $output .= "</table>";
    } else {
    $output = "No results found!";
    }
} else {
    $search_sql = "SELECT * FROM papers";
    $search_query = mysqli_query($link, $search_sql);
    if(mysqli_num_rows($search_query)!=0) {
        $output .= "<table><tr><th>Course Code</th><th>Branch</th><th>Year</th><th>Exam Type</th><th>Semester</th><th>Download Link</th><tr>";
        while($all = mysqli_fetch_array($search_query)){
            $cc = $all['course_code'];
            $br = $all['branch'];
            $year = $all['year'];
            $exam = $all['exam_type'];
            $sem = $all['sem'];
            $add = urlencode($all['address']);
            switch($exam){
                case 'Q1' : $exam = "Quiz-1"; break;
                case 'Q2' : $exam = "Quiz-2"; break;
                case 'MS' : $exam = "Mid-sem"; break;
                case 'ES' : $exam = "End-sem"; break;
            }
            if($sem == "odd"){
                $sem = "Odd Semester";
            } else {
                $sem = "Even Semester";
            }
            $output .= "<tr><td>$cc</td><td>$br</td><td>$year</td><td>$exam</td><td>$sem</td><td><a href=\"down.php?file=$add\">Download</a></td></tr>";
        }
        $output .= "</table>";
    }
}

?>

<?php include('header.php'); ?>

        <div id="container">
            <div id="content1" style="padding: 20px; width: 900px; text-align: center;" >
                <h2>DOWNLOADS</h2>
                <form style="margin:10px;" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input class="textfield" type="text" name="search" size="60" placeholder="Enter course code or year or branch(Ex: IT,EC,CO,etc.)" />
                    <input class="button" type="submit" name="Submit" value="Search" />
                </form>
            </div>
            <div id="content2" style="padding: 20px; width: 900px; text-align: center;">
                <?php echo $output; ?>
            </div>
        </div>

<?php include('footer.php'); ?>
        