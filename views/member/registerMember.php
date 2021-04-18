<div class="image-container set-full-height" style="background-image: url('assets/images/img/car-5383371_1920.jpg')">
	<!--   Creative Tim Branding   -->
	<a href="https://www.facebook.com/hoangbug20/">
		<div class="logo-container">
			<div class="logo" style="padding: 0;">
				<img src="assets/images/img/new_logo.png">
			</div>
			<div class="brand">
				Hoang Bug
			</div>
		</div>
	</a>

	<!--  Made With Material Kit  -->
	<a href="https://www.facebook.com/hoangbug20/" class="made-with-mk">
		<div class="brand">HB</div>
		<div class="made-with">Made with <strong>Hoang Bug</strong></div>
	</a>

	<div class="container">
		<div class="row" style="margin-top: 100px;">
			<div class="col-md-12">
				<?php
				if (isset($_SESSION['error'])) {
				?>
					<div class="alert alert-danger" role="alert">
						<h4 class="alert-heading">Error!</h4>
						<p><?php echo $_SESSION['error'];
							unset($_SESSION['error']); ?></p>
						<hr>
						<!-- <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p> -->
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>

	<!--   Big container   -->
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<!--      Wizard container        -->
				<div class="wizard-container">
					<div class="card wizard-card" data-color="green" id="wizardProfile">
						<form action="" method="POST" enctype="multipart/form-data">
							<!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

							<div class="wizard-header">
								<h3 class="wizard-title">
									Đăng ký tài khoản
								</h3>
								<h5>Thông tin này sẽ cho chúng tôi biết thêm về bạn.</h5>
							</div>
							<div class="wizard-navigation">
								<ul style="width: 100%;">
									<li><a href="#about" data-toggle="tab">Bước 1</a></li>
									<li><a href="#account" data-toggle="tab">Bước 2</a></li>
									<li><a href="#address" data-toggle="tab">Bước 3</a></li>
								</ul>
							</div>

							<div class="tab-content">
								<div class="tab-pane" id="about">
									<div class="row">
										<h4 class="info-text">Hãy bắt đầu với thông tin cơ bản (với xác thực)</h4>
										<div class="col-sm-4 col-sm-offset-1">
											<div class="picture-container">
												<div class="picture">
													<img src="assets/images/img/baseline_face.png" class="picture-src" id="wizardPicturePreview" title="" />
													<input type="file" id="wizard-picture" name="fileUpload" accept="image/*">
												</div>
												<h6>Chọn hình</h6>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">face</i>
												</span>
												<div class="form-group label-floating">
													<label class="control-label">Họ và đệm<small> (bắt buộc)</small></label>
													<input name="firstname" type="text" class="form-control">
												</div>
											</div>

											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">face</i>
												</span>
												<div class="form-group label-floating">
													<label class="control-label">Tên <small> (bắt buộc)</small></label>
													<input name="lastname" type="text" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-sm-10 col-sm-offset-1">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">email</i>
												</span>
												<div class="form-group label-floating">
													<label class="control-label">Email <small> (bắt buộc)</small></label>
													<input name="email" type="email" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="account">
									<h4 class="info-text"> Thông tin chi tiết </h4>
									<div class="row">
										<div class="col-sm-10 col-sm-offset-1">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">business_center</i>
												</span>
												<div class="form-group label-floating">
													<label class="control-label">Nghề nghiệp</label>
													<input name="profession" type="text" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-sm-10 col-sm-offset-1">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">place</i>
												</span>
												<div class="form-group label-floating">
													<label class="control-label">Địa chi</label>
													<input name="place" type="text" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-sm-10 col-sm-offset-1">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">local_phone</i>
												</span>
												<div class="form-group label-floating">
													<label class="control-label">Số điện thoại</label>
													<input name="phone" type="text" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="address">
									<div class="row">
										<div class="col-sm-12">
											<h4 class="info-text"> Thông tin chi tiết </h4>
										</div>
										<div class="col-sm-10 col-sm-offset-1">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">vpn_key</i>
												</span>
												<div class="form-group label-floating">
													<label class="control-label">Mật khẩu</label>
													<input name="password" type="password" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-sm-10 col-sm-offset-1">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">vpn_key</i>
												</span>
												<div class="form-group label-floating">
													<label class="control-label">Xác thực lại mật khẩu</label>
													<input name="confipassword" type="password" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="wizard-footer">
								<div class="pull-right">
									<input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Tiếp theo' />
									<input type="submit" class='btn btn-finish btn-fill btn-success btn-wd' name="registerMember" value="Hoàn thành" />
								</div>

								<div class="pull-left">
									<input type='button' class='btn btn-previous btn-fill btn-info btn-wd' name='previous' value='Trước' />
								</div>
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div> <!-- wizard container -->
			</div>
		</div><!-- end row -->
	</div> <!--  big container -->


	<div class="footer">
		<div class="container text-center">
			Made with <i class="fa fa-heart heart"></i> by <a href="https://www.facebook.com/hoangbug20/">Hoang Bug</a>
		</div>
	</div>
</div>