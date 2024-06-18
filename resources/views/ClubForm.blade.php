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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>


    <style>
        .error,span{
            color:red;
        }
    </style>



</head>

<body>

    <center>

        <h1>Club Form</h1>
    </center>

    <div class="container">


        <form action="{{ route('club.store') }}" method="post" id="submitClub">

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Id <span>*</span></label>
                <input type="number" class="form-control" id="id" value={{ $id }} name="id" disabled>
            </div>

            <div class="mb-3">

                <label for="club-id" class="form-label">Group Id   <span>*</span></label>

                <input type="number" class="form-control" id="groupId" name="groupId">

            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Business Name   <span>*</span></label>
                <input type="text" class="form-control" id="Bname" name="Bname">
            </div>
            <div class="mb-3">
                <label for="product-title" class="form-label">Club number   <span>*</span></label>
                <input type="text" class="form-control" id="number" name="number">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Club name   <span>*</span></label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Club state   <span>*</span></label>
                <input type="text" class="form-control" id="state" name="state">
            </div>
            
            <div>
                <label for="type" class="form-label">Club description   <span>*</span></label>
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Description here" id="desc" name="desc" style="height: 100px"></textarea>
                </div>
            </div>
            <br>
            <div class="mb-3">
                <label for="type" class="form-label">Club slug   <span>*</span></label>
                <input type="text" class="form-control" id="slug" name="slug">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Website title   <span>*</span></label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Website link   <span>*</span></label>
                <input type="text" class="form-control" id="link" name="link">
            </div><br>
            <div class="mb-3">
                <label for="type" class="form-label">Club logo  <small>(jpg,png)</small>   <span>*</span></label>
                <input type="file" class="form-control" id="logo" name="logo">
            </div><br>
            <div class="mb-3">
                <label for="type" class="form-label">Club banner  <small>(jpg,png)</small>   <span>*</span></label>
                <input type="file" class="form-control" id="banner" name="banner">
            </div>

            <br>
            <center>
                <button type="submit" id="submit" class="btn btn-outline-dark " style="width: 500px; height:50px " >Submit</button>

            </center>
            <br>

        </form>

    </div>

    


    <script>

$.validator.addMethod('filesize', function(value, element, param) {
  return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0} bytes');

        $(document).ready(function() {
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
                        url:true,
                    },

                    logo: {
                        required: true,
                        accept: "png|jpg",
                        filesize: 5242880,
                    },

                    banner: {
                        required: true,
                        accept: "png|jpg",
                        filesize: 5242880,
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
                        minlength: "Minimum length should be greater than or equal to 5 (character)",
                    },
                },

                submitHandler: function (form) {

                    form.submit();
                    },

            });
    
        });
    </script>


</body>

</html>
