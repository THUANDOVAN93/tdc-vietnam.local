以下のお問い合わせがありました。
対応お願いします。

物件名
<?php echo $contact['buildings_name']; ?>


会社名
<?php echo $contact['company_name']; ?>


お名前
<?php echo $contact['name']; ?>


住所
<?php echo $contact['address']; ?>


電話番号
<?php echo $contact['tel']; ?>


FAX
<?php echo $contact['fax']; ?>


入居形態
<?php if (isset($contact['tenant_form']) && strlen($contact['tenant_form']) > 0) { echo $tenantForms[$contact['tenant_form']]; } ?>


ご予算
<?php echo $contact['budget']; ?>


エリア
<?php echo $contact['area']; ?>


間取り
<?php echo $contact['layout']; ?>


従業員数
<?php echo $contact['person_nums']; if (isset($contact['person_nums']) && strlen($contact['person_nums']) > 0) { echo "人"; } ?>


車両台数
<?php echo $contact['vehicles_nums']; if (isset($contact['vehicles_nums']) && strlen($contact['vehicles_nums']) > 0) { echo "台"; } ?>


お問い合わせ内容
<?php echo $contact['message']; ?>


E-mail
<?php echo $contact['email']; ?>



------------------------------

東京デベロップメントコンサルタント



------------------------------
