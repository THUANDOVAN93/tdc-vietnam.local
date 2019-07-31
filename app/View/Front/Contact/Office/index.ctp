		<!-- topicpath/ -->
		<ul id="topicpath">
			<li class="home"><a href="<?php echo $this->webroot; ?>">TOP</a></li>
			<li>お問い合わせ</li>
		</ul>
		<!-- /topicpath -->
		
		<div id="contactCnt">
			<h2><img src="<?php echo $this->webroot; ?>common/images/contact/header_ttl.png" width="730" height="40" alt="お問い合わせ" /></h2>
			<p>不動産に関するお問い合わせは、以下のフォームからお送りください。</p>
			<ul id="tab">
				<li><a href="<?php echo $this->webroot; ?>contact/factory/"><img src="<?php echo $this->webroot; ?>common/images/contact/tab01.png" alt="工場・工業用地のお問い合わせ" width="243" height="50" /></a></li>
				<li><img src="<?php echo $this->webroot; ?>common/images/contact/tab02_on.png" alt="事務所のお問い合わせ" width="243" height="50" /></li>
				<li><a href="<?php echo $this->webroot; ?>contact/residence/"><img src="<?php echo $this->webroot; ?>common/images/contact/tab03.png" alt="住まいのお問い合わせ" width="244" height="50" /></a></li>
			</ul>
			<div class="errorTxt">
<?php $err = isset($validErrors['ContactOffice']['company_name'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactOffice']['company_name'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactOffice']['name'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactOffice']['name'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactOffice']['address'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactOffice']['address'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactOffice']['tel'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactOffice']['tel'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactOffice']['fax'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactOffice']['fax'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactOffice']['budget'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactOffice']['budget'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactOffice']['area'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactOffice']['area'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactOffice']['layout'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactOffice']['layout'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactOffice']['person_nums'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactOffice']['person_nums'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactOffice']['vehicles_nums'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactOffice']['vehicles_nums'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactOffice']['message'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactOffice']['message'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactOffice']['email'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactOffice']['email'][0]); ?></p>
<?php } ?>
			</div>

			<?php echo $this->Form->create('ContactOffice', array('id' => 'form', 'url' => '/contact/office/confirm', 'autocomplete' => 'off')); ?>

				<table border="0" cellspacing="0" cellpadding="0" summary="お問い合せフォーム">
					<col width="25%" />
					<col width="" />
					<tr>
						<th scope="row">物件名</th>
						<td>
							<?php echo $this->Form->text('ContactOffice.buildings_name', array('class' => 'type02')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">会社名</th>
						<td>
							<?php echo $this->Form->text('ContactOffice.company_name', array('class' => 'type02')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row"><span class="must">必須</span>お名前</th>
						<td>
							<?php echo $this->Form->text('ContactOffice.name', array('class' => 'type01')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">住所</th>
						<td>
							<?php echo $this->Form->text('ContactOffice.address', array('class' => 'type02')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row"><span class="must">必須</span>電話番号</th>
						<td>
							<?php echo $this->Form->text('ContactOffice.tel', array('class' => 'type01')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">FAX</th>
						<td>
							<?php echo $this->Form->text('ContactOffice.fax', array('class' => 'type01')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">入居形態</th>
						<td>
							<ul>
								<li>
									<?php echo $this->Form->radio('tenant_form', $tenantForms, array('hiddenField'=>false, 'legend'=>false, 'legend'=>false, 'separator'=>'</li><li>')); ?>
								</li>
							</ul>
						</td>
					</tr>
					<tr>
						<th scope="row">ご希望内容</th>
						<td>
							<table border="0" cellspacing="0" cellpadding="0">
								<tr>
									<th scope="row">ご予算</th>
									<td>
										<?php echo $this->Form->text('ContactOffice.budget', array('class' => 'type01')); ?>
									</td>
								</tr>
								<tr>
									<th scope="row">エリア</th>
									<td>
										<?php echo $this->Form->text('ContactOffice.area', array('class' => 'type01')); ?>
									</td>
								</tr>
								<tr>
									<th scope="row">間取り</th>
									<td>
										<?php echo $this->Form->text('ContactOffice.layout', array('class' => 'type01')); ?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<th scope="row">従業員数</th>
						<td>
							<?php echo $this->Form->text('ContactOffice.person_nums', array('class' => 'type03')); ?>人
						</td>
					</tr>
					<tr>
						<th scope="row">車両台数</th>
						<td>
							<?php echo $this->Form->text('ContactOffice.vehicles_nums', array('class' => 'type03')); ?>台
						</td>
					</tr>
					<tr>
						<th scope="row">お問い合わせ内容<br>※日本語で入力ください</th>
						<td>
							<?php echo $this->Form->textarea('ContactOffice.message', array('cols' => '', 'rows' => '5', 'class' => 'type02')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row"><span class="must">必須</span>E-mail</th>
						<td>
							<?php echo $this->Form->text('ContactOffice.email1', array('class' => 'type04')); ?>@

<?php echo $this->Form->text('ContactOffice.email2', array('class' => 'type04')); ?>
<?php echo $this->Form->hidden('ContactOffice.email'); ?>
						</td>
					</tr>
				</table>
				<div id="btn">
					<ul class="clearfix">
						<li class="fl"><a id="confirm" onclick="$('#form').submit();return false;">入力内容の確認</a></li>
						<li class="fr"><a id="reset" onclick="$('#form')[0].reset();return false;">リセット</a></li>
					</ul>
				</div>
			<?php echo $this->Form->end(); ?>
		</div>
		<!-- / #contactCnt -->
<script type="text/javascript">
<!--
    $(function(){
        $( '#ContactOfficeEmail1' ).change( function() {
            var val1 = $( this ).val();
            var val2 = $( '#ContactOfficeEmail2' ).val();
            $( '#ContactOfficeEmail' ).val( val1 + '@' + val2 );
        });
        $( '#ContactOfficeEmail2' ).change( function() {
            var val1 = $( '#ContactOfficeEmail1' ).val();
            var val2 = $( this ).val();
            $( '#ContactOfficeEmail' ).val( val1 + '@' + val2 );
        });
    });
//-->
</script>
