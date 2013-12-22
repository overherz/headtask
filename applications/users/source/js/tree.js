$(document).ready(function($) {

    var add_link = false;

    if ($(".input[name=description]").length > 0)
    {
        $(".input[name=description]").ckeditor({toolbar:'Basic'});
        $("[name='life_start']").mask("99.99.9999");
        $("[name='life_end']").mask("99.99.9999");
    }

    if ($(".tree_data").length > 0)
    {
        $.contextMenu({
            selector: '.node',
            className: 'data-title_node',
            items: {
                "edit": {
                    name: "Изменить",
                    icon: "edit",
                    callback: function(key, options) {
                        var id = $(this).attr('id');
                        redirect("/users/tree/edit_person/"+id+"/");
                    }
                },
                "delete": {
                    name: "Удалить",
                    icon: "delete",
                    callback: function(key, options) {
                        var id = $(this).attr('id');
                        show_popup("<div style='text-align:center;'>Вы действительно хотите удалить этого человека?</div>","Подтверждение удаления");
                        add_popup_button("Да",'Yes', {id:id}, function(vars){
                            user_api({act:'delete_person',id:vars.id},function(data){
                                hide_popup();
                                $(".tree_data").html(data);
                                show_message("success","Человек удален");
                                $("[name='scale']").val('');
                            });
                        });
                    }
                }
            }
        });

        $.contextMenu({
            selector: '.edge',
            className: 'data-title_edge',
            items: {
                "delete": {
                    name: "Удалить",
                    icon: "delete",
                    callback: function(key, options) {
                        var id = $(this).attr('id');
                        show_popup("<div style='text-align:center;'>Вы действительно хотите удалить эту связь?</div>","Подтверждение удаления");
                        add_popup_button("Да",'Yes', {id:id}, function(vars){
                            user_api({act:'delete_link',id:vars.id},function(data){
                                hide_popup();
                                $(".tree_data").html(data);
                                show_message("success","Связь удалена");
                                $("[name='scale']").val('');
                            });
                        });
                    }
                }
            }
        });
        $('.data-title_node').attr('data-menutitle', "Человек");
        $('.data-title_edge').attr('data-menutitle', "Связь");
    }

    $(".node").on("click",function(e){
        if (add_link)
        {
            if ($("[name='person1']").val() != "")
            {
                if ($("[name='person1']").val() == $(this).attr("id")) return false;
                $("[name='person2']").val($(this).attr("id"));
                $("#person2").text('');
                $(this).find("text").each(function(k,v){
                    $("#person2").text($("#person2").text()+" "+ $(this).text());
                });
            }
            else
            {
                $("[name='person1']").val($(this).attr("id"));
                $("#person1").text('');
                $(this).find("text").each(function(){
                    $("#person1").text($("#person1").text()+" "+ $(this).text());
                });
            }
            return false;
        }
    })

    $("path").on("mouseenter",function(){
        if (parseInt($(this).attr("stroke-width")) == 4) $(this).attr("stroke-width","5")
        else $(this).attr("stroke-width","4")
    });

    $("path").on("mouseleave",function(){
        if (parseInt($(this).attr("stroke-width")) == 4) $(this).attr("stroke-width","2")
        else $(this).attr("stroke-width","4")
    });

    $("[save]").on("click",function(){
        var params = $("#add_person_form").serialize();

        $("#add_person_form").ajaxSubmit({
            dataType : 'json',
            url: "/users/tree/?dev_mode=off&ajax=on",
            data: params,
            type: 'post',
            beforeSend: show_preloader,
            success: function(res) {
                hide_preloader();
                if(res.error) show_message("error",res.error);
                else if (res.success){
                    show_message("success","Сохранено");
                    hide_popup();
                    if ($("[name='mode']").val() == "full") redirect('/users/tree/?mode=full');
                    else redirect('/users/tree/');
                }
            },
            error: function(res){
                show_message("error",res.error);
                hide_preloader();
            }
        },false);

        return false;
    });

    $(".add_link").on("click",function(){
        $("#add_link").show();
        add_link = true;
        return false;
    });

    $(".cancel_link").on("click",function(){
        $("#add_link").hide();
        add_link = false;
        $("[name='person1']").val('')
        $("[name='person2']").val('')
        $("#person1").html("кликните на человеке на диаграмме");
        $("#person2").html("кликните на человеке на диаграмме");
        return false;
    });

    $(".save_link").on("click",function(){
        user_api({act:'save_link',person1:$("[name='person1']").val(),person2:$("[name='person2']").val(),type:$("[name='type_link']").val()},function(data){
            $(".tree_data").html(data);
            $(".cancel_link").click();
            show_message("success","Сохранено");
        });
        return false;
    })

    $("[show_preview]").on("click",function(){
        th = this;
        request = $("#add_person_form").serialize();
        request = request + "&mode=preview";
        user_api(request,function(data){
            $("#edit").hide();
            $("#preview").html(data).show();
            $(th).removeAttr("show_preview").attr("hide_preview","").find("span").text('Вернуться к редактированию');
        });
        return false;
    });

    $("[hide_preview]").on("click",function(){
        $("#preview").html("").hide();
        $("#edit").show();
        $(this).removeAttr("hide_preview").attr("show_preview","").find("span").text('Предпросмотр');
        return false;
    });

    $("#change_image").click(function(){
        $("[name='image']").before("<!--[if !IE]>--><div id='avatarFileDiv' class='inputFileWrap' onclick='this.nextSibling.click();return false;'><input class='fileName' id='imageFileName' type='text' readonly='readonly' value='Файл не выбран' style='color:gray;'/><a class='newbtn' href='#'><span>Обзор</span></a></div><input class='realInputFile' id='realFile' name='image' type='file' onchange='$(\"#imageFileName\").val(this.value);return false;'/><!--<![endif]--><!--[if IE]><input id='realFile' name='image' type='file' /><![endif]-->Формат: JPG, PNG.").remove();
        $("#article_image").remove();
        $(this).remove();
    });
});
