<!DOCTYPE html>
<html>
<head>
	<title>Welcome Page</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
</head>
<body>
	<div>
		<label>Enter Text:</label>
		<input type="text" name="text" id="text" class="form-control" placeholder="Enter Text Here" autocomplete="off">
		<button type="button" id="submit" class="btn btn-primary">Submit</button>
	</div>
	<br>
	<div>
		<table id="texts-table" class="display" style="width:100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Text</th>
					<th>Created At</th>
				</tr>
			</thead>
		</table>
	</div>

	<script src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>
