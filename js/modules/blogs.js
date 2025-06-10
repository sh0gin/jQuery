import { getPosts } from "./getPosts.js";
import { getPostOne } from "./getPost.js";
export { blogsShow, getHtml, getPost };


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
			// console.log(getPost($response[0]))
			$response.forEach($value => $(".list-posts").append(getPosts($value)));

		},
	});
}


function getPost() {
	let params = new URLSearchParams(document.location.search);
	let value = params.get('id'); // 'key' – это имя целевого параметра\

	if (!value) {
		console.log('null');
		return false;
	}


	$.ajax({
		url: "/getPost.php",
		method: "POST",
		dataType: "json",
		data: { id: value },
		success: function ($response) {
			console.log(getPostOne($response));
			$(".post").removeClass("not-active");
			$(".post-content").append(getPostOne($response));
		},
	});
}

// $('body').on( 'change', '.list-posts', function() {
// 	DoSomething();
// });

