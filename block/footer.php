		<div class="bl10">
			<div class="bl10_c" data-aos="fade-up">
				<div class="head_c txt_c">
					<h4><?=t::w('Still have questions?')?></h4>
					<p><?=t::w('bl10_w')?></p>
				</div>
				<div class="form_c">
					<div class="form_im dsp_n"><input type="text" class="sms" value="Консультация 2"></div>
					<div class="form_im"><input type="tel" class="form_im_txt fr_phone phone " placeholder="8 (___) ___-__-__" ></div>
					<div class="form_im"><div class="btn send"><span><?=t::w('submit your')?></span></div></div>
				</div>
			</div>
		</div>

	<!-- end body -->
	</div>
	
	<? if ($site_set['footer']): ?>
		<!-- start footer -->
		<footer class="footer">
			<div class="bl_c">
				<div class="footer_t">
					<div class="footer_tt">
						<div class="footer_ttl">
							<div class="footer_tth"><?=$site['name']?></div>
							<div class="footer_ttc footer_ttc2">
								<div class="footer_ttp"><?=t::w('footer_of1')?></div>
								<a class="btn btn_back" href="#"><?=t::w('More3')?></a>
							</div>
						</div>
						<div class="footer_ttr">
							<div class="footer_ttri">
								<div class="footer_tth"><?=t::w('Help')?></div>
								<div class="footer_tta"><i class="far fa-angle-down"></i></div>
								<div class="footer_ttc">
									<a href="/about/feedback/"><?=t::w('Feedback')?></a>
									<a href="/about/address.php"><?=t::w('Find a branch')?></a>
									<a href="/about/faq/"><?=t::w('FAQ')?></a>
									<a href="/about/privacy/returns-claims.php"><?=t::w('Return policy')?></a>
									<a href="/about/privacy/guarantee.php"><?=t::w('Guarantee')?></a>
								</div>
							</div>
							<div class="footer_ttri">
								<div class="footer_tth"><?=t::w('About company')?></div>
								<div class="footer_tta"><i class="far fa-angle-down"></i></div>
								<div class="footer_ttc">
									<a href="/about/"><?=$site['name']?> <?=t::w('this')?></a>
									<a href="/about/contact.php"><?=t::w('Contacts')?></a>
									<a href="/about/career/"><?=t::w('Career')?></a>
									<a href="/about/partners/"><?=t::w('Partners')?></a>
									<a href="/news/"><?=t::w('News')?></a>
								</div>
							</div>
							<div class="footer_ttri">
								<div class="footer_tth"><?=t::w('Policy')?> <?=$site['name']?></div>
								<div class="footer_tta"><i class="far fa-angle-down"></i></div>
								<div class="footer_ttc">
									<a href="/about/privacy/privacy-policy.php"><?=t::w('Privacy Policy')?></a>
									<a href="/about/privacy/terms-of-use.php"><?=t::w('Terms of use')?></a>
									<a href="/about/privacy/cookie-policy.php"><?=t::w('Cache (cookie) policy')?></a>
								</div>
							</div>
						</div>
					</div>
					<div class="footer_tb">
						<div class="footer_tbl">
							<a class="btn btn_dd" href="https://instagram.com/<?=$site['instagram']?>" target="_blank"><i class="fab fa-instagram"></i></a>
							<a class="btn btn_dd" href="https://youtube.com/<?=$site['youtube']?>" target="_blank"><i class="fab fa-youtube"></i></a>
							<a class="btn btn_dd" href="https://t.me/<?=$site['telegram']?>" target="_blank"><i class="fab fa-telegram"></i></a>
						</div>
						<div class="footer_tbr">
							<div class="btn btn_p">
								<span>Русский</span>
								<i class="fal fa-angle-down"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="footer_b">
					<div class="footer_bl">© <?=$site['name']?>, 2022</div>
					<div class="footer_br">
						<a href="https://gprog.kz" target="_blank" class="gprog_bl">
							<span>#gprog-та</span>
							<div class="gprog_heart"><i class="fas fa-heart"></i></div>
							<span>жасалған</span>
							<div class="gprog_ab">
								<div class="gprog_lg"><div class="lazy_img" data-src="https://gprog.kz/assets/img/logo/logo.png"></div></div>
								<div class="gprog_h">G prog</div>
								<div class="gprog_p">Шипажайға арнап сайт жасатыңыз</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</footer>
	<? endif ?>

	<!-- main js -->
	<script src="/assets/js/norm.js?v=<?=$ver?>"></script>
	<? foreach ($js as $i): ?> <script src="/assets/js/<?=$i?>.js?v=<?=$ver?>"></script> <? endforeach ?>

	<? if ($site['metrika'] != null): ?><noscript><div><img src='https://mc.yandex.ru/watch/<?=$site['metrika']?>' style='position:absolute; left:-9999px;'/></div></noscript><?php endif ?>
	<? if ($site['pixel'] != null): ?><noscript><img height='1' width='1' style='display:none' src='https://www.facebook.com/tr?id=<?=$site['pixel']?>&ev=PageView&noscript=1'/></noscript><?php endif ?>

</body>
</html>

	<? include 'modal.php'; ?>