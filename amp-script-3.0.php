<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>amp validator</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.rawgit.com/duipee/css/07cb2bd5/font-awesome-animation.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/duipee/css/df8bfa59/style.css">
	<style>
		.table>thead>tr>th,.table>thead>tr>td{
			border-top: none !important;
		}
		.table th,.table td {
			text-align: center;   
		}
		.text-align-left {
			text-align: left!important;
		}
		ul, ol {
			margin: 12px 0;
		}
		.text-danger {
			color: #F05422;
		}
		.text-warning {
			color: #F79021;
		}
		.text-success {
			color: #B6CD29/*#C5D939*/;
		}
		/*textarea {
			resize: none;
			border: none;
			overflow: auto;
			outline: none;
			-webkit-box-shadow: none;
			-moz-box-shadow: none;
			box-shadow: none;
		}	*/	
		#url_submit {
			width: 100%;
		}
		#text_submit {
			width: 100%;
		}	
		.input-group-addon {
			border-radius: 0px;
		}
		.loader {
			top: 185px;
		}
		.alert {border-radius:0px}
		.alert-warning {
			color: #F05422;
			/*background-color: rgba(251,175,63,0.5);
			border-color: transparent;*/
		}		
		.alert-info {
			color: #006AB6;
		}
		.CodeMirror {color:#333; border: 1px solid #c0c0c0;font-size: 10pt;height: 370px;}
		.CodeMirror pre {padding: 0 8px;}
		.CodeMirror-linenumber {padding: 0 3px 0 0px!important}
		.line-disallow {background: #F05422 !important;color: white !important;}
		.line-allow {background: #B6CD29 !important;color: white !important;}
		.note-gutter { width: 20px; background: #ccc;}
		.fa-gutter {margin: 2px 0 0 7px;}
		.fa-external-link {font-size: 10px;}
		.fa-ban,.fa-times-circle {color:#F05422;vertical-align:middle;}
		.fa-question-circle {color:#F79021;cursor:pointer;vertical-align:middle;}
		.fa-info-circle {color:#F79021;vertical-align:middle;}
		.fa-check, .fa-server {color:#B6CD29;vertical-align:middle;}
		.fa-exclamation-triangle {color:#FBAF3F}
		input[type=radio], input[type=checkbox] {
			margin: 1px 0 0;
			width: 18px;
			height: 18px;
		}
		table {
			font-size: 11px;
		}
		.brdr-left {
			border-left: 1px solid #ddd;
		}
		.url-td {
			max-width:220px;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
			/*max-width:280px;*/
		}
		.redirect-td {
			max-width:125px;
			white-space: nowrap;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		.tooltip-inner {
			max-width: 500px;
		}		
	</style>

	
  </head>
  <body>
    <div class="container">
		<img id="loading" class="hide" src="https://4.bp.blogspot.com/-1Qwg7Nm2hEI/W2wH-KT1onI/AAAAAAAAJN0/VcG3WSLjjvorIIDN3eqUAduT3nZ98h6kACLcBGAs/s1600/loader-search.gif" width="128px" style="position:absolute;top:30px;left:50%;margin-left:-64px;z-index:999">

			<div class="row">
		<form action="" method="post">
				<div class="col-md-7 col-left">
					<label><i class="fa fa-hand-o-right"></i>&nbsp;&nbsp;URLs <i>(Desktop or AMP versions)</i>:</label>
					<textarea name="URLs" class="form-control" rows="1" placeholder="One per line | 100 URLs max." style="resize:vertical"></textarea>
				</div>
				<div class="col-md-3 col-left">
					<label><i class="fa fa-user"></i>&nbsp;&nbsp;User Agent:</label>					
					<select class="form-control" name="user_agent">
						<option value="Googlebot" >Googlebot</option>
						<option value="Current_UA" >Current browser</option>
						<option value="Spider" >Spider</option>
					</select>
				</div>
				<div class="col-md-1 col-left">
					<label>&nbsp;</label><br>
					<button id="url_submit"  name="url_submit" type="submit" class="btn btn-light-blue"><i class="fa fa-play"></i>&nbsp;&nbsp;Run</button>
				</div>	
		</form>
				<div class="col-md-1">
					<label>&nbsp;</label><br>
					<button class="btn btn-red-orange disabled " style="width:100%;pointer-events:all;"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;.CSV</button>
					<button class="btn btn-red-orange hide" style="width:100%" onclick="tablesToExcel(['table3','table4','table2','table1'], ['Valid AMP URLs','Non-valid AMP URLs','Non-AMP URLs','Non-retrievable URLs'], 'amp-report.xls', 'Excel')"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;.CSV</button>
				</div>
			</div>
		<br>
		
<table class="table hide" style="border-collapse:collapse;">

    <thead>
        <tr>
			<th>URL</th>
			<th>Status Code</th>
			<th>AMP?</th>
			<th>rel="amphtml"</th>
			<th>Valid?</th>
			<th>schema.org</th>
			<th>Canonical URL</th>
			<th>rel="amphtml"<br><i>(from canonical URL)</i></th>
			<th>Implementation</th>
			<!--<th>AMP CDN</th>--> 
        </tr>
    </thead>
    <tbody>
	
		
		
    </tbody>
</table>

<div class="hide">
<!--unretrievableURLs-->
<table id="table1">
	<tbody>
		<tr>
			<td>URLs</td>
			<td>Status Code</td>
			<td>Redirect URL</td>
		</tr>
	</tbody>
</table>
<!--nonAMPurls-->
<table id="table2">
	<tbody>
		<tr>
			<td>URL</td>
			<td>Is AMP?</td>
			<td>rel="amphtml"</td>
			<td>rel="amphtml" Status Code</td>
			<td>rel="amphtml" Redirect URL</td>
			<td>Is rel="amphtml" AMP?</td>
		</tr>
	</tbody>
</table>
<!--validAMPurls-->
<table id="table3">
	<tbody>
		<tr>
			<td>Submitted URL</td>
			<td>Is AMP?</td>
			<td>rel="amphtml"</td>
			<td>AMP URL Source</td>
			<td>Schema.org</td>
			<td>Canonical URL</td>
			<td>Canonical -> Status Code</td>
			<td>Canonical -> Redirect URL</td>
			<td>Canonical -> rel="amphtml"</td>
			<td>Implementation OK?</td>
			<!--<td>AMP CDN URL</td>-->
		</tr>
	</tbody>
</table>
<!--nonValidAMPurls-->
<table id="table4">
	<tbody>
		<tr>
			<td>Submitted URL</td>
			<td>Is AMP?</td>
			<td>rel="amphtml"</td>
			<td>AMP URL Source</td>
			<td>Schema.org</td>
			<td>Canonical URL</td>
			<td>Canonical -> Status Code</td>
			<td>Canonical -> Redirect URL</td>
			<td>Canonical -> rel="amphtml"</td>
			<td>Implementation OK?</td>
			<!--<td>AMP CDN URL</td>-->
		</tr>
	</tbody>
</table>
 </div>
 
	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script src="https://cdn.rawgit.com/duipee/js/1304dfbd/iframeResizer.contentWindow.min.js"></script>
	<script src="https://cdn.rawgit.com/duipee/js/1304dfbd/table-excel.js"></script>
	<script>
	$("#url_submit").click(function(){
		$("#loading").removeClass('hide');
	});
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})	
	</script>
	  
	  <script src="https://technicalseo.com/resources/tools/iframeResizer.min.js"></script>
<script type="text/javascript">
	iFrameResize({
		log                     : true,                  // Enable console logging
		enablePublicMethods     : true,                  // Enable methods within iframe hosted page
		resizedCallback         : function(messageData){ // Callback fn when resize is received
			$('p#callback').html(
				'<b>Frame ID:</b> '    + messageData.iframe.id +
				' <b>Height:</b> '     + messageData.height +
				' <b>Width:</b> '      + messageData.width + 
				' <b>Event type:</b> ' + messageData.type
			);
		},
		messageCallback         : function(messageData){ // Callback fn when message is received
			$('p#callback').html(
				'<b>Frame ID:</b> '    + messageData.iframe.id +
				' <b>Message:</b> '    + messageData.message
			);
			alert(messageData.message);
		},
		closedCallback         : function(id){ // Callback fn when iFrame is closed
			$('p#callback').html(
				'<b>IFrame (</b>'    + id +
				'<b>) removed from page.</b>'
			);
		}
	});
</script> 
  </body>
</html>
