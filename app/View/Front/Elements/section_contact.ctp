<!-- <?php     $class = ''; ?>
<?php if(strpos($this->params['action'], 'detail') !== false) { ?>
<?php     $class = 'detail'; ?>
<?php } ?>

		<div class="contents_inquiry clearfix">
			<h3 class="<?php echo $class; ?>">物件についてのご相談・お問い合わせ</h3>
				<div class="contents_inquiry_detail">
					<h4>お電話・FAXでのお問い合わせ</h4>
					<ul class="clearfix">
						<li class="contents_inquiry_tel01">タイからのお電話 02-260-3698</li>
						<li class="contents_inquiry_tel02">タイ国外からのお電話 +66-2-260-3698</li>
						<li class="contents_inquiry_tel03">FAXをご利用の方 02-260-3697</li>
					</ul>
				</div>
<?php $detailLink = (isset($detailLink)) ? $detailLink : ''; ?>
				<p><a href="<?php echo $this->webroot; ?>contact/<?php echo $detailLink; ?>">お問い合わせフォーム</a></p>
		</div>
 -->

<!-- topicpath/ -->
<ul id="topicpath">
</ul>
<!-- /topicpath -->

<div id="contactCnt">
<!-- <h2>
	<img src="<?php echo $this->webroot; ?>common/images/contact/header_ttl.png?1" width="730" height="40" alt="お問い合わせ" />
</h2> -->
<h3 class="contact_title">お問い合わせ / Inquiry form</h3>
<p>不動産に関するお問い合わせは、以下のフォームからお送りください。<br>Please send inquiry by this form.</p>
<ul id="tab">
	<!-- <li><img src="<?php //echo $this->webroot; ?>common/images/contact/tab01_on.png" alt="工場・工業用地のお問い合わせ" width="243" height="50" /></li> -->
	<!-- <li><a href="<?php //echo $this->webroot; ?>contact/office/"><img src="<?php //echo $this->webroot; ?>common/images/contact/tab02.png" alt="事務所のお問い合わせ" width="243" height="50" /></a></li>
	<li><a href="<?php //echo $this->webroot; ?>contact/residence/"><img src="<?php //echo $this->webroot; ?>common/images/contact/tab03.png" alt="住まいのお問い合わせ" width="244" height="50" /></a></li> -->
