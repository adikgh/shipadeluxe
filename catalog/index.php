<? include '../config/core.php';



	
	$country = '';

	// filter
	if ($_GET['country'] && $_GET['country'] != 0) {
		$country_id = $_GET['country'];

		$cow = db::query("select * from `country` where parent_id = $country_id");
		while ($cow_res = mysqli_fetch_array($cow)) $country = $country.$cow_res['id'].',';
		$country = substr($country, 0, -1);
		$sql_all = db::query("select * from sanatorium where country_id in('$country') and number is not null");
	} elseif ($_GET['country2'] && $_GET['country2'] != 0) {
		$country2_id = $_GET['country2'];
		$sql_all = db::query("select * from sanatorium where country_id = '$country2_id' and number is not null");
	} elseif ($_GET['services'] && $_GET['services'] != 0) {
		$services_id = $_GET['services'];
		$sql_all = db::query("select * from sanatorium where `services_id` LIKE '%$services_id%' and number is not null");
	} else $sql_all = db::query("select * from sanatorium where number is not null");
	$page_result = mysqli_num_rows($sql_all);
	
	// page number
	$page = 1; if ($_GET['page'] && is_int(intval($_GET['page']))) $page = $_GET['page'];
	$page_age = 50;
	$page_all = ceil($page_result / $page_age);
	if ($page > $page_all) $page = $page_all;
	$page_start = ($page - 1) * $page_age;
	$number = $page_start;
	
	// filter
	// else $product = db::query("select * from product where arh = 0 order by ins_dt desc limit $page_start, $page_age");
	if ($_GET['country'] && $_GET['country'] != 0) $sql = db::query("select * from sanatorium where country_id in('$country') and number is not null ORDER BY number ASC");
	elseif ($_GET['country2'] && $_GET['country2'] != 0) $sql = db::query("select * from sanatorium where country_id = '$country2_id' and number is not null ORDER BY number ASC");
	elseif ($_GET['services'] && $_GET['services'] != 0) $sql = db::query("select * from sanatorium where `services_id` LIKE '%$services_id%' and number is not null ORDER BY number ASC");
	else $sql = db::query("select * from `sanatorium` where number is not null ORDER BY number ASC");







	// site setting
	$menu_name = 'catalog';
	$site_set['tabs'] = true;
	$site_set['css'] = true;
	$site_set['js'] = true;
	$site_set['bl8'] = false;
	$site_set['bl14'] = false;
