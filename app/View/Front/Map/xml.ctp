<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>

<markers>
<?php foreach ($buildingList as $building) { ?>
	<marker>
		<id><![CDATA[<?php echo $building[$keyNameBuilding]['id']; ?>]]></id>
		<lat><![CDATA[<?php echo $building[$keyNameBuilding]['lat']; ?>]]></lat>
		<lng><![CDATA[<?php echo $building[$keyNameBuilding]['lng']; ?>]]></lng>
		<name><![CDATA[<?php echo $building[$keyNameBuilding]['name']; ?>]]></name>
<?php   if (isset($building[$keyNamePhoto][0])) { ?>
		<photo><![CDATA[<?php echo $building[$keyNamePhoto][0]['path']; ?>]]></photo>
		<caption><![CDATA[<?php echo $building[$keyNamePhoto][0]['caption']; ?>]]></caption>
<?php   } else { ?>
		<photo><![CDATA[]]></photo>
		<caption><![CDATA[]]></caption>
<?php   } ?>
		<icon><![CDATA[<?php echo Configure::read('MapIcon.' . $keyNameBuilding . '.' . $building[$keyNameBuilding][$categoryId]); ?>]]></icon>
	</marker>
<?php } ?>
<?php foreach ($stationList as $station) { ?>
	<marker>
		<id><![CDATA[<?php echo $station['Station']['id']; ?>]]></id>
		<lat><![CDATA[<?php echo $station['Station']['lat']; ?>]]></lat>
		<lng><![CDATA[<?php echo $station['Station']['lng']; ?>]]></lng>
		<name><![CDATA[<?php echo $station['Station']['name']; ?>]]></name>
		<photo><![CDATA[]]></photo>
		<caption><![CDATA[station]]></caption>
		<icon><![CDATA[stationBloonWithShadow.png]]></icon>
	</marker>
<?php } ?>
</markers>
