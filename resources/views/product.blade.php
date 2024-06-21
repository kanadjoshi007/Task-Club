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
    .error,
    #star {
        color: red;
        font-size: 75%;
    }




    .table td,
    .table th {
        text-align: center;
    }
</style>
</style>

<body>

    <center>
        <div class="p-5">

            <h1>Product Details</h1>
        </div>
    </center>
    <br><br>
    <center>

        <div class=" p-4" style="width:75%">

            <form class="d-flex p-2" id='search'>
                <input class="form-control p-2 m-2 w-auto" id='bar' type="search" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-primary p-2 m-2" type="submit">Search</button>
            </form>
        </div>

        <table class="table border border-primary-subtle pt-4 " style="width: 75%">

            <thead>

                <tr class="table-primary">
                    <th>
                        ID
                    </th>

                    <th>
                        club (Id-Name)
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
                    <th>
                        Discount
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
            style="width: 300px ; height:60px" id="submitBtn" data-action="/product" data-bs-dismiss="model">Add
            Product</button>

    </center>


    <nav aria-label="Page navigation example" class="p-5">
        <ul class="pagination">
            <div id="page-link"
                class="position-absolute bottom-25 start-50 translate-middle-x d-flex justify-content-center">

            </div>
        </ul>
    </nav>



          {{-- modal for discount --}}
          <div class="modal fade modal-lg" id="discountModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Discount On <span id="discount-title"></span></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="discount">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Understood</button>
                </div>
              </div>
            </div>
          </div>



    <div class="modal fade container-fluid" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close fs-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div id="error" class="d-none alert alert-danger" role="alert">
                        A simple danger alert—check it out!
                    </div>

                    <form data-action="{{ route('product.store') }}" id="submitProduct" class="fs-5" method="post">
                        <input name="_method" id='method' type="hidden" value="POST">
                        @csrf

                        <div class="mb-3 fs-5">
                            <label for="title" class="form-label ">Id <span id='#star'>*</span></label>
                            <input type="number" class="form-control " id="id" name="id" disabled>
                        </div>


                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span id='#star'>*</span></label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                        <div class="mb-3">
                            <label for="product-title" class="form-label">Product Title</label>
                            <input type="text" class="form-control" id="Ptitle" name="Ptitle">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Type <span id='#star'>*</span></label>
                            <input type="text" class="form-control" id="type" name="type">
                        </div>


                        <label for="clubs">Club <span id='#star'>*</span></label>
                        <div class="mb-3 " id=attr>
                            <select name="attr" id="club" style="width: 200px; height:40px; font-size:18px">

                            </select>
                        </div>
                        <br>

                        <br>

                        <div class="modal-footer">
                            <button type="button" name="submit" class="btn btn-secondary fs-5 "
                                data-bs-dismiss="modal">Close</button>


                            <button type="submit" id='submit1' name="submit"
                                class="btn btn-primary fs-5"></button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $(document).ready(function() {


            let text;
            let url;
            let data;
            //data of club is fetched
            function fetchClub() {

                $.get('/fetchClub', function(response) {


                    console.log(response);


                    $('#club').empty();
                    $('#club').append(

                        `<option value="0" for='default' id="default"> Select Club</option>`
                    )
                    $.each(response, function(key, value) {


                        $('#club').append(

                            `<option value=${value.id}>${value.club_name}</option>`
                        );
                    });

                });

            }

            let page = 1;

            fetch();

            // events on page number
            $('body').on('click', '.page', function() {

                page = $(this).data('page');

                fetch();
            });


            // when user search any product
            $('body').on('submit', '#search', function(event) {

                event.preventDefault();

                let data = $('#bar').val();

                $.ajax({
                    url: `product/${data}`,
                    method: 'GET',

                    success: function(response) {

                        console.log(response);

                        let a = 0;

                        response.links.forEach(element => {


                            if (a == 0 || a == response.links.length - 1) {} else {

                                fetch(`product/${data}?page=${element.label}`);
                            }

                            a++;
                        });
                    },
                });
            });



            //page vise data is fetched
            function fetch(url = null) {

                if (url == null) {
                    url = `product/create?page=${page}`;
                }

                console.log(url);
                $.ajax({

                    url: url,
                    method: 'GET',
                   
                    success: function(response) {

                        $('tbody').html("");

                        if (response.data.length == 0) {

                            $('tbody').append(

                                `<td colspan=8>Data Not Found</td>`

                            );
                        } else {

                            $.each(response.data, function(key, value) {

                                $('tbody').append(
                                    `<tr>
                                <td>${value.id}</td>
                                <td>${value.club_id}</td>
                                <td>${value.title}</td>
                                <td>${value.product_title}</td>
                                <td>${value.type}</td>
                                <td><button class="btn btn-warning"  data-id=${value.id} data-type='PUT' id="editBtn">Edit </button></td>
                                <td><button class="btn btn-danger"  data-id=${value.id} id="deleteBtn">Delete </button></td>
                                <td><button id="discountBtn" class="btn btn-primary" data-id=${value.id}  >Discount</button></td>
                                </tr>
                                `

                                );
                            })
                        }

                        $('#page-link').empty();

                        let a = 0;
                        $.each(response.links, function(key, val) {

                            if (a == 0) {

                                if (page > 1) {
                                    $('#page-link').append(

                                        `  <li class="page-item ">
                                            <a class="page-link page" data-page=${page-1}  aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                            </a>
                                            </li>`
                                    );
                                }

                            } else if (a == response.links.length - 1) {

                                if (page < response.links.length - 2) {

                                    $('#page-link').append(
                                        `<li class="page-item">
                                            <a class="page-link page" data-page=${page+1} aria-label="Next">
                                                <span class="sr-only">Next</span>
                                                <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>`
                                    );
                                }

                            } else {

                                $('#page-link').append(

                                    `<li class="page-item"><a class="page-link page" data-page=${a} >${a}</a></li>`
                                );
                            }


                            a++;
                        })

                    },
                    error: function(response) {

                        $.each(response.responseJSON.errors, function(key, value) {
                            $('#error').append(value + '<br>');
                        });

                    },
                });

            }




            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            //when user click on add product button
            $('body').on('click', '#submitBtn', function(event) {

                text = "Product Added Successfully";

                $('#exampleModalLabel').html('New Product');
                $('#submit1').html('Add');
                $('#method').val('POST');
                $('#submitProduct').trigger('reset');
                $('.err').empty();

                $('#exampleModal').modal('show');
                $('#club').empty();

                url = $(this).data('action');

                type = $(this).data('type');


                $.get('/fetchId', function(response) {

                    $('#id').val(response.id);

                });

                fetchClub();

            });


            //when user submits the form
            $('#submitProduct').on('submit', function(event) {

                event.preventDefault();


                if (type == "PUT") {

                    url = "product/" + $('#editBtn').data('id');
                    text = "Product Edited Successfully";

                } else {
                    text = "Product Added Successfully";
                }


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

                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: text,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        fetch();

                        $('#exampleModal').modal('hide');

                    },
                    error: function(response) {

                        $('.err').empty();


                        let error = response.responseJSON.errors;


                        $.each(error, function(key, value) {




                            $(`#${key}`).after(
                                `<small class='err'>${value[0]}</small>`);
                            // $('#error').append(value + '<br>');

                        });



                        // $.each(response.responseJSON.errors, function(key, value) {
                        //     $('#error').append(value + '<br>');
                        // });


                    },


                });
            });

            $('body').on('click', '#editBtn', function(event) {


                text = "Product Edited Successfully";

                var p_id = $(this).data('id');

                url = $(this).data('action');

                type = $(this).data('type');

                $('#exampleModalLabel').html('Edit Product');
                $('#submit1').html('Edit');
                $('#submitProduct').trigger('reset');
                $('.err').empty();
                $('#exampleModal').modal('show');
                $('#method').val('PUT');

                fetchClub();

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

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Product Deleted Successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('product') }}" + '/' + post_id,
                            success: function(data) {

                                fetch();

                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }



                        });

                    }
                });


            });


            $('body').on('click','#discountBtn',function(event){

                
                let id = $(this).data('id');
                
                $.get('discount/'+ id, function(data) {
                    
                    $('#discountModal').modal('show');

                    console.log(data);

                    $('#discount').empty();

                    let a = 3;
                    $.each(data,function(key,value){
                        
                        $('#discount-title').html(value.products.title)

                        $('#discount').append( `${value.percentage}% off on orders above ${value.min_amount}, expired within ${a} months of product creation date <br>`)
                        a--;
                    })



                    
                });


               


            });

        });
    </script>


</body>

</html>
