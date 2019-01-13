<?php include('conn.php') ?> 

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();


    $card= $_POST['card'];
    $method = $_POST['method'];

    $first = $_POST['firstname'];
    $first = strip_tags($first);
    $first = htmlspecialchars($first);

    $last = $_POST['lastname'];
    $last = strip_tags($last);
    $last = htmlspecialchars($last);

    $adult = $_POST['adult'];
    $adult = strip_tags($adult);
    $adult = htmlspecialchars($adult);

    $child = $_POST['child'];
    $child = strip_tags($child);
    $child = htmlspecialchars($child);

    $arrival = $_POST['arrival'];
    $arrival = strip_tags($arrival);
    $arrival = htmlspecialchars($arrival);

    $departure = $_POST['departure'];
    $departure = strip_tags($departure);
    $departure = htmlspecialchars($departure);

    $remarks = $_POST['remarks'];
	$remarks = strip_tags($remarks);
	$remarks = htmlspecialchars($remarks);

   
        $add = $_POST['add'];
    

        $paid = $_POST['hall'];

        $id = $_POST['bed_id'];
    
if($method == "cash") {
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
                $email = "prerow"['Email'];
    
            
        
                // $bed_id = $_POST['bed_id'];
        
            $stmt = "INSERT INTO customer (F_Name, L_Name, M_Name, Contact_No, Address, Acc_ID, Archived) VALUES ('$fname', '$lname', '$mname', '$contact', '$address', '$id', '1')";
            $results = mysqli_query($db, $stmt);
     
    
            if($results == TRUE) {
                $ref = $db->insert_id;
            
    
                $query = "INSERT INTO bed_res (Ref_No, Reserved_to, Bed_ID, Bed_Adult, Bed_Child, Bed_Date, Bed_Date_In, Bed_Date_Out, Bed_Remarks) VALUES ('$ref', '$last, $first', '$id','$adult', '$child', NOW(), '$arrival', '$departure', '$remarks')";
                $result = mysqli_query($db, $query);
    
    
                    $query2 = "UPDATE bedroom SET Bed_Available = Bed_Available - 1 WHERE Bed_ID =".$id;
                    $results2 = mysqli_query($db, $query2);
         
        
        
                    $acc_query = "SELECT * FROM bed_res WHERE Ref_No=".$ref;
                    $acc_result = mysqli_query($db, $acc_query);
        
        
                    $pre_query3 = " SELECT * FROM bedroom WHERE Bed_ID=".$id;
                    $pre_result3 = mysqli_query($db, $pre_query3);
            
        
                    if(mysqli_num_rows($pre_result3) > 0) {                          
                        while($pre_row3 = mysqli_fetch_assoc($pre_result3)) {
                            $price = $pre_row3['Bed_Price'];
                            
                            $query3 = "INSERT INTO accounting (Ref_No, Reserved_to, Acc_Date_Avail, Acc_Date_Paid, Acc_Type, Acc_Balance, Acc_Payment, Acc_Archived) VALUES ('$ref', '$last, $first', NOW(), '$arrival', 'Bedroom', '$price', '$price'/'$paid', '1')";
                            $result3 = mysqli_query($db, $query3);
                            echo $query3;
                            
         
        
                            for($i=0; $i<sizeof($add); $i++) {  
                                if ($add[$i] ==  'on') {
                                    //do nothing
        
                                } else {
                                    $pre_query5 = " SELECT * FROM add_ons_price WHERE add_on_name="."'".$add[$i]."'";
                                    $pre_result5 = mysqli_query($db, $pre_query5);
            
               
            
                                    if (mysqli_num_rows($pre_result5) > 0 ) {
                                        while ($pre_row5 = mysqli_fetch_assoc($pre_result5)) {
                                            $add_price = $pre_row5['add_on_price'];
                                        }}
            
                                            $query4 = "INSERT INTO add_ons (Ref_No,Add_Description,Add_Amount,Add_Quantity,Add_Date) VALUES ('$ref','$add[$i]','$add_price','1',NOW())";
                                            $result_query4 = mysqli_query($db, $query4);
            
                                            $query5 = "INSERT INTO accounting (Ref_No, Reserved_to, Acc_Date_Avail, Acc_Date_Paid, Acc_Type, Acc_Balance, Acc_Payment, Acc_Archived) VALUES ('$ref','$last, $first', NOW(), '$arrival',UPPER('$add[$i]'), '$add_price', '$add_price'/'$paid', '1')";
                                            $result_query5 = mysqli_query($db, $query5);
                                }
                            }
        
                        }
                }
    
     
            }
        }
        //Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 4;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'legaspireginald.rr@gmail.com';                 // SMTP username
    $mail->Password = 'mmjygrnmbls';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('noreply@hmes.com');
    $mail->addAddress($email, $fname);     // Add a recipient
   

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'HMES payment steps';
	$mail->Body    = "Please follow the steps below on how to pay on cash thru our bank partners. Also below are the details of our bank accounts";
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
	} catch (Exception $e) {
    $mail->ErrorInfo;
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
else if ($method == "card") {
    $type = "card";
    $name = $_POST['cardName'];
    $number = $_POST['cardNumber'];
    $month = $_POST['exp_month'];
    $year = $_POST['exp_year'];
    $code = $_POST['cardCode'];
    


    if($card == "offcard") {
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
                $email = $prerow['Email'];
    
            
        
                // $bed_id = $_POST['bed_id'];
        
            $stmt = "INSERT INTO customer (F_Name, L_Name, M_Name, Contact_No, Address, Acc_ID, Archived) VALUES ('$fname', '$lname', '$mname', '$contact', '$address', '$id', '1')";
            $results = mysqli_query($db, $stmt);
     
    
            if($results == TRUE) {
                $ref = $db->insert_id;
            
    
                $query = "INSERT INTO bed_res (Ref_No, Reserved_to, Bed_ID, Bed_Adult, Bed_Child, Bed_Date, Bed_Date_In, Bed_Date_Out, Bed_Remarks) VALUES ('$ref', '$last, $first', '$id','$adult', '$child', NOW(), '$arrival', '$departure', '$remarks')";
                $result = mysqli_query($db, $query);
    
    
                    $query2 = "UPDATE bedroom SET Bed_Available = Bed_Available - 1 WHERE Bed_ID =".$id;
                    $results2 = mysqli_query($db, $query2);
         
        
        
                    $acc_query = "SELECT * FROM bed_res WHERE Ref_No=".$ref;
                    $acc_result = mysqli_query($db, $acc_query);
        
        
                    $pre_query3 = " SELECT * FROM bedroom WHERE Bed_ID=".$id;
                    $pre_result3 = mysqli_query($db, $pre_query3);
            
        
                    if(mysqli_num_rows($pre_result3) > 0) {                          
                        while($pre_row3 = mysqli_fetch_assoc($pre_result3)) {
                            $price = $pre_row3['Bed_Price'];
                            
                            $query3 = "INSERT INTO accounting (Ref_No, Reserved_to, Acc_Date_Avail, Acc_Date_Paid, Acc_Type, Acc_Balance, Acc_Payment, Acc_Archived) VALUES ('$ref', '$last, $first', NOW(), '$arrival', 'Bedroom', '$price', '$price'/'$paid', '1')";
                            $result3 = mysqli_query($db, $query3);
                            echo $query3;
                            
         
        
                            for($i=0; $i<sizeof($add); $i++) {  
                                if ($add[$i] ==  'on') {
                                    //do nothing
        
                                } else {
                                    $pre_query5 = " SELECT * FROM add_ons_price WHERE add_on_name="."'".$add[$i]."'";
                                    $pre_result5 = mysqli_query($db, $pre_query5);
            
               
            
                                    if (mysqli_num_rows($pre_result5) > 0 ) {
                                        while ($pre_row5 = mysqli_fetch_assoc($pre_result5)) {
                                            $add_price = $pre_row5['add_on_price'];
                                        }}
            
                                            $query4 = "INSERT INTO add_ons (Ref_No,Add_Description,Add_Amount,Add_Quantity,Add_Date) VALUES ('$ref','$add[$i]','$add_price','1',NOW())";
                                            $result_query4 = mysqli_query($db, $query4);
            
                                            $query5 = "INSERT INTO accounting (Ref_No, Reserved_to, Acc_Date_Avail, Acc_Date_Paid, Acc_Type, Acc_Balance, Acc_Payment, Acc_Archived) VALUES ('$ref','$last, $first', NOW(), '$arrival',UPPER('$add[$i]'), '$add_price', '$add_price'/'$paid', '1')";
                                            $result_query5 = mysqli_query($db, $query5);
                                }
                            }
        
                        }
                }
    
     
            }
        }
    }
    $card_query = " INSERT INTO customer_card (Ref_No, Card_Type, Card_Name, Card_Number, Card_Exp, Card_Sec) VALUES ('$ref', UPPER('$type'), UPPER('$name'), '$number', '$month/$year', '$code')";
    $card_result = mysqli_query($db, $card_query);
}
    else 
    {
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
        

            $query = "INSERT INTO bed_res (Ref_No, Reserved_to, Bed_ID, Bed_Adult, Bed_Child, Bed_Date, Bed_Date_In, Bed_Date_Out, Bed_Remarks) VALUES ('$ref', '$last, $first', '$id','$adult', '$child', NOW(), '$arrival', '$departure', '$remarks')";
            $result = mysqli_query($db, $query);


                $query2 = "UPDATE bedroom SET Bed_Available = Bed_Available - 1 WHERE Bed_ID =".$id;
                $results2 = mysqli_query($db, $query2);
     
    
    
                $acc_query = "SELECT * FROM bed_res WHERE Ref_No=".$ref;
                $acc_result = mysqli_query($db, $acc_query);
    
    
                $pre_query3 = " SELECT * FROM bedroom WHERE Bed_ID=".$id;
                $pre_result3 = mysqli_query($db, $pre_query3);
        
    
                if(mysqli_num_rows($pre_result3) > 0) {                          
                    while($pre_row3 = mysqli_fetch_assoc($pre_result3)) {
                        $price = $pre_row3['Bed_Price'];
                        
                        $query3 = "INSERT INTO accounting (Ref_No, Reserved_to, Acc_Date_Avail, Acc_Date_Paid, Acc_Type, Acc_Balance, Acc_Payment, Acc_Archived) VALUES ('$ref', '$last, $first', NOW(), '$arrival', 'Bedroom', '$price', '$price'/'$paid', '1')";
                        $result3 = mysqli_query($db, $query3);
                        echo $query3;
                        
     
    
                        for($i=0; $i<sizeof($add); $i++) {  
                            if ($add[$i] ==  'on') {
                                //do nothing
    
                            } else {
                                $pre_query5 = " SELECT * FROM add_ons_price WHERE add_on_name="."'".$add[$i]."'";
                                $pre_result5 = mysqli_query($db, $pre_query5);
        
           
        
                                if (mysqli_num_rows($pre_result5) > 0 ) {
                                    while ($pre_row5 = mysqli_fetch_assoc($pre_result5)) {
                                        $add_price = $pre_row5['add_on_price'];
                                    }}
        
                                        $query4 = "INSERT INTO add_ons (Ref_No,Add_Description,Add_Amount,Add_Quantity,Add_Date) VALUES ('$ref','$add[$i]','$add_price','1',NOW())";
                                        $result_query4 = mysqli_query($db, $query4);
        
                                        $query5 = "INSERT INTO accounting (Ref_No, Reserved_to, Acc_Date_Avail, Acc_Date_Paid, Acc_Type, Acc_Balance, Acc_Payment, Acc_Archived) VALUES ('$ref','$last, $first', NOW(), '$arrival',UPPER('$add[$i]'), '$add_price', '$add_price'/'$paid', '1')";
                                        $result_query5 = mysqli_query($db, $query5);
                            }
                        }
    
                    }
            }

 
        }
    }
}
$target = dirname($_SERVER["PHP_SELF"])."/checkout.php?ref=$ref&hall=$paid";
header("location: $target");
}
}
?>