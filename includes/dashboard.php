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

	if(isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page = 1;
  }

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
				      <table class="table table-bordered table-sm">
				        <tr>
				          <th>Date</th>
				          <th style="width:70px;">Core</th>
				          <th>Dist</th>
				          <th>Loss</th>
				          <th>Status</th>
				          <th style="width:400px;">Remarks</th>
				          <th style="width:400px;">D.Remarks</th>
				          <th>D.Status</th>
				          <th>D.Loss</th>
				          <th>D.Dist</th>
				          <th style="width:70px;">D.Core</th>
				          <th>D.Date</th>
				          <th bgcolor="#5DADE2" width="125px">Actions</th>
				        </tr>
				        <tbody>
				        <?php

				        	$num_per_page = 10;
	                $start_from = ($page - 1)*10;
	                // echo $start_from." ".$num_per_page;

				          //first query (that you want to select)
				          $query_three = "SELECT * FROM tb_sender limit $start_from,$num_per_page;";
				          //query execute
				          $result = mysqli_query($conn, $query_three);
				          //Add while loop for first column data display and after display next column
				          while ($row = mysqli_fetch_array($result)) {
				            //data
				            $ID = $row['ID'];
				            $S_Date = $row["Date"];
				            $S_Core_No = $row["Core_No"];
				            $S_Distination = $row["Distination"];
										$S_Loss = $row["Loss"];
										$S_Status = $row["Status"];
										$S_CoreColor = $row['CoreColor'];
										$S_Remarks = $row["Remarks"];
										$D_Remarks = $row["D_Remarks"];
										$D_Status = $row["D_Status"];
										$D_CoreColor = $row['D_CoreColor'];
										$D_Loss = $row["D_Loss"];
										$D_Distination = $row["D_Distination"];
										$D_Core_NO = $row["D_Core_NO"];
										$D_Date = $row["D_Date"];

										//Get Location ID
										$Get_LocationId = $row['LocationID'];// Location ID *

										//Find Location name
					          $query_location = "SELECT * FROM tb_locations WHERE LocationID = $Get_LocationId;";
					          //query execute
					          $L_result = mysqli_query($conn, $query_location);
					          //get Data
					          $L_row = mysqli_fetch_array($L_result);
					          //data
					          $GetLocation_Name = $L_row['Location'];// Location Name *
					          //Get City ID
					          $GetCity_ID = $L_row['CityID'];// City ID *

					          //Find Location name
					          $query_city = "SELECT * FROM tb_city WHERE CityId = $GetCity_ID;";
					          //query execute
					          $C_result = mysqli_query($conn, $query_city);
					          //get Data
					          $C_row = mysqli_fetch_array($C_result);
					          //data
					          $GetCity_Name = $C_row['City'];// City Name *

				        ?>

				            <tr>
					            <td><?= $S_Date ?></td>
					            <td><?= $S_Core_No ?></td>
					            <td><?= $S_Distination ?></td>
					            <td><?= $S_Loss ?></td>
					            <td>
	                      <?= $S_Status; 
	                        if(isset($S_CoreColor)){
	                          echo "<div class='color-box' style='background-color:".$S_CoreColor."'></div>";
	                        }
	                      ?>
	                    </td>
					            <td><?= $S_Remarks ?></td>
					            <td><?= $D_Remarks ?></td>
					            <td>
	                      <?= $D_Status; 
	                        if(isset($D_CoreColor)){
	                          echo "<div class='color-box' style='background-color:".$D_CoreColor."'></div>";
	                        }
	                      ?> 
	                    </td>
					            <td><?= $D_Loss ?></td>
					            <td><?= $D_Distination ?></td>
					            <td><?= $D_Core_NO ?></td>
					            <td><?= $D_Date ?></td>
					            <td>
					              <button type="button" class="btn btn-danger" onclick="DeleteDetails(<?= $ID ?>);"><i class="bi bi-trash-fill"></i></button>
					              &nbsp;
					              <button type="button" class="btn btn-success" id="btn_Update" 
					              	onclick="
					              		UpdateDetails(
					              			'<?= $ID ?>',
					              			'<?= $GetCity_ID ?>',
					              			'<?= $Get_LocationId ?>',
					              			'<?= $S_Date ?>',
					              			'<?= $S_Core_No ?>',
					              			'<?= $S_Distination ?>',
					              			'<?= $S_Loss ?>',
					              			'<?= $S_Status ?>',
					              			'<?= $S_CoreColor ?>',
					              			'<?= $S_Remarks ?>',
					              			'<?= $D_Remarks ?>',
					              			'<?= $D_Status ?>',
					              			'<?= $D_CoreColor ?>',
					              			'<?= $D_Loss ?>',
					              			'<?= $D_Distination ?>',
					              			'<?= $D_Core_NO ?>',
					              			'<?= $D_Date ?>'
					              		);">
					              	<i class="bi bi-arrow-counterclockwise"></i>
					              </button><!-- data-toggle="modal" data-target="#UpdateModal" -->
					            </td>
				            </tr>

				        <?php
				          }

				        ?>
				        </tbody>
				      </table>
				    </div>
			      <!-- table end -->
			      <br>
			      <?php 

			        //4 query (that you want to select)
			        $query_f = "SELECT * FROM tb_sender;";
			        //query execute
			        $resultf = mysqli_query($conn, $query_f);
			        //get number of rows
			        $tot_records = mysqli_num_rows($resultf);

			        $tot_page = ceil($tot_records/$num_per_page);
			        // echo $tot_records." ".$tot_page;

			      ?>
			      <center>
			        <nav aria-label="Page navigation example">
			          <ul class="pagination">
			            <?php 

			              if($page>1){
			                echo "<li class='page-item'>
			                        <a class='page-link' href='dashboard.php?page=".($page-1)."' aria-label='Previous'>
			                          <span aria-hidden='true'>&laquo;</span>
			                          <span class='sr-only'>Previous</span>
			                        </a>
			                      </li>";
			              }


			              for($i=1; $i<=$tot_page;$i++){

			                echo "<li class='page-item'><a class='page-link' href='dashboard.php?page=".$i."'>$i</a></li>";
			                
			              }

			              if(($i-1)>$page){
			                echo "<li class='page-item'>
			                        <a class='page-link' href='dashboard.php?page=".($page + 1)."' aria-label='Next'>
			                          <span aria-hidden='true'>&raquo;</span>
			                          <span class='sr-only'>Next</span>
			                        </a>
			                      </li>";
			              }

			              // echo $i." ".$page;

			            ?>
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
							</center>

						</form>
			  	</div>
				</div>
	  	</div>
	  	<div class="tab-pane fade" id="nav-AddNewCity" role="tabpanel" aria-labelledby="nav-AddNewCity-tab">
	  		<div class="card" style="width: 100%;">
	  			<br>
	  			<div class="container-fluid">
	  				<div class="row">
	  					<div class="col-lg-6" style="border-right: 2px solid black;margin-bottom: 15px;">
	  						<form method="POST" action="../actions/insertcity.php">
		  						<div class="form-group">
								    <label>City ID</label>
								    <?php

				              //first query (that you want to select)
				              $query_one = "SELECT CityId FROM tb_city ORDER BY CityId DESC LIMIT 1";
				              //query execute
				              $result = mysqli_query($conn, $query_one);
				              //Add while loop for first column data display and after display next column
				              $row = mysqli_fetch_array($result);
				              $Cityid = $row['CityId'] + 1;
				            ?>
								    <input type="number" class="form-control" name="InputCityID" id="InputCityID" value="<?= $Cityid ?>" disabled>
								  </div>
		  						<div class="form-group">
								    <label>City</label>
								    <input type="text" class="form-control" name="InputCity" id="InputCity" placeholder="Enter City Name">
								  </div>
								  <br>
			  					<center>
			  						<input type="reset" class="btn btn-danger " value="Clear" style="width: 150px;height: 50px;margin: 2px;" />
			  						<input type="submit" class="btn btn-success " value="Save" style="width: 150px;height: 50px;margin: 2px;" />
									</center>
								</form>
								<br>
	  					</div>
	  					<div class="col-lg-6">
	  						<form method="POST" action="../actions/insertlocations.php">
	  							<div class="form-group">
				            <label>City</label>
				            <select class="form-control form-control-sm" name="CitySelect" id="CitySelect">
				              <option value="0">Select City</option>
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
	  							<div class="form-group">
								    <label>Location ID</label>
								    <?php

				              //first query (that you want to select)
				              $query_one = "SELECT LocationID FROM tb_locations ORDER BY LocationID DESC LIMIT 1";
				              //query execute
				              $result = mysqli_query($conn, $query_one);
				              //Add while loop for first column data display and after display next column
				              $row = mysqli_fetch_array($result);
				              $LocationId= $row['LocationID'] + 1;
				            ?>
								    <input type="number" class="form-control" name="InputLocationID" id="InputLocationID" value="<?= $LocationId ?>" disabled>
								  </div>
		  						<div class="form-group">
								    <label>Location</label>
								    <input type="text" class="form-control" name="InputLocation" id="InputLocation" placeholder="Enter Location Name">
								  </div>
								  <div class="form-group">
								    <label>Cable Size</label>
								    <input type="number" class="form-control" name="InputCableSize" id="InputCableSize" placeholder="256">
								  </div>
								  <br>
			  					<center>
			  						<input type="reset" class="btn btn-danger " value="Clear" style="width: 150px;height: 50px;margin: 2px;" />
			  						<input type="submit" class="btn btn-success " value="Save" style="width: 150px;height: 50px;margin: 2px;" />
									</center>
									<br>
	  						</form>
	  					</div>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	</div>
