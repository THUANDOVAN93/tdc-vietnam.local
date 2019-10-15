		<!-- topicpath/ -->
		<ul id="topicpath">
			<li class="home"><a href="<?php echo $this->webroot; ?>">TOP</a></li>
			<li><?php echo __('contact'); ?></li>
		</ul>
		<!-- /topicpath -->
		
		<div id="contactCnt">
			<h2 class="contact-title"><?php echo __('inquiry-form'); ?></h2>
			<p class="thanksTxt">
				<?php
					echo __('contact-thank-text-1');
					echo '<br/>';
					echo __('contact-thank-text-2');
					echo '<br/>';
					echo __('contact-thank-text-3');
					echo '<br/>';
					echo __('contact-thank-text-4');
				?>
			</p>
			<p id="home"><a href="<?php echo $this->webroot; ?>"><?php echo __('back-to-top'); ?></a></p>
		</div>
		<!-- / #contactCnt -->
