<!-- welcome.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome') }}</div>

                    <div class="card-body">
                        <form id="my-form">
                            @csrf
                            <div class="form-group">
                                <label for="text">Type some text:</label>
                                <input type="text" class="form-control" id="text" name="text" autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Autocomplete textbox
            $('#text').autocomplete({
                source: '{{ route('autocomplete') }}',
                minLength: 1,
                select: function(event, ui) {
                    event.preventDefault();
                    $('#text').val(ui.item.value);
                }
            });

            // Submit form using AJAX
            $('#my-form').submit(function(event) {
                event.preventDefault();
                var text = $('#text').val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('save-text') }}',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'text': text
                    },
                    success: function(data) {
                        // Reload the datatable
                        table.ajax.reload();
                        // Clear the textbox
                        $('#text').val('');
                    },
                    error: function(data) {
                        console.log(data);
                        alert('Error saving text!');
                    }
                });
            });
        });
    </script>
@endsection
