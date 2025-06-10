export { getPostOne };

function getPostOne($onePostObject) {

	const el = `<?php<div class="post">
								<h1 class="mb-3">${$onePostObject.title}</h1>
								<div class="meta-wrap">
									<p class="meta">
										<!-- <img src='avatar.jpg' /> -->
										<span class="text text-3">${$onePostObject.user.login}</span>
										<span><i class="icon-calendar mr-2"></i>${$onePostObject.date}</span>
										<span><i class="icon-comment2 mr-2"></i>${$onePostObject.comment} Comment</span>
									</p>
								</div>
								<p>
                                    ${$onePostObject.content}
								</p>

								<p>
									<img src="images/image_1.jpg" alt="" class="img-fluid">
								</p>
								<div>
									<a href="" class="text-warning" style="font-size: 1.8em;"
										title="Редактировать">🖍</a>
									<a href="" class="text-danger" style="font-size: 1.8em;" title="Удалить">🗑</a>
								</div>

							</div>`;
    return el;
    
}
