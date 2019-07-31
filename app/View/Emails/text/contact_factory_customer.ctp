TDCにお問い合わせありがとうございます。
送信内容は以下の通りです。担当者がご連絡をさせていただきます。
こちらのメールは送信専用ですので返信をしないでください。
Thank you for contacting to TDC Vietnam. We receive your inquiry. Our staff will contact to you shortly.
Please be noted that this email is only for sending, please do not reply to this email.


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
TDC Vietnam
602/43 Dien Bien Phu, Ward 22, Binh Thanh District, Ho Chi Minh City.
Tel: +84 888 767 138 - Email: info@fact-link.com.vn



------------------------------
