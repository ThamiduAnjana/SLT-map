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
	    	<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
	    	<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
	  	</div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
	  	<div class="tab-pane fade show active" id="nav-table" role="tabpanel" aria-labelledby="nav-table-tab">
	  		<div class="card" style="width: 100%;">
			  	<div class="card-body">
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
	  	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
	  		<div class="card" style="width: 100%;">
			  <div class="card-body">
			    	<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  </div>
			</div>
	  	</div>
	  	<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
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

<!-- footer -->
<?php include 'footer_1.php' ?>