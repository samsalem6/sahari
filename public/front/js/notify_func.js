 $(function() {
     setTimeout(function() {
         $.notify({
             // options
            //  icon: '',
             title: "<h5>Powered by</h5>",
             message: "<img style=\"width:50px \" src=\"images/mt.png\"><h3>Memphis Tours "
         }, {
             // settings
             icon_type: 'image',
             type: 'info',
             delay: 100,
             timer: 3000,
             z_index: 9999,
             showProgressbar: false,
             placement: {
                 from: "bottom",
                 align: "left"
             },
             animate: {
                 enter: 'animated bounceInUp',
                 exit: 'animated bounceOutDown'
             },
         });
     }, 1000); // change the start delay
 });