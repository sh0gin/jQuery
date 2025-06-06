<?php
require_once "work_register.php";

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
							<h2 class="h3">Регистрация</h2>
						</div>
					</div>
					<div class="row block-9">
						<div class="col-lg-6 d-flex">

							<form action="register.php" method="post" class="bg-light p-5 contact-form">
								<div class="form-group">
									<input type="text" class="form-control <?= $user->valid_name ? "is-invalid" : "" ?>" 
									placeholder="Your Name" name="name" value="<?= $user->name ?>">
									<div class="invalid-feedback">
										<?= $user->valid_name ?>
									</div>
								</div>

								<div class="form-group">
									<input type="text" class="form-control <?= $user->valid_surname ? "is-invalid" : "" ?>" placeholder="Your Surname" name="surname" value="<?= $user->surname ?>">
									<div class="invalid-feedback">
										<?= $user->valid_surname ?>
									</div>
								</div>
								<div class="form-group">
									<input type="text" class="form-control <?= $user->valid_patronymic ? "is-invalid" : "" ?> " placeholder="Your Patronymic"
										name="patronymic" value="<?= $user->patronymic ?>">
									<div class="invalid-feedback">
										<?= $user->valid_patronymic ?>
									</div>
								</div>
								<div class="form-group">
									<input type="text" class="form-control <?= $user->valid_login ? "is-invalid" : "" ?>"
									placeholder="Your Login"
										name="login" value="<?= $user->login ?>">
									<div class="invalid-feedback">
										<?= $user->valid_login ?>
									</div>
								</div>
								<div class="form-group">
									<input type="email" class="form-control <?= $user->valid_email ? "is-invalid" : "" ?>" placeholder="Your Email"
										name="email" value="<?= $user->email ?>">
									<div class="invalid-feedback">
										<?= $user->valid_email ?>
									</div>
								</div>
								<div class="form-group">
									<input type="password" class="form-control <?= $user->valid_password ? "is-invalid" : "" ?>" placeholder="Password"
										name="password" value = "<?= $user->password ?>">
									<div class="invalid-feedback">
										<?= $user->valid_password ?>
									</div>
								</div>
								<div class="form-group">
									<input type="password" class="form-control <?= $user->valid_password_repeat ? "is-invalid" : "" ?>" placeholder="Password repeat"
										name="password_repeat" value = "<?= $user->password_repeat ?>">
									<div class="invalid-feedback">
										<?= $user->valid_password_repeat ?>
									</div>
								</div>

								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input is-invalid" type="checkbox" value="" id="rules"
											aria-describedby="invalidCheck3Feedback" required>
										<label class="form-check-label" for="rules">
											Rules
										</label>
										<div id="rulesFeedback" class="invalid-feedback">
											Необходимо согласиться с правилами регистрации.
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="submit" value="Регистрация" class="btn btn-primary py-3 px-5">
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
	<script>
		$(document).ready(function() {
			$('#rules').click(function(e) {
				$(this).toggleClass('is-invalid');
				$(this).toggleClass('is-valid');
				$('#rulesFeedback').toggleClass('d-none');
			})
		})
	</script>

</body>

</html>