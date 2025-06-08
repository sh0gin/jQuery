import { blogsShow } from "./blogs.js";
export { loginShow, giveInputLogin };

function loginShow() {
    console.log("loginshow");
    $('.login').removeClass("not-active");

}

function loginHide() {
    $('.login').addClass("not-active");
}

function giveInputLogin() {
    $('.login-btn').on("click", function (e) {
        e.preventDefault();
        let $obj = {}; // or it create automatelly

        $(".login-form").find("input").each((sd, el) => {
            $obj[$(el).attr("name")] = $(el).val();
        });

        $.ajax({
            url: '/work_login.php',
            method: 'POST',
            dataType: "json",
            data: $obj,
            success: function ($response) {
                console.log($response);
                if ($response.status) {
                    loginHide();
                    blogsShow();
                    console.log('1');
                    localStorage.setItem('token', $response['token'])
                    console.log('1');

                } else {

                    $("input").each(function () { // убираем все выводы ошибок
                        $(this).removeClass("is-invalid");
                    })

                    Object.keys($response).map(function ($elem) { // если есть ошибки вставляем их, иначе вставввляем значение прсто\

                        if ($elem.includes("valid_")) {
                            if ($response[$elem]) {
                                $(`input[id='${$elem.slice(6)}']`).addClass('is-invalid');

                                $(`.${$elem.slice(6)}-message-auth`).text($response[$elem]);
                            }
                        } else {
                            $(`.login-form > input`).attr("value", $response[$elem]);
                        }
                    }
                    )
                };
            },
            // error: function(xhr, status, error) { 
            //     console.error(`Error: ${error}`);
            // }
        });
    })
}