<?php
    //require("config.php");
   // if(empty($_SESSION['user'])) 
    {
       // header("Location: index.php");
        //die("Redirecting to index.php"); 
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

	<title>DataTables example - Individual column searching (text inputs)</title>
	<link rel="stylesheet" type="text/css" href="datatable/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="datatable/examples/resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="datatable/examples/resources/demo.css">
	<style type="text/css" class="init">

	tfoot input {
		width: 100%;
		padding: 3px;
		box-sizing: border-box;
	}

	</style>
	<script type="text/javascript" language="javascript" src="datatable/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="datatable/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="datatable/examples/resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="datatable/examples/resources/demo.js"></script>
	
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="assets/bootstrap.min.js"></script> -->
	<link href="assets/bootstrap.min.css" rel="stylesheet" media="screen"> 
	
	<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	// Setup - add a text input to each footer cell
	$('#example tfoot th').each( function () {
		var title = $('#example thead th').eq( $(this).index() ).text();
		$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
	} );

	// DataTable
	var table = $('#example').DataTable();

	// Apply the search
	table.columns().every( function () {
		var that = this;

		$( 'input', this.footer() ).on( 'keyup change', function () {
			that
				.search( this.value )
				.draw();
		} );
	} );
} );


	</script>
</head>

<body class="dt-example">
<div class="navbar navbar-fixed-top navbar-inverse ">
  <div class="navbar-inner">
    <div class="container">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		       <!--<a class="navbar-brand" href="#">
                    <img src="http://placehold.it/150x50&text=Logo" alt="">
                </a> -->
		
      <a class="brand">Config Tracker</a>
      <div class="nav-collapse">	  
        <ul class="nav pull-right">
			<li><a>logged in as: <?php// echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?></a></li>
			<li class="divider-vertical"></li>
			<li><a href="register.php">Register</a></li>
			<li class="divider-vertical"></li>
			<li><a href="logout.php">Log Out</a></li>
			
        </ul>
      </div>
    </div>
  </div>
