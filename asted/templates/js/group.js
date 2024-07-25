$(document).ready(function() {
	/*$( ".btngroup_news" ).click(function() {
		$(".group_news").css("display", "block");
		$(".group_task").css("display", "none");
		$(".group_wiki").css("display", "none");
		});*/
		$( ".btngroup_task" ).click(function() {
			/*$(".group_news").css("display", "none");*/
			$(".group_task").css("display", "block");
			$(".group_wiki").css("display", "none");
			});
			$( ".btngroup_wiki" ).click(function() {
				/*$(".group_news").css("display", "none");*/
				$(".group_task").css("display", "none");
				$(".group_wiki").css("display", "block");		
				});
	
	})