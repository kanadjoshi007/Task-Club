<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>



    <script>
        $(document).ready(function() {
            $("#submitProduct").validate(

                {

                    rules: {

                        clubId: "required",

                        title: {
                            required: true,
                            minlength: 5,
                        },

                        Ptitle: {

                            minlength: 5,
                        },

                        type: {
                            required: true,
                            minlength: 2,
                        },


                    },

                    messages: {

                        clubId: "Please enter Club id",

                        title: {
                            required: "Please enter title",
                            minlength: "Title's lenght should be greater than or equal to 5 (character)",
                        },

                        Ptitle: {

                            minlength: "Product Title's lenght should be greater than or equal to 5 (character)",
                        },
                        type: {
                            required: "Please enter type",
                            minlength: "Type's lenght should be greater than or equal to 2 (character)",
                        },
                        attr: {
                            required: "Please select product",
                        }
                    },

                    submitHandler: function(form) {

                        form.submit();
                    },

                });
        });
    </script>


    <style>
        .error,
        span {
            color: red;
        }
    </style>


</head>

<body>

    <center>

        <h1>Product Form</h1>
    </center>

    <div class="container">

        <form  action="{{ route('product.update') }}" id="submitProduct" method="post">

            {{ csrf_field() }}

    
            <div class="mb-3">
                <label for="title" class="form-label">Id <span>*</span></label>
                <input type="number" class="form-control" id="id" value={{ $id }} name="id"
                    disabled>
            </div>


            <div class="mb-3">
                <label for="title" class="form-label">Title <span>*</span></label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="mb-3">
                <label for="product-title" class="form-label">Product Title</label>
                <input type="text" class="form-control" id="Ptitle" name="Ptitle">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type <span>*</span></label>
                <input type="text" class="form-control" id="type" name="type">
            </div>


            <label for="clubs">Club <span>*</span></label>
            <div class="mb-3">
                <select name="attr" id="club" style="width: 200px; height:40px; font-size:18px">
                    <option>Select Club</option>

                    @foreach ($club as $c)
                        <option value={{ $c->id }}>{{ $c->club_name }}</option>
                    @endforeach
                </select>
            </div>
            <br>

            <br>
            <center>
                <button type="submit" id="submit" name="submit" class="btn btn-outline-dark "
                    style="width: 500px; height:50px ">Submit</button>

            </center>
            <br>


        </form>

    </div>

    </div>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#submitProduct').submit(function(event) {

                event.preventDefault();

                $.ajax({

                    type: 'PUT',
                    url: '{{ route("product.update") }}',
                    data: {
                        'id': $('input[name=id]').val(),
                        'title': $('#title').val(),
                        'Ptitle': $('#Ptitle').val(),
                        'type': $('#type').val(),
                    },
                    success: function(response){
                    alert('success')
                    },

                }).done(function(message) {

                    console.log({
                        message
                    });

                }).fail(function(message) {

                    console.log({
                        message
                    });

                });

            });
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


</body>

</html>
