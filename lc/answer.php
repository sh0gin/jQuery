<?php
require_once "work_post.php";
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
							<h2 class="h3">Ответ на комментарий от пользователя:<br> <b><?= $mysql->select("SELECT message FROM comment WHERE id = {$request->get('comment_id')}")[0]["message"] ?></b></h2>
						</div>

					</div>
					<div class="row block-9">
						<div class="col-lg-6 d-flex">

							<form enctype="multipart/form-data" action="<?= $response->getLink("answer.php", $request->get()) ?>" method="post" class="bg-light p-5 contact-form" >


								<div class="form-group">
									<textarea name="message" id="content" cols="30" rows="10" class="form-control <?= $comment->valid_message ? "is-invalid" : "" ?>"
										placeholder="Answer" name="content"></textarea>
									<div class="invalid-feedback"> 
										<?= $comment->valid_message ?>
									</div>
								</div>
								

								<div class="form-group">
									<input type="submit" value="Ответить" class="btn btn-primary py-3 px-5">
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