function startTime() {
    var today = new Date();
    var d = today.getDate();
    var mth = today.getMonth() + 1;
    var y = today.getFullYear();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    mth = checkTime(mth);
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
        d + "/" + mth + "/" + y + " " + h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
    return i;
}

// search regis PK
$(document).ready(function () {
    load_data();
    function load_data(query) {
        $.ajax({
            url: "/skripsi_2/c_admin/searchRegisPK",
            method: "POST",
            data: { query: query },
            success: function (data) {
                $('#resultSearchRegisPK').html(data);
            }
        });
    }


    $('#search_regisPK').keyup(function () {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        }
        else {
            load_data();
        }
    });
});

// search valid PK
$(document).ready(function () {
    load_data();
    function load_data(query) {
        $.ajax({
            url: "/skripsi_2/c_admin/searchValidPK",
            method: "POST",
            data: { query: query },
            success: function (data) {
                $('#resultSearchValidPK').html(data);
            }
        });
    }


    $('#search_validPK').keyup(function () {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        }
        else {
            load_data();
        }
    });
});

// search regis PL
$(document).ready(function () {
    load_data();
    function load_data(query) {
        $.ajax({
            url: "/skripsi_2/c_admin/searchRegisBiodataPL",
            method: "POST",
            data: { query: query },
            success: function (data) {
                $('#resultSearchRegisBiodataPL').html(data);
            }
        });
    }


    $('#search_regisBiodataPL').keyup(function () {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        }
        else {
            load_data();
        }
    });
});

$(document).ready(function () {
    load_data();
    function load_data(query) {
        $.ajax({
            url: "/skripsi_2/c_admin/searchRegisPekerjaanPL",
            method: "POST",
            data: { query: query },
            success: function (data) {
                $('#resultSearchRegisPekerjaanPL').html(data);
            }
        });
    }


    $('#search_regisPekerjaanPL').keyup(function () {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        }
        else {
            load_data();
        }
    });
});

// search valid PL
$(document).ready(function () {
    load_data();
    function load_data(query) {
        $.ajax({
            url: "/skripsi_2/c_admin/searchValidPL",
            method: "POST",
            data: { query: query },
            success: function (data) {
                $('#resultSearchValidPL').html(data);
            }
        });
    }


    $('#search_validPL').keyup(function () {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        }
        else {
            load_data();
        }
    });
});

$(document).ready(function () {
    load_data();
    function load_data(query) {
        $.ajax({
            url: "/skripsi_2/c_admin/searchSuspendPL",
            method: "POST",
            data: { query: query },
            success: function (data) {
                $('#resultSearchSuspendPL').html(data);
            }
        });
    }


    $('#search_suspendPL').keyup(function () {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        }
        else {
            load_data();
        }
    });
});

$(document).ready(function () {
    load_data();
    function load_data(query) {
        $.ajax({
            url: "/skripsi_2/c_admin/searchSuspendPK",
            method: "POST",
            data: { query: query },
            success: function (data) {
                $('#resultSearchSuspendPK').html(data);
            }
        });
    }


    $('#search_suspendPK').keyup(function () {
        var search = $(this).val();
        if (search != '') {
            load_data(search);
        }
        else {
            load_data();
        }
    });
});



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