		<!-- topicpath/ -->
		<ul id="topicpath">
			<li class="home"><a href="<?php echo $this->webroot; ?>">TOP</a></li>
			<li>お問い合わせ</li>
		</ul>
		<!-- /topicpath -->
		
		<div id="contactCnt">
			<h2><img src="<?php echo $this->webroot; ?>common/images/contact/header_ttl.png" width="730" height="40" alt="お問い合わせ" /></h2>
			<p>入力内容をご確認の上、お間違いなければ「送信」ボタンをクリックしてください。</p>

				<table border="0" cellspacing="0" cellpadding="0" summary="お問い合せフォーム">
					<col width="25%" />
					<col width="" />
					<!-- <tr>
						<th scope="row">物件名</th>
						<td>
							<?php //echo h($contact['buildings_name']); ?>
						</td>
					</tr> -->
					<tr>
						<th scope="row">お名前 / Name</th>
						<td>
							<?php echo h($contact['name']); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">電話番号 / Phone number</th>
						<td>
							<?php echo h($contact['tel']); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">会社名 / Company</th>
						<td>
							<?php echo h($contact['company_name']); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">メールアドレス / Mail address</th>
						<td>
							<?php echo h($contact['email1']); ?>@<?php echo h($contact['email2']); ?>
						</td>
					</tr>
					<!-- <tr>
						<th scope="row">業種</th>
						<td>
							<?php //echo h($contact['industry']); ?>
						</td>
					</tr> -->
					<!-- <tr>
						<th scope="row">住所</th>
						<td>
							<?php //echo h($contact['address']); ?>
						</td>
					</tr> -->
					<!-- <tr>
						<th scope="row">FAX</th>
						<td>
							<?php //echo h($contact['fax']); ?>
						</td>
					</tr> -->
					<!-- <tr>
						<th scope="row">BOIゾーン</th>
						<td>
							<?php //echo h($contact['boi_zone']); ?>
						</td>
					</tr> -->
					<!-- <tr>
						<th scope="row">ロケーション</th>
						<td>
							<?php //echo h($contact['location']); ?>
						</td>
					</tr> -->
					<!-- <tr>
						<th scope="row">進出形態</th>
						<td>
<?php if (isset($contact['factory_sub_category']) && $contact['factory_sub_category'] == "5") { ?>
							<ul>
								<li>
									<?php if (isset($contact['factory_sub_category'])) { echo h($factorySubCategories[$contact['factory_sub_category']]); } ?>
								</li>
							</ul>
							<table border="0" cellspacing="0" cellpadding="0">
								<tr>
									<th scope="row">必要面積</th>
									<td>
										<?php echo h($contact['floor_space_site']); ?>
									</td>
								</tr>
							</table>
<?php } ?>
<?php if (isset($contact['factory_sub_category']) && $contact['factory_sub_category'] != "5" && strlen($contact['factory_sub_category']) > 0) { ?>
							<ul>
								<li>
									<?php if (isset($contact['factory_sub_category'])) { echo h($factorySubCategories[$contact['factory_sub_category']]); } ?>
								</li>
							</ul>
							<table border="0" cellspacing="0" cellpadding="0">
								<tr>
									<th scope="row">必要面積</th>
									<td>
										<?php echo h($contact['floor_space_building']); ?>
									</td>
								</tr>
								<tr>
									<th scope="row">床耐荷重</th>
									<td>
										<?php echo h($contact['weight_limit']); ?>
									</td>
								</tr>
								<tr>
									<th scope="row">天井高</th>
									<td>
										<?php echo h($contact['building_height']); ?>
									</td>
								</tr>
							</table>
<?php } ?>
						</td>
					</tr> -->
					<tr>
						<th scope="row">お問い合わせ内容 / Inquiry</th>
						<td>
							<?php echo nl2br(h($contact['message'])); ?>
						</td>
					</tr>
				</table>
				<div id="btn">
					<ul class="clearfix">
						<li class="fl"><a id="submit" onclick="$('#form').submit(); return false;">送信</a></li>
						<li class="fr"><a id="back" onclick="$('#form_back').submit(); return false;">入力画面に戻る</a></li>
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
