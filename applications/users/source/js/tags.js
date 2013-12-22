$(document).ready(function($)
{
    $("[name='search']").keyup(function(){
        val = $(this).val();
        $("[name='search_tag']").val(val);
    });
        
    $("[add_tag]").on("click",function(){
        var tag = $(this).attr("add_tag");
        th = this;
        user_api({tag:tag,act:'add_tag_to_user'},function(data){
            $(th).remove();
            $(".all_tags").html(data);
            show_message("success","В Ваши интересы добавлено новое ключевое слово '"+tag+"'");
        });         
        return false;                
    });    
    
    $("[del_tag]").on("click",function(){
        var tag = $(this).attr("del_tag"); 
        show_popup("<div style='text-align:center;'>Вы действительно хотите удалить этот тег из своих интересов?</div>","Подтверждение удаления тега");
        add_popup_button("Да",'Yes', {tag:tag}, function(vars){        
            user_api({tag:vars.tag,act:'delete_tag_from_user'},function(data){
                hide_popup();
                $("span[tag='"+vars.tag+"']").remove();
                show_message("success","Тег '"+vars.tag+"' удален из ваших интересов");
            },false, '/users/tags/'); 
        });        
        return false;          
    });

    $("#search_form label").inFieldLabels();
});