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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
       lpad = function(str,padString, length) {
                while (str.length < length)
                        str = padString + str;
                return str;
        }

        google.charts.load('current', {'packages' : ['orgchart', 'table']});
        google.charts.setOnLoadCallback(function() { initialize('') });

        function initialize() {

		 document.getElementById('orgchart_admin').innerHTML = "<i class='fa fa-spinner fa-spin fa-3x fa-fw'></i>";

		var data = new google.visualization.DataTable();
		const raw_data = new Array(<?php echo json_encode($aa);?>);
		console.log(typeof raw_data);
		console.log(Object.keys(raw_data[0]));
		//console.log(raw_data);

      		data.addColumn('string', 'Entity');
      		data.addColumn('string', 'ParentEntity');
      		data.addColumn('string', 'ToolTip');

      // Loops through all rows and populates a new DataTable with formatted values for the orgchart
      var num_rows = Object.keys(raw_data[0]).length;

      for (var i = 0; i < Object.keys(raw_data[0]).length; i++) {

		var role = "";
		for (var j=0; j < Object.keys(raw_data[0][i][4]).length; j++) {
			role=role.concat('',Object.values(raw_data[0][i][4][j]));
		}

		var reportsTo = "";
		for (var j=0; j < Object.keys(raw_data[0][i][6]).length; j++) {
			reportsTo=reportsTo.concat('',Object.values(raw_data[0][i][6][j]));
		}

		var name = "";
		for (var j=0; j < Object.keys(raw_data[0][i][7]).length; j++) {
			name=name.concat('',Object.values(raw_data[0][i][7][j]));
		}

        data.addRows([[
          { v: role,
            f: name + "<div class='role'>" + role + "</div>"
          },
          reportsTo,
          name]]);
        m=i*111;
        n=m.toString(16);
        num=lpad(n,0,6);
        console.log(n+" - "+lpad(n,0,6));
        if (i>1) {
                data.setRowProperty(i, 'style', 'background-color:'+num+'#; background-image:none');
        }
      }

      var container = document.getElementById('orgchart_admin');
      var chart = new google.visualization.OrgChart(container);
      chart.draw(data, {allowHtml:true, 'size': 'large'});
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
<div class="container">
    <div class="row text-center">
	<h1>ORGANIGRAMMA UNIPV</h1>
    </div>
</div>

<div class="container">

<ul class="nav nav-tabs mb-4" role="tablist" id="myTab">
  <li class="nav-item" role="presentation"><button class="nav-link" href="#catalogo" id="catalogo-tab" data-bs-toggle="tab" data-bs-target="#catalogo" type="button" role="tab" aria-controls="catalogo" aria-selected="true" onclick="window.location.replace('index.php?view=list')"><i class="fa fa-list fa-2x" aria-hidden="true"></i></button></li>
  <li class="nav-item" role="presentation"><button class="nav-link active" href="#lista" id="lista-tab" data-bs-toggle="tab" data-bs-target="#lista" type="button" role="tab" aria-controls="lista" aria-selected="false" onclick="location.href='index.php?view=chart'"><i class="fa fa-sitemap fa-2x" aria-hidden="true"></i></button></li>
  <li class="nav-item" role="presentation"><button class="nav-link" href="#table" id="table-tab" data-bs-toggle="tab" data-bs-target="#table" type="button" role="tab" aria-controls="table" aria-selected="false" onclick="location.href='index.php?view=table'"><i class="fa fa-table fa-2x" aria-hidden="true"></i></button></li>
</ul>

</div>

<div class="container mb-2 p-2 listamenu">
    <div class="row p-2">
	<p>Vai a:</p>
        <select class="js-example-basic-single listaUO" name="UO" id="listaUO" onchange="if (this.value) window.location.href='index.php?view=chart&getUO='+this.value">
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
<div class="container-fluid">
    <div class="row">
    	<div id="orgchart_admin" style="Xbackground-color: rgba(92,123,211,0.2);"></div>
    	<div id="chart_div" style="background-color: rgba(12,123,111,0.2);"></div>
    </div>
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

