<?php
session_start(); 

require_once 'includes/config.inc.php';

if (isset($_POST['search_box'])) {
    $search_box = $_POST['search_box'];
    $hostel_id = $_SESSION['hostel_id'];
    $query_search = "SELECT s.Fname, s.Lname, s.Student_id, s.Mob_no, h.Hostel_name, r.Room_No
                     FROM Student s
                     JOIN Room r ON s.Room_id = r.Room_id
                     JOIN Hostel h ON s.Hostel_id = h.Hostel_id
                     WHERE s.Student_id LIKE '$search_box%' AND s.Hostel_id = '$hostel_id'";

    $result_search = mysqli_query($conn, $query_search);

    if (!$result_search) {
        die('Query failed: ' . mysqli_error($conn));
    }

    
    ?>
    <div class="container">
        <h2 class="heading text-capitalize mb-sm-5 mb-4">Search Results</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Roll No</th>
                    <th>Contact Number</th>
                    <th>Hostel</th>
                    <th>Room Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result_search) == 0) {
                    echo '<tr><td colspan="5">No Rows Returned</td></tr>';
                } else {
                    while ($row_search = mysqli_fetch_assoc($result_search)) {
                        $student_name = $row_search['Fname'] . " " . $row_search['Lname'];
                        echo "<tr><td>{$student_name}</td><td>{$row_search['Student_id']}</td><td>{$row_search['Mob_no']}</td><td>{$row_search['Hostel_name']}</td><td>{$row_search['Room_No']}</td></tr>\n";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    mysqli_free_result($result_search);
} else {
    
    $hostel_id = $_SESSION['hostel_id'];
    $query = "SELECT s.Fname, s.Lname, s.Student_id, s.Mob_no, h.Hostel_name, r.Room_No
              FROM Student s
              JOIN Room r ON s.Room_id = r.Room_id
              JOIN Hostel h ON s.Hostel_id = h.Hostel_id
              WHERE s.Hostel_id = '$hostel_id'";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Query failed: ' . mysqli_error($conn));
    }

    
    ?>
    <div class="container">
        <h2 class="heading text-capitalize mb-sm-5 mb-4">Rooms Allotted</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Roll No</th>
                    <th>Contact Number</th>
                    <th>Hostel</th>
                    <th>Room Number</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) == 0) {
                    echo '<tr><td colspan="5">No Rows Returned</td></tr>';
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $student_name = $row['Fname'] . " " . $row['Lname'];
                        echo "<tr><td>{$student_name}</td><td>{$row['Student_id']}</td><td>{$row['Mob_no']}</td><td>{$row['Hostel_name']}</td><td>{$row['Room_No']}</td></tr>\n";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    mysqli_free_result($result);
}
mysqli_close($conn);
?>
