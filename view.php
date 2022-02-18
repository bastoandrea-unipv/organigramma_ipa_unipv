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

	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
            <a href="./" class="navbar-brand has-logo">
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
<div class="container p-5">
    <div class="row text-center">
	<h1>ORGANIGRAMMA UNIPV</h1>
    </div>
</div>
<div class="container">

<ul class="nav nav-tabs mb-4" role="tablist" id="myTab">
  <li class="nav-item" role="presentation"><button class="nav-link active" href="#catalogo" id="catalogo-tab" data-bs-toggle="tab" data-bs-target="#catalogo" type="button" role="tab" aria-controls="catalogo" aria-selected="true" onclick="location.href='index.php?view=list'"><i class="fa fa-list fa-2x" aria-hidden="true"></i></button></li>
  <li class="nav-item" role="presentation"><button class="nav-link" href="#lista" id="lista-tab" data-bs-toggle="tab" data-bs-target="#lista" type="button" role="tab" aria-controls="lista" aria-selected="false" onclick="location.href='index.php?view=chart'"><i class="fa fa-sitemap fa-2x" aria-hidden="true"></i></button></li>
</ul>

</div>

<div class="container mb-2 p-2 listamenu">
    <div class="row p-2">
	<p>Vai a:</p>
        <select class="js-example-basic-single listaUO" name="UO" id="listaUO" onchange="if (this.value) window.location.href='index.php?getUO='+this.value">
            <option value=""></option>
            <option value="tutte"> Tutto</option>
<?php 
	foreach ($bigArray as $val) {
		print("<option value='".$val[4]."'>".$val[7]."</option>");
	}
?>
	</select>

    </div>
</div>
<div class="container mb-2">
    <div class="row">
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

<div class="backtotop">
  <a href="#" aria-hidden="true" data-attribute="back-to-top" class="back-to-top">
    <i class="fa fa-arrow-up" aria-hidden="true"></i><span>TOP</span>
  </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
            $(document).ready(function() {
                $('.js-example-basic-single').select2({
                    placeholder: 'Clicca e cerca UO'
                });
            });
</script>

</body>
</html>