</ul>
<div class="errorTxt">
<?php $err = isset($validErrors['ContactFactory']['company_name'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['company_name'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactFactory']['industry'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['industry'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactFactory']['name'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['name'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactFactory']['address'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['address'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactFactory']['tel'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['tel'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactFactory']['fax'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['fax'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactFactory']['boi_zone'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['boi_zone'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactFactory']['location'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['location'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactFactory']['floor_space_site'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['floor_space_site'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactFactory']['floor_space_building'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['floor_space_building'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactFactory']['weight_limit'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['weight_limit'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactFactory']['building_height'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['building_height'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactFactory']['message'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['message'][0]); ?></p>
<?php } ?>
<?php $err = isset($validErrors['ContactFactory']['email'][0]); ?>
<?php if ($err) { ?>
	<p><?php echo h($validErrors['ContactFactory']['email'][0]); ?></p>
<?php } ?>
</div>

<?php echo $this->Form->create('ContactFactory', array('id' => 'form', 'url' => '/contact/factory/confirm', 'autocomplete' => 'off')); ?>

	<table border="0" cellspacing="0" cellpadding="0" summary="お問い合せフォーム">
		<col width="25%" />
		<col width="" />
		<!-- <tr>
			<th scope="row">物件名</th>
			<td>
				<?php //echo $this->Form->text('ContactFactory.buildings_name', array('class' => 'type02')); ?>
			</td>
		</tr> -->
		<!-- <tr>
			<th scope="row">会社名 / Company</th>
			<td>
				<?php //echo $this->Form->text('ContactFactory.company_name', array('class' => 'type02')); ?>
			</td>
		</tr> -->
		<!-- <tr>
			<th scope="row">業種</th>
			<td>
				<?php //echo $this->Form->text('ContactFactory.industry', array('class' => 'type02')); ?>
			</td>
		</tr> -->
		<tr>
			<th scope="row"><span class="must">必須</span>お名前 / Name</th>
			<td>
				<?php echo $this->Form->text('ContactFactory.name', array('class' => 'type01')); ?>
			</td>
		</tr>
		<!-- <tr>
			<th scope="row">住所</th>
			<td>
				<?php //echo $this->Form->text('ContactFactory.address', array('class' => 'type01')); ?>
			</td>
		</tr> -->
		<tr>
			<th scope="row"><span class="must">必須</span>電話番号 / Phone number</th>
			<td>
				<?php echo $this->Form->text('ContactFactory.tel', array('class' => 'type01')); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">会社名 / Company</th>
			<td>
				<?php echo $this->Form->text('ContactFactory.company_name', array('class' => 'type02')); ?>
			</td>
		</tr>
		<tr>
			<th scope="row"><span class="must">必須</span>メールアドレス / Mail address</th>
			<td>
				<?php echo $this->Form->text('ContactFactory.email1', array('class' => 'type04')); ?>@

<?php echo $this->Form->text('ContactFactory.email2', array('class' => 'type04')); ?>
<?php echo $this->Form->hidden('ContactFactory.email'); ?>
			</td>
		</tr>
		<!-- <tr>
			<th scope="row">FAX</th>
			<td>
				<?php //echo $this->Form->text('ContactFactory.fax', array('class' => 'type01')); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">BOIゾーン</th>
			<td>
				<?php //echo $this->Form->text('ContactFactory.boi_zone', array('class' => 'type02')); ?>
			</td>
		</tr>
		<tr>
			<th scope="row">ロケーション</th>
			<td>
				<?php //echo $this->Form->text('ContactFactory.location', array('class' => 'type02')); ?>
			</td>
		</tr> -->
		<!-- <tr>
			<th scope="row">進出形態</th>
			<td>
				<ul>
					<li>
						<?php //echo $this->Form->radio('factory_sub_category', $factorySubCategories1, array('hiddenField'=>false, 'legend'=>false, 'separator'=>'</li><li>')); ?>
					</li>
				</ul>
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<th scope="row">必要面積</th>
						<td>
							<?php //echo $this->Form->text('ContactFactory.floor_space_site', array('class' => 'type03')); ?>
						</td>
					</tr>
					<tr>
						<td colspan="2" scope="row">&nbsp;</td>
					</tr>
				</table>
				<ul>
					<li>
						<?php //echo $this->Form->radio('factory_sub_category', $factorySubCategories2, array('hiddenField'=>false, 'legend'=>false, 'separator'=>'</li><li>')); ?>
					</li>
				</ul>
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<th scope="row">必要面積</th>
						<td>
							<?php //echo $this->Form->text('ContactFactory.floor_space_building', array('class' => 'type03')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">床耐荷重</th>
						<td>
							<?php //echo $this->Form->text('ContactFactory.weight_limit', array('class' => 'type03')); ?>
						</td>
					</tr>
					<tr>
						<th scope="row">天井高</th>
						<td>
							<?php //echo $this->Form->text('ContactFactory.building_height', array('class' => 'type03')); ?>
						</td>
					</tr>
				</table>
			</td>
		</tr> -->
		<tr>
			<th scope="row"><span class="must">必須</span>お問い合わせ内容 / Inquiry</th>
			<td>
				<?php echo $this->Form->textarea('ContactFactory.message', array('cols' => '', 'rows' => '5', 'class' => 'type02')); ?>
			</td>
		</tr>
		<!-- <tr>
			<th scope="row"><span class="must">必須</span>E-mail</th>
			<td>
				<?php //echo $this->Form->text('ContactFactory.email1', array('class' => 'type04')); ?>@

<?php //echo $this->Form->text('ContactFactory.email2', array('class' => 'type04')); ?>
<?php //echo $this->Form->hidden('ContactFactory.email'); ?>
			</td>
		</tr> -->
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
        $( '#ContactFactoryEmail1' ).change( function() {
            var val1 = $( this ).val();
            var val2 = $( '#ContactFactoryEmail2' ).val();
            $( '#ContactFactoryEmail' ).val( val1 + '@' + val2 );
        });
        $( '#ContactFactoryEmail2' ).change( function() {
            var val1 = $( '#ContactFactoryEmail1' ).val();
            var val2 = $( this ).val();
            $( '#ContactFactoryEmail' ).val( val1 + '@' + val2 );
        });
    });
//-->
</script>
