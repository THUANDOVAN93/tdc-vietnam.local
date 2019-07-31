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
				<li><a href="<?php echo $this->webroot; ?>contact/office/"><img src="<?php echo $this->webroot; ?>common/images/contact/tab02.png" alt="事務所のお問い合わせ" width="243" height="50" /></a></li>
				<li><img src="<?php echo $this->webroot; ?>common/images/contact/tab03_on.png" alt="住まいのお問い合わせ" width="244" height="50" /></li>
			</ul>
			<div class="errorTxt">
<?php $err = isset($validErrors['ContactResidence']['company_name'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactResidence']['company_name'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactResidence']['name'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactResidence']['name'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactResidence']['tel'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactResidence']['tel'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactResidence']['mobile'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactResidence']['mobile'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactResidence']['family_structure'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactResidence']['family_structure'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactResidence']['budget'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactResidence']['budget'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactResidence']['area'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactResidence']['area'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactResidence']['layout'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactResidence']['layout'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactResidence']['message'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactResidence']['message'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactResidence']['email'][0]); ?>
<?php if ($err) { ?>
				<p><?php echo h($validErrors['ContactResidence']['email'][0]); ?></p>
<?php } ?>
			</div>

			<?php echo $this->Form->create('ContactResidence', array('id' => 'form', 'url' => '/contact/residence/confirm', 'autocomplete' => 'off')); ?>

				<table border="0" cellspacing="0" cellpadding="0" summary="お問い合せフォーム">
					<col width="25%" />
					<col width="" />
					<tr>
						<th scope="row">物件名</th>
						<td>
							<?php echo $this->Form->text('ContactResidence.buildings_name', array('class' => 'type02')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">会社名</th>
						<td>
							<?php echo $this->Form->text('ContactResidence.company_name', array('class' => 'type02')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row"><span class="must">必須</span>お名前</th>
						<td>
							<?php echo $this->Form->text('ContactResidence.name', array('class' => 'type01')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row"><span class="must">必須</span>電話番号</th>
						<td>
							<?php echo $this->Form->text('ContactResidence.tel', array('class' => 'type01')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">携帯電話</th>
						<td>
							<?php echo $this->Form->text('ContactResidence.mobile', array('class' => 'type01')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">家族構成</th>
						<td>
							<?php echo $this->Form->text('ContactResidence.family_structure', array('class' => 'type01')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">ご希望内容</th>
						<td>
							<table border="0" cellspacing="0" cellpadding="0">
								<tr>
									<th scope="row">ご予算</th>
									<td>
										<?php echo $this->Form->text('ContactResidence.budget', array('class' => 'type01')); ?>
									</td>
								</tr>
								<tr>
									<th scope="row">エリア</th>
									<td>
										<?php echo $this->Form->text('ContactResidence.area', array('class' => 'type01')); ?>
									</td>
								</tr>
								<tr>
									<th scope="row">間取り</th>
									<td>
										<?php echo $this->Form->text('ContactResidence.layout', array('class' => 'type01')); ?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<th scope="row">お問い合わせ内容<br>※日本語で入力ください</th>
						<td>
							<?php echo $this->Form->textarea('ContactResidence.message', array('cols' => '', 'rows' => '5', 'class' => 'type02')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row"><span class="must">必須</span>E-mail</th>
						<td>
							<?php echo $this->Form->text('ContactResidence.email1', array('class' => 'type04')); ?>@

<?php echo $this->Form->text('ContactResidence.email2', array('class' => 'type04')); ?>
<?php echo $this->Form->hidden('ContactResidence.email'); ?>
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
        $( '#ContactResidenceEmail1' ).change( function() {
            var val1 = $( this ).val();
            var val2 = $( '#ContactResidenceEmail2' ).val();
            $( '#ContactResidenceEmail' ).val( val1 + '@' + val2 );
        });
        $( '#ContactResidenceEmail2' ).change( function() {
            var val1 = $( '#ContactResidenceEmail1' ).val();
            var val2 = $( this ).val();
            $( '#ContactResidenceEmail' ).val( val1 + '@' + val2 );
        });
    });
//-->
</script>
