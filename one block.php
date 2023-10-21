<div class="bj_w">
			<div class="bl_c">
				<div class="bj_wc">
					<div class="ucours_tm bj_wcq bj_wcq_country" bj_wcq_act>
						<div class="ucours_tmi bj_wcqn">
							<p><i class="fal fa-globe"></i></p>
							<span>Казақстан</span>
							<i class="fal fa-chevron-down"></i>
						</div>
						<div class="menu_c ucours_tma">
							<? $cow = db::query("select * from `country` where parent_id is null"); ?>
							<? while($ana = mysqli_fetch_array($cow)): ?>
								<div class="menu_ci" data-id="<?=$ana['id']?>">
									<!-- <div class="menu_cin"><i class="fal fa-square"></i></div> -->
									<div class="menu_cih"><?=$ana['name_'.$lang]?></div>
								</div>
							<? endwhile ?>
						</div>
					</div>
					<div class="ucours_tm bj_wcq bj_wcq_country2">
						<div class="ucours_tmi bj_wcqn">
							<p><i class="fal fa-map-marker-alt"></i></p>
							<span><?=t::w('All regions', $lang)?></span>
							<i class="fal fa-chevron-down"></i>
						</div>
						<div class="menu_c ucours_tma">
							<? $cow = db::query("select * from `country` where parent_id is not null"); ?>
							<? while($ana = mysqli_fetch_array($cow)): ?>
								<div class="menu_ci" data-id="<?=$ana['id']?>">
									<div class="menu_cih"><?=$ana['name_'.$lang]?></div>
								</div>
							<? endwhile ?>
						</div>
					</div>
					<div class="ucours_tm bj_wcq bj_wcq_services">
						<div class="ucours_tmi bj_wcqn">
							<p><i class="fal fa-user-md"></i></p>
							<span><?=t::w('All types of treatment', $lang)?></span>
							<i class="fal fa-chevron-down"></i>
						</div>
						<div class="menu_c ucours_tma">
							<? $cow = db::query("select * from `services`"); ?>
							<? while($ana = mysqli_fetch_array($cow)): ?>
								<div class="menu_ci" data-id="<?=$ana['id']?>">
									<div class="menu_cih"><?=$ana['name_'.$lang]?></div>
								</div>
							<? endwhile ?>
						</div>
					</div>
					<div class="bj_wcq">
						<div class="btn bj_wcq_btn"><?=t::w('Find', $lang)?></div>
					</div>
				</div>
			</div>
		</div>