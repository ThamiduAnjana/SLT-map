<!-- import -->
<?php 	

	if(!isset($_SESSION)){
		session_start();
	}

	if ($_SESSION['id'] == '') {
		//header('location: ../index.php');
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