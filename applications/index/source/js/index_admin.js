$(document).ready(function($) {
    setInterval(function(){
        user_api({act:'update_session'},function(){
            show_message("info","Обновление сессии");
        },false,'/admin/');
    },60000*15)
});
