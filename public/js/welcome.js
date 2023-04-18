$(document).ready(function() {
	$('#text').on('input', function() {
		var query = $(this).val();
		if(query.length >= 2) {
			$.ajax({
				url: '/autocomplete',
				type: 'GET',
				dataType: 'json',
				data: {
					query: query
				},
				success: function(data) {
					$('#text').autocomplete({
						source: data
					});
				}
			});
		}
	});

	$('#submit').click(function() {
		var text = $('#text').val();
		$.ajax({
			url: '/store',
			type: 'POST',
			dataType: 'json',
			data: {
				_token: $('meta[name="csrf-token"]').attr('content'),
				text: text
			},
			success: function(data) {
				$('#texts-table').DataTable().ajax.reload();
				$('#text').val('');
			}
		});
	});

	$('#texts-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: '/texts',
		columns: [
			{ data: 'id', name: 'id' },
			{ data: 'text', name: 'text' },
			{ data: 'created_at', name: 'created_at' }
		]
	});
});
