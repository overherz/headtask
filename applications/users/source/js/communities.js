$(document).ready(function($) {
    $("[agree]").on("click",function(){
        th = this;
        var id = $(this).attr('agree');
        user_api({act:'agree',id:id},function(data){
            show_message("success","Вы вступили в сообщество");
            $("[community='"+id+"']").animate({
                opacity: 0
            },500,function(){
                $("[community='"+id+"']").remove();
            })
        },false);         
        return false;
    });
    
    $("[reject]").on("click",function(){
        vars = {
            act: 'reject',
            id: $(this).attr('reject')
        }
        
        show_popup("Вы действительно хотите отклонить приглашение?");        
        add_popup_button("Да",'reject',vars,function(vars){
            hide_popup();
            user_api(vars,function(data){
                show_message("success","Вы отклонили приглашение");
                $("[community='"+vars.id+"']").animate({
                    opacity: 0
                },500,function(){
                    $("[community='"+vars.id+"']").remove();
                })                
            },false);             
        });              
        return false;
    });
});