</div>
<!-- tab end -->

<!-- modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="UpdateModal">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" name="Updateform" action="../actions/updatedata.php">
        <div class="modal-body">
          <div class="row">
          	<input type="text" name="inputid" id="inputid" hidden>
			  		<div class="col-sm">
				  		<div class="form-group">
					      <label>City</label>
					      <select class="form-control form-control-sm" id="M_inputCitySelect">
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
				        <select class="form-control form-control-sm" name="M_inputLocationSelect" id="M_inputLocationSelect">
				          <option>Select Location</option>
				        </select>
				      </div>
				    </div>
			  	</div>
			  	<div class="row">
	    			<div class="col-6">

	      			<div class="form-group">
    						<label>Date</label>
    						<input type="date" class="form-control" name="M_InputDate" id="M_InputDate" placeholder="Enter Date">
  						</div>

  						<div class="form-group">
    						<label>Core_No</label>
    						<input type="text" class="form-control" name="M_InputCore_No" id="M_InputCore_No" placeholder="Enter Core_No">
  						</div>

  						<div class="form-group">
    						<label>Destination</label>
    						<input type="text" class="form-control" name="M_InputDestination" id="M_InputDestination" placeholder="Enter Destination">
  						</div>

  						<div class="form-group">
    						<label>Loss</label>
    						<input type="text" class="form-control" name="M_InputLoss" id="M_InputLoss" placeholder="Enter Loss">
  						</div>

  						<div class="form-group">
    						<label>Status</label>
    						<input type="text" class="form-control" name="M_InputStatus" id="M_InputStatus" placeholder="Enter Status">
  						</div>

  						<div class="form-group">
    						<label>Remarks</label>
    						<textarea class="form-control" name="M_InputRemarks" id="M_InputRemarks" rows="3" placeholder="Enter Remarks"></textarea>
    						<!-- <input type="text" class="form-control" id="InputRemarks" placeholder="Enter Remarks"> -->
  						</div>

  						<div class="form-group">
	    					<label>CoreColor</label>
	    					<select class="form-control" name="M_InputColor" id="M_InputColor">
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
    						<input type="date" class="form-control" name="M_DInputDate" id="M_DInputDate" placeholder="Enter Date">
  						</div>

  						<div class="form-group">
    						<label>Des.Core_No</label>
    						<input type="text" class="form-control" name="M_DInputCore_No" id="M_DInputCore_No" placeholder="Enter Core_No">
  						</div>

  						<div class="form-group">
    						<label>Des.Destination</label>
    						<input type="text" class="form-control" name="M_DInputDestination" id="M_DInputDestination" placeholder="Enter Destination">
  						</div>

  						<div class="form-group">
    						<label>Des.Loss</label>
    						<input type="text" class="form-control" name="M_DInputLoss" id="M_DInputLoss" placeholder="Enter Loss">
  						</div>

  						<div class="form-group">
    						<label>Des.Status</label>
    						<input type="text" class="form-control" name="M_DInputStatus" id="M_DInputStatus" placeholder="Enter Status">
  						</div>

  						<div class="form-group">
    						<label>Des.Remarks</label>
    						<!-- <input type="text" class="form-control" id="InputRemarks" placeholder="Enter Remarks"> -->
    						<textarea class="form-control" name="M_DInputRemarks" id="M_DInputRemarks" rows="3" placeholder="Enter Remarks"></textarea>
  						</div>

  						<div class="form-group">
	    					<label>Des.CoreColor</label>
	    					<select class="form-control" name="M_DInputColor" id="M_DInputColor">
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- modal end -->

