
<!-- contents_header/ -->
<div class="contents_header">	
</div>
<p class="text-right mg-x-10">
	<?php if ($lang == 'jpn') { ?>
		<!-- Set language session here -->
		<a href="/eng/<?php echo $currentPage; ?>/" class="arrow-right flag-en">English</a>
	<?php } else { ?>
		<a href="/jpn/<?php echo $currentPage; ?>/" class="arrow-right flag-jp">Japanese</a>
	<?php } ?>			
</p>
<!-- /contents_header -->

<!-- contents_header_inquiry/ -->
<div class="contents_header_inquiry">
	<div class="contents_header_inquiry_ttl flex-item">
	<p><?php echo $pageContent['sologan']; ?></p>
	</div>
	<ul class="contents_header_inquiry_contact flex-item d-flex">
	<li class="contents_header_inquiry_tel01"> &#9742; +84 888 767 138</li>
	<li class="contents_header_inquiry_tel02"> &#9993; info@fact-link.com.vn</li>
	<li><p><a href="../contact/"><i class="fas fa-envelope mr-5" aria-hidden="true"></i><?php echo $pageContent['boxContactCt']; ?></a></p></li>
	</ul>
</div>
<!-- /contents_header_inquiry -->

<!-- contents_header_facebook/ -->
<div class="contents_header_facebook">
</div>
<!-- /contents_header_facebook -->
