<?php
require_once "work_temp-block.php";
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
			<section class="contact-section px-md-2  pt-5">
				<div class="container">
					<div class="row d-flex contact-info">
						<div class="col-md-12 mb-1">
							<h2 class="h3">Временная блокировка пользователя</h2>
							<div>
								Пользователь: <?= $request->get("login") ?>
							</div>
						</div>
					</div>
					<div class="row block-9">
						<div class="col-lg-6 d-flex">
							<form action="<?=$response->getLink("temp-block.php", $request->get())?>" method="POST" class="bg-light p-5 contact-form">
								<div class="form-group">
									<label for="date-block">Дата временной блокировки</label>
									<input type="text" class="form-control" id="date-block" name="date_block" value=""
										required>
								</div>
								<div class="form-group">
									<input type="submit" value="Блокировать" class="btn btn-primary py-3 px-5">
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
	include "include/script_block.php";
	?>

</body>

</html>