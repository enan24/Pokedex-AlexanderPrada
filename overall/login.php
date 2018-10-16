<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 red-text">Login</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="validacion-login.php" method="POST">
				<div class="modal-body mx-3">
					<div class="md-form mb-5">
						<i class="fa fa-envelope prefix grey-text"></i>
						<input type="text" name="user" id="user" class="form-control validate">
						<label data-error="wrong" data-success="right" for="defaultForm-usuario">Nickname</label>
					</div>
	
					<div class="md-form mb-4">
						<i class="fa fa-lock prefix grey-text"></i>
						<input type="password" name="pass" id="defaultForm-pass" class="form-control validate">
						<label data-error="wrong" data-success="right" for="defaultForm-pass">Password</label>
					</div>

					<div class="d-flex justify-content-around">
						<div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="recordarme" class="custom-control-input" id="defaultLoginFormRemember">
								<label class="custom-control-label" for="defaultLoginFormRemember">Recordarme</label>
							</div>
						</div>
					</div>
	
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<button class="btn btn-default red darken-1">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>