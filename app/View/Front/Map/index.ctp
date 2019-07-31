<script src="http://maps.google.com/maps/api/js?v=3&sensor=false" type="text/javascript" charset="UTF-8"></script>
<?php echo $this->Html->script('jquery.viewareamap'); ?>

<?php echo $this->Form->hidden('lat', array('id'=>'map_lat', 'value'=>'13.755')); ?>
<?php echo $this->Form->hidden('lng', array('id'=>'map_lng', 'value'=>'100.505')); ?>
<?php echo $this->Form->hidden('zoom', array('id'=>'map_zoom', 'value'=>'16')); ?>
<?php echo $this->Form->hidden('icon_path', array('id'=>'icon_path', 'value'=>$this->webroot . 'common/images/search/map/')); ?>
<?php echo $this->Form->hidden('detail_url', array('id'=>'detail_url', 'value'=>$this->webroot . 'residence/area/detail/')); ?>
<?php echo $this->Form->hidden('image_path', array('id'=>'image_path', 'value'=>$this->webroot . 'upload/ResidenceBuildings/')); ?>
<?php echo $this->Form->hidden('xml_url', array('id'=>'xml_url', 'value'=>$this->webroot . 'map/residence/')); ?>
<?php echo $this->Form->checkbox('list_map_nav01', array('id'=>'list_map_nav01', 'checked'=>true, 'value'=>'1', 'class'=>'list_map_nav')); ?>
<?php echo $this->Form->checkbox('list_map_nav02', array('id'=>'list_map_nav02', 'checked'=>true, 'value'=>'2', 'class'=>'list_map_nav')); ?>
<?php echo $this->Form->checkbox('list_map_nav03', array('id'=>'list_map_nav03', 'checked'=>true, 'value'=>'3', 'class'=>'list_map_nav')); ?>
<?php echo $this->Form->checkbox('list_map_nav04', array('id'=>'list_map_nav04', 'checked'=>true, 'value'=>'4', 'class'=>'list_map_nav')); ?>
<div id="map_canvas" class="search_list_map"></div>


