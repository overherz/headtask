$(document).ready(function($) {
    $(document).on("mouseenter",".tree_block",function(){
        $(this).find(".tree_icons").show();
    }).on("mouseleave",".tree_block",function(){
        $(this).find(".tree_icons").hide(); 
    });
    
    $('ol.sortable').nestedSortable({
        disableNesting: 'no-nest',
        forcePlaceholderSize: true,
        handle: 'div',
        helper:	'clone',
        items: 'li',
        opacity: .6,
        placeholder: 'placeholder',
        revert: 250,
        tabSize: 25,
        tolerance: 'pointer',
        toleranceElement: '> div',   
        update: function(event, ui) {
            serialized = $('ol.sortable').nestedSortable('serialize');
            arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
            arraied = dump(arraied);  
            serialized = serialized + "&act=save_menu&"+arraied;
            user_api(serialized,function(data){            
                show_message("success","Порядок сохранен");
            },function(){            
                redirect(location.href,500);
            }); 
        }        
    }); 
    
    $("ol.sortable").disableSelection();

    $(document).on("click",".del-btn",function(){
        var id = $(this).parent().parent().attr('id');
        if (confirm("Вы хотите удалить данный пункт меню? Это также удалит и все вложенные"))
        {
            user_api({act:'delete',id:id},function(data){
                $("[menu='"+id+"']").effect("highlight",500,function(){
                    $(this).remove();
                });
            });  
        }
    });

    $(document).on("click",".add-btn,.edit-btn",function(){
        var parent = $(this).parent().parent().attr('id');
        var new_menu = false;
        if ($(this).hasClass("add-btn"))
        {
            title = "Добавление пункта меню";  
            new_menu = true;
        }
        else title = "Редактирование пункта меню";       
        user_api({act:'edit',new_menu:new_menu,parent:parent},function(data){
            show_popup(data,title);                  

            add_popup_button("Сохранить",'save',false,function(vars){
                var params = $(".popup_body .new_page").serialize();
                user_api(params,function(res){
                    hide_popup();
                    window.location.href=location.href;
                });        
            });             
        }); 
        return false;                
    });

    $(document).on("change","[name='application']",function(){
        $("#value").html('');
        var app = this.value;
        user_api({act:'get_application_ids',app:app},function(data){
            $("#value").html(data);
        });         
    });

    $(document).on("change","[name='type']",function(){
        var type = $(this).val();
        if (type == "application")
        {
            $("#app").show();
            $("#link").hide();
        }
        else
        {
            $("#app").hide();
            $("#link").show();
        }
    });
});

function dump(arr,level) 
{
    var text = "";
    if(!level) level = 0;

    if(typeof(arr) == 'object') { //Array/Hashes/Objects
            for(var item in arr) {
                    var value = arr[item];

                    if(typeof(value) == 'object') { //If it is an array,
                            text += dump(value,level+1);
                    } else {
                            if (item == "item_id") text += "position["+value+"]=";
                            if (item == "left") text += value+"&";
                    }
            }
    }
    return text;
}

