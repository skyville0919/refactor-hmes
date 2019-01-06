<?php include('conn.php') ?> 

<?php

session_start();


$first = $_POST['firstname'];
$first = strip_tags($first);
$first = htmlspecialchars($first);

$last = $_POST['lastname'];
$last = strip_tags($last);
$last = htmlspecialchars($last);

$type = $_POST['fac_type'];


$attendees = $_POST['attendees'];
$attendees = strip_tags($attendees);
$attendees = htmlspecialchars($attendees);

$date1 = $_POST['datein'];
$date1 = strip_tags($date1);
$date1 = htmlspecialchars($date1);

$time1 = $_POST['timein'];
$time1 = strip_tags($time1);
$time1 = htmlspecialchars($time1);

$date2 = $_POST['dateout'];
$date2 = strip_tags($date2);
$date2 = htmlspecialchars($date2);

$time2 = $_POST['timeout'];
$time2 = strip_tags($time2);
$time2 = htmlspecialchars($time2);

$remarks2 = $_POST['remarks2'];
$remarks2 = strip_tags($remarks2);
$remarks2 = htmlspecialchars($remarks2);

$paid = $_POST['hall'];



$prequery = "SELECT * FROM accounts WHERE Acc_ID =".$_SESSION['accounts'];
$preresult = mysqli_query($db,$prequery);
if (mysqli_num_rows($preresult) > 0) {
    while ($prerow = mysqli_fetch_assoc($preresult)) {
        $fname = $prerow['F_Name'];
        $lname = $prerow['L_Name'];
        $mname = $prerow['M_Name'];
        $contact = $prerow['Contact_No'];
        $address = $prerow['Address'];
        $id = $prerow['Acc_ID'];

    

        // $bed_id = $_POST['bed_id'];

    $stmt = "INSERT INTO customer (F_Name, L_Name, M_Name, Contact_No, Address, Acc_ID, Archived) VALUES ('$fname', '$lname', '$mname', '$contact', '$address', '$id', '1')";
    $results = mysqli_query($db, $stmt);



    if($results == TRUE) {
        $ref = $db->insert_id;

      


        $query = "INSERT INTO fac_res (Ref_No, Fac_ID, Reserved_to, Fac_Attendees, Fac_Date, Fac_Date_In, Fac_Date_Out, Fac_Time_In, Fac_Time_Out, Fac_Remarks) VALUES ('$ref', '1', '$last, $first', '$attendees', NOW(), '$date1', '$date2', '$time1', '$time2', '$remarks2')";
        $result = mysqli_query($db, $query);
 


        $acc_query = "SELECT * FROM fac_res WHERE Ref_No=".$ref;
        $acc_result = mysqli_query($db, $acc_query);

   
        $pre_query3 = " SELECT * FROM facility WHERE Fac_ID='1'";
        $pre_result3 = mysqli_query($db, $pre_query3);

        if(mysqli_num_rows($pre_result3) > 0) {
            while($pre_row3 = mysqli_fetch_assoc($pre_result3)) {
                $price = $pre_row3['Fac_Price'];
                
                $query3 = "INSERT INTO accounting (Ref_No, Reserved_to, Acc_Date_Avail, Acc_Date_Paid, Acc_Type, Acc_Balance, Acc_Payment, Acc_Archived) VALUES ('$ref', '$last, $first', NOW(), '$date1', 'Facility-$type', '$price', '$price'/'$paid', '1')";
                $result3 = mysqli_query($db, $query3);   
            }
        } 
        
    } ?> 
    <script>
        alert("Reservation Successful!");
        var delay = 3000;
		setTimeout(function(){ window.location = 'dashboard.php'}, delay);
    </script>
    <?php 
    }
}
        



?>