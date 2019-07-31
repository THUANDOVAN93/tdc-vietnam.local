$(document).ready(function() {

	// TOP表示項目
	i = 1;
	while (i <= 10) {
		$("#add_information" + i + "List_residence").carouFredSel({
			prev : {
				button : "#add_information" + i + "Prev_residence",
				key    : "left"
			},
			next : { 
				button : "#add_information" + i + "Next_residence",
				key    : "right"
			},
			pagination : "#add_information" + i + "Page_residence",
			auto       : false
		});
		$("#add_information" + i + "List_office").carouFredSel({
			prev : {
				button : "#add_information" + i + "Prev_office",
				key    : "left"
			},
			next : { 
				button : "#add_information" + i + "Next_office",
				key    : "right"
			},
			pagination : "#add_information" + i + "Page_office",
			auto       : false
		});
		$("#add_information" + i + "List_factory").carouFredSel({
			prev : {
				button : "#add_information" + i + "Prev_factory",
				key    : "left"
			},
			next : { 
				button : "#add_information" + i + "Next_factory",
				key    : "right"
			},
			pagination : "#add_information" + i + "Page_factory",
			auto       : false
		});
		i = i + 1;
	}
});
