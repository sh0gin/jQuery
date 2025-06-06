<?php
require_once "work_login.php";

require_once "include/header.php";
?>

<body>
	<div id="colorlib-page">
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" 
			role="navigation">
				<?= $menu->give_html() ?>
			</nav>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="contact-section px-md-2  pt-5">
				<div class="container">
					<div class="row d-flex contact-info">
						<div class="col-md-12 mb-1">
							<h2 class="h3">Авторизация</h2>
						</div>
					</div>
					<div class="row block-9"> 
						<div class="col-lg-6 d-flex">
							<form action="login.php" method="post" class="bg-light p-5 contact-form">
								<div class="form-group">
									<input type="text" class="form-control <?= $user->valid_login ? "is-invalid" : "" ?>" placeholder="Your Login"
										name="login" value="<?= $user->login ?>">
									<div class="invalid-feedback">
										<?= $user->valid_login ?>
									</div>
								</div>
								<div class="form-group">
									<input type="password" class="form-control <?= $user->valid_password ? "is-invalid" : "" ?>" placeholder="Password"
										name="password">
									<div class="invalid-feedback">
										<?= $user->valid_password ?>
									</div>
								</div>
								<div class="form-group">
									<input type="submit" value="Вход" class="btn btn-primary py-3 px-5">
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