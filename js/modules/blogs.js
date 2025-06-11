import { getPosts } from "./getPosts.js";
import { getPostOne } from "./getPostOne.js";
import { hideAll } from "./asists.js";

export { blogsShow, getHtml, getPost, getFullPost };


function blogsShow() {
	$(".blogs").removeClass("not-active");
}

function getHtml() {
	$.ajax({
		url: "/getPosts.php",
		method: "POST",
		dataType: "json",
		// data: $obj,
		success: function ($response) {
			$response.forEach($value => $(".list-posts").append(getPosts($value)));

		},
	});
}

function getFullPost() {
	blogsShow();
	$(this).addClass("colorlib-active");
	$(".btn-custom").on("click", function () {
		hideAll();
		let $id_post = $(this).attr("data-id");
		getPost($id_post);
	})
}

function getPost(id) {
	// let params = new URLSearchParams(document.location.search);
	// let value = params.get('id'); // 'key' – это имя целевого параметра\

	// if (!value) {
	// 	return false;
	// }


	$.ajax({
		url: "/getPost.php",
		method: "POST",
		dataType: "json",
		data: { id: id },
		success: function ($response) {
			$(".post").removeClass("not-active");
			$(".post-content").html(getPostOne($response));
		},
	});
}

// $('body').on( 'change', '.list-posts', function() {
// 	DoSomething();
// });

