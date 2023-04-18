<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous" />

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .content {
            margin-top: 100px;
            text-align: center;
        }
        .message{
            color: green;
            text-align: center;
            font-size: 30px;
            font-weight: bold
        }
        .trans{
            display: block;
            text-align: center;
            color: blue;
            border: 1px solid blue;
            width: 10rem;
            margin: auto;
            margin-top:3rem;
            cursor: pointer;

        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
       {{-- @if(isset($data))
        @if($data=='canceld')
<p>you are cancelled this payment</p>
@else
<p> are cancelled this payment</p>

@endif --}}
@if (isset($data))
<p class="message">
@switch($data )
    @case('success')
        your payment has been successfully
        @break
        @case('canceld')
        you are cancelled this payment
        @break
        @case('try_again')
        no payment please try again
        @break
    {{-- @default
        error --}}
@endswitch

    {{-- your {{ $data }} this payment --}}


</p>
@if (isset($request))
{{ dd($request ) }}
@endif
    {{-- {{$data=='canceld'?'you are cancelled this payment':'your payment has been successfully' }} --}}
{{-- @elseif (count($records) > 1)
    I have multiple records! --}}
@endif
        <div class="content">
            <h1>PayPal</h1>

            <table border="0" cellpadding="10" cellspacing="0" align="center">
                <tr>
                    <td align="center"></td>
                </tr>
                <tr>
                    <td align="center"><a href="https://www.paypal.com/in/webapps/mpp/paypal-popup"
                            title="How PayPal Works"
                            onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img
                                src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0"
                                alt="PayPal Logo"></a></td>
                </tr>
            </table>

            <a href="{{ route('payment') }}" class="btn btn-success">Pay $100 from Paypal</a>

        </div>
    </div>
    <a class="trans" href="{{ route('showPaymentTransaction') }}">show all transactions</a>
    <a class="trans" href="{{ route('return.transactions') }}">show all transactions data table</a>
    <script>
        document.body.addEventListener('click', ()=>{

            setInterval(() => {
            document.querySelector('.message').innerHTML=''
            }, 1000);

        })
    </script>
</body>

</html>
