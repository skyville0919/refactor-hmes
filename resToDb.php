<?php include('conn.php') ?> 

<?php

session_start();


$first = $_POST['firstname'];
$first = strip_tags($first);
$first = htmlspecialchars($first);

$last = $_POST['lastname'];
$last = strip_tags($last);
$last = htmlspecialchars($last);

$type = $_POST['res_type'];


$seats = $_POST['seats'];
$seats = strip_tags($seats);
$seats = htmlspecialchars($seats);

$date = $_POST['date'];
$date = strip_tags($date);
$date = htmlspecialchars($date);

$time = $_POST['time'];
$time = strip_tags($time);
$time = htmlspecialchars($time);

$remarks3 = $_POST['remarks3'];
$remarks3 = strip_tags($remarks3);
$remarks3 = htmlspecialchars($remarks3);

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

      


        $query = "INSERT INTO restau_res (Ref_No, Restau_ID, Reserved_to, Restau_Seats, Restau_Date, Restau_Date_In, Restau_Time_In, Restau_Remarks) VALUES ('$ref', '1', '$last, $first', '$seats', NOW(), '$date', '$time', '$remarks3')";
        $result = mysqli_query($db, $query);


        $acc_query = "SELECT * FROM restau_res WHERE Ref_No=".$ref;
        $acc_result = mysqli_query($db, $acc_query);

   
        $pre_query3 = " SELECT * FROM restaurant WHERE Restau_ID='1'";
        $pre_result3 = mysqli_query($db, $pre_query3);

        if(mysqli_num_rows($pre_result3) > 0) {
            while($pre_row3 = mysqli_fetch_assoc($pre_result3)) {
                $price = $pre_row3['Restau_Price'];
                
                $query3 = "INSERT INTO accounting (Ref_No, Reserved_to, Acc_Date_Avail, Acc_Date_Paid, Acc_Type, Acc_Balance, Acc_Payment, Acc_Archived) VALUES ('$ref', '$first', NOW(), '$date', 'Restaurant-$type', '$price', '$price'/'$paid', '1')";
                $result3 = mysqli_query($db, $query3);
                
            }
        }
    }
    ?>
    <script>
    alert("Reservation Successful!");
    var delay = 3000;
    setTimeout(function(){ window.location = 'dashboard.php'}, delay);
</script>
<?php 
}
}
        



?>