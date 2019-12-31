
		<!-- contents_header/ -->
			<!-- <p class="text-right mg-x-10"><a class="arrow-right flag-en" href="https://factory-vn.com">ENGLISH</a></p> -->
		<p class="text-right mg-x-10">
			<?php
				$langAllow = ['eng', 'jpn'];
				$reqFrag = explode('/', $this->here);
				$compare = array_intersect($reqFrag, $langAllow);
				$langUrl = $this->here;
				if (!empty($compare)) {
					foreach ($compare as $langCode) {
						if (($key = array_search($langCode, $reqFrag)) !== false) {
						    unset($reqFrag[$key]);
						}
					}

					$reqFrag = array_filter($reqFrag);
					$langUrl = implode('/', $reqFrag);
				}					

				if (Configure::read('Config.language') == 'eng') {
					echo $this->Html->link(
						'Japanese',
						'/jpn/'.$langUrl.'/',
						array('class'=>'arrow-right flag-jp')
					);
				} else {
					echo $this->Html->link(
						'English',
						'/eng/'.$langUrl.'/',
						array('class'=>'arrow-right flag-en')
					);
				}
			?>
		</p>
	
		<!-- /contents_header -->

		<!-- contents_header_inquiry/ -->
		<div class="contents_header_inquiry">
			<div class="contents_header_inquiry_ttl flex-item">
				<p><?php echo __('contact-title') ?></p>
			</div>
			<ul class="contents_header_inquiry_contact flex-item d-flex">
				<li class="contents_header_inquiry_tel01">
					<i class="fa fa-phone" aria-hidden="true"></i> +84 888 767 138
				</li>
				<li class="contents_header_inquiry_tel02">
					<i class="fa fa-envelope-open" aria-hidden="true"></i> info@fact-link.com.vn
				</li>
				<li>
					<p>
						<a href="<?php echo $this->webroot; ?>contact/">
							<i class="fas fa-envelope mr-5"></i>
							<?php echo __('contact-mail-box') ?>
						</a>
				</p></li>
			</ul>
		</div>
		<!-- /contents_header_inquiry -->
