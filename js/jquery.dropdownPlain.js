$(function(){

    $("ul.dropdown li").hover(function(){
    
        $(this).addClass("hover");
        // $('ul:first',this).css('visibility', 'visible');
    	$('ul:first',this).slideDown("slow");
    }, function(){
    
        $(this).removeClass("hover");
        // $('ul:first',this).css('visibility', 'hidden');
    	$('ul:first',this).slideUp();
    });
    
    $("ul.dropdown li ul li:has(ul)").find("a:first").append(" &raquo; ");

});