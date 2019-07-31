<?php if(isset($this->params['admin']) && $this->params['admin'] == '1') { ?>
<?php     $this->layout = 'admin'; ?>

<div>
	<h2>500 Internal Server Error</h2>
	<section>
		<h3>内部サーバーエラーが発生しました。</h3>
	</section>
</div>

<?php } else { ?>

<?php     $this->layout = 'front'; ?>

<!-- TODO フロントのシステムエラーどうしよう -->
<div>
	<h2>500 Internal Server Error</h2>
	<section>
		<h3>内部サーバーエラーが発生しました。</h3>
	</section>
</div>

<?php } ?>
