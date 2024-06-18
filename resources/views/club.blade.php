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
        .error{
            color: red;
        }
    </style>
</head>

<body>

    <br><br>

    <center>
        <div>

            <h1>Club Details</h1>
        </div>
    </center>
    <center>



        <table class="table fs-4 border border-primary-subtle " style="width: 90%">

            <thead>


                <tr class="table-primary">
                    <th>
                        ID
                    </th>
                    <th>
                        Group ID
                    </th>
                    <th>

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
                    <th>
                        Description
                    </th>
                    <th>
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


        <button type="button" id="submitBtn" data-type="POST" class=" btn btn-primary fs-4 "
            style="width: 500px ; height:80px" id="submitBtn" data-action="/club">Add
            Club</button>

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
                                    <label for="title" class="form-label">Id <span>*</span></label>
                                    <input type="number" class="form-control" id="id" name="id" disabled>
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="mb-3">

                                    <label for="club-id" class="form-label">Group Id <span>*</span></label>

                                    <input type="number" class="form-control" id="groupId" name="groupId">

                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Business Name <span>*</span></label>
                            <input type="text" class="form-control" id="Bname" name="Bname">
                        </div>
                        <div class="mb-3">
                            <label for="product-title" class="form-label">Club number <span>*</span></label>
                            <input type="text" class="form-control" id="number" name="number">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Club name <span>*</span></label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Club state <span>*</span></label>
                            <input type="text" class="form-control" id="state" name="state">
                        </div>

                        <div>
                            <label for="type" class="form-label">Club description <span>*</span></label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Description here" id="desc" name="desc" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="type" class="form-label">Club slug <span>*</span></label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Website title <span>*</span></label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Website link <span>*</span></label>
                            <input type="text" class="form-control" id="link" name="link">
                        </div><br>

                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Club logo <small>(jpg,png)</small>
                                        <span>*</span></label>
                                    <input type="file" class="form-control" id="logo" name="logo">
                                </div><br>
                            </div>
                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="type" class="form-label">Club banner <small>(jpg,png)</small>
                                        <span>*</span></label>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {

            $.ajax({

                url: "/club-data",
                type: "GET",
                dataType: "json",
                async: false,
                success: function(data) {

                    let arr = data.data;
                    // console.log(arr);

                    $('tbody').html("");

                    $.each(arr, function(key, item) {

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
                                                        
                                                            <img src=${srcLogo} id="logo${item.id}" style='height:50px' class='rounded-5' alt="img not found">
                                                            
                                                            </td>
                                                        <td>
                                                        
                                                            <img src=${srcBanner} id="banner${item.id}" style='height:50px' class='rounded-5' alt="img not found">
                                                            
                                                            </td>
                                                        <td><button  data-id=${item.id} data-action=club/${item.id}   data-type="PUT"  id="editBtn" class=" btn btn-primary btn-sm">Edit</button></td>
                                                        <td><button   data-id=${item.id} id="deleteBtn" class="btn btn-danger btn-sm">Delete</button></td>
                                                    </tr>`
                        );
                    });

                },

            });

            let type;
            let url;
            let formData;
            let text;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '#submitBtn', function(event) {


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



            $("#submitClub").validate(

                {

                    rules: {

                        groupId: "required",

                        Bname: {
                            required: true,
                            minlength: 5,
                        },

                        number: {
                            required: true,
                            minlength: 5,
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
                            // accept: "jpg|jpeg|png",

                        },

                        banner: {
                            required: true,
                            // accept: "jpg|jpeg|png",


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
                            minlength: "Minimum length should be greater than or equal to 5 (character)",
                        },

                        name: {
                            required: "This field is compulsory",
                            minlength: "Minimum length should be greater than or equal to 5 (character)",
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
                            accept: "File must be JPG or PNG",
                        },
                        banner: {
                            required: "This field is compulsory",
                            accept: "File must be JPG or PNG",

                            // minlength: "Minimum length should be greater than or equal to 5 (character)",
                        },
                    },

                    submitHandler: function(form) {

                        event.preventDefault();

                        formData = new FormData(form);

                        console.log("url : ", url);

                        if(type == 'PUT')
                        {
                            text = "User Edited Successfully";
                        }
                        else{

                            text = "User Added Successfully";
                            
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

                                swal({
                                    title: text,
                                    text: "You clicked the button!",
                                    icon: "success",
                                    

                                    confirmButtonText: "<span><i class='la la-headphones'></i><span>I am game!</span></span>",
                                    confirmButtonClass: "btn btn-danger m-btn m-btn--pill m-btn--air m-btn--icon",

                                    showCancelButton: true,
                                    cancelButtonText: "<span><i class='la la-thumbs-down'></i><span>No, thanks</span></span>",
                                    cancelButtonClass: "btn btn-secondary m-btn m-btn--pill m-btn--icon"
                                }).then((value)=>{
                                        if(value)location.reload()
                                });

                            $('#exampleModal').modal('hide');

                            },
                            error: function(response) {


                            }

                        });

                    }
                });


            $('body').on('click', `#editBtn`, function(event) {

                var c_id = $(this).data('id');

                console.log(c_id);
                $('#submit1').html('Edit');
                $('#exampleModalLabel').html('Edit Club');



                url = $(this).data('action');
                type = $(this).data('type');

                $('#method').val('PUT');


                $.get('club/' + c_id + '/edit', function(data) {


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
                    // $('#logo').val(data.club_logo);
                    $('#link').val(data.website_link);
                    // $('#banner').text(data.club_banner);
                })

            });



            $('body').on('click', '#deleteBtn', function(event) {

                var club_id = $(this).data("id");

                $.ajax({
                    type: "DELETE",
                    url: "{{ url('club') }}" + '/' + club_id,
                    success: function(data) {

                        swal({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true,

                    }).then((value)=>{
                                if(value)
                                {

                                    location.reload();
                                }

                        }).then(function (result) {
                            if (result.value) {
                                swal(
                                    'Deleted!',
                                    'User is Deleted Successfully.',
                                    'success'
                                )
                                // result.dismiss can be 'cancel', 'overlay',
                                // 'close', and 'timer'
                            } else if (result.dismiss === 'cancel') {
                                swal(
                                    'Cancelled',
                                    'User is safe :)',
                                    'error',
                                )
                            }
                    })

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
