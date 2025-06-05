<?php
require_once "main.php";
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
			<section class="contact-section px-md-4 pt-5">
				<div class="container">
					<div class="row block-9">
						<div class="col-lg-12">
							<div class="row">
								<div class="col-md-12 mb-1">
									<h3 class="h3">Пользователи</h3>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-1">
									<table class="table table-striped">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Name</th>
												<th scope="col">Surname</th>
												<th scope="col">Login</th>

												<th scope="col">E-mail</th>
												<th scope="col">Block</th>
												<th scope="col">Temp block</th>
												<th scope="col">Permanent block</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($user->get_user() as $value) { ?>
											<tr>
												<th scope="row"><?= $value->id ?></th>
												<td><?= $value->name ?></td>
												<td><?= $value->surname ?></td>
												<td><?= $value->login ?></td>
												<td><?= $value->email ?></td>
												<td><?= $value->__user_ban ?></td>
												<td>
													<a href="<?=$response->getLink("temp-block.php", ["id_c" => $value->id]) ?>" class="btn btn-outline-warning px-4">⏳
														Block</a>
												</td>
												<td>
													<a href="<?=$response->getLink("work_temp-block.php", ["id_c" => $value->id, "ban" => "1"]) ?>" class="btn btn-outline-danger px-4">📌 Block</a>
												</td>
											</tr>
											<?php } ?>

										</tbody>
									</table>
								</div>
							</div>
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