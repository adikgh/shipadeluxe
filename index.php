<? include 'config/core.php';

	if (isset($_GET['ads'])) {
		if ($_GET['ads'] == 'g') {
			$_SESSION['ads'] = 'Google';
			if (isset($_GET['cit'])) {
				if ($_GET['cit'] == 'sr') $_SESSION['cit'] = 'Saryagash';
				else if ($_GET['cit'] == 'ala') $_SESSION['cit'] = 'Almaty';
				else if ($_GET['cit'] == 'bur') $_SESSION['cit'] = 'Burabai';
			}
		} else if ($_GET['ads'] == 'fb') $_SESSION['ads'] = 'Instagram';
	}


	$share_txt = 'Санатория жайлы ..';

	// header('location: /catalog/');

	// site setting
	$menu_name = 'home';
	if (isset($_GET['cit'])) $menu_name = 'home_'.$_GET['cit'];
	$site_set['visible'] = 'after';
	$site_set['header_wh'] = true;
	// $site_set['header_logo'] = 'cl';
	$site_set['preload'] = true;



	$bl1_offer = 'bl1_offer'; if (isset($_GET['cit'])) $bl1_offer = 'bl1_offer_'.$_GET['cit'];
	$bl1_disc = 'bl1_disc'; if (isset($_GET['cit'])) $bl1_disc = 'bl1_disc_'.$_GET['cit'];

