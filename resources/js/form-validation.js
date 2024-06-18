$(function() {
  
    $("form[name='submitClub']").validate({
  
        rules: {
   
            clubId: "required",
            
            title: {
                required: true,
                minlength: 5
            },

            Ptitle:{
                required: true,
                minlength: 5
            },
                
            type: {
                required: true,
                minlength: 2
            }
      },
      //  error messages
      messages: {
            
            clubId: "Please enter Club id",
          
            title:
            {
                required: "Please enter title",
                minlength:"Title's lenght should be greater than or equal to 5 (character)",
            },

            Ptitle:   {
                required: "Please enter Product title",
                minlength:"Product Title's lenght should be greater than or equal to 5 (character)",
            },
            type:{
                required: "Please enter type",
                minlength:"Type's lenght should be greater than or equal to 2 (character)",
            },
      },
    
      submitHandler: function(form) {
        form.submit();
      }
    });
  });