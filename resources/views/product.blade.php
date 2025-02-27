<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
   

       span{
            color:red;
        }
    </style>
</style>

<body>

    <center>
        <div class="p-5">

            <h1>Product Details</h1>
        </div>
    </center>
    <br><br><br>
    <center>



        <table class="table fs-4 border border-primary-subtle " style="width: 75%">

            <thead>

                <tr class="table-primary">
                    <th>
                        ID
                    </th>

                    <th>
                        club Id
                    </th>
                    <th>

                        title
                    </th>
                    <th>

                        Ptitle
                    </th>
                    <th>
                        type

                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>

                </tr>

            </thead>

            <tbody>

            </tbody>

        </table>
    </center>

    <center>
        <br>
        <br>
        <button type="button" id="submitBtn" data-type="POST" class=" btn btn-primary fs-4 "
            style="width: 500px ; height:80px" id="submitBtn" data-action="/product" data-bs-dismiss="model">Add
            Product</button>

    </center>


    <div class="modal fade container-fluid" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">New Product</h1>
                    <button type="button" class="btn-close fs-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <h4 id="error" style="color:red"></h4>

                    <form data-action="{{ route('product.store') }}" id="submitProduct" class="fs-5" method="post">
                        <input name="_method" id='method' type="hidden" value="POST">
                        @csrf

                        <div class="mb-3 fs-5">
                            <label for="title" class="form-label ">Id <span>*</span></label>
                            <input type="number" class="form-control " id="id" name="id" disabled>
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
                                <option value="0" for='default' id="default"> Select Club</option>

                            </select>
                        </div>
                        <br>

                        <br>

                        <div class="modal-footer">
                            <button type="button" name="submit" class="btn btn-secondary fs-5 "
                                data-bs-dismiss="modal">Close</button>


                            <button type="submit" id='submit1' name="submit"
                                class="btn btn-primary fs-5">Add</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {


            function fetchClub() {

                $.get('fetchClub', function(response) {

                    $('#club').empty();
                    $('#club').append('<option value=0> Select Club</option>')

                    $.each(response, function(key, value) {

                        $('#club').append(
                            `
                                <option value=${value.id}> ${value.club_name}</option>
                            `
                        );
                    });
                });

            }


            $.ajax({

                url: '/product/create',
                method: 'GET',
                success: function(response) {

                    console.log(response);

                    $.each(response, function(key, value) {

                        $('tbody').append(
                            `<tr>
                                <td>${value.id}</td>
                                <td>${value.club_id}</td>
                                <td>${value.title}</td>
                                <td>${value.product_title}</td>
                                <td>${value.type}</td>
                                <td><button class="btn btn-warning"  data-id=${value.id} data-type='PUT' id="editBtn">Edit </button></td>
                                <td><button class="btn btn-danger"  data-id=${value.id} id="deleteBtn">Delete </button></td>
                        
                                </tr>
                                `
                        );
                    })
                },
                error: function(response) {

                    console.log(response);
                    $.each(response.responseJSON.errors, function(key, value) {
                        $('#error').append(value + '<br>');
                    });


                },
            });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#submitBtn', function(event) {


                $('#submitProduct').trigger('reset');
                $('#exampleModal').modal('show');

                $('#club').empty();



                url = $(this).data('action');

                type = $(this).data('type');


                // $('#club').append(
                //     `<option > Select Club</option>`
                // );


                $.get('/fetchId', function(response) {

                    $('#id').val(response.id);

                });

                fetchClub();

            });


            $('#submitProduct').on('submit', function(event) {

                event.preventDefault();


                if (type == "PUT") {

                    url = "product/" + $('#editBtn').data('id');

                }

                console.log(type);

                formData = new FormData(this);

                $.ajax({

                    url: url,
                    type: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        location.reload();

                    },
                    error: function(response) {
                        $('#error').empty();
                        console.log(response);
                        $.each(response.responseJSON.errors, function(key, value) {
                            $('#error').append(value + '<br>');
                        });


                    }

                });
            });

            $('body').on('click', '#editBtn', function(event) {


                var p_id = $(this).data('id');

                url = $(this).data('action');

                type = $(this).data('type');

                $('#exampleModal').modal('show');

                $('#method').val('PUT');

                $.get('/fetchClub', function(response) {
                    
                    // console.log('response : ',response.length);
                    if(response.length == 0)
                    {
                        $('#club').append(

                            `<option >No Club</option>`

                            );

                        

                    }

                    $.each(response, function(key, value) {

                        $('#club').append(

                            `<option value=${value.id}>${value.club_name}</option>`

                        );

                    });
                    console.log($('#club'));

                });


                $.get('product/' + p_id + '/edit', function(data) {



                    $('#exampleModal').modal('show');
                    $('#id').val(data.id);
                    $('#club').val(data.club_id);
                    $('#title').val(data.title);
                    $('#Ptitle').val(data.product_title);
                    $('#type').val(data.type);
                });



            });



            $('body').on('click', '#deleteBtn', function(event) {

                var post_id = $(this).data("id");

                $.ajax({
                    type: "DELETE",
                    url: "{{ url('product') }}" + '/' + post_id,
                    success: function(data) {

                        location.reload();


                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }


                });
            });
        });
    </script>


</body>

</html>