?>
<? include 'block/header.php'; ?>

	<div class="bl1">
		<!-- <div class="bl1_a lazy_bag" data-src="/assets/img/bag/8.png"></div> -->
		<div class="bl1_a lazy_bag" data-src="/assets/img/bag/12.jpg"></div>

		<div class="bl_c">
			<div class="bl1_c">
				<div class="bl1_offer"><h1><?=t::w($bl1_offer, $lang)?></h1></div>
				<div class="bl1_disc"><p><?=t::w($bl1_disc, $lang)?></p></div>
				<div class="bl1_btn">
					<div class="btn btn2 disb_zab">Получить консультацию</div>
				</div>
			</div>
		</div>

	</div>

	<!--  -->
	<div class="bl7" id="bl2">
		<div class="bl_c">
			<div class="head_c txt_c">
				<div class="head_v1">
					<div class="head_vt" data-aos="fade-up"><?=t::w('Our advantages', $lang)?></div>
					<h3 data-aos="fade-up" data-aos-delay="100"><?=t::w('bl7_of2', $lang)?></h3>
				</div>
			</div>
			<div class="bl7_c">
				<? $sql = db::query("select * from `word_blocks` where type = 'bl7' and lang = '$lang' ORDER BY number ASC"); ?>
				<? while($ana = mysqli_fetch_array($sql)): ?>
					<div class="bl7_i" data-aos="fade-up">
						<div class="bl7_img lazy_bag" data-src="/assets/img/bag/<?=$ana['img']?>"></div>
						<h6 class="bl7_in"><?=$ana['txt1']?></h6>
						<p class="bl7_it"><?=$ana['txt2']?></p>
					</div>
				<? endwhile ?>
			</div>
			<div class="bl7_b" data-aos="fade-up">
				<p><?=t::w('bl7_of3', $lang)?></p>
				<a class="btn btn_whatsapp" target="_blank" href="https://wa.me/<?=$site['whatsapp']?>"><i class="fab fa-whatsapp"></i><span><?=t::w('Write', $lang)?></span></a>
			</div>
		</div>
	</div>

	<!--  -->
	<div class="bl5">
		<div class="bl_c">
			<div class="head_c txt_c">
				<div class="head_v1">
					<div class="head_vt"><?=t::w('OUR RECOMMENDATION', $lang)?></div>
					<h4><?=t::w('bl5_of', $lang)?></h4>
				</div>
			</div>
			<div class="bl5_c bl5_c2">
				<? $sql = db::query("select * from `sanatorium` where sel is not null and number is not null ORDER BY number ASC"); ?>
					<? while ($ana = mysqli_fetch_array($sql)): ?>
						<? $id = $ana['id']; ?>

						<a class="bl5_i bl5_i2" href="/sanatorium/?id=<?=$ana['id']?>" target="_blank">
							<div class="bl5_ia" href="/sanatorium/?id=<?=$ana['id']?>">
								<div class="lazy_bag"  data-src="https://shipadeluxe.kz/assets/uploads/sanatorium/<?=$ana['img']?>"></div>
							</div>
							<div class="bl5_ic">
								<div class="bl5_ict">
									<div class="bl5_ictq">
										<div class="bl5_icn"><?=$ana['name_'.$lang]?></div>
										<div class="bl5_icts"><?=fun::rank($ana['rank'])?></div>
									</div>
									<div class="bl5_iadd"><i class="fas fa-map-marker-alt"></i><?=$ana['address']?></div>

									<div class="bl5_iserv">
										<? $data_serv = db::query("select * from sanatorium_services_item where sanatorium_id = '$id'"); ?>
										<?	if (mysqli_num_rows($data_serv)): ?>
											<? $service_type = db::query("select * from sanatorium_services_type where sn = 1"); ?>
											<? while ($service_type_c = mysqli_fetch_array($service_type)): ?>
												<? $service_type_id = $service_type_c['id'] ?>
												<? $data_serv = db::query("select * from sanatorium_services_item where sanatorium_id = '$id' and type_id = '$service_type_id'"); ?>
												<?	if (mysqli_num_rows($data_serv)): ?>
													<div class="bl5_iserv_i"><?=$service_type_c['icon']?><?=$service_type_c['name_'.$lang]?>
														<!-- <?=mysqli_num_rows($data_serv)?> -->
													</div>
												<? endif ?>
											<? endwhile ?>
										<? endif ?>
									</div>

								</div>
								<div class="bl5_icb" href="/sanatorium/?id=<?=$ana['id']?>">
									<div class="bl5_icp"><?=t::w('from1', $lang).fun::p($ana['id'])?> тг. <?=t::w('from2', $lang)?></div>
									<div class="btn btn_dd btn_clm"><i class="fal fa-long-arrow-down"></i></div>
								</div>
							</div>
						</a>

					<? endwhile ?>
			</div>
			<div class="bl5_b">
				<p><?=t::w('bl5_of2', $lang)?></p>
				<a class="btn" href="/catalog"><span><?=t::w('View all', $lang)?></span><i class="far fa-long-arrow-right"></i></a>
			</div>
		</div>
	</div>

	<!--  -->
	<div class="bl4">
		<div class="bl_c">
		<form id="test1">
			<div class="bl4_con">

				<div class="head_c txt_c">
					<h4 data-aos="fade-up"><?=t::w('bl4_of', $lang)?></h4>
					<p data-aos="fade-up" data-aos-delay="100"><?=t::w('bl4_p', $lang)?></p>
				</div>

				<div class="bl4_cls swiper-container">
					<div class="gallery-pagination bl4_pag" data-aos="fade-up" data-aos-delay="150"></div>
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<h5 class="bl4_v" data-aos="fade-up" data-aos-delay="200"><?=t::w('tv1', $lang)?></h5>
							<div class="form_im form_imr">
								<div class="form_imri" data-aos="fade-up" data-aos-delay="250">
									<label class="radio" for="tv11">
										<input type="radio" name="tv1" value="1" id="tv11" checked>
										<span>1 <?=t::w('person', $lang)?></span>
									</label>
								</div>
								<div class="form_imri" data-aos="fade-up" data-aos-delay="300">
									<label class="radio" for="tv12">
										<input type="radio" name="tv1" value="2" id="tv12">
										<span>2 <?=t::w('person', $lang)?></span>
									</label>
								</div>
								<div class="form_imri" data-aos="fade-up" data-aos-delay="350">
									<label class="radio" for="tv13">
										<input type="radio" name="tv1" value="3-4" id="tv13">
										<span>3-4 <?=t::w('person', $lang)?></span>
									</label>
								</div>
								<div class="form_imri" data-aos="fade-up" data-aos-delay="400">
									<label class="radio" for="tv14">
										<input type="radio" name="tv1" value="<?=t::w('more', $lang)?>" id="tv14">
										<span><?=t::w('more', $lang)?></span>
									</label>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<h5 class="bl4_v"><?=t::w('tv2', $lang)?></h5>
							<div class="form_im form_imr">
								<div class="form_imri">
									<label class="radio" for="tv21">
										<input type="radio" name="tv2" value="5" id="tv21" checked>
										<span>5 <?=t::w('days', $lang)?></span>
									</label>
								</div>
								<div class="form_imri">
									<label class="radio" for="tv22">
										<input type="radio" name="tv2" value="7" id="tv22">
										<span>7 <?=t::w('days', $lang)?></span>
									</label>
								</div>
								<div class="form_imri">
									<label class="radio" for="tv23">
										<input type="radio" name="tv2" value="10" id="tv23">
										<span>10 <?=t::w('days', $lang)?></span>
									</label>
								</div>
								<div class="form_imri">
									<label class="radio" for="tv24">
										<input type="radio" name="tv2" value="<?=t::w('more2', $lang)?>" id="tv24">
										<span><?=t::w('more2', $lang)?></span>
									</label>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<h5 class="bl4_v"><?=t::w('tv3', $lang)?></h5>
							<div class="form_im form_imr">
								<div class="form_imri">
									<label class="radio" for="tv31">
										<input type="radio" name="tv3" value="эконом" id="tv31" checked>
										<span>Эконом</span>
									</label>
								</div>
								<div class="form_imri">
									<label class="radio" for="tv32">
										<input type="radio" name="tv3" value="Стандарт" id="tv32">
										<span>Стандарт</span>
									</label>
								</div>
								<div class="form_imri">
									<label class="radio" for="tv33">
										<input type="radio" name="tv3" value="Комфорт" id="tv33">
										<span>Комфорт</span>
									</label>
								</div>
								<div class="form_imri">
									<label class="radio" for="tv34">
										<input type="radio" name="tv3" value="Люкс" id="tv34">
										<span>Люкс</span>
									</label>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<h5 class="bl4_v"><?=t::w('tv4', $lang)?></h5>
							<div class="form_im"><input type="text" class="form_im_txt name" name="name" data-lenght="2" placeholder="<?=t::w('enter your name', $lang)?>" /></div>
							<div class="form_im"><input type="tel" class="form_im_txt phone phone2 fr_phone" name="phone" data-lenght="11" placeholder="8 (___) ___-__-__" /></div>
						</div>
					</div>
					<div class="bl4_clb" data-aos="fade-up">
						<div class="gallery-prev"><div class="btn btn_back"><i class="far fa-angle-left"></i><span><?=t::w('back', $lang)?></span></div></div>
						<div class="gallery-next"><div class="btn btn_back"><span><?=t::w('farther', $lang)?></span><i class="far fa-angle-right"></i></div></div>
						<div class="gallery-send"><div class="btn btn_back test1"><span><?=t::w('pick up', $lang)?></span><i class="far fa-angle-right"></i></div></div>
					</div>
				</div>
			</div>
		</form>
		</div>
	</div>

	<!--  -->
	<div class="bl13">
		<div class="bl_c" data-aos="fade-up">
			<div class="bl131_c">
				<div class="bl13_l">
					<div class="head_c">
						<h3><?=t::w('bl13_1o', $lang)?></h3>
						<p><?=t::w('bl13_1p', $lang)?></p>
					</div>
					<div class="btn disb_zab2"><span><?=t::w('give', $lang)?></span></div>
				</div>
				<div class="bl13_r"><div class="bl13_ri lz_bl13" data-src="assets/img/bag/sww122.jpeg"></div></div>
			</div>
		</div>
	</div>

	<!--  -->
	<div class="bl9">
		<div class="bl_c">
			<div class="head_c txt_c">
				<div class="head_v1">
					<div class="head_vt" data-aos="fade-up"><?=t::w('Guest Reviews', $lang)?></div>
					<h4 data-aos="fade-up" data-aos-delay="100"><?=t::w('bl9_of2', $lang)?></h4>
				</div>
			</div>
			<div class="bl9_c">
				<div class="swiper-container bl9_con">
					<div class="swiper-wrapper">
						<? $sql = db::query("select * from `sanatorium_reviews` where arh = 0"); ?>
						<? while ($ana = mysqli_fetch_array($sql)): ?>
							<div class="swiper-slide bl9_i" data-aos="fade-up">
								<div class="bl9_iln">
									<div class="bl9_iln2">
										<div class="bl9_ilogo lazy_rev" data-src="/assets/uploads/reviews/<?=$ana['img']?>"></div>
										<div class="bl9_ilc"><div class="bl9_ilname"><?=$ana['name']?></div><div class="bl9_ils"><?=t::w('source:', $lang).$ana['sn']?></div></div>
									</div>
									<div class="bl9_ildt">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
									</div>
								</div>
								<p class="bl9_it"><?=$ana['txt']?></p>
							</div>
						<? endwhile ?>
					</div>
				</div>
				<div class="swiper-button-prev bl9_prev"><div class="btn btn_sqr"><i class="fal fa-chevron-left"></i></div></div>
				<div class="swiper-button-next bl9_next"><div class="btn btn_sqr"><i class="fal fa-chevron-right"></i></div></div>
			</div>
			<div class="bl9_b" data-aos="fade-up">
				<p><?=t::w('bl9_of3', $lang)?></p>
				<a target="_blank" href="https://wa.me/<?=$site['whatsapp']?>"><div class="btn"><?=t::w('Communication', $lang)?></div></a>
			</div>
		</div>
	</div>

	<!--  -->
	<div class="bl11">
		<div class="bl_c">
			<div class="bl11_c">
				<div class="bl11_l">
					<div class="head_c"><h4><?=t::w('Frequently asked Questions', $lang)?></h4></div>
					<p><?=t::w('bl11_disc', $lang)?></p>
					<div class="bl11_btn"><div class="btn disb_zab"><span><?=t::w('submit your', $lang)?></span></div></div>
					<div class="bl11_a lazy_bag" data-src="/assets/img/bag/doc2.png"></div>
				</div>
				<div class="bl11_r">
					<div class='faq'>
						<? $sql = db::query("select * from `word_blocks` where type = 'bl11' and lang = '$lang' ORDER BY number ASC"); ?>
						<? while($ana = mysqli_fetch_array($sql)): ?>
							<div class="faq-a">
								<div class="faq-ah">
									<div class="faq-arrow"><i class="fal fa-chevron-right"></i></div>
									<h6 class="faq-heading"><?=$ana['txt1']?></h6>
								</div>
								<p class="faq-text"><?=$ana['txt2']?></p>
							</div>
						<? endwhile ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<? include 'block/footer.php'; ?>