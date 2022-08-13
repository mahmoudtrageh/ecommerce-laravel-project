$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
        Swal.fire({
          title: 'هل أنت متأكد؟',
          text: "حذف تلك البيانات؟",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'نعم، احذفها',
          cancelButtonText: 'الغاء'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = link
            Swal.fire(
              'تم الحذف!',
              'تم الحذف بنجاح!',
              'success'
            )
          }
        }) 


    });

  });


// Confirm 

$(function(){
    $(document).on('click','#confirm',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'هل أنت متأكد من التأكيد؟',
                    text: "بمجرد التأكيد لن تتمكن من التراجع",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم، أكد!',
                    cancelButtonText: 'الغاء'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'تأكيد!',
                        'تم التأكيد!',
                        'success'
                      )
                    }
                  }) 


    });

  });

// processing


$(function(){
    $(document).on('click','#processing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'هل أنت متأكد من المعالجة؟',
                    text: "بمجرد المعالجة لن تتمكن من التراجع!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم، متأكد!',
                    cancelButtonText: 'الغاء'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'معالجة!',
                        'تمت المعالجة!',
                        'success'
                      )
                    }
                  }) 


    });

  });

//picked


$(function(){
    $(document).on('click','#picked',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'هل أنت متأكد من الإلتقاط؟',
                    text: "بمجرد إلتقاط المنتج لن تتمكن من التراجع!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم، متأكد',
                    cancelButtonText: 'الغاء'

                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'التقاط!',
                        'تم الإلتقاط!',
                        'success'
                      )
                    }
                  }) 


    });

  });

// shipped


$(function(){
    $(document).on('click','#shipped',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'هل أنت متأكد من الشحن؟',
                    text: "بمجرد الشحن لن تتمكن من التراجع!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم، متأكد',
                    cancelButtonText: 'الغاء'

                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'شحن!',
                        'تم الشحن!',
                        'success'
                      )
                    }
                  }) 


    });

  });

  //delivered


  
$(function(){
    $(document).on('click','#delivered',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'هل أنت متأكد من التوصيل؟',
                    text: "بمجرد التوصيل لن تتمكن من التراجع!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم، متأكد!',
                    cancelButtonText: 'الغاء'

                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'توصيل!',
                        'تم التوصيل!',
                        'success'
                      )
                    }
                  }) 


    });

  });