<script type="text/javascript">
  
function UpdateDetails(
		ID,
		City_Name,
		Location_Name,
		S_Date,
		S_Core_No,
		S_Distination,
		S_Loss,
		S_Status,
		S_CoreColor,
		S_Remarks,
		D_Remarks,
		D_Status,
		D_CoreColor,
		D_Loss,
		D_Distination,
		D_Core_NO,
		D_Date
	){

	 console.log(
  	ID,
  	City_Name,
  	Location_Name,
  	S_Date,
  	S_Core_No,
		S_Distination,
		S_Loss,
		S_Status,
		S_CoreColor,
		S_Remarks,
		D_Remarks,
		D_Status,
		D_CoreColor,
		D_Loss,
		D_Distination,
		D_Core_NO,
		D_Date
  );

  $('#UpdateModal').modal('show');
  $('#M_inputCitySelect').val(City_Name);
  $('#M_inputLocationSelect').val(Location_Name);
  $('#inputid').val(ID);
  $('#M_InputDate').val(S_Date);
  $('#M_InputCore_No').val(S_Core_No);
  $('#M_InputDestination').val(S_Distination);
  $('#M_InputLoss').val(S_Loss);
  $('#M_InputStatus').val(S_Status);
  if(S_CoreColor !== null){
  	$('#M_InputColor').val(S_CoreColor);
  } 
  $('#M_InputRemarks').val(S_Remarks);
  $('#M_DInputRemarks').val(D_Remarks);
  $('#M_DInputStatus').val(D_Status);
  if(D_CoreColor !== null){
  	$('#M_DInputColor').val(D_CoreColor);
  }
  $('#M_DInputLoss').val(D_Loss);
  $('#M_DInputDestination').val(D_Distination);
  $('#M_DInputCore_No').val(D_Core_NO);
  $('#M_DInputDate').val(D_Date);

};

function DeleteDetails(ID){
	if(confirm("Delete this data ( "+ID+" ) ? And are you sure?")){
		//code
		$.ajax({
      url:'../actions/deletedata.php',
      method:'POST',
      data:{Data_ID:ID},
      success:function(data){
	      console.log(data);
	      location.reload();
	    }
    });
	}else{
		//code
	}
};

</script>

<!-- js -->
<script type="text/javascript" src="../js/custom_javascript_1.js"></script>

<!-- footer -->
<?php include 'footer_1.php' ?>