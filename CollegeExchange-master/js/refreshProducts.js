$(document).ready(function() {
    console.log("JS Loads");
    $('#enlist-form').on('submit', function (e) {

        e.preventDefault();
        console.log("Ajax fired");

        $.ajax({

            type: 'POST',
            dataType: 'html',
            url: 'enlistProduct.php',
            data: {
                productName: $("#enlist-form input[name=productName]").val(),
                productCondition: $( "#condition option:selected" ).text(),
            },
            success: function (response) {

                console.log("Success");

                $.ajax({

                    type: 'GET',
                    dataType: 'html',
                    url: 'getproduct.php',

                    success: function (response) {
                        $('#product-list').html(response);
                         $("#enlist-form").effect( "shake", {times:2}, 700 );
                    }
                });
            }
        });

    });
});

function searchHome() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchString");
    filter = input.value.toUpperCase();
    table = document.getElementById("products");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}


function searchMyproducts() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchStringMyproducts");
    filter = input.value.toUpperCase();
    table = document.getElementById("myProducts");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}