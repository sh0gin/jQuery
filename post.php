<?php

require_once "work_post.php";
require_once "include/header.php";
?>

<body>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<?= $menu->give_html() ?>
			</nav>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-no-pt ftco-no-pb">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 px-md-3 py-5">
							<div>
								<?php if ($request->get("token") ) {
									if ($mysql->select("SELECT login from USER where token = '{$request->get("token")}'")[0]['login'] == $login) {
								?>
									<a href="<?= $response->getLink('post-create.php', $request->get()) ?>" class="text-warning" style="font-size: 1.8em;" title="Редактировать">🖍</a>
								<?php
									}
								}
								?>

								<?php if ($request->get("token")) {
									if ($mysql->select("SELECT login from USER where token = '{$request->get("token")}'")[0]['login'] == $login && $post->comments == 0 || $user->isAdmin) {
								?>
									<a href="<?= $response->getLink('delete_post.php', $request->get()) ?>" class="text-danger" style="font-size: 1.8em;" title="Удалить">🗑</a>
								<?php }
								} ?>
							</div>
							<div class="post">
								<h1 class="mb-3"><?= $post->title ?></h1>
								<div class="meta-wrap">
									<p class="meta">
										<span class="text text-3"><?= $login ?></span>
										<span><i class="icon-calendar mr-2"></i><?= $post->date ?></span>
										<span><i class="icon-comment2 mr-2"></i><?= $post->comments ?> Comment</span>
									</p>
								</div>
								<?= $post->content ?>

								<p>
									<img src='<?= $post->url_image ?>' alt="" class="img-fluid">
								</p>

								<div>
									<?php if ($request->get("token") ) {
									if ($mysql->select("SELECT login from USER where token = '{$request->get("token")}'")[0]['login'] == $login) {
								?>
									<a href="<?= $response->getLink('post-create.php', $request->get()) ?>" class="text-warning" style="font-size: 1.8em;" title="Редактировать">🖍</a>
								<?php
									}
								}
								?>

								<?php if ($request->get("token")) {
									if ($mysql->select("SELECT login from USER where token = '{$request->get("token")}'")[0]['login'] == $login  && $post->comments == 0 || $user->isAdmin) {
								?>
										<a href="<?= $response->getLink('delete_post.php', $request->get()) ?>" class="text-danger" style="font-size: 1.8em;" title="Удалить">🗑</a>
								<?php }
								} ?>
								</div>

							</div>
							<div class="comments pt-5 mt-5">
								<h3 class="mb-5 font-weight-bold"><?= $post->comments ?> комментариев</h3>
								<ul class="comment-list">
									<?php foreach ($comment->get_comments() as $value)  { ?>
										<li <?= $value->comment_id ? "id='special-li'" : "" ?>class="comment">
											<!-- avatar
												<div class="vcard bio">
												<img src="images/person_1.jpg" alt="Image placeholder">
											</div> -->
											<div class="comment-body">
												<div class="d-flex justify-content-between">
													<h3><?= $value->user->login ?></h3>
													<?php if ($user->isAdmin || $mylogin == $value->user->login) { ?>

														<a href="<?= $response->getLink('delete_coment.php', ["comment_id" => $value->id, "id" => $request->get("id")]) ?>" class="text-danger" style="font-size: 1.8em;"
															title="Удалить">🗑</a>

													<?php } ?>
												</div>
												<div class="meta">
													<?= $value->date ?>
												</div>
												<p>
													<?= $value->message ?>
												</p>

												<?php if ($request->get("token") ) {
												// if you want to do that only autor can answer add "$mysql->select("SELECT login from USER where token = '{$request->get("token")}'")[0]['login'] == $login &&" here: 
												if (!$user->isGuest && !$user->isAdmin && !$value->comment_id) {
												?>
													<p><a href="<?= $response->getLink('answer.php', ["comment_id" => $value->id, "id" => $request->get("id"), "token" => $request->get("token")]) ?>" class="reply">Ответить</a></p>
												<?php
												}}
												?>

											</div>
										
										</li>
									<?php } ?>
								</ul>
								<!-- END comment-list -->
								<?php if (!$user->isAdmin && !$user->isGuest) { ?>
								<div class="comment-form-wrap pt-5">
									<h3 class="mb-5">Оставьте комментарий</h3>
									<Form action="<?= $response->getLink('post.php', $request->get()) ?>" method="POST" class="p-3 p-md-5 bg-light">
										<div class="form-group">
											<label for="message">Сообщение</label>
											<textarea name="message" id="message" cols="30" rows="10"
												class="form-control <?= $comment->valid_message ? "is-invalid" : "" ?>"></textarea>
											<div class="invalid-feedback">
												<?= $comment->valid_message ?>
											</div>
										</div>
										<div class="form-group">
											<input type="submit" value="Отправить" name="send_comment"
												class="btn py-3 px-4 btn-primary">
										</div>
									</form>
								</div>
								<?php } ?>
							</div>
						</div>
					</div><!-- END-->
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