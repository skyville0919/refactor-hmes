<?php include('sidebar-header.php') ?>

<div class="d-flex justify-content-center">
    <div class="col-md-10">
        <div class="card color">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-11 text-center addons">
                        ADD-ONS
                    </div>
                </div>
                        <form method="POST" action="addons.php">
                            <div class="row ml-2">
                                <div class="col-md-4">
                                    <select name="addons" id="addons" class="form-control custm-input" onchange="addonChange()">
                                    <option value="">--</option>
                                    <?php 
                                        $query_add = "SELECT * FROM add_ons_price";
                                            $result = $db->query($query_add);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $options= $row['add_on_name'];
                                                            echo "<option value='$options'>$options</option>";
                                                        }
                                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row ml-4 mt-2" id="remarks" hidden>
                                <div class="col-md-4">
                                    <div class="row mt-2">
                                        <label for="description">Remarks</label>
                                            <textarea name="remarks" class="form-control custm-input"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="qty" id="qty" value="1"/>
                            </div>
                            
                            <div class="row ml-4 mt-2" id="description" hidden>
                                <div class="col-md-4">
                                    <div class="row mt-2">
                                        <label for="description">Description</label>
                                            <textarea name="description" class="form-control custm-input"></textarea>
                                    </div>
                                    <div class="row mt-2" id="desciprtion">
                                        <label for="qty">Qty</label>
                                            <input name="con_qty" type="number" class="custm-input form-control" min="1" max="100" value="1">
                                    </div>
                                </div>
                            </div>

                            <div class="row ml-2 mt-2" id="bed" hidden>
                                <div class="col-md-4">
                                    <label for="bed_qty">Qty</label>
                                        <input type="number" class="form-control custm-input" name="bed_qty" id="bed_qty" min="1" max="100" value="1">
                                </div>
                            </div>

                            <div class="row ml-2 mt-2" id="submit" hidden>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary" onclick="submit_addon()">Submit</button>                                                
                                </div>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</div>
<br/>

<?php 
    $query = "SELECT * FROM accounts WHERE Acc_ID=".$_SESSION['accounts'];
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result);
    $fname = $row['F_Name'];
    $lname = $row['L_Name'];

    $query2 = "SELECT * FROM customer WHERE F_Name = '$fname' AND L_Name='$lname'";
    $result2 = mysqli_query($db, $query2);
    $count = mysqli_num_rows($result2);

    $query3 = "SELECT * FROM customer INNER JOIN accounting ON customer.Ref_No = accounting.Ref_No WHERE F_Name = '$fname' AND L_Name = '$lname'";
    $result3 = mysqli_query($db, $query3);
?>

<div class="col-md-10 offset-1 custm-table custm-td">
    <div class="clearfix"></div>
        <div class="top widget-box">
		    <div class="table-header">
				<i class="ace-icon fa fa-align-justify"></i> LIST OF RESERVATIONS
		    </div>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                 <thead>
                    <tr>
                        <th>Transaction No.</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Paid</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                    <tbody>
                    <?php while($row3 = $result3->fetch_assoc()): ?>
                    <tr>
                    <td class="custm-td"><?php echo date('Y-').str_pad($row3['TR_Acc'],6,'0',STR_PAD_LEFT)?></td>
                    <td><?php echo $row3['Acc_Type'];?></td>
                    <td><?php echo $row3['Acc_Date_Avail'];?></td>
                    <td align="right">₱ <?php echo $row3['Acc_Balance'];?></td>
                    <td align="right">₱ <?php echo $row3['Acc_Payment'];?></td>
                    <td align="right">₱ <?php echo $row3['Acc_Balance']-$row3['Acc_Payment']?></td>

                    </tr>
        
                    <?php endwhile; ?>    
                    </tbody>
        
                <tfoot>
                    <tr>
                       <th>Transaction No.</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Paid</th>
                        <th>Balance</th>
                    </tr>
                </tfoot>
            </table>
					

		</div>

			<div class="clearfix clear">
				<div class="pull-right tableTools-container"></div>
			</div>
														
	</div>
</div>


<?php include('sidebar-footer.php') ?>