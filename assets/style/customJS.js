// Scrolling Navbar
// $(document).ready(function(){
//     $('.navbar').removeClass('scrolled');
//     $(window).scroll(function(){
//         if($(this).scrollTop() > 10){
//             $('.navbar').addClass('scrolled');
//         }else{
//             $('.navbar').removeClass('scrolled');
//         }
//     });
// });

// Show Password Login
function showPassword(x) {
    var pass = document.getElementById('inputPassword');
    if (pass.type === "password") {
        pass.type = "text";
        x.classList.toggle("fa-eye");
    } else {
        pass.type = "password";
        x.classList.toggle("fa-eye-slash");
    }
}




// SIGNUP-SHOW PHOTOS WHEN UPLOAD
function showImageTTD(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgTTD')
                .attr('src', e.target.result);
            $('#imgTTD')
                .attr('style', 'width: 150px; height: 150px');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function showImageProfil(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgProfil')
                .attr('src', e.target.result);
            $('#imgProfil')
                .attr('style', 'width: 150px; height: 150px');
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    // Multiple images preview in browser
    var imagesPreview = function (input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function (event) {
                    $($.parseHTML('<img>'))
                        .attr('src', event.target.result).appendTo(placeToInsertImagePreview)
                        .attr('style', 'width: 150px; height: 150px;');
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#porto').on('change', function () {
        imagesPreview(this, 'div.gallery');
    });
});

$(function () {
    // Multiple images preview in browser
    var imagesPreview = function (input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function (event) {
                    $($.parseHTML('<img>'))
                        .attr('src', event.target.result).appendTo(placeToInsertImagePreview)
                        .attr('style', 'width: 150px; height: 150px;');
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#addPorto').on('change', function () {
        imagesPreview(this, 'div.gallery');
    });
});

// SIGNUP-MULTISELECT KATEGORI
$(document).ready(function () {
    $('#select-kategori').multiselect({
        nonSelectedText: 'Pilih Kategori...',
    });
});


// format input harga
$(document).ready(function () {
    $('.harga').mask('000.000.000', { reverse: true });
})


// DATABASE
// cek email exist
$(document).ready(function () {
    $('#email').change(function () {
        var email = $('#email').val();
        if (email != '') {
            $.ajax({
                url: "checkEmail",
                method: "POST",
                data: { email: email },
                success: function (data) {
                    $('#email_result').html(data);
                }
            });
        }
    });
})


$(document).ready(function () {
    $("#submitProfil").hide();
    $("#editProfil").on("change", function () {
        $("#submitProfil").show();
    })
});

$(document).ready(function () {
    $("#submitPorto").hide();
    $("#addPorto").on("change", function () {
        $("#submitPorto").show();
    })
});

$(document).ready(function () {
    var date_input = $('input[name="date"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'dd-mm-yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
    })
})

$(function(){
    $(".datepicker").datepicker({
       format: 'dd-mm-yyyy',
       autoclose: true,
       todayHighlight: true,
   });
   $("#tanggal_dari").on('changeDate', function(selected) {
       var startDate = new Date(selected.date.valueOf());
       startDate.setDate(startDate.getDate()+1);
       $("#tanggal_hingga").datepicker('setStartDate', startDate);
    //    if($("#tanggal_dari").val() > $("#tanggal_hingga").val()){
    //      $("#tanggal_hingga").val($("#tanggal_dari").val());
    //    }
   });
});

