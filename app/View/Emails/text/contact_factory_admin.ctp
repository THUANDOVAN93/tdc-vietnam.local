以下のお問い合わせがありました。
対応お願いします。


会社名
<?php echo $contact['company_name']; ?>


お名前
<?php echo $contact['name']; ?>


電話番号
<?php echo $contact['tel']; ?>


お問い合わせ内容
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

東京デベロップメントコンサルタント



------------------------------
