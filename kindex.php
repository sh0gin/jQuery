<?php

require_once "main.php";
require_once "include/header.php";
?>

<body>

	<div id="colorlib-page">
		<div id="colorlib-page">
			<aside id="colorlib-aside" role="complementary" class="js-fullheight">
				<nav id="colorlib-main-menu" role="navigation">
					<?= $menu->give_html() ?>
				</nav>
			</aside> <!-- END COLORLIB-ASIDE -->
			<div id="colorlib-main">
				<section class="ftco-no-pt ftco-no-pb">
					<div class="container">
						<div class="row d-flex">
							<div class="col-xl-8 py-5 px-md-2">
								<div class="row pt-md-4">
									<!-- один пост/превью -->
									<?php  foreach($post->get_post_ten() as $value) { ?>
								<div class="col-md-12 col-xl-12">
									<div class="blog-entry ftco-animate d-md-flex">
										<!-- 
											изображение для поста 
											<a href="single.html" class="img img-2"
											style="background-image: url(images/image_1.jpg);"></a> 
										-->
										<div class="text text-2 pl-md-4">
											<h3 class="mb-2"><a href="<?= $response->getLink("post.php", ["id" => $value->id])?>"><?= $value->title ?></a></h3>
											<div class="meta-wrap">
												<p class="meta">
													<!-- <img src='avatar.jpg' /> -->
													<span class="text text-3"><?= $value->user->login ?></span>
													<span><i class="icon-calendar mr-2"></i><?= $value->date ?></span>
													<span><i class="icon-comment2 mr-2"></i><?= $value->comments ?> Comment</span>
												</p>
											</div>
											<p class="mb-4"><?= $value->preview ?></p>
											<div class="d-flex pt-1  justify-content-between">
												<div>
													<a href="<?= $response->getLink("post.php", ["id" => $value->id])?>" class="btn-custom">
														Подробнее... <span class="ion-ios-arrow-forward"></span></a>
												</div>
												<div>
													<?php if ($request->get("token") == $value->user->token && !$user->isGuest) {?>
													<a href="<?= $response->getLink('post-create.php', ["id" => $value->id, "token" => $request->get("token")]) ?>" class="text-warning" style="font-size: 1.8em;"
														title="Редактировать">🖍</a>
													<?php } ?>
													<?php  if (($request->get("token") == $value->user->token && !$user->isGuest && ($value->comments == 0)) || $user->isAdmin ) { ?>
													<a href="<?= $response->getLink('delete_post.php', ["id" => $value->id]) ?>" class="text-danger" style="font-size: 1.8em;"
														title="Удалить">🗑</a>
													<?php } ?>
												</div>

											</div>
										</div>
									</div>
								</div>
								<?php }?>


								</div><!-- END-->

								<!-- 
								pagination
								<div class="row">
								<div class="col">
									<div class="block-27">
										<ul>
											<li><a href="#">&lt;</a></li>
											<li class="active"><span>1</span></li>
											<li><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li><a href="#">4</a></li>
											<li><a href="#">5</a></li>
											<li><a href="#">&gt;</a></li>
										</ul>
									</div>
								</div>
							</div> -->

							</div>

						</div>
					</div>
				</section>
			</div><!-- END COLORLIB-MAIN -->
		</div><!-- END COLORLIB-PAGE -->

		<!-- loader -->
		<?php
		include "include/loader.php";
		?>


		<?php
		include "include/script.php";
		?>


</body>

</html>