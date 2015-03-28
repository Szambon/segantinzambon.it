	var jssor_slider1;
	function getContentHeight(){
		return $(window).height()-$("#container").offset().top;
	}
    jQuery(document).ready(function ($) {
        var options = {
			$ArrowKeyNavigation: true,
			$FillMode: 5,
			$AutoPlay: true,
			$ArrowNavigatorOptions: {
				$Class: $JssorArrowNavigator$,
                $ChanceToShow: 2,
                $AutoCenter: 2
			},
			$ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,
                    $ChanceToShow: 2,
                    $SpacingX: 8,
                    $DisplayPieces: 10,
                    $ParkingPosition: 0
            }
		};
		$("#play_button").attr("state", "active");
		
        jssor_slider1 = new $JssorSlider$('slider1_container', options);
		
		//responsive code begin
		//you can remove responsive code if you don't want the slider scales while window resizes
		function ScaleSlider() {
			var parentWidth = $("#container").innerWidth();
			if (parentWidth){
				var windowHeight = getContentHeight()*0.83;
				var originalWidth = $("#slider1_container").width();
				var originalHeight = $("#slider1_container").height();
				var thumbHeight = originalHeight/6;
				originalHeight += thumbHeight;
				
	
				var scaleWidth = parentWidth;
				if (parentWidth / originalWidth > windowHeight / originalHeight) {
					scaleWidth = Math.ceil((windowHeight / originalHeight )* originalWidth);
				}
				jssor_slider1.$SetScaleWidth(scaleWidth);
			}
			else
				window.setTimeout(ScaleSlider, 30);
		}
		function play(){
			jssor_slider1.$Play();
			$("#play_button").attr("state", "active");
			$("#play_button").one("click", pause);
		}
		function pause(){
			jssor_slider1.$Pause();
			$("#play_button").attr("state", "deactive");
			$("#play_button").one("click", play);
		}
		
		$("#play_button").one("click", pause);
		
		$(window).bind("load", ScaleSlider);
		window.setTimeout(ScaleSlider, 30);
		
		if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
			$(window).bind('resize', ScaleSlider);
		}
		
    });