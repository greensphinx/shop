/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

$(function () {
    $("#search_button").click(function() {
        var searchString    = $("#search_box").val();
        var data            = 'search='+ searchString;
        if(searchString) {
            $.ajax({
                type: "POST",
                url: "",
                data: data,
                beforeSend: function(html) {
                    $("#results").html('');
                    $("#searchresults").show();
                    $(".word").html(searchString);
                },
                success: function(html){
                    $("#results").show();
                    $("#results").append(html);
                }
            });
        }
        return false;
    });
});

$(document).ready(function(){
    $(".add-to-cart").click(function () {
        var id = $(this).attr("data-id");
        $.post("/cart/addAjax/"+id, {}, function (data) {
            $("#cart-count").html(data);
        });
        return false;
    });
});


// $(function () {
//     $("#search_button").click(function(){
//         var searchString    = $("#search_box").val();
//
//         if(searchString){
//         	$.ajax({
//                 type: "POST",
//                 url: "",
//                 data: data,
//                 success: function(response){
//                 	$("#results_field").html(response);
// 				}
// 			});
// 		}
// 	});
//
// });