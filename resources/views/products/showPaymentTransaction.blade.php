<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('showPaymentT.css') }}">
    <title></title>
</head>
<body>



    <div class="card">


        <div class="table-title">
          <h2>TABLE For transaction</h2>
        </div>

        <div class="button-container"><input type="text"  placeholder="These buttons aren't working" >
            <a href="{{ route('payment.go') }}">Go To Payment</a>
          {{-- <button class="danger" title="Delete Selected">
            <svg viewBox="0 0 448 512" width="16" title="trash-alt">
              <path d="M32 464a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128H32zm272-256a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zm-96 0a16 16 0 0 1 32 0v224a16 16 0 0 1-32 0zM432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"></path>
            </svg>
          </button>
          <button class="primary" title="Add New Data">
            <svg viewBox="0 0 512 512" width="16" title="plus-circle">
              <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path>
            </svg>
          </button> --}}
        </div>
        <div class="table-concept">
          <input class="table-radio" type="radio" name="table_radio" id="table_radio_0" checked="checked"/>
          <div class="table-display">Showing 1 to 20
            of 95 items
          </div>
          <table>
            <thead>
              <tr>
                <th>{{ count($transaction) }}</th>
                <th>id</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>currency</th>
                <th>token</th>
                <th>amount</th>
                <th>status</th>
                <th>email</th>
                <th>country_code</th>
                <th>invoice_number</th>
             </tr>
     </thead>
     @foreach ($transaction as $trans )
              <tr>
                <td>
                </td>
                <td>{{ $trans['id'] }}</td>
                <td>{{ $trans['created_at'] }}</td>
                <td>{{ $trans['updated_at'] }}</td>
                <td>{{ $trans['currency'] }}</td>
                <td>{{ $trans['token'] }}</td>
                <td>{{ $trans['amount'] }}</td>
                <td>{{ $trans['status']? 'success':'canceld' }}</td>
                <td>{{ $trans['email'] }}</td>
                <td>{{ $trans['country_code'] }}</td>
                <td>{{ $trans['invoice_number'] }}</td>

              </tr>

            </tbody>
     @endforeach
            <tbody>

              {{--     </table>
          <div class="pagination">
            <label class="disabled" for="table_radio_-1">&laquo; Previous</label>
            <label class="active" for="table_radio_0" id="table_pager_0">1</label>
            <label for="table_radio_1" id="table_pager_1">2</label>
            <label for="table_radio_2" id="table_pager_2">3</label>
            <label for="table_radio_3" id="table_pager_3">4</label>
            <label for="table_radio_4" id="table_pager_4">5</label>
            <label for="table_radio_1">Next &raquo;</label>
          </div>
          <input class="table-radio" type="radio" name="table_radio" id="table_radio_1"/>
          <div class="table-display">Showing 21 to 40
            of 95 items
          </div>
          <table>
            <thead>
              <tr>
                <th></th>
                <th>No</th>
                <th>FIRST HEADER</th>
                <th>SECOND HEADER</th>
                <th>THIRD HEADER</th>
                <th>FOURTH HEADER</th>
                <th>FIFTH HEADER</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                </td>
                <td>21</td>
                <td>This is Item number 1-21</td>
                <td>This is Item number 2-21</td>
                <td>This is Item number 3-21</td>
                <td>This is Item number 4-21</td>
                <td>This is Item number 5-21</td>
              </tr>
            </tbody>
          </table> --}}
          {{-- <div class="pagination">
            <label for="table_radio_3">&laquo; Previous</label>
            <label for="table_radio_0" id="table_pager_0">1</label>
            <label for="table_radio_1" id="table_pager_1">2</label>
            <label for="table_radio_2" id="table_pager_2">3</label>
            <label for="table_radio_3" id="table_pager_3">4</label>
            <label class="active" for="table_radio_4" id="table_pager_4">5</label>
            <label class="disabled" for="table_radio_5">Next &raquo;</label>
          </div> --}}
        </div>
      </div>

</body>
</html>
