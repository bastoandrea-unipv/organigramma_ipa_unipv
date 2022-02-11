<html>
    <head>
        <title>Organigramma Unipv</title>

	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">

    	<!-- Bootstrap CSS -->
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="icon" type="image/png" href="favicon.ico" />

<script>
function showHide(id,fromId,xx) {
    var divId = document.getElementById(id);
	if (divId.style.display == null || divId.style.display == '' || divId.style.display == undefined ) {
		if (xx == 0) { 
			divId.style.display = 'none';
			fromId.classList.replace("fa-minus-square-o","fa-plus-square-o");
		} else {
			divId.style.display = 'block';
			fromId.classList.replace("fa-question-circle","fa-question-circle-o");
		}
	} else if (divId.style.display == 'none') {
		if (xx == 0) { 
			divId.style.display = 'block';
			fromId.classList.replace("fa-plus-square-o","fa-minus-square-o");
		} else {
			divId.style.display = 'block';
			fromId.classList.replace("fa-question-circle","fa-question-circle-o");
		}
	} else {
		if (xx == 0) { 
			divId.style.display = 'none';
			fromId.classList.replace("fa-minus-square-o","fa-plus-square-o");
		} else {
			console.log("vuoto");
			divId.style.display = 'none';
			fromId.classList.replace("fa-question-circle-o","fa-question-circle");
		}
	}
}
</script>

    </head>
    <body>

<!-- INIZIO HEADER -->
<div class="container-fluid" id="navbar">
    <div class="row navbar-dark bg-dark pt-2 pb-2 ps-2">
        <div class="d-inline ml-2">
            Universit&agrave; degli Studi di Pavia
        </div>
    </div>
    <div class="row header-main ps-2">
	<div class="col-md-6 float-start">
            <a href="#" class="navbar-brand has-logo">
                <span class="logo">
                    <img src="IDCD_white.png" alt="Logo IDCD" class="img-fluid">
                </span>
            </a>
	</div>
	<div class="col-md-6 float-end d-none d-sm-block">
            <div class="infoarea">ORGANIGRAMMA</div>
	</div>
    </div>
</div>
<!-- FINE HEADER -->
<div class="container">
    <div class="row text-center">
	<h1>ORGANIGRAMMA UNIPV</h1>
    </div>
</div>
<div class="container">
    <div class="row">
	<ul>
<?php
	echo $ipa_unipv->getAllNodes($idcd);

?>
	</ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>

