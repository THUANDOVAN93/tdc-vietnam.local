<script type="text/javascript" src="<?php echo $this->webroot; ?>common/js/areamap.js"></script>

		<!-- topicpath/ -->
		<ul id="topicpath">
			<li class="home"><a href="<?php echo $this->webroot; ?>">TOP</a></li>
			<li><a href="<?php echo $this->webroot; ?>residence/area/">住まいを探す エリアから探す</a></li>
			<li>ハノイで探す</li>
		</ul>
		<!-- /topicpath -->

		<!-- search_header/ -->
		<div class="search_header clearfix">
			<h2><img src="<?php echo $this->webroot; ?>common/images/search/area_header_ttl.png" width="200" height="40" alt="エリアから探す" /></h2>
			<ul class="imgbtn clearfix">
				<li><a href="<?php echo $this->webroot; ?>office/area/hanoi/"><img src="<?php echo $this->webroot; ?>common/images/search/header_nav01.png" width="160" height="40" alt="事務所を探す" /></a></li>
				<li><a href="<?php echo $this->webroot; ?>residence/area/hanoi/"><img src="<?php echo $this->webroot; ?>common/images/search/header_nav02_on.png" width="160" height="40" alt="住まいを探す" /></a></li>
			</ul>
		</div>
		<!-- /search_header -->

		<!-- search_area/ -->
		<p class="search_area_read">物件を検索したいエリアをクリックして下さい。</p>
		<p id="map" class="search_area_map" style="background-image: url(<?php echo $this->webroot; ?>common/images/search/hanoi_map.png);"><img src="<?php echo $this->webroot; ?>common/images/search/hanoi_map.png" alt="" width="730" height="630" border="0" usemap="#Map" />
			<map name="Map" id="Map">
            <area id="hanoi_area01" alt="Bac Tu Liem" title="" href="<?php echo $this->webroot; ?>residence/area/hanoi/list/36" shape="poly" coords="126,15,127,16,151,37,171,48,212,47,268,47,291,48,293,48,282,67,288,77,288,85,293,93,298,95,306,98,315,111,321,122,323,129,321,138,311,148,302,158,302,163,306,167,301,175,295,178,283,173,266,173,262,176,267,186,269,189,273,190,265,192,252,188,238,183,224,188,217,197,213,207,192,205,155,192,117,172,103,163,97,167,89,148,72,132,60,126,60,115,76,114,81,92,92,82,86,72,83,60,85,44" />
            <area id="hanoi_area02" alt="Tay Ho" title="" href="<?php echo $this->webroot; ?>residence/area/hanoi/list/34" shape="poly" coords="301,49,345,55,371,64,402,89,422,108,431,127,436,143,455,168,436,178,423,176,414,192,405,201,392,204,363,198,338,183,327,186,334,165,334,152,330,146,320,160,319,168,316,171,308,180,302,178,314,164,306,158,326,141,328,129,331,119,320,115,307,90,293,90,291,76,285,65" />
            <area id="hanoi_area03" alt="long Bien" title="" href="<?php echo $this->webroot; ?>residence/area/hanoi/list/28" shape="poly" coords="433,114,438,140,450,160,461,173,477,202,493,230,509,256,509,266,513,274,532,289,551,307,566,324,582,333,598,338,604,340,606,327,609,318,620,313,625,311,638,315,649,308,652,295,657,285,666,279,671,269,679,267,691,266,695,259,694,256,682,255,679,247,688,242,693,239,694,229,701,220,711,212,715,209,688,170,668,128,651,118,627,111,595,106,567,114,542,127,512,139,491,139,464,117,449,110,448,108" />
            <area id="hanoi_area04" alt="Nam Tu Liem" title="" href="<?php echo $this->webroot; ?>residence/area/hanoi/list/37" shape="poly" coords="101,168,210,215,208,224,217,229,222,222,229,230,239,227,245,237,255,243,258,247,256,267,277,284,273,290,277,301,274,304,280,313,284,323,291,327,290,341,294,351,299,359,284,369,270,368,255,366,240,374,210,378,186,376,166,349,146,343,129,334,116,291,110,273,120,263,135,258,134,235,140,234,122,219,105,190,98,186,103,180,96,174" />

            <area id="hanoi_area05" alt="Cau Giay" title="" href="<?php echo $this->webroot; ?>residence/area/hanoi/list/29" shape="poly" coords="240,185,253,191,263,196,273,191,275,187,270,178,268,175,278,178,283,179,287,177,297,182,305,184,317,180,321,174,323,169,323,163,327,155,329,154,331,162,325,174,324,188,325,199,326,211,323,222,320,227,310,235,304,241,302,250,304,259,313,271,318,281,331,286,345,297,337,301,320,302,303,307,291,314,286,319,280,304,282,287,285,283,261,266,263,244,254,236,247,230,241,223,234,225,226,219,221,218,216,221,214,223,213,213,218,199,226,190" />
            <area id="hanoi_area06" alt="Ba Dinh" title="" href="<?php echo $this->webroot; ?>residence/area/hanoi/list/26" shape="poly" coords="336,188,352,195,361,202,370,203,382,204,390,208,390,211,395,207,401,206,408,206,411,202,420,194,424,183,426,179,432,183,434,185,441,180,451,175,455,172,474,205,448,210,438,221,435,233,438,237,431,242,417,235,398,233,383,236,370,248,365,257,357,268,356,271,345,266,352,253,341,246,325,237,318,236,334,224,331,210,327,196" />
            <area id="hanoi_area07" alt="Hoan Kiem" title="" href="<?php echo $this->webroot; ?>residence/area/hanoi/list/25" shape="poly" coords="472,210,478,213,492,237,506,263,498,270,482,271,460,272,448,272,440,264,430,259,433,247,441,236,444,222,448,214" />
            <area id="hanoi_area08" alt="Hai Ba Trung" title="" href="<?php echo $this->webroot; ?>residence/area/hanoi/list/32" shape="poly" coords="502,273,522,285,542,302,550,319,533,335,519,344,504,344,493,340,490,337,483,341,472,343,463,345,457,343,459,351,451,351,446,347,439,343,432,350,428,354,419,352,419,343,419,332,422,318,420,305,418,300,418,287,421,277,423,265,445,274,461,277,491,276" />
            <area id="hanoi_area09" alt="Hoang Mai" title="" href="<?php echo $this->webroot; ?>residence/area/hanoi/list/27" shape="poly" coords="555,319,579,338,606,346,635,365,635,373,614,402,595,434,570,460,556,479,526,462,512,475,506,473,502,476,474,445,464,450,460,457,436,458,424,452,418,456,407,453,397,459,393,467,350,445,376,416,371,411,357,412,346,415,323,401,334,385,333,375,344,382,348,373,361,379,365,372,371,360,384,364,394,355,413,370,423,371,427,360,440,351,457,358,467,353,465,345,475,348,488,351,492,343,504,350,525,349,550,333" />
            <area id="hanoi_area10" alt="Dong Da" title="" href="<?php echo $this->webroot; ?>residence/area/hanoi/list/35" shape="poly" coords="312,238,321,242,326,243,334,249,339,252,343,255,343,259,339,264,344,270,349,276,355,277,362,273,366,269,367,259,369,251,382,244,388,238,397,233,403,236,409,237,421,237,424,248,425,250,427,257,421,261,417,264,417,270,417,279,414,287,413,295,415,303,417,313,417,319,417,326,396,320,384,317,375,320,361,317,337,285,323,275,310,259,304,252" />

            <area id="hanoi_area11" alt="Thanh Xuan" title="" href="<?php echo $this->webroot; ?>residence/area/hanoi/list/33" shape="poly" coords="289,321,298,314,308,310,319,304,331,305,336,306,346,301,354,314,362,325,367,322,375,326,384,323,387,322,399,325,411,328,415,328,415,334,415,343,418,352,420,357,424,362,419,367,400,353,395,348,386,357,378,359,378,352,370,356,362,360,362,370,360,374,348,372,341,375,336,373,337,361,328,365,323,364,313,360,308,361,309,367,302,372,295,366,304,358,298,348,297,332,297,323" />
            <area id="hanoi_area12" alt="Ha Dong" title="" href="<?php echo $this->webroot; ?>residence/area/hanoi/list/31" shape="poly" coords="290,370,301,395,285,404,282,413,283,423,284,428,289,426,292,432,295,440,292,446,289,450,284,455,287,461,291,470,280,475,275,479,273,486,271,494,270,503,266,516,242,535,219,553,173,555,138,544,89,524,49,516,40,486,57,464,88,462,102,444,128,429,161,430,169,414,174,400,188,380,210,383,236,382,259,371,276,374" />
            <area id="hanoi_area13" alt="Thanh Tri" title="" href="#" shape="poly" coords="645,539,639,535,625,522,607,521,582,523,549,517,542,508,542,489,552,479,525,467,518,478,516,482,506,475,499,482,472,448,467,453,465,461,456,460,444,462,434,464,428,459,427,456,418,457,417,459,410,455,405,460,399,466,392,464,393,473,375,463,367,459,359,454,346,446,348,440,358,433,365,424,373,417,370,411,360,414,349,418,336,415,319,398,326,387,328,374,328,366,316,363,310,369,307,372,296,370,302,381,305,395,299,403,291,410,288,421,299,436,293,453,292,459,297,468,286,479,278,487,277,491,285,493,310,502,311,509,301,520,293,531,287,540,281,553,294,563,300,572,318,572,351,594,367,600,384,600,390,610,405,592,412,576,428,579,429,599,425,600,441,604,458,611,467,598,481,587,489,585,496,594,503,580,525,590,539,572,553,573,557,583,574,579,598,591,626,570,639,557" />
         </map>
		</p>
        <!--
		<h3 class="search_area_other"><img src="<?php echo $this->webroot; ?>common/images/search/area_index_ttl01.png" width="122" height="17" alt="その他のエリア" /></h3>
		<div class="search_area_other">
			<ul class="clearfix">
				<li><a href="<?php echo $this->webroot; ?>residence/area/hanoi/list/10">アユタナコン</a></li>
				<li><a href="<?php echo $this->webroot; ?>residence/area/hanoi/list/11">ラチャダ～ラマ９世通り</a></li>
			</ul>
		</div>
		<!-- /search_area -->

		<!-- contents_inquiry/ -->
<?php echo $this->element('section_contact'); ?>
		<!-- /contents_inquiry -->
