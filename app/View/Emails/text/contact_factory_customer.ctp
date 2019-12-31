<?php echo __('contact-content-1'); ?>

<?php echo __('contact-content-2'); ?>

<?php echo __('contact-content-3'); ?>


<?php echo __('contact-content-company-name'); ?>

<?php echo $contact['company_name']; ?>


<?php echo __('contact-content-name'); ?>

<?php echo $contact['name']; ?>


<?php echo __('contact-content-phone'); ?>

<?php echo $contact['tel']; ?>


<?php echo __('contact-content-inquiry'); ?>

<?php echo $contact['message']; ?>
<?php if (isset($contact['factory_sub_category']) && strlen($contact['factory_sub_category']) > 0) { echo $factorySubCategories[$contact['factory_sub_category']]; } ?>


<?php if (isset($contact['factory_sub_category']) && $contact['factory_sub_category'] == "5") { ?>
必要面積
<?php echo $contact['floor_space_site']; ?>


<?php } ?>
<?php if (isset($contact['factory_sub_category']) && $contact['factory_sub_category'] != "5" && strlen($contact['factory_sub_category']) > 0) { ?>
必要面積
<?php echo $contact['floor_space_building']; ?>


床耐荷重
<?php echo $contact['weight_limit']; ?>


天井高
<?php echo $contact['building_height']; ?>


<?php } ?>
E-mail
<?php echo $contact['email']; ?>



------------------------------

TDC Vietnam
602/43 Dien Bien Phu, Ward 22, Binh Thanh District, Ho Chi Minh City.
Tel: +84 888 767 138 - Email: info@fact-link.com.vn

------------------------------
