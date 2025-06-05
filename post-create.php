<?php
require_once "work_post-create.php";
// var_dump($response->getLink("post-create.php", $request->get()));
require_once "include/header.php";
?>

<body>

	<div id="colorlib-page">
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<?= $menu->give_html() ?>
			</nav>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="contact-section px-md-2 pt-5">
				<div class="container">
					<div class="row d-flex contact-info">
						<div class="col-md-12 mb-1">
							<h2 class="h3">Создание поста</h2>
						</div>

					</div>
					<div class="row block-9">
						<div class="col-lg-6 d-flex">

							<form enctype="multipart/form-data" action="<?= $response->getLink("post-create.php", $request->get()) ?>" method="post" class="bg-light p-5 contact-form" >

								<div class="form-group">
									<input type="text" class="form-control <?= $post->valid_title ? "is-invalid" : "" ?>" placeholder="Post title" name="title" value="<?= $post->title ?>">
									<div class="invalid-feedback">
										<?= $post->valid_title ?>
									</div>
								</div>

								<div class="form-group">
									<input type="text" class="form-control <?= $post->valid_preview ? "is-invalid" : "" ?>" placeholder="Post preview" name="preview" value="<?= $post->preview ?>">
									<div class="invalid-feedback">
										<?= $post->valid_preview ?>
									</div>
								</div>

								<div class="form-group">
									<textarea name="content" id="content" cols="30" rows="10" class="form-control <?= $post->valid_content ? "is-invalid" : "" ?>"
										placeholder="Post content" name="content"><?= $post->content?></textarea>
									<div class="invalid-feedback">
										<?= $post->valid_content ?>
									</div>
								</div>
								<div class="form-group">
									<input type="file" class="form-control" name="image" accept="image/*">
									<!-- <input type="file" name="image" accept="image/*"> -->
									<div class="invalid-feedback"> 
										<?= $post->valid_content ?>
									</div>
								</div>
									

								<div class="form-group">
									<input type="submit" value="Опубликовать" class="btn btn-primary py-3 px-5">
								</div>
							</form>

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