<!DOCTYPE html>
<html>
	<head>
		<title>PHP Mysql REST API CRUD</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body style="background: url(img/ba1.jpg); background-repeat: no-repeat; background-size: cover;">
		<div class="container">
			<br />
			
			<br />
			<div align="left" style="margin-top: 180px; margin-left: 120px;">
				<button type="button" name="add_button" id="add_button" class="btn btn-success btn-xs" style="width: 100px; height: 30px;">Add +</button>
			</div>

			<div class="table-responsive" style="margin-top: 50px; margin-left: 120px;margin-right: 120px;">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Nim</th>
							<th>Status</th>
							<th>Divisi</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</body>
</html>

<div id="apicrudModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="api_crud_form">
				<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Add Data</h4>
		      	</div>
		      	<div class="modal-body">
		      		<div class="form-group">
			        	<label>Masukkan Nama</label>
			        	<input type="text" name="nama" id="nama" class="form-control" />
			        </div>
			        <div class="form-group">
			        	<label>Masukkan Nim</label>
			        	<input type="text" name="nim" id="nim" class="form-control" />
			        </div>
			        <div class="form-group">
			        	<label>Masukkan Status</label>
			        	<input type="text" name="status" id="status" class="form-control" />
			        </div>
			        <div class="form-group">
			        	<label>Masukkan Divisi</label>
			        	<input type="text" name="divisi" id="divisi" class="form-control" />
			        </div>
			    </div>
			    <div class="modal-footer">
			    	<input type="hidden" name="hidden_id" id="hidden_id" />
			    	<input type="hidden" name="action" id="action" value="insert" />
			    	<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
			    	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      		</div>
			</form>
		</div>
  	</div>
</div>


<script type="text/javascript">
$(document).ready(function(){

	fetch_data();

	function fetch_data()
	{
		$.ajax({
			url:"fetch.php",
			success:function(data)
			{
				$('tbody').html(data);
			}
		})
	}

	$('#add_button').click(function(){
		$('#action').val('insert');
		$('#button_action').val('Insert');
		$('.modal-title').text('Add Data');
		$('#apicrudModal').modal('show');
	});

	$('#api_crud_form').on('submit', function(event){
		event.preventDefault();
		if($('#nama').val() == '')
		{
			alert("Masukkan Nama");
		}
		else if($('#nim').val() == '')
		{
			alert("Masukkan Nim");
		}else if($('#status').val() == '')
		{
			alert("Masukkan Status");
		}
		else if($('#divisi').val() == '')
		{
			alert("Masukkan Divisi");
		}
		else
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"action.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					fetch_data();
					$('#api_crud_form')[0].reset();
					$('#apicrudModal').modal('hide');
					if(data == 'insert')
					{
						alert("Data Inserted using PHP API");
					}
					if(data == 'update')
					{
						alert("Data Updated using PHP API");
					}
				}
			});
		}
	});

	$(document).on('click', '.edit', function(){
		var id = $(this).attr('id');
		var action = 'fetch_single';
		$.ajax({
			url:"action.php",
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data)
			{
				$('#hidden_id').val(id);
				$('#nama').val(data.nama);
				$('#nim').val(data.nim);
				$('#status').val(data.status);
				$('#divisi').val(data.divisi);
				$('#action').val('update');
				$('#button_action').val('Update');
				$('.modal-title').text('Edit Data');
				$('#apicrudModal').modal('show');
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var id = $(this).attr("id");
		var action = 'delete';
		if(confirm("Are you sure you want to remove this data using PHP API?"))
		{
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{id:id, action:action},
				success:function(data)
				{
					fetch_data();
					alert("Data Deleted using PHP API");
				}
			});
		}
	});

});
</script>