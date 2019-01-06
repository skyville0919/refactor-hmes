<?php include('conn.php') ?>

<?php 
    session_start();

    $addon = $_POST['addons'];

    $con_qty = $_POST['con_qty'];

    $con_desc = $_POST['description'];

    $remarks = $_POST['remarks'];

    $bed_qty = $_POST['bed_qty'];

    $qty = $_POST['qty'];

    $query_user = "SELECT * FROM accounts WHERE Acc_ID=".$_SESSION['accounts'];
    echo $query_user;
    $result_user = mysqli_query($db,$query_user);
    $row_user = mysqli_fetch_array($result_user);
    $fname = $row_user['F_Name'];
    $lname = $row_user['L_Name'];

    $query_ref = "SELECT * FROM customer WHERE Ref_No = (SELECT MAX(Ref_No) FROM customer WHERE F_name = '$fname' AND L_Name = '$lname')";
    echo $query_ref;
    $result_ref = mysqli_query($db,$query_ref);
    $row_ref = mysqli_fetch_array($result_ref);
    $ref = $row_ref['Ref_No'];


    if ($addon == "lunch" || $addon == "dinner") {
        $query1 = "SELECT * FROM add_ons_price WHERE add_on_name='$addon'";
        $result1 = mysqli_query($db,$query1);
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_array($result1)) {
                $price = $row['add_on_price'];

                $query2 = "INSERT INTO add_ons (Ref_No, Add_Description, Add_Amount,Add_Quantity,Add_Date) VALUES ('$ref', 'Add-Ons-$addon','$price'*'$qty','$qty',NOW())";
                $result2 = mysqli_query($db,$query2);
                echo $query2;

                $query3 = "INSERT INTO accounting (Ref_No,Reserved_to,Acc_date_Avail,Acc_Date_Paid,Acc_Type,Acc_Balance,Acc_Payment,Acc_Archived) VALUES ('$ref', '$fname, $lname', NOW(), NOW(), 'Add-Ons-$addon', '$price'*'$qty', 0, '1')";
                $result3 = mysqli_query($db,$query3);
                echo $query3;
            }
        }
    }
    else if ($addon == "bed") {
        $query1 = "SELECT * FROM add_ons_price WHERE add_on_name='$addon'";
        echo $query1;
        $result1 = mysqli_query($db,$query1);
        if (mysqli_num_rows($result1) > 0) {
            while ($row = mysqli_fetch_array($result1)) {
                $price = $row['add_on_price'];

                $query2 = "INSERT INTO add_ons (Ref_No, Add_Description, Add_Amount,Add_Quantity,Add_Date) VALUES ('$ref', 'Add-Ons-$addon','$price'*'$bed_qty','$bed_qty',NOW())')";
                $result2 = mysqli_query($db,$query2);

                $query3 = "INSERT INTO accounting (Ref_No,Reserved_to,Acc_date_Avail,Acc_Date_Paid,Acc_Type,Acc_Balance,Acc_Payment,Acc_Archived) VALUES ('$ref', '$lname. $fname', NOW(), NOW(), 'Add-Ons-$addon', '$price'*'$bed_qty', 0, '1')";
                $result3 = mysqli_query($db,$query3);
            }
        }
    }
    else {
        $query2 = "INSERT INTO concierge_request (Ref_No, TR_Desc,TR_Qty,Archived) VALUES('$ref','$con_desc','$con_qty','1')";
        $result2 = mysqli_query($db,$query2);
        echo $query2;
    }
    // header("location:dashboard.php"):
?>