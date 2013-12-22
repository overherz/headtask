$(document).ready(function($) {

    $(".audio-delete").on("click",function(){
        show_popup("<div style='text-align:center;'>Вы хотите удалить эту аудиозапись?</div>","Подтверждение удаления аудиозаписи");
        var id = $(this).attr("file");
        add_popup_button("Да",'Yes', {id:id}, function(vars){
            user_api({act:'delete_audio',id:vars.id},function(res){
                show_message("success","Аудиозапись успешно удалена");
                hide_popup();
                if ($("#player"+vars.id).find(".jp-pause").is(":visible"))
                {
                    var th = $("#player"+vars.id);
                    var next = th.next();
                    songs(next.find(".jp-play").attr('href'),next.attr("id"));
                }
                $("#player"+vars.id).remove();
                if (res.show) $("#uploadify").show();
                if (res.zero) $(".zero").show();
            });
        });
        return false;
    });

    if ($("#uploadify").length > 0)
    {
        $("#uploadify").uploadify({
            'buttonText': 'Загрузить аудиозаписи',
            'swf'    : "/source/js/uploadify/uploadify.swf",
            'uploader'     : "/users/audio?dev_mode=off&ajax=on&"+$("[name='session_name']").val()+"="+$("[name='session_id']").val(),
            'fileTypeExts' : '*.mp3;',
            'auto'      : true,
            'multi'     : true,
            'width': 180,
            'onFallback' : function() {
                var html = "<div style='color:red;font-weight:bold;'> Для полноценной работы всех функций модуля требуется flash player. Пройдите по ссылке и установите его</div> <a href='http://get.adobe.com/flashplayer/' target='_blank'>http://get.adobe.com/flashplayer/</a>";
                show_popup(html,"Критическая ошибка");
            },
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                show_message("error",file.name+" не загружен!");
            },
            'onUploadSuccess': function(file,data,response) {
                if (data == "\"LoginException\"") redirect('/users/login/');
                var res = jQuery.parseJSON(data);
                if(res.error)
                {
                    if (!res.error.text) show_message("error",res.error);
                    else if (res.error.max)
                    {
                        $("#uploadify").hide();
                        show_message("error",res.error.text);
                        $("#uploadify").uploadify('cancel', '*');
                    }
                }
                else if (res.success) {
                    show_message("success",file.name+" успешно загружен");
                    $("#audio").prepend(res.success);
                    $(".zero").hide();
                }
            }
        });
    }

    $(".jp-play").on("click",function(){
        var url = $(this).attr("href");
        var mode = $(this).attr('mode');
        songs(url,mode);
        return false;
    });

    $(".player").on({
        mouseenter:
            function()
            {
                $(this).css("background",'#e4fbd0')
                if ($(this).find(".audio-delete").length > 0)
                {
                    $(this).find(".audio-delete").show();
                    $(this).find(".timer").css('marginRight','0px');
                }
            },
        mouseleave:
            function()
            {
                $(this).css("background",'')
                if ($(this).find(".audio-delete").length > 0)
                {
                    $(this).find(".audio-delete").hide();
                    $(this).find(".timer").css('marginRight','');
                }
            }
        }
    );
});

function songs(url,id) {

    $("#player").jPlayer("destroy");
    var th = $("#"+id);
    var volume = 0;
    if ($.cookie("volume")) volume = $.cookie("volume");
    else volume = 1;

    $("#player").jPlayer({
        ready:function (event) {

            $(this).jPlayer("setMedia", {
                mp3:url
            }).jPlayer("play");

        },
        repeat: function(event) { // Override the default jPlayer repeat event handler
            $(this).unbind(".jPlayerRepeat").unbind(".jPlayerNext");
            $(this).bind($.jPlayer.event.ended + ".jPlayer.jPlayerNext", function() {
                var next = th.next();
                songs(next.find(".jp-play").attr('href'),next.attr("id"));
            });
        },
        volumechange: function(event) {
            volume = $("#player").jPlayer("option","volume");
            $.cookie("volume",volume,{expires: 7, path: '/'});
        },
        swfPath: "/source/js/jQuery.jPlayer.2.2.0/",
        cssSelectorAncestor : "#"+id,
        wmode:"window",
        volume: volume
    });

    $(".progress").hide();
    $(".progress[progress='"+id+"']").show();
}