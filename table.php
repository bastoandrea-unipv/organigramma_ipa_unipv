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

	<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

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
<div class="container">
    <div class="row text-center">
	<h1>ORGANIGRAMMA UNIPV</h1>
    </div>
</div>

<div class="container">

<ul class="nav nav-tabs mb-4" role="tablist" id="myTab">
  <li class="nav-item" role="presentation"><button class="nav-link" href="#catalogo" id="catalogo-tab" data-bs-toggle="tab" data-bs-target="#catalogo" type="button" role="tab" aria-controls="catalogo" aria-selected="true" onclick="window.location.replace('index.php?view=list')"><i class="fa fa-list fa-2x" aria-hidden="true"></i></button></li>
  <li class="nav-item" role="presentation"><button class="nav-link href="#lista" id="lista-tab" data-bs-toggle="tab" data-bs-target="#lista" type="button" role="tab" aria-controls="lista" aria-selected="false" onclick="location.href='index.php?view=chart'"><i class="fa fa-sitemap fa-2x" aria-hidden="true"></i></button></li>
  <li class="nav-item" role="presentation"><button class="nav-link active" href="#table" id="table-tab" data-bs-toggle="tab" data-bs-target="#table" type="button" role="tab" aria-controls="table" aria-selected="false" onclick="location.href='index.php?view=table'"><i class="fa fa-table fa-2x" aria-hidden="true"></i></button></li>
</ul>

</div>

<div class="container mb-2 p-2 listamenu">
    <div class="row p-2">
	<p>Vai a:</p>
        <select class="js-example-basic-single listaUO" name="UO" id="listaUO" onchange="if (this.value) window.location.href='index.php?view=list&getUO='+this.value">
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
<div class="container-fluid mb-2 mt-2">
    <div class="row">
      <table class="table table-sm table-striped" id="tabella_rid" style="width:100%">
        <thead class="table-dark">
	  <tr>
<td>4 - Codice_uni_uo</td><td>6 - Codice_uni_uo_padre</td><td>7 - Descrizione_uo</td><td>8 - Data_istituzione</td><td>9 - Nome_responsabile</td><td>10 - Cognome_responsabile</td><td>11 - Mail_responsabile</td><td>16 - Indirizzo</td><td>17 - Telefono</td><td>19 - Mail1</td><td>25 - Data_aggiornamento</td>	  </tr>
        </thead>
        <tbody>
<?php 
$array=array(4,6,7,8,9,10,11,16,17,19,25);

foreach ($bigArray as $ba) {
	echo "<tr>";
	foreach ($array as $arr) {
		echo "<td>".$ba[$arr]."</td>";	
	}
	echo "</tr>";
}
?>
	</tbody>
      </table>
    </div>
</div>

<script>
$(document).ready(function() {
        $('#tabella_rid').DataTable( {
                "pageLength": 25,
                "order": []
        });
} );
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>