?>
<? include '../block/header.php'; ?>

	<div class="blc1">
		<div class="bl_c">
			<div class="head_c">
				<h4 class=""><?=t::w('Choice of sanatorium')?></h4>
				<div class="head_ln">
					<ul>
						<li><a href="/"><?=t::w('Home')?></a></li>
						<span><i class="fal fa-angle-right"></i></span>
						<li><?=t::w('Choice of sanatorium')?></li>
					</ul>
				</div>
				<!-- <div class="head_btn">
					<div class="btn btn_sqr btn_filtr"><i class="far fa-sliders-v"></i></div>
				</div> -->
			</div>
		</div>
	</div>

	<div class="blc2">
		<div class="bl_c">
			<div class="blc2_c">
			
				<div class="">
					<div class="products_s">
						<div class="products_sl">
							<!-- <div class="ucours_tm">
								<div class="ucours_tmi ucours_tm_act">
									<i class="fal fa-sort ucours_tmic"></i>
									<span>Сортировка</span>
									<i class="fal fa-angle-down ucours_tmis"></i>
								</div>
								<div class="menu_c ucours_tma">
									<a class="menu_ci" href="/admin/products/all/?sort=1">
										<div class="menu_cin"><i class="fal fa-circle"></i></div>
										<div class="menu_cih">по дата создание</div>
									</a>
									<a class="menu_ci" href="/admin/products/all/?sort=1">
										<div class="menu_cin"><i class="fal fa-circle"></i></div>
										<div class="menu_cih">по названием</div>
									</a>
									<a class="menu_ci" href="/admin/products/all/?sort=1">
										<div class="menu_cin"><i class="fal fa-circle"></i></div>
										<div class="menu_cih">по ценам</div>
									</a>
								</div>
							</div> -->
							<div class="ucours_tm">
								<div class="ucours_tmi ucours_tm_act">
									<i class="fal fa-globe ucours_tmic"></i>
									<span>Страна</span>
									<i class="fal fa-angle-down ucours_tmis"></i>
								</div>
								<div class="menu_c ucours_tma">
									<? $cow = db::query("select * from `country` where parent_id is null"); ?>
									<? while($ana = mysqli_fetch_array($cow)): ?>
										<a class="menu_ci" href="<?=$url.'?country='.$ana['id'].'&country2='.$country_id.'&services='.$services_id?>">
											<!-- <div class="menu_cin"><i class="fal fa-square"></i></div> -->
											<div class="menu_cih"><?=$ana['name_'.$lang]?></div>
										</a>
									<? endwhile ?>
								</div>
							</div>
							<div class="ucours_tm">
								<div class="ucours_tmi ucours_tm_act">
									<i class="fal fa-map-marker-alt ucours_tmic"></i>
									<span>Регион</span>
									<i class="fal fa-angle-down ucours_tmis"></i>
								</div>
								<div class="menu_c ucours_tma">
									<? $cow = db::query("select * from `country` where parent_id is not null"); ?>
									<? while($ana = mysqli_fetch_array($cow)): ?>
										<a class="menu_ci" href="<?=$url.'?country='.$country_id.'&country2='.$ana['id'].'&services='.$services_id?>">
											<!-- <div class="menu_cin"><i class="fal fa-square"></i></div> -->
											<div class="menu_cih"><?=$ana['name_'.$lang]?></div>
										</a>
									<? endwhile ?>
								</div>
							</div>
							<div class="ucours_tm">
								<div class="ucours_tmi ucours_tm_act">
									<i class="fal fa-user-md ucours_tmic"></i>
									<span>Лечение</span>
									<i class="fal fa-angle-down ucours_tmis"></i>
								</div>
								<div class="menu_c ucours_tma">
									<? $cow = db::query("select * from `services`"); ?>
									<? while($ana = mysqli_fetch_array($cow)): ?>
										<a class="menu_ci" href="<?=$url.'?country='.$country_id.'&country2='.$country2_id.'&services='.$ana['id']?>">
											<!-- <div class="menu_cin"><i class="fal fa-square"></i></div> -->
											<div class="menu_cih"><?=$ana['name_ru']?></div>
										</a>
									<? endwhile ?>
								</div>
							</div>
							<? if (($_GET['country'] && $_GET['country'] != 0) || ($_GET['country2'] && $_GET['country2'] != 0) || ($_GET['services'] && $_GET['services'] != 0)): ?>
								<div class="ucours_tm">
									<a class="ucours_tmi " href="/catalog/">
										<i class="fal fa-times ucours_tmic"></i>
										<span>Сбросить</span>
									</a>
								</div>
							<? endif ?>
							<!-- <div class="ucours_tm">
								<div class="ucours_tmi ucours_tm_act">
									<i class="fal fa-filter ucours_tmic"></i>
									<span>Все фильтры</span>
								</div>
							</div> -->
						</div>
						<div class="products_sr">
							<div class="products_sr_it"><?=$page_result?> <?=t::w('positions')?></div>
						</div>
					</div>
				</div>

				<div class="blc2_b">
					<? while ($ana = mysqli_fetch_array($sql)): ?>
						<? $id = $ana['id']; ?>

						<a class="bl5_i" href="/sanatorium/?id=<?=$ana['id']?>" target="_blank">
							<div class="bl5_ia" href="/sanatorium/?id=<?=$ana['id']?>">
								<div class="lazy_bag" https://shipadeluxe.kz data-src="/assets/uploads/sanatorium/<?=$ana['img']?>"></div>
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
									<div class="bl5_icp"><?=t::w('from1').fun::p($ana['id'])?> тг. <?=t::w('from2')?></div>
									<div class="btn btn_dd btn_clm"><i class="fal fa-long-arrow-down"></i></div>
								</div>
							</div>
						</a>

					<? endwhile ?>
				</div>

			</div>
		</div>
	</div>

<? include '../block/footer.php'; ?>