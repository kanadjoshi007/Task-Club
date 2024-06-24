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

        
    body{

        background-color: #F2F0EF;


    }

    .table th{
        background-color: #F2F0EF;
        /* color: white; */

    }

    .table td{
        /* background-color: #2D82B5;
        
        color: white */

    }

.modal-ku {
            width: 750px;
            margin: auto;
        }

        .error,
        #star {
            color: red;
            font-size: 75%;
        }

        .form-control[type=file] {
            color: black;
        }

        table {
            border-collapse: separate;
            border-spacing: 0 1em;
        }

        .table td,
        .table th {
            text-align: center;

        }

        .active {
            background-color: grey;
            color: black;
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

        <div class="container p-4" style="width:60%">

            <div class=" row d-flex p-2 shadow-lg p-3 mb-5 bg-body rounded m-3 " >
                {{-- <div >
                    <button class="btn btn-outline-primary p-2 m-2" id="back" type="button" style='visibility: hidden'>Back</button>
                </div> --}}
                <div class="col-6 ">
                    <input class="form-control p-2 m-2 w-auto border border-4" id='bar' type="search" placeholder="Search"
                        aria-label="Search">

                </div>
                <div class="col-6 ">
                    <button type="button" id="submitBtn" data-type="POST" class="btn btn-lg btn-secondary fs-3 w-25"
                     id="submitBtn" style="width: 300px ; height:60px"  data-action="/club"><i class="bi bi-database-fill-add"></i></button><br><br>

                </div>

        
        

                {{-- <button class="btn btn-outline-primary p-2 m-2" type="submit">Search</button> --}}
            </div>
        </div>


	

        <table class='table' style="width: 80%">

            <thead class="shadow-lg p-3  bg-body rounded m-3 mb-5 "  >
                <tr  style="background-color: #2C6975"  >
                    <th >
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
            <tbody class="align-middle">

            </tbody>


        </table>




        <nav aria-label="Page navigation example" class="mb-5">
            <ul class="pagination">
                <div id="page-link"
                    class="position-absolute bottom-25 start-50 translate-middle-x d-flex justify-content-center" >

                </div>
            </ul>
        </nav>

<br><br><br>

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

                    <form data-action="{{ route('club.store') }}" id="submitClub" name="submitClub" class="fs-5" method="post">

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

                                    <label for="club-id" class="form-label">Group Id <span
                                            id='star'>*</span></label>

                                    <input type="number" class="form-control" id="groupId" name="groupId">

                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="title" class="form-label">Business Name <span id='star'>*</span></label>
                            <input type="text" class="form-control" id="Bname" name="Bname">
                        </div>
                        <div class="mb-3">
                            <label for="product-title" class="form-label">Club number <span
                                    id='star'>*</span></label>
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
                            <label for="type" class="form-label">Club description <span
                                    id='star'>*</span></label>
                            <div>
                                <textarea class="form-control" id="desc" name="desc" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="type" class="form-label">Club slug <span id='star'>*</span></label>
                            <input type="text" class="form-control" id="slug" name="slug">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Website title <span
                                    id='star'>*</span></label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Website link <span
                                    id='star'>*</span></label>
                            <input type="text" class="form-control" id="link" name="link">
                        </div><br>

                        <div class="row">

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label">Club logo <small>(jpg,png)</small>
                                        <span id='star'>*</span></label>
                                    <input type="file" class="form-control" data-prev='#logo-prev' onchange="showPreview(this)" id="logo" name="logo">
                                </div>
                                <div id="logo-img" class='img' >

                                </div>
                            </div>

                            <div class="col-6">

                                <div class="mb-3">
                                    <label for="type" class="form-label">Club banner <small>(jpg,png)</small>
                                        <span id='star'>*</span></label>
                                    <input type="file" class="form-control" id="banner" data-prev='#banner-prev' onchange="showPreview(this)" name="banner">
                                </div>
                                <div id="banner-img" class='img' >

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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js">
   
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function showPreview (element) {

            
            var file = element.files[0];
            
            var fr = new FileReader();
            
          
            let setImg = $(`#${element.id}`).data('prev');
            
            if (file) {
                
                fr.readAsDataURL(file);

                console.log(fr);

            }

            $.ajax({

                url:fr.result,
                type:'GET',
                success:function(response){
                
                    $(setImg).attr('src',fr.result);
                }
            })

           
        }
    </script>



    <script>
        $(document).ready(function() {

            let page = 1;

            $('body').on('click', '.page', function(event) {

                page = $(this).data('page');

                console.log($(this));

                $(this).css({"backgroundColor":"black","color":"white"});
                fetch();

            });

            fetch();

            // when user search any product
            $('body').on('input', '#bar', function(event) {

                event.preventDefault();


                let data = $('#bar').val();

                $.ajax({


                    url: `club/${data}`,
                    method: 'GET',

                    success: function(response) {

                        $('#back').css('visibility', 'visible');

                        let a = 0;
                       

                        if(event.originalEvent.data != null){
                            
                            response[0].links.forEach(element => {



                            if (a == 0 || a == response[0].links.length - 1) {

                            } else {

                                fetch(`club/${data}?page=${element.label}`);
                            }

                            a++;
                        });
                        }
                        else{
                            fetch();
                        }

                    },


                });

            });



            // $('body').on('click', '#back', function() {

            //     $('#bar').val('');
            //     fetch();

            // })


            function fetch(url = null) {


                if (url == null) {
                    url = `club/create?page=${page}`;
                }

                $('tbody').html("");

                $.ajax({
                    url: url,
                    type: "GET",

                    success: function(response) {
                        let arr = response[0].data;

                        // console.log("response : ",response[0].data)

                        $('tbody').html("");

                        if (arr.length == 0) {
                            //  console.log('yes');

                            $('tbody').append(

                                `<td colspan=14>Data Not Found</td>`

                            );
                        } else {

                            $.each(arr, function(key, item) {
                                // $.each(arr, function(key, item) {


                                var srcLogo = `${item.club_logo}`;
                                var srcBanner = `${item.club_banner}`;

                                $('tbody').append(
                                    `<tr class='shadow-lg p-3  bg-body rounded m-3'>
                                    <td class='align-middle' >
                                        <div class='rounded-circle border border-dark d-flex align-items-center justify-content-center ' style='height:50px;width:50px; background-color:black; color:white'>
                                            ${item.id}
                                        </div>
                                    </td>
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
                                    
                                        <img src=${srcLogo} data-filename='' id="logo${item.id}" style='height:50px; width:50px' class='rounded-5 shadow-2-strong' alt="img not found">
                                        </td>
                                    <td>
                                        <img src=${srcBanner} data-filename='' id="banner${item.id}" style='height:50px; width:100px' class='rounded-4 .shadow-2-strong' alt="img not found">    
                                    </td>
                                    <td><button  data-id=${item.id} data-action=club/${item.id}   data-type="PUT"  id="editBtn" class="btn btn-lg btn-warning"><i class="bi bi-pen-fill"></i></button></td>
                                    <td><button   data-id=${item.id} id="deleteBtn" class="btn btn-lg btn-danger"><i class="bi bi-trash-fill"></i></button></td>
                                </tr>`
                                );
                            });

                            $('#page-link').empty();

                            let a = 0;
                            $.each(response[0].links, function(key, val) {

                                if (a == 0) {

                                    if (page > 1) {
                                        $('#page-link').append(

                                            `  <li class="page-item ">
                                            <a class="page-link page " data-page=${page-1}  aria-label="Previous" style="color: black">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                            </a>
                                            </li>`
                                        );
                                    }

                                } else if (a == response[0].links.length - 1) {

                                    if (page < response[0].links.length - 2) {

                                        $('#page-link').append(
                                            `<li class="page-item">
                                            <a class="page-link page " data-page=${page+1} aria-label="Next" style="color: black">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                                </a>
                                                </li>`
                                        );
                                    }

                                } else {

                                    $('#page-link').append(

                                        // `<button class='page' data-page=${a} >${a}</button>`
                                        `<li class="page-item"><a class="page-link page" data-page=${a} style="color: black" >${a}</a></li>`
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
                $(`#logo-img`).empty();
                $(`#banner-img`).empty();

                $('#logo').rules('add',{required:true, extension: "png|jpg|jpeg",});
                $('#banner').rules('add',{required:true,extension: "png|jpg|jpeg",});


                url = $(this).data('action');
                type = $(this).data('type');
                let id;
                $.get('/fetch-id', function(response) {

                    id = response.id;

                    console.log($('#id').val(id));

                });

                let logo = $(`#logo${id}`);
                let banner = $(`#banner${id}`);


                $(`#banner-img`).append(
                    `
                        <img id=banner-prev  alt='Please Select An Image !'  class='rounded-3 border border-dark border-2' style='height:100px; width:100px'>
                    `
                );
                $(`#logo-img`).css('visibility', 'visible').append(
                    `
                        <img id=logo-prev alt='Please Select An Image !'  class='rounded-3 border border-dark border-2' style='height:100px; width:100px'>
                    `
                );

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

                            required: true,
                            range: [1, 1000000],

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
                            // required: true,
                            // extension: "png|jpe?g",

                        },

                        banner: {
                            // required: true,
                            // extension: "png|jpe?g",


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
                            range: "Value should be greater than 0 and lessthan 1000000 ",
                        },

                        name: {
                            type: "The value is not integer",
                            required: "The value is required",
                            minvalue: "The value is less than 0",
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


                        // console.log("url : ", url);

                        if (type == 'PUT') {
                            text = "Club Edited Successfully";


                            $('#logo').rules( 'remove');
                            $('#banner').rules( 'remove');


                        } else {

                            text = "Club Added Successfully";
                    //         $('#logo').rules('add',{required:true});
                    // $('#banner').rules('add',{required:true});
                    
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

                                // console.log(response);

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


                                // console.log("filename: ",document.getElementById(`#banner${response[2]}`).src);

                                // document.getElementById(`#banner${response[2]}`).setAttribute('data-filename',response[0]);
                                // document.getElementById(`#logo${response[2]}`).setAttribute('data-filename',response[1]);

                                $(`#logo${response[2]}`).attr('data-filename', $(
                                    `#logo${response[2]}`).attr('src'));
                                $(`#banner${response[2]}`).attr('data-filename', $(
                                    `#banner${response[2]}`).attr('src'));

                                // console.log("filename: ",$(`#banner${response[2]}`).text());

                                // console.log('data : ',$(`#logo${response[2]}`).attr('data-filename'));

                            },
                            error: function(response) {


                            }

                        });

                    }
                });



            // when user clicks on edit button
            $('body').on('click', `#editBtn`, function(event) {

                // console.log(event);

                text = "Club Edited Successfully !";

                var c_id = $(this).data('id');

                $(".error").html('');
                $(".error").removeClass("error");

                $('#submit1').html('Edit');
                $('#exampleModalLabel').html('Edit Club');

                url = $(this).data('action');
                type = $(this).data('type');

                $('#method').val('PUT');

                $('#logo').rules('add',{required:false,extension: "png|jpg|jpeg",});
                $('#banner').rules('add',{required:false,extension: "png|jpg|jpeg",});


                $.get('club/' + c_id + '/edit', function(data) {

                    // console.log($(`#logo${c_id}`).attr('src'));

                    // console.log($(`#logo${c_id}`));

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


                    // console.log( 'data : ',$(`#logo${c_id}`).attr('data-filename'));

                    // $(`#logo${c_id}`).css('visibility','collapse');
                    // $(`#logo${c_id}`).html($(`#logo${c_id}`).attr('src'));
                    // $(`#banner${c_id}`).html($(`#banner${c_id}`).attr('src'));

                    // document.getElementById(`#logo${c_id}`).textContent = $(`#logo${c_id}`).attr('src'); 

                });

                $('.img').empty();

                let logo = $(`#logo${c_id}`);
                let banner = $(`#banner${c_id}`);



                $(`#banner-img`).append(
                    `
                        <img id=banner-prev src=${banner.attr('src')}   class='rounded-3 border border-dark border-2' style='height:100px; width:100px'>
                    `
                );
                $(`#logo-img`).css('visibility', 'visible').append(
                    `
                        <img id=logo-prev src=${logo.attr('src')}  class='rounded-3 border border-dark border-2' style='height:100px; width:100px'>
                    `
                );


                // console.log(logoPrev);

               
                // $('#logo').on('change',function(){

                //     let logoPrev = document.getElementById(`logo-prev${c_id}`);

                //     console.log(this.value);

                //     logoPrev.src=this.value;

                // })


                


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
