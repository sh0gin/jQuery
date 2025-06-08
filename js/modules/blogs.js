export { blogsShow }


function blogsShow() {
    $('.blogs').removeClass("not-active");
}

function getHtml() {
    string = `<h1 class="mb-3">тема поста</h1>
								<div class="meta-wrap">
									<p class="meta">
										<!-- <img src='avatar.jpg' /> -->
										<span class="text text-3">login</span>
										<span><i class="icon-calendar mr-2"></i>June 28, 2019</span>
										<span><i class="icon-comment2 mr-2"></i>6 Comment</span>
									</p>
								</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius
									mollitia
									suscipit, quisquam doloremque distinctio perferendis et doloribus unde
									architecto
									optio laboriosam porro adipisci sapiente officiis nemo accusamus ad
									praesentium?
									Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste
									doloremque
									quia officia optio deserunt molestiae voluptates soluta architecto tempora.
								</p>
								<p>
									Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo
									veritatis
									repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui
									voluptate
									quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet
									eaque
									sequi
									deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor
									minima
									esse vero ut ea, repudiandae suscipit!
								</p>
								<p>
									<img src="images/image_1.jpg" alt="" class="img-fluid">
								</p>
								<div>
									<a href="" class="text-warning" style="font-size: 1.8em;"
										title="Редактировать">🖍</a>
									<a href="" class="text-danger" style="font-size: 1.8em;" title="Удалить">🗑</a>
								</div>`
}