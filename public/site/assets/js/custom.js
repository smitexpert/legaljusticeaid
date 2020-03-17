$("#widget_tab li").click(function(){
    $("#widget_tab").find('li').removeClass('active');
    $(this).addClass('active');
    var id = $(this).attr('id');
    
    $(".tab_post").removeClass('show');

    $("#"+id+"_post").addClass('show');
})

$("#widget_tab li a").click(function(e){
    e.preventDefault();
})

$(function(){
    $('#menu').slicknav({prependTo: '.navigation', 'label' : ''});
});