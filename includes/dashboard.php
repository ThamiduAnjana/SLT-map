<!-- import -->
<?php

	require_once("../db/connection.php");

	if(!isset($_SESSION)){
		session_start();
	}

	if ($_SESSION['id'] == '') {
		header('location: ../index.php');
	}

	$id = $_SESSION['id'];

	include 'header_1.php';

?>
<!-- import end -->

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    	<span class="navbar-toggler-icon"></span>
  	</button>
	<a class="navbar-brand" href="#">SLT-Map</a>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      	<li class="nav-item active">
	        	<a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
	      	</li>
	    </ul>
	    <form method="POST" action="../actions/signout.php" name="SignoutForm">
		    <button class="btn btn-outline-danger my-2 my-sm-0" data-toggle="modal" data-target="#SigninModal">
		    	<i class="bi bi-person-bounding-box"></i> [<?php echo $id; ?>] Signout
		    </button>
	    </form>
	</div>
</nav>
<!-- navbar end -->

<!-- tab -->
<div class="container-fluid">
	<nav>
	  	<div class="nav nav-tabs" id="nav-tab" role="tablist">
	    	<a class="nav-item nav-link active" id="nav-table-tab" data-toggle="tab" href="#nav-table" role="tab" aria-controls="nav-table" aria-selected="true">Details Table</a>
	    	<a class="nav-item nav-link" id="nav-AddNewData-tab" data-toggle="tab" href="#nav-AddNewData" role="tab" aria-controls="nav-AddNewData" aria-selected="false">Add New Data</a>
	  	</div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
	  	<div class="tab-pane fade show active" id="nav-table" role="tabpanel" aria-labelledby="nav-table-tab">
	  		<div class="card" style="width: 100%;">
			  	<div class="card-body">
			  		<div class="container">
				        <!-- form -->
				        <form>
				          <div class="row">
				            <!-- input city -->
				            <div class="col-sm">
				                <div class="form-group">
				                  <label>City</label>
				                  <select class="form-control form-control-sm" id="CitySelect">
				                    <option>Select City</option>
				                    <?php

				                      //first query (that you want to select)
				                      $query_one = "SELECT * FROM tb_city;";
				                      //query execute
				                      $result = mysqli_query($conn, $query_one);
				                      //Add while loop for first column data display and after display next column
				                      while ($row = mysqli_fetch_array($result)) {
				                        //data
				                        ?>

				                          <option value="<?= $row['CityId'] ?>"><?php echo $row["CityId"], " | ", $row["City"]; ?></option>

				                        <?php
				                      }

				                    ?>

				                  </select>
				                </div>
				            </div>
				            <!-- input location -->
				            <div class="col-sm">
				                <div class="form-group">
				                  <label>Location</label>
				                  <select class="form-control form-control-sm" id="LocationSelect">
				                    <option>Select Location</option>
				                  </select>
				                </div>
				            </div>
				            <!-- input cable size -->
				            <div class="col-sm">
				                <div class="form-group">
				                  <label>Cable Size</label>
				                  <!-- <div id="CableSize"></div> -->
				                  <input type="text" class="form-control form-control-sm" id="CableSize" placeholder="0" disabled>
				                </div>
				            </div>
				            <!-- input core no -->
				            <div class="col-sm">
				                <div class="form-group">
				                  <label>Core No</label>
				                  <input type="number" class="form-control form-control-sm" id="CoreNo" placeholder="1" max="0" min="1">
				                </div>
				            </div>
				            <!-- input color -->
				            <div class="col-sm">
				                <div class="form-group">
				                  <label for="exampleFormControlInput1">Color Size</label>
				                    <table>
				                        <tr>
				                          <td><input type="radio" name="color" value="#3498DB" /></td>
				                          <td><input type="radio" name="color" value="#E67E22" /></td>
				                          <td><input type="radio" name="color" value="#2ECC71" /></td>
				                          <td><input type="radio" name="color" value="#A04000" /></td>
				                          <td><input type="radio" name="color" value="#85929E" /></td>
				                          <td><input type="radio" name="color" value="#FDFEFE" /></td>
				                          <td><input type="radio" name="color" value="#E74C3C" /></td>
				                          <td><input type="radio" name="color" value="#17202A" /></td>
				                        </tr>
				                        <tbody>
				                          <tr>
				                            <td><div class="color-box" style="background-color:#3498DB;"></div></td>
				                            <td><div class="color-box" style="background-color:#E67E22;"></div></td>
				                            <td><div class="color-box" style="background-color:#2ECC71;"></div></td>
				                            <td><div class="color-box" style="background-color:#A04000;"></div></td>
				                            <td><div class="color-box" style="background-color:#85929E;"></div></td>
				                            <td><div class="color-box" style="background-color:#FDFEFE;"></div></td>
				                            <td><div class="color-box" style="background-color:#E74C3C;"></div></td>
				                            <td><div class="color-box" style="background-color:#17202A;"></div></td>
				                          </tr>
				                        </tbody>
				                      </table>
				                </div>
				            </div>
				            <!-- button search -->
				            <div class="col-sm">
				                <div class="form-group">
				                  <label>Action</label><br>
				                  <button type="submit" class="btn btn-primary" id="btn_submit"><i class="bi bi-search"></i> Search</button>
				                </div>
				            </div>
				          </div>
				        </form>
				        <!-- form end -->
				      </div>
			  		<!-- table -->
				    <div class="container-fluid" style="overflow: scroll;">
				       	<table class="table table-bordered">
				          <thead>
				            <tr>
				              <th>Date</th>
				              <th style="width:100px;">Core No</th>
				              <th>Dist</th>
				              <th>Loss</th>
				              <th>Status</th>
				              <th style="width:500px;">Remarks</th>
				              <th>Status</th>
				              <th>Loss</th>
				              <th>Dist</th>
				              <th style="width:100px;">Core No</th>
				              <th>Date</th>
				              <th bgcolor="#5DADE2" width="125px">Actions</th>
				            </tr>
				          </thead>
				          <tbody>
				            <tr>
				              <?php

				                //first query (that you want to select)
				                $query_three = "SELECT * FROM tb_sender;";
				                //query execute
				                $result = mysqli_query($conn, $query_three);
				                //Add while loop for first column data display and after display next column
				                while ($row = mysqli_fetch_array($result)) {
				                  //data
				                  ?>

				                    <td><?php echo $row["Date"]; ?></td>
				                    <td><?php echo $row["Core_No"]; ?></td>
				                    <td><?php echo $row["Distination"]; ?></td>
				                    <td><?php echo $row["Loss"]; ?></td>
				                    <td><?php echo $row["Status"]; ?></td>
				                    <td><?php echo $row["Remarks"]; ?></td>
				                    <td><?php echo $row["D_Status"]; ?></td>
				                    <td><?php echo $row["D_Loss"]; ?></td>
				                    <td><?php echo $row["D_Distination"]; ?></td>
				                    <td><?php echo $row["D_Core_NO"]; ?></td>
				                    <td><?php echo $row["D_Date"]; ?></td>
				                    <td>
				                    	<button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
				                    	&nbsp;
				                    	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#UpdateModal"><i class="bi bi-arrow-counterclockwise"></i></button>
				                    </td>

				                  <?php
				                }

				              ?>
				            </tr>
				          </tbody>
				        </table>
				    </div>
			      	<!-- table end -->
			  	</div>
			</div>
	  	</div>
	  	<div class="tab-pane fade" id="nav-AddNewData" role="tabpanel" aria-labelledby="nav-AddNewData-tab">
	  		<div class="card" style="width: 100%;">
			  	<div class="card-body">
			    	<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  	</div>
			</div>
	  	</div>
	</div>
</div>
<!-- tab end -->

<!-- modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="UpdateModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Administrator Sign in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" name="FUpdateorm" action="actions/updatedata.php">
        <div class="modal-body">
          <div class="form-group">
            <label for="id">User ID</label>
            <input type="number" class="form-control" name="InputID" id="InputID" placeholder="Enter id">
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" name="InputPassword" id="InputPassword" placeholder="Password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal end -->

<!-- js -->
<script type="text/javascript" src="../js/custom_javascript_1.js"></script>

<!-- footer -->
<?php include 'footer_1.php' ?>