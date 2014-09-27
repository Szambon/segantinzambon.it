// JavaScript Document
var nav_flag = false;
var initial_offset = 0;
function toggleNav(){
	if (!nav_flag) {
		nav_flag = true;
		setTimeout(function(){ nav_flag = false; }, 100);
		$("#menu").toggle();
		$("#cover").toggle();
		if($("#menu").is(":visible")){
			initial_offset = $(window).scrollTop();
			$("#menu").css("top", initial_offset);
		}
		else{
			initial_offset = 0;
		}
	  }
	  return false
}
function update_offset(){
	var scroll = $(window).scrollTop();
	if(scroll < initial_offset){
		initial_offset = scroll;
		$("#menu").css("top", initial_offset);
	}
}
$(document).ready(function(e) {
    $("#nav-toggle").bind("click", toggleNav);
	$("#cover").bind("click", toggleNav);
	$(document).scroll(update_offset)
});