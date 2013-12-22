$(document).ready(function($) {

    $(document).on("click","[delete_file]",function(){
        show_popup("<div style='text-align:center;'>Вы хотите удалить этот файл?</div>","Подтверждение удаления файла");
        var id = $(this).attr("delete_file");
        add_popup_button("Да",'Yes', {id:id}, function(vars){
            user_api({act:'delete_file',id:vars.id},function(res){
                show_message("success","Файл успешно удален");
                hide_popup();
                $('#search_form').submit();
            });
        });
        return false;
    });

    $(document).on("click",".upload_files",function(){
        user_api({act:'get_form_upload'},function(res){
            show_popup(res,'Загрузка файлов',function(){
                    make_upload();
                },function(){
                var activeUploads = $('#fileupload').fileupload('active')
                if (activeUploads > 0)
                {
                    show_message("error","Загрузка отменена");
                    setInterval(function(){
                        redirect();
                    },1500);
                }
            });

        },false,'/projects/files/');
        return false;
    });
});

function make_upload()
{
    $('#fileupload').fileupload({
        url: '/projects/files/?dev_mode=off&ajax=on',
        formData: {'project' : $("[name='id_project']").val(),'to_task': $("#task_form").length},
        dataType: 'json',
        autoUpload: true,
        bitrateInterval: 3000,
        limitConcurrentUploads: 3,
        add: function (e, data) {
            $('.fileinput-button').hide();
            $(".table_upload").show();
            $.each(data.files, function (index, file) {
                var html =
                "<tr>" +
                    "<td style='border-top: none;width: 1%;white-space: nowrap;'>"+file.name.substr(0,40)+"</td>" +
                    "<td style='border-top: none;'>" +
                        "<div class='progress progress-striped active'>" +
                            "<div class='bar' id='"+file.name+"' style='width: 0%;text-align: right;'></div>" +
                        "</div>" +
                    "</td>" +
                    "<td style='width: 100px;border-top: none;' data-speed='"+file.name+"'></td>" +
                "</tr>";
                $(".table_upload").append(html);
            });
            data.submit();
        },
        done: function (e, data) {
            var res = data.result;
            if (res == "\"LoginException\"") redirect('/users/login/');
            if(res.error) show_message("error",res.error);
            else if (res.success)
            {
                show_message("success",data.files[0].name+" успешно загружен");
                $("#no_file").hide();
                $("#files_table tr:first").after(res.success);
                activate_fancy();
            }
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('.bar_upload').css(
                'width',
                progress + '%'
            );
        },
        stop: function (e) {
            setTimeout(function(){
                hide_popup();
            },1000);
        }
    })
    .on('fileuploadprogress', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        var bar = $("#"+add_slashes(data.files[0].name))
        bar.css(
            'width',
            progress + '%'
        );
        $("[data-speed='"+add_slashes(data.files[0].name)+"']").text(formatBitrate(data.bitrate));
    })
    .on('fileuploadfail', function (e, data) {
        show_message("error",data.files[0].name+" не загружен!");
    })
    .prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

    activate_fancy();
}

function activate_fancy()
{
    if ($(".fancybox").length > 0)
    {
        $(".fancybox").fancybox({
            openEffect	: 'none',
            closeEffect	: 'none',
            prevEffect  : 'none',
            nextEffect	: 'none'
        });
    }
}

function add_slashes(str)
{
    str = str.replace(/\./g, '\\.');
    return str;
}

function formatBitrate(bits) {
    if (typeof bits !== 'number') {
        return '';
    }
    if (bits >= 1073741824) {
        return (bits / 1073741824).toFixed(2) + ' Gbit/s';
    }
    if (bits >= 1048576) {
        return (bits / 1048576).toFixed(2) + ' Mbit/s';
    }
    if (bits >= 1024) {
        return (bits / 1024).toFixed(2) + ' kbit/s';
    }
    return bits.toFixed(2) + ' bit/s';
}