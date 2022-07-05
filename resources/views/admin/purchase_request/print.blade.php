<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple invoice html template</title>
</head>
<body>

<style>
	html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,total,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{height:840px;width:592px;margin:auto;font-family:'Open Sans',sans-serif;font-size:12px}strong{font-weight:700}#container{position:relative;padding:4%}#header{height:80px}#header > #reference{float:right;text-align:right}#header > #reference h3{margin:0}#header > #reference h4{margin:0;font-size:85%;font-weight:600}#header > #reference p{margin:0;margin-top:2%;font-size:85%}#header > #logo{width:50%;float:left}#fromto{height:160px}#fromto > #from,#fromto > #to{width:45%;min-height:90px;margin-top:30px;font-size:85%;padding:1.5%;line-height:120%}#fromto > #from{float:left;width:45%;background:#efefef;margin-top:30px;font-size:85%;padding:1.5%}#fromto > #to{float:right;border:solid grey 1px}#items{margin-top:10px}#items > p{font-weight:700;text-align:right;margin-bottom:1%;font-size:65%}#items > table{width:100%;font-size:85%;border:solid grey 1px}#items > table th:first-child{text-align:left}#items > table th{font-weight:400;padding:1px 4px}#items > table td{padding:1px 4px}#items > table th:nth-child(2),#items > table th:nth-child(4){width:45px}#items > table th:nth-child(3){width:60px}#items > table th:nth-child(5){width:80px}#items > table tr td:not(:first-child){text-align:right;padding-right:1%}#items table td{border-right:solid grey 1px}#items table tr td{padding-top:3px;padding-bottom:3px;height:10px}#items table tr:nth-child(1){border:solid grey 1px}#items table tr th{border-right:solid grey 1px;padding:3px}#items table tr:nth-child(2) > td{padding-top:8px}#summary{height:170px;margin-top:30px}#summary #note{float:left}#summary #note h4{font-size:10px;font-weight:600;font-style:italic;margin-bottom:4px}#summary #note p{font-size:10px;font-style:italic}#summary #total table{font-size:85%;width:260px;float:right}#summary #total table td{padding:3px 4px}#summary #total table tr td:last-child{text-align:right}#summary #total table tr:nth-child(3){background:#efefef;font-weight:600}#footer{margin:auto;position:absolute;left:4%;bottom:4%;right:4%;border-top:solid grey 1px}#footer p{margin-top:1%;font-size:65%;line-height:140%;text-align:center}
</style>


<div id="container">
	<div id="header">
		<div id="logo">
      
		</div>
		<div id="reference">
			<h3><strong>Facture</strong></h3>
			<h4>Réf. : FA1703-00001</h4>
			<p>Date facturation : 20/03/2017</p>
		</div>
	</div>

	<div id="fromto">
		<div id="from">
			<p>
				<strong>PT GRAHA SUMBER PRIMA ELEKTRONIK</strong><br>
				INTERCON PLAZA BLOK D 11<br>
				JL. MERUYA ILIR, SRENGSENG-KEMBANGAN<br><br>
				Phone: (62-21)7587-9949/51 <br>
				NPWP: 01.789.513.7-038.000 <br>
				
			</p>
		</div>
        <div id="to" >
        <p value="{{ $data->pr_number }}"  onchange="location = this.value;"></p>
			<p>
                <strong>PURCHASE REQUEST</strong><br>
                <strong>PR No. {{ $data->pr_number }}  }</strong><br>
                <strong>PR Date {{ $data->pr_date }}</strong><br>
                <strong>Request By {{ $data->request_from }}</strong><br>
               
			</p>
		</div>
	</div>

	<div >
		<p></p>
		<table class="table" id="table">            
    <thead>
                    <tr>
                    <th>MFR</th>
 									 <th>Part Number</th>
 									 <th>Part Name</th>
 									 <th>Part Description</th>
 									 <th>Unit Cost</th>
 									 <th>Sell Price</th>
 									 <th>Action</th>
                    </tr>
             </thead>

</table>
	</div>

	<div id="summary">
		<div id="note">
			<h4>Note :</h4>
			<p>Please write our PR Number on all correspondences. Please sign and</p>
		</div>
		<div id="total">
			<table border="1">
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td>Total Net Value Excl. Tax</td>
					<td>0,00</td>
				</tr>
			</table>
		</div>
	</div>

	<div id="footer">
		<p></p>
	</div>
</div>

</body>
</html>
<?php
$dataid = $data->id;

 ?>
<link href="https://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href='{{ asset("/css/jquery-ui.min.css") }}' />
<!-- <style>.dataTables_length{display: none;} .dataTables_filter{display: none;}</style> -->
<script type="text/javascript" src='{{ asset("/js/jquery-ui.min.js") }}'></script>
<script type="text/javascript" src='{{ asset("/js/jquery.dataTables.min.js") }}'></script>

<script type="text/javascript" src='{{ asset("/js/dataTables.bootstrap4.min.js") }}'></script>
<script type="text/javascript">

$(function() {
               var table2 =$('#table2').DataTable({
               processing: true,
               serverSide: true,
               ajax: "{{ route('itemdata') }}",
               columns: [
                        { data: 'mfr', name: 'mfr' },
                        { data: 'part_num', name: 'part_num' },
                        { data: 'part_name', name: 'part_name' },
                        { data: 'part_desc', name: 'part_desc', searchable: 'false' },
                        { data: 'unit_cost', name: 'unit_cost', searchable: 'false' },
                        { data: 'sell_price', name: 'sell_price', searchable: 'false' },
                        { data: 'add', name: 'add', searchable: 'false' },

                     ]
            });
         });

 </script>
<script type="text/javascript">
//
function getItemTable(productIds, prId)
{
	console.log(productIds)
	console.log(prId)
	$(function() {
       var table = $('#table').DataTable({
       processing: true,
       serverSide: true,
       ajax: "{{ URL::to('items/tablepr') }}/"+productIds+"/"+prId,
       columns: [
                { data: 'mfr', name: 'mfr' },
                { data: 'part_name', name: 'part_name' },
                { data: 'part_num', name: 'part_num' },
                { data: 'part_desc', name: 'part_desc' },
								// { data: 'sequence_number', name: 'sequence_number' },
								// { data: 'type_product_id', name: 'type_product_id' },
                { data: 'qty', name: 'qty' },
                { data: 'um', name: 'um' },
								// { data: 'unit_cost', name: 'unit_cost' },
                // { data: 'total', name: 'total' },
                { data: 'delete', name: 'delete' },

             ]
    });


 	});
}


//
function prnumber(value)
{
	// console.log(value)
	$.ajax(
	{
	  url: "{{ URL::to('items/prnumber/get') }}/"+value
	})
	.done(function(data)
	{
		var table = $('#table').DataTable();
		table.destroy();
		getItemTable( data.productIds, data.prId );

	});

}

var dataid = "<?php echo $dataid ?>";
// console.log(dataid)
window.onload=prnumber(dataid);

function deleteItemTemp( uIds )
{
	var table = $('#table').DataTable();
	var inqId = $('.inquiry-customer').val();
	table.destroy();
	getItemTable(uIds, inqId);
}
 </script>