</div>



	<div class="container">
		<section>
			<h1>DataTables example <span>Individual column searching (text inputs)</span></h1>

			<!-- <div class="info">
				<p>The searching functionality that is provided by DataTables is very useful for quickly search through the information in the table - however the search is
				global, and you may wish to present controls to search on specific columns only.</p>

				<p>DataTables has the ability to apply searching to a specific column through the <a href="//datatables.net/reference/api/column().search()"><code class="api"
				title="DataTables API method">column().search()<span>DT</span></code></a> method (note that the name of the method is <code>search</code> not <code>filter</code>
				since <a href="//datatables.net/reference/api/filter()"><code class="api" title="DataTables API method">filter()<span>DT</span></code></a> is used to apply a
				filter to a result set).</p>

				<p>The column searches are cumulative, so you can apply multiple individual column searches, in addition to the global search, allowing complex searching options
				to be presented to the user.</p>

				<p>This examples shows text elements being used with the <a href="//datatables.net/reference/api/column().search()"><code class="api" title=
				"DataTables API method">column().search()<span>DT</span></code></a> method to add input controls in the footer of the table for each column. Note that the
				<code>*index*:visible</code> option is used for the column selector to ensure that the <a href="//datatables.net/reference/api/column()"><code class="api" title=
				"DataTables API method">column()<span>DT</span></code></a> method takes into account any hidden columns when selecting the column to act upon.</p>
			</div> -->

			<table id="example" class="display" cellspacing="0" width="100%">
                <thead>
						<tr>
						<th>DATE ENTERED</th>
						<th>Date Change Performed</th>
						<th>Time Change Performed</th>
						<th>Engineer</th>
						<th>Controller</th>
						<th>Sites</th>
						<th>Regions</th>
						<th>Projects</th>
						<th>Change</th>
						<th>Comments</th>
						<th>Action</th>
						</tr>
                  </thead>

				<tfoot>
					<tr>
						<tr>
						<th>DATE ENTERED</th>
						<th>Date Change Performed</th>
						<th>Time Change Performed</th>
						<th>Engineer</th>
						<th>Controller</th>
						<th>Sites</th>
						<th>Regions</th>
						<th>Projects</th>
						<th>Change</th>
						<th>Comments</th>
						<th>Action</th>
						</tr>
					</tr>
				</tfoot>

				<tbody>
				
				
					<?php
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM configtracker ORDER BY id DESC';
					   foreach ($pdo->query($sql) as $row) {
								echo '<tr>';
								echo '<td>'. $row['date_entered'] . '</td>';
								echo '<td>'. $row['date_loaded'] . '</td>';
								echo '<td>'. $row['time_loaded'] . '</td>';
								echo '<td>'. $row['engineer'] . '</td>';
								echo '<td>'. $row['controller'] . '</td>';
								echo '<td>'. $row['sites'] . '</td>';
								echo '<td>'. $row['region'] . '</td>';
								echo '<td>'. $row['project'] . '</td>';
								echo '<td>'. $row['modification'] . '</td>';
								echo '<td>'. $row['comments'] . '</td>';							
								echo '<td width=250>';
								echo '<a class="btn" href="read.php?id='.$row['id'].'">MML</a>';
								//if ($row['engineer'] == $_SESSION['user']['username']) {
									echo '<a class="btn btn-danger width=20" href="update.php?id='.$row['id'].'">Edit</a>';
								//}		
								echo '</td>';
								echo '</tr>';

					   }
					   Database::disconnect();
					?>
			
				</tbody>
			</table>

			<!-- <ul class="tabs">
				<li class="active">Javascript</li>
				<li>HTML</li>
				<li>CSS</li>
				<li>Ajax</li>
				<li>Server-side script</li>
			</ul>

			<div class="tabs"> -->
			<!-- 	<div class="js">
					<p>The Javascript shown below is used to initialise the table shown in this example:</p><code class="multiline language-js">$(document).ready(function() {
	// Setup - add a text input to each footer cell
	$('#example tfoot th').each( function () {
		var title = $('#example thead th').eq( $(this).index() ).text();
		$(this).html( '&lt;input type=&quot;text&quot; placeholder=&quot;Search '+title+'&quot; /&gt;' );
	} );

	// DataTable
	var table = $('#example').DataTable();

	// Apply the search
	table.columns().every( function () {
		var that = this;

		$( 'input', this.footer() ).on( 'keyup change', function () {
			that
				.search( this.value )
				.draw();
		} );
	} );
} );</code>

					<p>In addition to the above code, the following Javascript library files are loaded for use in this example:</p>

					<ul>
						<li><a href="../../media/js/jquery.js">../../media/js/jquery.js</a></li>
						<li><a href="../../media/js/jquery.dataTables.js">../../media/js/jquery.dataTables.js</a></li>
					</ul>
				</div>

				<div class="table">
					<p>The HTML shown below is the raw HTML table element, before it has been enhanced by DataTables:</p>
				</div>

				<div class="css">
					<div>
						<p>This example uses a little bit of additional CSS beyond what is loaded from the library files (below), in order to correctly display the table. The
						additional CSS used is shown below:</p><code class="multiline language-css">tfoot input {
		width: 100%;
		padding: 3px;
		box-sizing: border-box;
	}</code>
					</div>

					<p>The following CSS library files are loaded for use in this example to provide the styling of the table:</p>

					<ul>
						<li><a href="../../media/css/jquery.dataTables.css">../../media/css/jquery.dataTables.css</a></li>
					</ul>
				</div>

				<div class="ajax">
					<p>This table loads data by Ajax. The latest data that has been loaded is shown below. This data will update automatically as any additional data is
					loaded.</p>
				</div>

				<div class="php">
					<p>The script used to perform the server-side processing for this table is shown below. Please note that this is just an example script using PHP. Server-side
					processing scripts can be written in any language, using <a href="//datatables.net/manual/server-side">the protocol described in the DataTables
					documentation</a>.</p>
				</div>
			</div>
		</section>
	</div>

	<section>
		<div class="footer">
			<div class="gradient"></div>

			<div class="liner">
				<h2>Other examples</h2>

				<div class="toc">
					<div class="toc-group">
						<h3><a href="../basic_init/index.html">Basic initialisation</a></h3>
						<ul class="toc">
							<li><a href="../basic_init/zero_configuration.html">Zero configuration</a></li>
							<li><a href="../basic_init/filter_only.html">Feature enable / disable</a></li>
							<li><a href="../basic_init/table_sorting.html">Default ordering (sorting)</a></li>
							<li><a href="../basic_init/multi_col_sort.html">Multi-column ordering</a></li>
							<li><a href="../basic_init/multiple_tables.html">Multiple tables</a></li>
							<li><a href="../basic_init/hidden_columns.html">Hidden columns</a></li>
							<li><a href="../basic_init/complex_header.html">Complex headers (rowspan and colspan)</a></li>
							<li><a href="../basic_init/dom.html">DOM positioning</a></li>
							<li><a href="../basic_init/flexible_width.html">Flexible table width</a></li>
							<li><a href="../basic_init/state_save.html">State saving</a></li>
							<li><a href="../basic_init/alt_pagination.html">Alternative pagination</a></li>
							<li><a href="../basic_init/scroll_y.html">Scroll - vertical</a></li>
							<li><a href="../basic_init/scroll_x.html">Scroll - horizontal</a></li>
							<li><a href="../basic_init/scroll_xy.html">Scroll - horizontal and vertical</a></li>
							<li><a href="../basic_init/scroll_y_theme.html">Scroll - vertical with jQuery UI ThemeRoller</a></li>
							<li><a href="../basic_init/comma-decimal.html">Language - Comma decimal place</a></li>
							<li><a href="../basic_init/language.html">Language options</a></li>
						</ul>
					</div>

					<div class="toc-group">
						<h3><a href="../advanced_init/index.html">Advanced initialisation</a></h3>
						<ul class="toc">
							<li><a href="../advanced_init/events_live.html">DOM / jQuery events</a></li>
							<li><a href="../advanced_init/dt_events.html">DataTables events</a></li>
							<li><a href="../advanced_init/column_render.html">Column rendering</a></li>
							<li><a href="../advanced_init/length_menu.html">Page length options</a></li>
							<li><a href="../advanced_init/dom_multiple_elements.html">Multiple table control elements</a></li>
							<li><a href="../advanced_init/complex_header.html">Complex headers (rowspan / colspan)</a></li>
							<li><a href="../advanced_init/object_dom_read.html">Read HTML to data objects</a></li>
							<li><a href="../advanced_init/html5-data-attributes.html">HTML5 data-* attributes - cell data</a></li>
							<li><a href="../advanced_init/html5-data-options.html">HTML5 data-* attributes - table options</a></li>
							<li><a href="../advanced_init/language_file.html">Language file</a></li>
							<li><a href="../advanced_init/defaults.html">Setting defaults</a></li>
							<li><a href="../advanced_init/row_callback.html">Row created callback</a></li>
							<li><a href="../advanced_init/row_grouping.html">Row grouping</a></li>
							<li><a href="../advanced_init/footer_callback.html">Footer callback</a></li>
							<li><a href="../advanced_init/dom_toolbar.html">Custom toolbar elements</a></li>
							<li><a href="../advanced_init/sort_direction_control.html">Order direction sequence control</a></li>
						</ul>
					</div>

					<div class="toc-group">
						<h3><a href="../styling/index.html">Styling</a></h3>
						<ul class="toc">
							<li><a href="../styling/display.html">Base style</a></li>
							<li><a href="../styling/no-classes.html">Base style - no styling classes</a></li>
							<li><a href="../styling/cell-border.html">Base style - cell borders</a></li>
							<li><a href="../styling/compact.html">Base style - compact</a></li>
							<li><a href="../styling/hover.html">Base style - hover</a></li>
							<li><a href="../styling/order-column.html">Base style - order-column</a></li>
							<li><a href="../styling/row-border.html">Base style - row borders</a></li>
							<li><a href="../styling/stripe.html">Base style - stripe</a></li>
							<li><a href="../styling/bootstrap.html">Bootstrap</a></li>
							<li><a href="../styling/foundation.html">Foundation</a></li>
							<li><a href="../styling/jqueryUI.html">jQuery UI ThemeRoller</a></li>
						</ul>
					</div>

					<div class="toc-group">
						<h3><a href="../data_sources/index.html">Data sources</a></h3>
						<ul class="toc">
							<li><a href="../data_sources/dom.html">HTML (DOM) sourced data</a></li>
							<li><a href="../data_sources/ajax.html">Ajax sourced data</a></li>
							<li><a href="../data_sources/js_array.html">Javascript sourced data</a></li>
							<li><a href="../data_sources/server_side.html">Server-side processing</a></li>
						</ul>
					</div>

					<div class="toc-group">
						<h3><a href="./index.html">API</a></h3>
						<ul class="toc active">
							<li><a href="./add_row.html">Add rows</a></li>
							<li class="active"><a href="./multi_filter.html">Individual column searching (text inputs)</a></li>
							<li><a href="./multi_filter_select.html">Individual column searching (select inputs)</a></li>
							<li><a href="./highlight.html">Highlighting rows and columns</a></li>
							<li><a href="./row_details.html">Child rows (show extra / detailed information)</a></li>
							<li><a href="./select_row.html">Row selection (multiple rows)</a></li>
							<li><a href="./select_single_row.html">Row selection and deletion (single row)</a></li>
							<li><a href="./form.html">Form inputs</a></li>
							<li><a href="./counter_columns.html">Index column</a></li>
							<li><a href="./show_hide.html">Show / hide columns dynamically</a></li>
							<li><a href="./api_in_init.html">Using API in callbacks</a></li>
							<li><a href="./tabs_and_scrolling.html">Scrolling and jQuery UI tabs</a></li>
							<li><a href="./regex.html">Search API (regular expressions)</a></li>
						</ul>
					</div>

					<div class="toc-group">
						<h3><a href="../ajax/index.html">Ajax</a></h3>
						<ul class="toc">
							<li><a href="../ajax/simple.html">Ajax data source (arrays)</a></li>
							<li><a href="../ajax/objects.html">Ajax data source (objects)</a></li>
							<li><a href="../ajax/deep.html">Nested object data (objects)</a></li>
							<li><a href="../ajax/objects_subarrays.html">Nested object data (arrays)</a></li>
							<li><a href="../ajax/orthogonal-data.html">Orthogonal data</a></li>
							<li><a href="../ajax/null_data_source.html">Generated content for a column</a></li>
							<li><a href="../ajax/custom_data_property.html">Custom data source property</a></li>
							<li><a href="../ajax/custom_data_flat.html">Flat array data source</a></li>
							<li><a href="../ajax/defer_render.html">Deferred rendering for speed</a></li>
						</ul>
					</div>

					<div class="toc-group">
						<h3><a href="../server_side/index.html">Server-side</a></h3>
						<ul class="toc">
							<li><a href="../server_side/simple.html">Server-side processing</a></li>
							<li><a href="../server_side/custom_vars.html">Custom HTTP variables</a></li>
							<li><a href="../server_side/post.html">POST data</a></li>
							<li><a href="../server_side/ids.html">Automatic addition of row ID attributes</a></li>
							<li><a href="../server_side/object_data.html">Object data source</a></li>
							<li><a href="../server_side/row_details.html">Row details</a></li>
							<li><a href="../server_side/select_rows.html">Row selection</a></li>
							<li><a href="../server_side/jsonp.html">JSONP data source for remote domains</a></li>
							<li><a href="../server_side/defer_loading.html">Deferred loading of data</a></li>
							<li><a href="../server_side/pipeline.html">Pipelining data to reduce Ajax calls for paging</a></li>
						</ul>
					</div>

					<div class="toc-group">
						<h3><a href="../plug-ins/index.html">Plug-ins</a></h3>
						<ul class="toc">
							<li><a href="../plug-ins/api.html">API plug-in methods</a></li>
							<li><a href="../plug-ins/sorting_auto.html">Ordering plug-ins (with type detection)</a></li>
							<li><a href="../plug-ins/sorting_manual.html">Ordering plug-ins (no type detection)</a></li>
							<li><a href="../plug-ins/range_filtering.html">Custom filtering - range search</a></li>
							<li><a href="../plug-ins/dom_sort.html">Live DOM ordering</a></li>
						</ul>
					</div>
				</div>

				<div class="epilogue">
					<p>Please refer to the <a href="http://www.datatables.net">DataTables documentation</a> for full information about its API properties and methods.<br>
					Additionally, there are a wide range of <a href="http://www.datatables.net/extras">extras</a> and <a href="http://www.datatables.net/plug-ins">plug-ins</a>
					which extend the capabilities of DataTables.</p>

					<p class="copyright">DataTables designed and created by <a href="http://www.sprymedia.co.uk">SpryMedia Ltd</a> &#169; 2007-2015<br>
					DataTables is licensed under the <a href="http://www.datatables.net/mit">MIT license</a>.</p>
				</div>
			</div>
		</div> -->
	</section>
</body>
</html>