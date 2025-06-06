import { giveInput, registerShow } from "./modules/register.js";
import { loginShow } from "./modules/login.js";
import { aboutShow } from "./modules/about.js";
import { indexShow } from "./modules/index.js";
import { blogsShow } from "./modules/blogs.js";

$(() => {
  registerShow();


  $("body").on("click", ".link", function (e) {
    e.preventDefault();
    
    $("section").each(function () {
      $(this).addClass("not-active");
    });

    switch ($(this).attr("data-section")) {
      case "login":
        loginShow();
        break;
      case "blogs":
        blogsShow();
        break;
      case "index":
        indexShow();
        break;
      case "register":
        registerShow();

        
        break;
      case "about":
        aboutShow();
        break;
    }
  });


  giveInput();

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
