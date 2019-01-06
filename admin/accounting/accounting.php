<?php include('header.php'); ?>


<?php

$sql = "SELECT accounts.Acc_ID, accounts.F_name AS Acc_Fname, accounts.L_name AS Acc_Lname, accounts.M_name AS Acc_Mname, customer.Ref_No, customer.F_Name, customer.L_name, customer.M_name, customer.Contact_No, customer.Address FROM accounts 
          INNER JOIN customer ON customer.Acc_Id = accounts.Acc_Id
  ;";
  $result1 = $db->query($sql);

?>

  <script type="text/javascript">

    function edit_id(id)
    {
        window.location.href='edit_housekeeping.php?edit_id='+id;
    }

    function delete_id(id)
    {
      if(confirm('Sure to delete?'))
      {
        window.location.href='housekeeping.php?delete_id='+id;
      }
    }
    
  </script>

  <body class="no-skin">

    <?php include ('navbar.php'); ?>
      <div class="main-container" id="main-container">
        <?php include ('sidebar.php'); ?>
          <div class="main-content">
            <div class="main-content-inner">
                <div class="page-content">
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="row">

                        <div class="space-4"></div>

                        <?php
                          if (isset($successMsg))
                          {
                            ?>
                            <div class="form-group">
                              <div class="adding-alert-success fa fa-check-square-o">
                                <?php echo $successMsg; ?>
                              </div>
                            </div>
                            <?php
                          }
                        ?>

                        <?php
                          if (isset($errorMsg))
                          {
                            ?>
                            <div class="form-group">
                              <div class="adding-alert-error fa fa-exclamation-triangle">
                                <?php echo $errorMsg; ?>
                              </div>
                            </div>
                            <?php
                          }
                        ?> 
                          </div>
                        </div>

                        <?php 

                          $query = "SELECT * FROM customer WHERE Archived = '1'";
                          $results = mysqli_query($db,$query);
                          $count = mysqli_num_rows($results);

                        ?>

                        <div class="col-md-10 col-md-offset-1">
                          <div class="clearfix"></div>
                            <div class="top widget-box">
                              <div class="table-header">
                                <i class="ace-icon fa fa-align-justify"></i> LIST OF TRANSACTIONS
                                <i class="float-right"> Number of Accounts: <span class="badge badge-primary"><?php echo $count; ?></span></i>
                              </div>

                                <table id="dynamic-table" class="display table table-striped table-bordered">
                                  <thead class="smaller-font">
                                    <tr>
                                      <th>Reference no.</th>
                                      <th>Reserved to</th>
                                      <th>Reserved by</th>
                                      <th>Contact no.</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  <?php while($row = $result1->fetch_assoc()): ?>

                                  

                                    <tr class="smaller-font-1">
                                     <td><?php echo "CRTH-2018-".$row['Ref_No']; ?></td>
                                     <td><?php echo $row['L_name'] . ", " . $row['F_Name'] . " " . $row['M_name']; ?></td>
                                     <td><?php echo $row['Acc_Lname'] . ", " . $row['Acc_Fname'] . " " . $row['Acc_Mname']; ?></td>
                                     <td><?php echo $row['Contact_No']; ?></td>
                                     <td>
                                      <form action="accountingDetail.php" method="post">
                                        <input type="hidden" name="Ref_No" value="<?php echo $row['Ref_No']; ?>">
                                        <input type="hidden" name="Acc_Name" value="<?php echo $row['L_name'] . ", " . $row['F_Name'] . " " . $row['M_name']; ?>">
                                        <input type="hidden" name="Contact_No" value="<?php echo $row['Contact_No']; ?>">
                                        <button class="btn btn-primary btn-xs" type="submit" name="accounting"><span class="glyphicon glyphicon-fullscreen"></span> Details</button>
                                      </form>              
                                     </td>
                                    </tr>
                                            
                                  <?php endwhile; ?>
                  
                                  </tbody>
                                </table>
                            </div>

                            <div class="clearfix clear">
                              <div class="pull-right tableTools-container"></div>
                            </div>
                            
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    <?php include ('script.php'); ?>

  </body>

<?php ob_end_flush(); ?>


