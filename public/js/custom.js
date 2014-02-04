function formatDateTime(datetime){
    datetime_obj = new Date(datetime);

    var date = $.datepicker.formatDate('yy/mm/dd',datetime_obj);
    var hour = datetime_obj.getHours().toString();
    if(hour.length == 1){
        hour = '0' + hour;
    }
    var minute = datetime_obj.getMinutes().toString();
    if(minute.length == 1){
        minute = '0' + minute;
    }
    var time = hour + ':' + minute;
    return date + " " +time;
}