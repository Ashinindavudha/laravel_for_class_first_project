<!DOCTYPE html>
<html>
<head>
    <title>Laravel Datatable Dropdown Search - Nicesnippets.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h2>Laravel Datatable Dropdown Search - Nicesnippets.com</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label><strong>Status :</strong></label>
                        <select id='status' class="form-control">
                            <option value="">--Select status--</option>
                            <option value="0">Active</option>
                            <option value="1">Deactive</option>
                        </select>
                    </div>
                </div>
            </div>
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="100px">Status</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
   
</body>
   
<script>
$(document).ready(function(){
 
 fetch_data();
 
 function fetch_data(status = '')
 {
  $('.data-table').DataTable({
   processing: true,
   serverSide: true,
   searching:false,
   lengthChange:false,
   ajax: {
    url:"{{ route('users.index') }}",
    data: {status:status}
   },
   columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'status', name: 'status'},
    ]
  });
 }
 
 $('#status').change(function(){
  var status = $('#status').val();
  
  $('.data-table').DataTable().destroy();
 
  fetch_data(status);
 });
});
</script>
</html>