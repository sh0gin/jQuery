import { blogsShow } from "./blogs.js";
export { loginShow, giveInputLogin, getUserStatus, logout };

function loginShow() {
  $(".login").removeClass("not-active");
}

function loginHide() {
  $(".login").addClass("not-active");
}

function getUserStatus() {
  let $token = localStorage.getItem("token");
  if ($token) {
    $.ajax({
      url: "/getUser.php",
      method: "POST",
      dataType: "json",
      data: { token: $token },
      success: function ($response) {
        
        if (!$response.isAdmin && !$response.isGuest) {
          $(".div-creat-post").removeClass("not-active");
        }
        if ($response.isAdmin) {
          $(".users_menu").removeClass("not-active");
        } else {
          $(".users_menu").addClass("not-active");
        }
        if ($response.token) {
          $(".identity_user").addClass("not-active");
          $(".exting_user").removeClass("not-active");
          $("a[data-section=exting]").html(`Выход <b>(${$response.login})</b>`);
        }
      },
    });
  } else {
    $(".div-creat-post").addClass("not-active");
    $(".identity_user").removeClass("not-active");
    $(".users_menu").addClass("not-active");
    $(".exting_user").addClass("not-active");
  }
}
function giveInputLogin() {
  $(".login-btn").on("click", function (e) {
    e.preventDefault();
    let $obj = {}; // or it create automatelly

    $(".login-form")
      .find("input")
      .each((sd, el) => {
        $obj[$(el).attr("name")] = $(el).val();
      });

    $.ajax({
      url: "/work_login.php",
      method: "POST",
      dataType: "json",
      data: $obj,
      success: function ($response) {
        console.log($response);
        if ($response.status) {
          loginHide();
          blogsShow();
          $("a[data-section=blogs]").addClass("colorlib-active");
          localStorage.setItem("token", $response["token"]);
          getUserStatus();

        } else {
          $("input").each(function () {
            // убираем все выводы ошибок
            $(this).removeClass("is-invalid");
          });

          Object.keys($response).map(function ($elem) {
            // если есть ошибки вставляем их, иначе вставввляем значение прсто\

            if ($elem.includes("valid_")) {
              if ($response[$elem]) {
                $(`input[id='${$elem.slice(6)}']`).addClass("is-invalid");
                $(`.${$elem.slice(6)}-message-auth`).text($response[$elem]);
              }
            } else {
              $(`.login-form > input`).attr("value", $response[$elem]);
            }
          });
        }
      },
    });
  });
}


function logout() {
  localStorage.removeItem("token");
}
