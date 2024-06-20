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
    <style>
        .modal-ku {
            width: 750px;
            margin: auto;
        }

        .error,
        #star {
            color: red;
            font-size: 75%;
        }

        .form-control[type=file]{
            color: black;
        }

        .table td,
        .table th {
            text-align: center;

        }

        .active{
        background-color:grey;
        color:black;
        }

        
    </style>
</head>

<body>

    <br><br>

    <center>
        <div class="m-4 pb-5">

            <h1>Club Details</h1>
        </div>
    </center>
    <center>


        <table class='table border border-primary-subtle '>

            <thead>


                <tr class="table-primary">
                    <th >
                        ID
                    </th>
                    <th >
                        Group ID
                    </th>
                    <th >

                        Business Name
                    </th>
                    <th>

                        Club Number
                    </th>
                    <th>
                        Club Name
                    </th>

                    <th>
                        Club State

                    </th>
                    <th >
                        Description
                    </th>
                    <th >
                        Club Slug
                    </th>

                    <th>
                        Website Title
                    </th>

                    <th>
                        Website Link
                    </th>

                    <th>
                        Club Logo
                    </th>
                    <th>

                        Club Banner

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




        <button type="button" id="submitBtn" data-type="POST" class=" btn btn-primary fs-5 m-4"
            style="width: 300px ; height:60px" id="submitBtn" data-action="/club">Add
            Club</button><br><br>





        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <div id="page-link" class="position-absolute bottom-25 start-50 translate-middle-x d-flex justify-content-center">

                </div>
            </ul>
        </nav>



    </center>


    <div class="modal fade container-fluid " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close fs-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <h4 id="error" style="color:red"></h4>

                    <form data-action="{{ route('club.store') }}" id="submitClub" class="fs-5" method="post">

                        <input name="_method" id='method' type="hidden" value="POST">
                        @csrf


                        <div class="row">

                            <div class="col-6">


                                <div class="mb-3">
                                    <label for="title" class="form-label">Id <span id='star'>*</span></label>
                                    <input type="number" class="form-control" id="id" name="id" disabled>
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="mb-3">

                                    <label for="club-id" class="form-label">Group Id <span id='star'>*</span></label>

                                    <input type="number" class="form-control" id="groupId" name="groupId">

                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Business Name <span id='star'>*</span></label>
                            <input type="text" class="form-control" id="Bname" name="Bname">
                        </div>
                        <div class="mb-3">
                            <label for="product-title" class="form-label">Club number <span id='star'>*</span></label>
                            <input type="number" class="form-control" id="number" name="number">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Club name <span id='star'>*</span></label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Club state <span id='star'>*</span></label>
                            <input type="text" class="form-control" id="state" name="state">
                        </div>

                        <div>
                            <label for="type" class="form-label">Club description <span id='star'>*</span></label>
                            <div >
                                <textarea class="form-control"  id="desc" name="desc" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="type" class="form-label">Club slug <span id='star'>*</span></label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Website title <span id='star'>*</span></label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Website link <span id='star'>*</span></label>
                            <input type="text" class="form-control" id="link" name="link">
                        </div><br>

                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Club logo <small>(jpg,png)</small>
                                        <span id='star'>*</span></label>
                                    <input type="file" class="form-control" id="logo" name="logo">
                                </div><br>
                            </div>
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="type" class="form-label">Club banner <small>(jpg,png)</small>
                                        <span id='star'>*</span></label>
                                    <input type="file" class="form-control" id="banner" name="banner">
                                </div>
                            </div>
                        </div>

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
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>


        $(document).ready(function() {

            let page = 1;

            $('body').on('click', '.page', function(event) {

                // console.log($(this));

                page = $(this).data('page');
                // $(this).parent().closest('.li').removeClass('page-item');
                $(this).parent().closest('.li').addClass('active');

                // console.log($(this).parent().closest('.li').addClass('active'));
                fetch();

            });

            fetch();


            function fetch() {

                // $('table').addClass('table table-bordered border-primary fs-4 w-75 p-3');

                $('tbody').html("");

                $.ajax({
                    url: `club-data?page=${page}`,
                    type: "GET",
                    dataType: "json",
                    async: false,
                    success: function(response) {
                        let arr = response.data;

                        $('tbody').html("");

                    if (response[0].data.length == 0) {
                             console.log('yes');

                             $('tbody').append(

                                 `<td colspan=14>Data Not Found</td>`

                             );
                         } else {

                        $.each(response[0].data, function(key, item) {
                            // $.each(arr, function(key, item) {


                            var srcLogo = `${item.club_logo}`;
                            var srcBanner = `${item.club_banner}`;

                            $('tbody').append(
                                `<tr>
                                    <td>${item.id}</td>
                                    <td>${item.group_id}</td>
                                    <td>${item.business_name}</td>
                                    <td>${item.club_number}</td>
                                    <td>${item.club_name}</td>
                                    <td>${item.club_state}</td>
                                    <td>${item.club_description}</td>
                                    <td>${item.club_slug}</td>
                                    <td>${item.website_title}</td>
                                    <td>${item.website_link}</td>
                                    <td>
                                    
                                        <img src=${srcLogo} data-filename='' id="logo${item.id}" style='height:50px; width:50px' class='rounded-5' alt="img not found">
                                        
                                        </td>
                                    <td>
                                    
                                        <img src=${srcBanner} data-filename='' id="banner${item.id}" style='height:50px; width:100px' class='rounded-4' alt="img not found">
                                        
                                        </td>
                                    <td><button  data-id=${item.id} data-action=club/${item.id}   data-type="PUT"  id="editBtn" class="btn btn-warning">Edit</button></td>
                                    <td><button   data-id=${item.id} id="deleteBtn" class="btn btn-danger ">Delete</button></td>
                                </tr>`
                            );
                        });

                        $('#page-link').empty();

                        let a = 0;
                        $.each(response[0].links, function(key, val) {

                            

                            if (a == 0) {

                                if(page > 1)
                                {
                                    $('#page-link').append(
                                    
                                    `  <li class="page-item ">
                                            <a class="page-link page " data-page=${page-1}  aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                            </a>
                                            </li>`
                                    );  
                                }

                            } else if (a == response[0].links.length - 1) {
                                
                                if(page < response[0].links.length - 2)
                                {

                                    $('#page-link').append(
                                        `<li class="page-item">
                                            <a class="page-link page " data-page=${page+1} aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                                </a>
                                                </li>`
                                            );
                                    }

                            } else {

                                $('#page-link').append(

                                    // `<button class='page' data-page=${a} >${a}</button>`
                                    `<li class="page-item"><a class="page-link page" data-page=${a} >${a}</a></li>`
                                );
                            }


                            a++;
                        })

                    }
                },
            });
        }


            let type;
            let url;
            let formData;
            let text;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            //when use click Add Club submit button
            $('body').on('click', '#submitBtn', function(event) {

                text = "Club Added Successfully !";

                $('#method').val('POST');

                $(".error").html('');
                $(".error").removeClass("error");
                $('#exampleModal').modal('show');
                $('#submit1').html('Add');
                $('#exampleModalLabel').html('New Club');
                $('#submitClub').trigger("reset");

                url = $(this).data('action');
                type = $(this).data('type');
                $.get('/fetch-id', function(response) {

                    console.log($('#id').val(response.id));

                });

            });



            // form validation and submission

            $("#submitClub").validate(

                {

                    rules: {

                        groupId: "required",

                        Bname: {
                            required: true,
                            minlength: 5,
                        },

                        number: {
                            
                            required:true,
                            range:[1,100],
                        
                        },

                        name: {
                            required: true,
                            minlength: 5,
                        },

                        state: {
                            required: true,
                            minlength: 5,
                        },
                        desc: {
                            required: true,
                            minlength: 5,
                        },
                        slug: {
                            required: true,
                            minlength: 5,
                        },

                        title: {
                            required: true,
                            minlength: 5,
                        },

                        link: {
                            required: true,
                            url: true,
                        },

                        logo: {
                            required: true,
                            extension: "png|jpe?g",

                        },

                        banner: {
                            required: true,
                            extension: "png|jpe?g",


                        },
                    },

                    messages: {

                        groupId: {
                            required: "This field is compulsory",
                        },

                        Bname: {
                            required: "This field is compulsory",
                            minlength: "Minimum length should be greater than or equal to 5 (character)",
                        },

                        number: {
                            required: "This field is compulsory",
                            range: "Value should be greater than 0 and lessthan 100 ",
                        },

                        name: {
                            type:"The value is not integer",
                            required:"The value is required",
                            minvalue:"The value is less than 0",
                            

                        },

                        state: {
                            required: "This field is compulsory",
                            minlength: "Minimum length should be greater than or equal to 5 (character)",
                        },

                        desc: {
                            required: "This field is compulsory",
                            minlength: "Minimum length should be greater than or equal to 5 (character)",
                        },

                        slug: {
                            required: "This field is compulsory",
                            minlength: "Minimum length should be greater than or equal to 5 (character)",
                        },

                        title: {
                            required: "This field is compulsory",
                            minlength: "Minimum length should be greater than or equal to 5 (character)",
                        },
                        link: {
                            required: "This field is compulsory",
                            url: "Please enter url with http://....com or https://....com",
                        },
                        logo: {
                            required: "This field is compulsory",
                            extension: "File must be JPG or PNG",
                            
                        },
                        banner: {
                            required: "This field is compulsory",
                            extension: "File must be JPG or PNG",     
                        },
                    },

                    submitHandler: function(form) {

                        event.preventDefault();

                        formData = new FormData(form);

                        console.log("url : ", url);

                        if (type == 'PUT') {
                            text = "Club Edited Successfully";
                        } else {

                            text = "Club Added Successfully";

                        }

                        $.ajax({

                            url: url,
                            type: 'POST',
                            data: formData,
                            dataType: 'JSON',
                            cache: false,
                            contentType: false,
                            processData: false,
                            async: false,
                            success: function(response) {

                                console.log(response);

                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: text,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then((value) => {
                                    if (value) {

                                        fetch();
                                    }

                                });


                                $('#exampleModal').modal('hide');
                                $(`#banner${response[2]}`).attr('data-filename',response[0]);
                                $(`#logo${response[2]}`).attr('data-filename',response[1]);

                                console.log('data : ',$(`#logo${response[2]}`).attr('data-filename'));

                            },
                            error: function(response) {


                            }

                        });

                    }
                });



            // when user clicks on edit button
            $('body').on('click', `#editBtn`, function(event) {

                text = "Club Edited Successfully !";

                var c_id = $(this).data('id');

                $(".error").html('');
                $(".error").removeClass("error");

                $('#submit1').html('Edit');
                $('#exampleModalLabel').html('Edit Club');

                url = $(this).data('action');
                type = $(this).data('type');

                $('#method').val('PUT');


                $.get('club/' + c_id + '/edit', function(data) {

                    // console.log($(`#logo${c_id}`).attr('src'));

                    console.log($(`#logo${c_id}`));

                    $('#exampleModal').modal('show');
                    $('#id').val(c_id);
                    $('#groupId').val(data.group_id);
                    $('#name').val(data.club_name);
                    $('#Bname').val(data.business_name);
                    $('#number').val(data.club_number);
                    $('#state').val(data.club_state);
                    $('#desc').val(data.club_description);
                    $('#slug').val(data.club_slug);
                    $('#title').val(data.website_title);
                    $('#link').val(data.website_link);

                    console.log( 'data : ',$(`#logo${c_id}`).attr('data-filename'));

                    // $(`#logo${c_id}`).css('visibility','collapse');
                    $(`#logo${c_id}`).html($(`#logo${c_id}`).attr('src'));
                    $(`#banner${c_id}`).html($(`#banner${c_id}`).attr('src'));

                   

                })

            });



            $('body').on('click', '#deleteBtn', function(event) {

                var club_id = $(this).data("id");

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

                        $.ajax({
                            type: "DELETE",
                            url: "{{ url('club') }}" + '/' + club_id,
                            success: function(data) {

                                fetch();
                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }

                        });



                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Club added successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });


                    }
                })



            });
        });
    </script>


    {{-- {!! $data->render() !!} --}}


</body>

</html>
