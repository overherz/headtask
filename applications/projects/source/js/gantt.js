$(function() {
    $(".gantt").gantt({
        source: "/projects/gantt/get/"+$("[name='id_project']").val()+"/?dev_mode=off&ajax=on",
        navigate: "scroll",
        scale: "days",
        minScale: "days",
        maxScale: "weeks",
        itemsPerPage: 30,
        months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
        dow: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"] ,
        waitText: "Загрузка",
        onItemClick: function(data) {
            redirect("/projects/tasks/show/"+data.id+"/")
        },
        onAddClick: function(dt, rowId) {
            //alert("Empty space clicked - add an item!");
        },
        onRender: function() {
            //if (window.console && typeof console.log === "function") {
            //    console.log("chart rendered");
           // }
        }
    });
});