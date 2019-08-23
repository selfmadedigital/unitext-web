<?php
	error_reporting(E_ALL); ini_set('display_errors', '1');
	require_once 'vendor/autoload.php';
	require_once 'include/functions.php';
	require_once 'recaptchalib.php';
?>

<!DOCTYPE html>
<html dir="ltr" lang="<?php echo $lang.'-'.strtoupper($lang); ?>">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-144210406-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-144210406-1');
	</script>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Dominik Balúch" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
	<link rel="stylesheet" href="css/fileinput.css" type="text/css" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" />
	<link rel="stylesheet" href="css/slick-theme.css" type="text/css" />
	<link rel="stylesheet" href="css/bs-rating.css" type="text/css" />
	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<link rel="stylesheet" href="css/colors.css" type="text/css" />

	<link rel="apple-touch-icon" sizes="57x57" href="/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/icon/favicon-16x16.png">
	<link rel="manifest" href="/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<style>
		#about_slider{
			display: none;
		}
	</style>
	<title>Unitext.<?php echo $lang;?></title>
</head>

<body class="stretched">
	<div id="wrapper" class="clearfix">
		<header id="header" class="sticky-style-2">
			<div class="container clearfix">
				<div id="logo" class="divcenter">
					<a href="#top" class="standard-logo"><img class="divcenter" src="images/logo.png" alt="Canvas Logo"></a>
					<a href="#top" class="retina-logo"><img class="divcenter" src="images/logo@2x.png" alt="Canvas Logo"></a>
				</div>
			</div>
			<div id="header-wrap">
				<div id="mini-logo" class="divcenter">
					<a href="#top" class="standard-logo"><img class="divcenter" src="images/logo-mini.png" alt="Canvas Logo"></a>
					<a href="#top" class="retina-logo"><img class="divcenter" src="images/logo-mini@2x.png" alt="Canvas Logo"></a>
				</div>
				<nav id="primary-menu" class="style-2 center">
					<div class="container clearfix">
						<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
						<div id="language-menu-mobile" class="divcenter text-center">
							<?php 
							echo '<a href="';
							echo $lang == 'sk' ? '#" class="current"' : 'https://www.unitext.sk"';
							echo '>SK</a>';
							echo '|';
							echo '<a href="';
							echo $lang == 'cz' ? '#" class="current"' : 'https://www.unitext.cz"';
							echo '>CZ</a>';
							?>
						</div>
						<ul class="sf-js-enabled" style="touch-action: pan-y;">
							<?php
							$first = true;
							if ($result = $mysqli->query("SELECT text,href FROM menus WHERE lang = '".$lang."'")) {
								while ($obj = $result->fetch_object()) {
									echo '<li class="sub-menu';
									if($first){
										echo ' current';
									}
									echo '"><a href="#'.$obj->href.'" class="sf-with-ul"><div>'.$obj->text.'</div></a></li>';
									$first = false;
								}

								$result->close();
							}
							?>
						</ul>
					</div>
				</nav>
				<div id="language-menu" class="divcenter text-center">
					<?php 
					echo '<a href="';
					echo $lang == 'sk' ? '#" class="current"' : 'https://www.unitext.sk"';
					echo '>SK</a>';
					echo '|';
					echo '<a href="';
					echo $lang == 'cz' ? '#" class="current"' : 'https://www.unitext.cz"';
					echo '>CZ</a>';
					?>
				</div>
			</div>
		</header>
		
		<section id="content">
			<div class="content-wrap">
				<div class="section parallax dark center notopmargin nobottommargin skrollable skrollable-between" style="background-image: url(&quot;images/services/home-testi-bg.jpg&quot;); background-size: cover; padding: 50px 0px; background-position: 0px -235.567px;" data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -500px;">
					<div class="container clearfix">
						<div class="heading-block center">
							<?php
								echo "<h3 class='firstWord'>".get_translated_content($content, 'heading_title')."</h3>";
								echo "<span>".get_translated_content($content, 'heading_text')."</span>";
							?>
						</div>
					</div>
				</div>
				
				<div class="section nobottommargin notopmargin page-section" id="about">
					<div class="container clear-bottommargin clearfix">
						<div class="heading-block center">
							<h2><?php echo get_translated_content($content, 'about_title');?></h2>
							<span><?php echo "<span>".get_translated_content($content, 'about')."</span>";?></span>
						</div>
					</div>
				</div>

				<div class="section nobottommargin notopmargin page-section" id="services">
					<div class="container clear-bottommargin clearfix">
						<div class="heading-block center">
							<h2><?php echo get_translated_content($content, 'services_title');?></h2>
						</div>

						<div class="row topmargin-sm clearfix">
							<?php
							if ($result = $mysqli->query("SELECT title, content, icon FROM services WHERE lang = '".$lang."'")) {
								while ($obj = $result->fetch_object()) {
									echo '<div class="col-lg-4 bottommargin text-center">';
									echo '<i class="i-plain color i-large icon-line2-'.$obj->icon.' inline-block" style="margin-bottom: 15px;"></i>';
									echo '<div class="heading-block nobottomborder" style="margin-bottom: 15px;">';
									echo '<h4>'.$obj->title.'</h4>';
									echo '</div>';
									echo '<p>'.$obj->content.'</p>';
									echo '</div>';
								}
								
								$result->close();
							}
							?>
						</div>	
					</div>
				</div>


				<div class="section parallax dark notopmargin page-section" style="background-image: url('images/services/home-testi-bg.jpg');" data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;" id="reviews">
					<div class="heading-block center">
						<h2><?php echo get_translated_content($content, 'reviews_title');?></h2>
					</div>

					<div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
						<div class="flexslider">
							<div class="slider-wrap">
								<?php
								if ($result = $mysqli->query("SELECT user, user_picture, rating, text, date FROM reviews WHERE allowed = '1'")) {
									while ($obj = $result->fetch_object()) {
										$stars_width = 100/5*$obj->rating;
										echo '<div class="slide">';
											echo '<div class="testi-image">';
												if(!$obj->user_picture){
													$obj->user_picture = '/images/avatar.jpg';
												}
												echo '<img src="'.$obj->user_picture.'" alt="'.$obj->user.'">';
											echo '</div>';
											echo '<div class="rating-container rating-sm rating-animate rating-disabled">';
												echo '<div class="rating-stars">';
													echo '<span class="empty-stars">';
													for ($i = 0; $i < 5; $i++){
														echo '<span class="star"><i class="icon-star-empty"></i></span>';
													}
													echo '</span>';
													echo '<span class="filled-stars" style="width: '.$stars_width.'%;">';
													for ($i = 0; $i < 5; $i++){
														echo '<span class="star"><i class="icon-star3"></i></span>';
													}
													echo '</span>';
												echo '</div>';
											echo '</div>';	
											echo '<div class="testi-content">';
												echo '<p>'.$obj->text.'</p>';
												echo '<div class="testi-meta">';
													echo $obj->user;
												echo '</div>';
											echo '</div>';
										echo '</div>';
									}
								}
								?>
							</div>
						</div>
					</div>

				</div>

				
				<div class="container clearfix" id="partners">
					<div class="customer-logos">
						<?php
						if ($result = $mysqli->query("SELECT name, image FROM partners ORDER BY sort")) {
							while ($obj = $result->fetch_object()) {
								echo '<div class="slide"><img src="https://api.unitext.sk'.$obj->image.'" alt="'.$obj->name.'"></div>';
							}
							$result->close();
						}
						?>
					</div>
				</div>

				<div class="section parallax notopmargin nobottommargin page-section" id="prices">
					<div class="heading-block center">
						<h3><?php echo get_translated_content($content, 'prices_title');?></h3>
					</div>
					<div class="container clearfix">
						<div class="row pricing bottommargin clearfix">
							<?php
							if ($result = $mysqli->query("SELECT title, subtitle, price, content FROM prices WHERE lang='".$lang."'")) {
								$index = 1;
								$currency = $lang == 'sk' ? '€' : 'Kč';
								while ($obj = $result->fetch_object()) {
									?>
											<div class="pricing-box">
												<div class="pricing-title">
													<h3><?php echo $obj->title; ?></h3>
													<span><?php echo $obj->subtitle; ?></span>
												</div>
												<div class="pricing-price">
													<?php
													if($obj->price == null || $obj->price == 0){
														echo '<span>'.get_translated_content($content, 'prices_quote').'</span>';
													}else{
														echo get_pretty_price($obj->price).'<span class="price-unit">'.$currency.'</span>';
													}
													?>
												</div>
												<div class="pricing-features">
													<?php echo html_entity_decode(htmlspecialchars_decode($obj->content)); ?>
												</div>
											</div>
										<?php
								}
								$result->close();
							}
							?>
							</div>
						</div>
					</div>
				</div>

				<div class="section parallax notopmargin nobottommargin page-section" id="contact">
					<div class="container clearfix">
						<div class="heading-block center">
							<h3><?php echo get_translated_content($content, 'contact_title');?></h3>
						</div>
						<div class="row clearfix">
							<div class="col-lg-6 bottommargin">
								<div class="team team-list clearfix">
								<div class="team-image">
									<img src="images/profile.png" alt="John Doe">
								</div>
								<div class="team-desc">
									<div class="team-title">
										<h4>Bc. Dominika Nízka</h4>
										<span>Copywriter</span>
									</div>
									<ul class="iconlist">
										<?php
										if ($result = $mysqli->query("SELECT title, value FROM contacts WHERE type = 'contact'")) {
											while ($obj = $result->fetch_object()) {
												echo '<li><i class="icon-'.$obj->title.'"></i> '.$obj->value;
												if($obj->title == 'mail'){
													echo '@unitext.'.$lang;
												}
												echo '</li>';
											}
											
											$result->close();
										}
										?>
									</ul>
									<?php
									if ($result = $mysqli->query("SELECT title, value FROM contacts WHERE type = 'social'")) {
										while ($obj = $result->fetch_object()) {
											if($obj->value != null){
												echo '<a href="'.$obj->value.'" class="social-icon si-rounded si-small si-light si-'.strtolower($obj->title).'">';
												echo '<i class="icon-'.strtolower($obj->title).'"></i>';
												echo '<i class="icon-'.strtolower($obj->title).'"></i>';
												echo '</a>';
											}
										}
										
										$result->close();
									}
									?>
								</div>
								</div>
							</div>
							<div class="col-lg-6 bottommargin">
								<div id="q-contact" class="widget quick-contact-widget form-widget clearfix" data-alert-type="inline">
								<div id="q-contact-logo-wrapper">
									<img src="images/logo-contact.png" alt="Unitext.sk" />
								</div>
								<div class="quick-contact-form-result"></div>
								<form id="contact-form" name="quick-contact-form" action="form.php" enctype="multipart/form-data" method="post" class="quick-contact-form nobottommargin" novalidate="novalidate" >
									<div class="form-process"></div>
									<input data-validation="required" type="text" class="required sm-form-control input-block-level" id="quick-contact-form-name" name="quick-contact-form-name" value="" placeholder="<?php echo get_translated_content($content, 'contact_form_name');?>">
									<input data-validation="email" type="text" class="required sm-form-control email input-block-level" id="quick-contact-form-email" name="quick-contact-form-email" value="" placeholder="<?php echo get_translated_content($content, 'contact_form_email');?>">
									<textarea data-validation="required" class="required sm-form-control input-block-level short-textarea" id="quick-contact-form-message" name="quick-contact-form-message" rows="4" cols="30" placeholder="<?php echo get_translated_content($content, 'contact_form_message');?>"></textarea>
									
									<div class="file-input file-input-new">
										<div class="kv-upload-progress kv-hidden" style="display: none;">
											<div class="progress">
											<div class="progress-bar bg-success progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
												0%
											</div>
											</div>
										</div>
										<div class="clearfix"></div>

										<div class="input-group file-caption-main">
											<div class="file-caption form-control kv-fileinput-caption" tabindex="500">
											<span class="file-caption-icon"></span>
											<input id="file-input-label" class="file-caption-name valid" onkeydown="return false;" placeholder="<?php echo get_translated_content($content, 'contact_form_attachment');?>">
											</div>
											<div class="input-group-btn input-group-append">
											<div tabindex="500" class="btn btn-secondary btn-file">  <span class="hidden-xs"><?php echo get_translated_content($content, 'contact_form_browse');?></span><input type="file" data-validation="mime size" data-validation-allowing="jpg, png, gif, doc, docx, xls, xlsx, pdf" data-validation-max-size="5MB" data-validation-error-msg-size="Maximálna veľkosť prílohy je 5MB!" data-validation-error-msg-mime="You can only upload images" id="attachment-input" name="quick-contact-form-attachment" class="" data-show-preview="false"></div>
											</div>
										</div>
									</div>
									 <div id="google_recaptcha" class="g-recaptcha" data-sitekey="6LfevKwUAAAAAJOK6tYiPlFQBxI7vq-ixHVWdI5q" data-callback="recaptchaCallback"></div>
									 <input type="hidden" id="recaptcha-validation" data-validation="required captcha_valid" />
									<button type="submit" id="contact-form-submit" name="quick-contact-form-submit" class="button button-small button-3d nomargin" value="submit"><?php echo get_translated_content($content, 'contact_form_send');?></button>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
		</section>

		<footer id="footer" class="dark">
			<div id="copyrights">
				<div class="container clearfix">
					<div class="col_half">
						Copyrights &copy; 2019
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div id="gotoTop" class="icon-angle-up"></div>

	<script src="js/jquery.js"></script>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=<?php echo $captcha_lang;?>" async defer></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/functions.js"></script>

	<script>
		var localizedMessages = {
			errorTitle: '<?php echo get_translated_content($content, 'contact_form_error_failed');?>',
			requiredFields: '<?php echo get_translated_content($content, 'contact_form_error_required_fields');?>',
			badEmail: '<?php echo get_translated_content($content, 'contact_form_error_bad_email');?>',
			lengthTooLongStart: '<?php echo get_translated_content($content, 'contact_form_error_length');?>',
			wrongFileSize: '<?php echo get_translated_content($content, 'contact_form_error_big_file');?>',
			wrongFileType: '<?php echo get_translated_content($content, 'contact_form_error_type_file');?>',
			captchaMissing : '<?php echo get_translated_content($content, 'contact_form_error_captcha');?>',
		};
			
		$.formUtils.addValidator({
			name : 'captcha_valid',
			validatorFunction : function(value, $el, config, language, $form) {
				return value === 'ok';
			},
			errorMessage : '<?php echo get_translated_content($content, 'contact_form_error_captcha');?>',
			errorMessageKey: 'captchaMissing'
		});

		$.validate({
			modules : 'file',
			errorMessagePosition : 'top',
			language: localizedMessages,
			borderColorOnError : '#b94a48b8',
		});

	  	function recaptchaCallback() {
			$('#recaptcha-validation').val('ok');
		};
	</script>
</body>
</html>