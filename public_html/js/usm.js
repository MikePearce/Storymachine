$(document).ready(function(){

	$(function() {
		$("tbody.sortable").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize");
			$.post("/stories/savepriority", order, function(theResponse){
                $('#message').html(theResponse);
			});
		}
		});
	});

        // On click, add a bar which has a label

});
