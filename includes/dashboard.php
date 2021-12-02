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

<!-- alert -->
<?php
  if (isset($_SESSION["status"])) {
    ?>
      <br>
      <div class="container">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Hey! : </strong><?php echo $_SESSION["status"]; ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>

    <?php
    unset($_SESSION["status"]);
  }
?>
<!-- alert end -->

<!-- tab -->
<div class="container-fluid">
	<nav>
	  	<div class="nav nav-tabs" id="nav-tab" role="tablist">
	    	<a class="nav-item nav-link active" id="nav-table-tab" data-toggle="tab" href="#nav-table" role="tab" aria-controls="nav-table" aria-selected="true">Details Table</a>
	    	<a class="nav-item nav-link" id="nav-AddNewData-tab" data-toggle="tab" href="#nav-AddNewData" role="tab" aria-controls="nav-AddNewData" aria-selected="false">Add New Data</a>
	    	<a class="nav-item nav-link" id="nav-AddNewCity-tab" data-toggle="tab" href="#nav-AddNewCity" role="tab" aria-controls="nav-AddNewCity" aria-selected="false">Add New City & Location</a>
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
				                    <option value="0">Select Location</option>
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
			      <br>
			      <center>
				      <nav aria-label="Page navigation example">
							  <ul class="pagination">
							    <li class="page-item">
							      <a class="page-link" href="#" aria-label="Previous">
							        <span aria-hidden="true">&laquo;</span>
							        <span class="sr-only">Previous</span>
							      </a>
							    </li>
							    <li class="page-item"><a class="page-link" href="#">1</a></li>
							    <li class="page-item"><a class="page-link" href="#">2</a></li>
							    <li class="page-item"><a class="page-link" href="#">3</a></li>
							    <li class="page-item">
							      <a class="page-link" href="#" aria-label="Next">
							        <span aria-hidden="true">&raquo;</span>
							        <span class="sr-only">Next</span>
							      </a>
							    </li>
							  </ul>
							</nav>
						</center>
			  	</div>
				</div>
	  	</div>
	  	<div class="tab-pane fade" id="nav-AddNewData" role="tabpanel" aria-labelledby="nav-AddNewData-tab">
	  		<div class="card" style="width: 100%;">
			  	<div class="card-body">
			  		<div class="row">
			  			<div class="col-sm">
				  			<div class="form-group">
					      	<label>City</label>
					      	<select class="form-control form-control-sm" id="inputCitySelect">
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
			  			<div class="col-sm">
				      	<div class="form-group">
				        	<label>Location</label>
				        	<select class="form-control form-control-sm" name="inputLocationSelect" id="inputLocationSelect">
				          	<option>Select Location</option>
				        	</select>
				      	</div>
				    	</div>
			  		</div>
			  	</div>
			  </div>
	  		<div class="card" style="width: 100%;">
			  	<div class="card-body">
			    	<form method="POST" action="../actions/insertdata.php">
			    	 	<div class="row">
	    					<div class="col-6">

	      					<div class="form-group">
    								<label>Date</label>
    								<input type="text" class="form-control" name="InputDate" id="InputDate" placeholder="Enter Date">
  								</div>

  								<div class="form-group">
    								<label>Core_No</label>
    								<input type="text" class="form-control" name="InputCore_No" id="InputCore_No" placeholder="Enter Core_No">
  								</div>

  								<div class="form-group">
    								<label>Destination</label>
    								<input type="text" class="form-control" name="InputDestination" id="InputDestination" placeholder="Enter Destination">
  								</div>

  								<div class="form-group">
    								<label>Loss</label>
    								<input type="text" class="form-control" name="InputLoss" id="InputLoss" placeholder="Enter Loss">
  								</div>

  								<div class="form-group">
    								<label>Status</label>
    								<input type="text" class="form-control" name="InputStatus" id="InputStatus" placeholder="Enter Status">
  								</div>

  								<div class="form-group">
    								<label>Remarks</label>
    								<textarea class="form-control" name="InputRemarks" id="InputRemarks" rows="3" placeholder="Enter Remarks"></textarea>
    								<!-- <input type="text" class="form-control" id="InputRemarks" placeholder="Enter Remarks"> -->
  								</div>

  								<div class="form-group">
	    							<label>CoreColor</label>
	    							<select class="form-control" name="InputColor" id="InputColor">
	      							<option value="#3498DB">Blue</option>
	      							<option value="#E67E22">Orange</option>
	      							<option value="#2ECC71">Green</option>
	      							<option value="#A04000">Brown</option>
	      							<option value="#85929E">Gray</option>
	      							<option value="#FDFEFE">White</option>
	      							<option value="#E74C3C">Red</option>
	      							<option value="#17202A">Black</option>
	    							</select>
  								</div>

	    					</div>

	    					<div class="col-6">

	      					<div class="form-group">
    								<label>Des.Date</label>
    								<input type="text" class="form-control" name="DInputDate" id="DInputDate" placeholder="Enter Date">
  								</div>

  								<div class="form-group">
    								<label>Des.Core_No</label>
    								<input type="text" class="form-control" name="DInputCore_No" id="DInputCore_No" placeholder="Enter Core_No">
  								</div>

  								<div class="form-group">
    								<label>Des.Destination</label>
    								<input type="text" class="form-control" name="DInputDestination" id="DInputDestination" placeholder="Enter Destination">
  								</div>

  								<div class="form-group">
    								<label>Des.Loss</label>
    								<input type="text" class="form-control" name="DInputLoss" id="DInputLoss" placeholder="Enter Loss">
  								</div>

  								<div class="form-group">
    								<label>Des.Status</label>
    								<input type="text" class="form-control" name="DInputStatus" id="DInputStatus" placeholder="Enter Status">
  								</div>

  								<div class="form-group">
    								<label>Des.Remarks</label>
    								<!-- <input type="text" class="form-control" id="InputRemarks" placeholder="Enter Remarks"> -->
    								<textarea class="form-control" name="DInputRemarks" id="DInputRemarks" rows="3" placeholder="Enter Remarks"></textarea>
  								</div>

  								<div class="form-group">
	    							<label>Des.CoreColor</label>
	    							<select class="form-control" name="DInputColor" id="DInputColor">
	      							<option value="#3498DB">Blue</option>
	      							<option value="#E67E22">Orange</option>
	      							<option value="#2ECC71">Green</option>
	      							<option value="#A04000">Brown</option>
	      							<option value="#85929E">Gray</option>
	      							<option value="#FDFEFE">White</option>
	      							<option value="#E74C3C">Red</option>
	      							<option value="#17202A">Black</option>
	    							</select>
  								</div>

	    					</div>

	  					</div>

	  					<br>

	  					<center>
	  						<input type="reset" class="btn btn-danger " value="Clear" style="width: 150px;height: 50px;" />
	  						<input type="submit" class="btn btn-success " value="Save" style="width: 150px;height: 50px;" />
	  						<!-- <button type="button" class="btn btn-success" style="width: 150px;height: 50px;" >Save</button> -->
							</center>

						</form>
			  	</div>
				</div>
	  	</div>
	  	<div class="tab-pane fade" id="nav-AddNewCity" role="tabpanel" aria-labelledby="nav-AddNewCity-tab">
	  		<div class="card" style="width: 100%;">
	  			hi
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