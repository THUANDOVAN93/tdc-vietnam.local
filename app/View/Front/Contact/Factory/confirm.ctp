		<!-- topicpath/ -->
		<ul id="topicpath">
			<li class="home"><a href="<?php echo $this->webroot; ?>">TOP</a></li>
			<li>
				<?php echo __('contact'); ?>
			</li>
		</ul>
		<!-- /topicpath -->
		
		<div id="contactCnt">
			<h2 class="contact-title">
				<?php echo __('inquiry-form'); ?>
			</h2>

			<p>
				<?php echo __('contact-confirm'); ?>
			</p>

				<table border="0" cellspacing="0" cellpadding="0" summary="Inquiry form">
					<col width="25%" />
					<col width="" />
					<tr>
						<th scope="row">
							<?php echo __('name'); ?>
						</th>
						<td>
							<?php echo h($contact['name']); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<?php echo __('phone-number'); ?>
						</th>
						<td>
							<?php echo h($contact['tel']); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<?php echo __('company'); ?>
						</th>
						<td>
							<?php echo h($contact['company_name']); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<?php echo __('mail-address'); ?>
						</th>
						<td>
							<?php echo h($contact['email1']); ?>@<?php echo h($contact['email2']); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">
							<?php echo __('inquiry'); ?>
						</th>
						<td>
							<?php echo nl2br(h($contact['message'])); ?>
						</td>
					</tr>
				</table>
				<div id="btn" class="normal-form">
					<ul class="clearfix">
						<li class="d-inline-block mr-15"><a id="submit" onclick="$('#form').submit(); return false;">
							<?php echo __('send'); ?>
						</a></li>
						<li class="d-inline-block"><a id="back" onclick="$('#form_back').submit(); return false;">
							<?php echo __('return-to-input-screen'); ?>
						</a></li>
					</ul>
				</div>
			<?php echo $this->Form->create('ContactFactory', array('id' => 'form', 'url' => '/contact/factory/complete')); ?>
				<?php echo $this->Form->hidden('name'); ?>
				<?php echo $this->Form->hidden('tel'); ?>
				<?php echo $this->Form->hidden('email'); ?>
				<?php echo $this->Form->hidden('company_name'); ?>
				<?php echo $this->Form->hidden('message'); ?>
			<?php echo $this->Form->end(); ?>
			<?php echo $this->Form->create('ContactFactory', array('id' => 'form_back', 'url' => '/contact/factory/back')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
		<!-- / #contactCnt -->
