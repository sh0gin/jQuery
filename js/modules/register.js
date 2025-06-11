import { getFullPost } from "./blogs.js";
export { registerShow, giveInputRegister }


function registerShow() {
    $('.register').removeClass("not-active");
}

function registerHide() {
    $('.register').addClass("not-active");

}

function giveInputRegister() {
    $(".btn-register").on("click", function (e) {
        e.preventDefault();
        let $obj = {};
        $(".register-form").find("input").not(".form-check-input").each((sd, el) => {
            $obj[$(el).attr("name")] = $(el).val();
        });

        $.ajax({
            url: '/work_register.php',
            method: 'POST',
            dataType: "json",
            data: $obj,
            success: function ($response) { //
                console.log($response);
                if (!$response.status) {
                    registerHide();
                    getFullPost();
                    $("a[data-section=login]").removeClass("colorlib-active");
                    $("a[data-section=blogs]").addClass("colorlib-active");
                } else {
                    $("input").each(function () {
                        $(this).removeClass("is-invalid");
                    })
                    Object.keys($response).map(function ($elem) {

                        if ($elem.includes("valid_")) {
                            console.log("1");
                            // console.log($/response[$elem]);
                            if ($response[$elem]) {
                                $(`input[id='${$elem.slice(6)}-r']`).addClass('is-invalid');

                                $(`.${$elem.slice(6)}-message-reg`).text($response[$elem]);
                            }
                        } else {
                            $(`.register-form > .form-group > input`).attr("value", $response[$elem]);
                        }
                    }
                    )
                }
            },
            // error: function(xhr, status, error) { 
            //     console.error(`Error: ${error}`);
            // }
        });
    });
}