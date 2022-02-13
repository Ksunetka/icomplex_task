<!doctype html>
<html lang=ru>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css" integrity="sha512-1fPmaHba3v4A7PaUsComSM4TBsrrRGs+/fv0vrzafQ+Rw+siILTiJa0NtFfvGeyY5E182SDTaF5PqP+XOHgJag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h1 class="text-center">@yield('title')</h1>
            @yield('content')
    </div>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {

            fetchMessage();

            function fetchMessage()
            {
                $.ajax({
                    type: "GET",
                    url: "{{ route('fetch.messages') }}",
                    dataType: "json",
                    success: function (response) {
                        $('#message-list').html("");
                        document.getElementById('count-message').innerHTML = response.count;
                        $.each(response.messages, function (key, item){
                            $('#message-list').prepend('<div class="card mb-3" id="card-message-'+item.id+'">\
                                <div class="card-header">\
                                    Сообщение:\
                                </div>\
                                <div class="card-body">\
                                    <h5 class="card-title">'+item.name+'</h5>\
                                    <p class="card-text">'+item.message+'</p>\
                                    <p class="card-text"><small class="text-muted">'+item.created_at+'</small></p>\
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">\
                                        <button href="javascript:void(0)" type="button" class="delete-message btn btn-danger" data-id="'+item.id+'">\
                                            <i class="bi bi-trash"></i>\
                                        </button>\
                                    </div>\
                                </div>\
                            </div>');
                        });
                    }
                });
            }

            $(document).on('click', '.delete-message',function (event) {
                event.preventDefault();
                var id = $(this).data('id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('delete.message') }}",
                    data: { id: id },
                    success: function (message) {
                        $('.delete-toast').toast('show');
                        $('#delete-message').text(message.success);
                        fetchMessage();
                    }
                })

            })

            $(document).on('submit', function(event) {
                event.preventDefault();

                var data = {
                    'name': $('#name').val(),
                    'message': $('#message').val(),
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('store.message') }}",
                    type: "POST",
                    data: data,
                    dataType: "json",
                    success:function(data){
                        if (data) {
                            $('.success-toast').toast('show');
                            $('#success-message').text(data.success);
                            $("#add-message-form")[0].reset();
                            fetchMessage();
                        }
                    },
                    error: function(data) {
                        $('#name-error').text(data.responseJSON.errors.name);
                        $('#message-error').text(data.responseJSON.errors.message);
                    }
                });
            });
        });
    </script>

</body>
</html>
