export { registerShow, giveInput }


function registerShow() {
    $('.register').removeClass("not-active");
}

function giveInput() {
    let $obj = {};
    $(".btn-register").on("click", function (e) {
        e.preventDefault();
        $(".register-form").find("input").not(".form-check-inputв").each((sd, el) => {
          $obj[$(el).attr("name")] = $(el).val();
        });
        
        let $result = $.ajax({
            url : '/work_register.php',
            method: 'POST',
            dataType: "json",
            data: $obj,
            success : function ($response) {
                $("input").each(function() {
                    $(this).removeClass("is-invalid");
                })
                console.log($response);
                Object.keys($response).map(function ($elem) {
                    if ($elem.includes("valid_")) {
                        console.log($response[$elem]);
                        if ($response[$elem]) {
                            $(`input[name='${$elem.slice(6)}']`).addClass('is-invalid');
                            $(`.${$elem.slice(6)}-message`).text($response[$elem]);
                    }
                    } else {
                        $(`input`).attr("value", $response[$elem]);
                    }
                }
                    )
            },
            // error: function(xhr, status, error) { 
            //     console.error(`Error: ${error}`);
            // }
        });


        return $obj;
      });
}