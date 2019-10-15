<ul id="topicpath">
</ul>

<div id="contactCnt">

<h3 class="contact_title"><?php echo __('inquiry-form'); ?></h3>
<p><?php echo __('inquiry-form-direction'); ?></p>
<ul id="tab">
	
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
		<tr>
			<th scope="row" class="d-flex d-flex-content-middle">
				<span><?php echo __('name'); ?></span>
				<span class="must"><?php echo __('required'); ?></span>
			</th>
			<td>
				<?php echo $this->Form->text('ContactFactory.name', array('class' => 'type01')); ?>
			</td>
		</tr>
		<tr>
			<th scope="row" class="d-flex d-flex-content-middle">
				<span><?php echo __('phone-number'); ?></span>
				<span class="must"><?php echo __('required'); ?></span>
			</th>
			<td>
				<?php echo $this->Form->text('ContactFactory.tel', array('class' => 'type01')); ?>
			</td>
		</tr>
		<tr>
			<th scope="row" class="d-flex d-flex-content-middle">
				<span><?php echo __('company'); ?></span>
			</th>
			<td>
				<?php echo $this->Form->text('ContactFactory.company_name', array('class' => 'type02')); ?>
			</td>
		</tr>
		<tr>
			<th scope="row" class="d-flex d-flex-content-middle">
				<span><?php echo __('mail-address'); ?></span>
				<span class="must"><?php echo __('required'); ?></span>
			</th>
			<td>
				<?php echo $this->Form->text('ContactFactory.email1', array('class' => 'type04')); ?>@

<?php echo $this->Form->text('ContactFactory.email2', array('class' => 'type04')); ?>
<?php echo $this->Form->hidden('ContactFactory.email'); ?>
			</td>
		</tr>
		<tr>
			<th scope="row" class="d-flex d-flex-content-middle">
				<span><?php echo __('inquiry'); ?></span>
				<span class="must"><?php echo __('required'); ?></span>
			</th>
			<td>
				<?php echo $this->Form->textarea('ContactFactory.message', array('cols' => '', 'rows' => '5', 'class' => 'type02')); ?>
			</td>
		</tr>
	</table>
	<div id="btn">
		<ul class="clearfix">
			<li class="fl"><a id="confirm" onclick="$('#form').submit();return false;"><?php echo __('confirm-inquiry'); ?></a></li>
			<li class="fr"><a id="reset" onclick="$('#form')[0].reset();return false;"><?php echo __('reset'); ?></a></li>
		</ul>
	</div>
<?php echo $this->Form->end(); ?>
</div>
<!-- / #contactCnt -->
<script type="text/javascript">
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
</script>
