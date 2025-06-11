export { getPosts };

function getPosts($onePostObject) {
	console.log($onePostObject);
	const el = `<div class="col-md-12 col-xl-12">
					<div class="blog-entry d-md-flex">		
						<div class="text text-2 pl-md-4">
							<h3 class="mb-2"><a href="single.html">${$onePostObject.title}</a></h3>
							<div class="meta-wrap">
								<p class="meta">
									<!-- <img src='avatar.jpg' /> -->
									<span class="text text-3">${$onePostObject.user.login}</span>
									<span><i class="icon-calendar mr-2"></i>${$onePostObject.date}</span>
									<span><i class="icon-comment2 mr-2"></i>${$onePostObject.comments ?? "0"} Comment</span>
								</p>
							</div>
							<p class="mb-4">${$onePostObject.preview}</p>
							<div class="d-flex pt-1  justify-content-between">
								<div>
									<a href="#" class="btn-custom more" data-id="${$onePostObject.id}">
										Подробнее... <span class="ion-ios-arrow-forward"></span></a>
								</div>
								<div>
									<a href="index.html/id=12" class="text-warning" style="font-size: 1.8em;"
										title="Редактировать">🖍</a>
									<a href="" class="text-danger" style="font-size: 1.8em;"
										title="Удалить">🗑</a>
								</div>

							</div>
						</div>
					</div>
				</div>`;
    return el;
    
}