@extends('layout.app')
@section("content")

<a class="trans" href="{{ route('showPaymentTransaction') }}">show all transactions</a> <br>
<a class="trans" href="{{ route('return.transactions') }}">show all transactions data table</a> <br>
<a class="trans" href="{{ route('payment.go') }}">payment</a>


@endsection
