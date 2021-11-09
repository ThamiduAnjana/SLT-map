<!-- import -->
<?php 	

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
	    	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
	    	<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
	    	<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
	  	</div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
	  	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
	  		<div class="card" style="width: 100%;">
			  <div class="card-body">
			    	<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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

<!-- footer -->
<?php include 'footer_1.php' ?>