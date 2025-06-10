import { registerShow, giveInputRegister } from "./modules/register.js";
import { loginShow, giveInputLogin, getUserStatus, logout } from "./modules/login.js";
import { aboutShow } from "./modules/about.js";
import { indexShow } from "./modules/index.js";
import { blogsShow, getHtml, getPost } from "./modules/blogs.js";

$(() => {

  indexShow();
  getPost()
  getHtml();



  $("body").on("click", ".link", function (e) {
    e.preventDefault();

    $("nav[id=colorlib-main-menu] > ul > li > a").each(function () {
      $(this).removeClass("colorlib-active");
    });

    $("section").each(function () {
      $(this).addClass("not-active");
    });

    switch ($(this).attr("data-section")) {
      case "login":
        loginShow();
        $(this).addClass("colorlib-active"); // подсветка пунктов меню
        $(`#password`).attr("value", "");
        break;
      case "blogs":
        blogsShow();
        $(this).addClass("colorlib-active");
        break;
      case "index":
        indexShow();
        break;
      case "register":
        registerShow();
        $(this).addClass("colorlib-active");
        break;
      case "about":
        aboutShow();
        $(this).addClass("colorlib-active");
        break;
      case "exting":
        logout();
        getUserStatus();
        indexShow();
        break;
    }

    $("body").on("click", ".more-info", function () {
      console.log("info");
    })
  });

  getUserStatus();
  giveInputRegister();
  giveInputLogin();
});
// 06.06.2025
// $('.options-sort').each(() =>
//   console.log(this)
// )
// $('.register-btn').on('click', function () {
//   e.preventDefault();
//   console.log("123");
// })
// 05.06.2025
// $("section").each(function (a) {
//     console.log(a);
//     $(a).addClass('not-active');
// })
// let a = document.querySelectorAll("section");
// a.forEach(function (elem) {
//     console.log(elem);
//     elem.classList.add("not-active")
// })
