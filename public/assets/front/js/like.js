let currentUrl = window.location.href;
let urlParts = currentUrl.split('/');
let baseUrl = urlParts[0] + '//' + urlParts[2];

function like(n) {
    console.log(n);
    $('#likebtnid_' + n).hide();
    $('#unlikebtnid_' + n).show();
    let myData = 'photo_id=' + n;
    console.log(baseUrl + "/like/like");
    $.ajax({
        method: "GET",
        url: baseUrl + "/like/like/" + n,
        dataType: "text",
        data: n,
        success: function (response) {
            $('#likescount').html('');
            $('#likescount').append(
                '<a class="navbar-link"  href="/front/my_photos"><strong>Wishlist</strong></a>'
            );

            if (response != 0) {
                if (response <= 9) {
                    $('#likescount').append(
                        '<div class="number_liked" >' + response + '</div></li>\n'
                    );
                } else if (response > 9) {
                    $('#likescount').append(
                        '<div class="number_liked" >9+</div></li>\n'
                    );
                }
            } else {

            }


// console.log(response);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(thrownError);
        }
    });
};

function unlike(n) {
    let myData = 'photo_id=' + n;
    $('#likebtnid_' + n).show();
    $('#unlikebtnid_' + n).hide();
    jQuery.ajax({
        type: "POST",
        url: baseUrl + "/like/unlike/" + n,
        dataType: "text",
        data: myData,
        success: function (response) {
            console.log(response)
            $('#likescount').html('');
            $('#likescount').append(
                '<a class="navbar-link"  href="/front/my_photos"><strong>Wishlist</strong></a>'
            );

            if (response != 0) {
                if (response <= 9) {
                    $('#likescount').append(
                        '<div class="number_liked" >' + response + '</div></li>\n'
                    );
                } else if (response > 9) {
                    $('#likescount').append(
                        '<div class="number_liked" >9+</div></li>\n'
                    );
                }
            } else {

            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(thrownError);
        }
    });
};
