<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transactions</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>
    <div class="container">
        <h1>Transactions</h1>
        <a class="trans" href="{{ route('payment.go') }}">payment</a>

        <table id="transactions-table" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>invoice_number</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Created At</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#transactions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('transactions.index') }}',
                    data: function (d) {
                        d.search = $('input[type="search"]').val();
                    }
                },
                columns: [
                    {data: 'invoice_number', name: 'invoice_number'},
                    {data: 'amount', name: 'amount'},
                    {data: 'currency', name: 'currency'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'status', name: 'status'}
                ]
            });
        });
    </script>
</body>
</html>
