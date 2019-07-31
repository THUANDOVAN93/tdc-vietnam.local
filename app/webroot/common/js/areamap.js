/* バンコク周辺地図の物件バルーン */
var MapBalloon = function() {
	this.map = $('#map-vietnam');
	if (this.map.length == 0) return;

	this.markers = this.map.find('.factory-marker');
	this.balloon = $('#balloon');
	this.innerBalloon = this.balloon.find('a');

	this.init();
}
MapBalloon.prototype.init = function() {
	this.markers.on('mouseover', $.proxy(this.mouseover, this));
	this.markers.on('mouseout', $.proxy(this.mouseout, this));
}
MapBalloon.prototype.mouseover = function(event) {
	this.balloon.show();

	var marker = $(event.currentTarget);
	var href = marker.find('a').attr('href');
	var alt = marker.find('img').attr('alt');

	this.innerBalloon.text(alt);
	this.innerBalloon.attr('href', href);

	var x = parseInt(marker.offset().left) - (162 * 0.2) - 38;
	var y = parseInt(marker.offset().top) - (this.balloon.height() + 8);

	// trace(marker.offset(), this.balloon.height(), this.balloon.width());
	// trace('href: ' + href);
	// trace('alt: ' + alt);
	// trace('top: ' + y + ' / left:' + x);

	this.balloon.css({'top':y, 'left':x});

}
MapBalloon.prototype.mouseout = function(event) {
	this.balloon.hide();
}



$(document).ready(function(){
	new MapBalloon();

	jQuery.preloadImages = function(){
		for(var i = 0; i<arguments.length; i++){
			jQuery("<img>").attr("src", arguments[i]);
		}
	};
	$.preloadImages("/common/images/search/area_index_map_area01.png","/common/images/search/area_index_map_area02.png","/common/images/search/area_index_map_area03.png","/common/images/search/area_index_map_area04.png","/common/images/search/area_index_map_area05.png","/common/images/search/area_index_map_area06.png","/common/images/search/area_index_map_area07.png","/common/images/search/area_index_map_area08.png","/common/images/search/area_index_map_area09.png","/common/images/search/area_index_map_area10.png","/common/images/search/area_index_map_area11.png","/common/images/search/area_index_map_area12.png","/common/images/search/area_index_map_area13.png","/common/images/search/area_index_map_area14.png","/common/images/search/area_index_map_area15.png","/common/images/search/area_index_map_area16.png","/common/images/search/area_index_map_area17.png","/common/images/search/area_index_map_area18.png","/common/images/search/area_index_map_area19.png","/common/images/search/area_index_map_area20.png","/common/images/search/hanoi_map01.png","/common/images/search/hanoi_map02.png","/common/images/search/hanoi_map03.png","/common/images/search/hanoi_map04.png","/common/images/search/hanoi_map05.png","/common/images/search/hanoi_map06.png","/common/images/search/hanoi_map07.png","/common/images/search/hanoi_map08.png","/common/images/search/hanoi_map09.png","/common/images/search/hanoi_map10.png","/common/images/search/hanoi_map11.png","/common/images/search/hanoi_map12.png","/common/images/search/hanoi_map13.png");

	$("#area01").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area01.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		}
	);

	$("#area02").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area02.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area03").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area03.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area04").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area04.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area05").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area05.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area06").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area06.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area07").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area07.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area08").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area08.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area09").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area09.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area10").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area10.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area11").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area11.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area12").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area12.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area13").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area13.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area14").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area14.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area15").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area15.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area16").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area16.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area09").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area09.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area17").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area17.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

	$("#area18").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area18.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

			$("#area19").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area19.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

			$("#area20").hover(
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map_area20.png")
		},
		function(){
			$("p#map img").attr("src","/common/images/search/area_index_map.png")
		});

		///////start hanoi map part/////////
		$("#hanoi_area01").hover(
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map01.png")
			},
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map.png")
			}
		);

		$("#hanoi_area02").hover(
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map02.png")
			},
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map.png")
			});

		$("#hanoi_area03").hover(
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map03.png")
			},
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map.png")
			});

		$("#hanoi_area04").hover(
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map04.png")
			},
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map.png")
			});

		$("#hanoi_area05").hover(
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map05.png")
			},
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map.png")
			});

		$("#hanoi_area06").hover(
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map06.png")
			},
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map.png")
			});

		$("#hanoi_area07").hover(
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map07.png")
			},
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map.png")
			});

		$("#hanoi_area08").hover(
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map08.png")
			},
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map.png")
			});

		$("#hanoi_area09").hover(
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map09.png")
			},
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map.png")
			});

		$("#hanoi_area10").hover(
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map10.png")
			},
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map.png")
			});

		$("#hanoi_area11").hover(
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map11.png")
			},
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map.png")
			});

		$("#hanoi_area12").hover(
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map12.png")
			},
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map.png")
			});

		$("#hanoi_area13").hover(
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map13.png")
			},
			function(){
				$("p#map img").attr("src","/common/images/search/hanoi_map.png")
			});
});
