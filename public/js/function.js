function load_activity_data(){
    $('.checkin_history').removeClass('hidden');
    $('.checkin_history tbody').text('');
    var aid = $('#select_activity').val();
    if(aid != ''){
        $.post(url + '/activity/data',{aid:aid},function(data){
            $('.checkin_num').text('0');
            $('#checkin_alert').addClass('hidden');
            $('#activity_load_alert').removeClass('hidden');
            data = JSON.parse(data);
            $('#activity_name').text('活動名稱：' + data.activity_name);
            $('#activity_date').text('活動日期：' + $.datepicker.formatDate("yy/mm/dd",new Date(data.activity_date)).replace('1970/01/01',''));
            $('#activity_organize').text('主辦單位：' + data.activity_organize);
            $('#activity_type').text('簽到類型：' + data.activity_type.replace('no_check','無需事先報名').replace('strict_check','需事先報名').replace('only_prompt','需事先報名，但可現場補報'));
        })    
    }
}
function htmlspecialchars(str) {
     if (typeof(str) == "string") {
      str = str.replace(/&/g, "&amp;");
      str = str.replace(/"/g, "&quot;");
      str = str.replace(/'/g, "&#039;");
      str = str.replace(/</g, "&lt;");
      str = str.replace(/>/g, "&gt;");
      }
     return str;
 }
function isJson(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}

function checkin(){
    $.post(url + '/activity/check',$('#checkin_form').serialize(),function(data){
        $('.checkin-data').addClass('hidden');
        $('#checkin_alert').removeClass('hidden');
        $('.checkin_title').text('');
        $('#activity_load_alert').addClass('hidden');

        // 避免簽到暫存區過長
        if($(".checkin_history tbody tr").length >= 20){
            $(".checkin_history tbody tr").last().remove();
        }
        if(data == '資格不符合，簽到失敗'){
            $('.checkin_title').text(data);
        }else{
            $('.checkin_num').text(parseInt($('.checkin_num').text()) + 1);
            if(isJson(data)){
                data = JSON.parse(data);
                if(data.message == undefined){
                    data.message = '簽到成功';
                }
                $('.checkin-data').removeClass('hidden');
                $('.checkin_title').text(data.message);

                $('#checkin_name').text('姓名：' + htmlspecialchars(data.name));
                $('#checkin_job').text('職務（票種）：' + htmlspecialchars(data.job));
                $('#checkin_department').text('科系：' + htmlspecialchars(data.department));
                $('#checkin_studentid').text('學號：' + htmlspecialchars(data.student_id));
                $('.checkin_history tbody').prepend('<tr><td>' + htmlspecialchars(data.student_id) + '</td><td>' + new Date().getHours() + ":" + new Date().getMinutes() + '</td></tr>')
            }else{
                $('.checkin_title').text(data + '簽到成功');
                $('.checkin_history tbody').prepend('<tr><td>' + htmlspecialchars(data) + '</td><td>' + new Date().getHours() + ":" + new Date().getMinutes() + '</td></tr>')
            }
        }
        $('#stu_card').val('');
    })
}
function borrow(){
    $(".alert").remove();
    if($('#stu_card').val() != ''){
        $.post(url + '/equip/borrow',$('form').serialize(),function(data){
            $("form input:text").val('');
            $('.breadcrumb').parent().append('<div class="alert alert-success">' + data + '</div>')
        })
    }else{
        $('.breadcrumb').parent().append('<div class="alert alert-danger">學生證欄位為必填</div>')
    }
    
}
function returnEquip(){
    $(".alert").remove();
    $.post(url + '/equip/return',$('form').serialize(),function(data){
        $("form input:text").val('');
        $('.breadcrumb').parent().append('<div class="alert alert-success">' + data + '</div>');
        $("input:checked").parent().parent().remove();

    })
}
function add_item(){
    $(".borrow-table tbody").append('<tr><td><input type="text" class="form-control" name="equip_name[]"></td><td><input type="text" class="form-control return_date" name="return_date[]"></td></tr>');
    $('.return_date').datepicker();
}
function del_item(){
    $(".borrow-table tbody tr").last().remove();
}
function del_namelist_check(namelist_id,namelist_name){
    $('#check_dialog .modal-title').text('確認刪除名冊');
    $('#check_dialog .modal-body').text('您確定要刪除' + namelist_name + '這份名冊？');
    $('#check_dialog').modal('show');
    
}
function delete_select_member(){
    $('#check_dialog').modal('hide');
    $.post(url + '/namelist/member/delete',$('#member_form').serialize(),function(data){

        if(data == 1){
            $('#member_form input:checked').parent().parent().remove();
            $('.alert').remove();
            $('.breadcrumb').parent().append('<div class="alert alert-success">成功刪除指定的成員</div>');
        }else{
            console.log(data);
        }
    })
}
function del_select_member_dialog(){
    var body_str = '';
    var id_str = '';

    $('.namelist_member input[type=checkbox]:checked').each(function(){
        var temp = $(this).val().split(',');
        body_str += temp[1] + '<br/>';
        id_str += temp[0] + ',';
    })
    if($('.namelist_member input[type=checkbox]:checked').length===0){
        $('#check_dialog .modal-title').text('確認刪除成員');
        $('#check_dialog .modal-body').html('您沒有選擇任何成員！');
    }else{
        $('#check_dialog .modal-title').text('確認刪除成員');
        $('#check_dialog .modal-body').html('您確定要從本名冊中刪除以下成員？ <br/>' + body_str);    
    }
    
    $('#check_dialog').modal('show');
}
function update_namelist(){
    
    $.post(url + '/namelist/edit',$('#namelist_data').serialize(),function(data){
        $('.alert').remove();
        $('.breadcrumb').parent().append('<div class="alert alert-success">' + data + '</div>');
    });
}

function load_record(page, type){
    $.post(url + '/equip/history',{type:type,page:page,month:$('#month').val()},function(data){
        $('#' + type).find("ul.pagination li.active").removeClass('active');
        $('#' + type).find("ul.pagination li").eq(page-1).addClass('active');
        $('#' + type).find('tbody').html('');
        
        data = JSON.parse(data);
        var i=0;
        $.each(data,function(){
            if(type == 'be_lated'){
                $('#' + type).find('tbody').append('<tr><td>XXX</td><td>' 
                    + htmlspecialchars(data[i].student_id)
                    + '</td><td>' 
                    + htmlspecialchars(data[i].equip_name)
                    + '</td><td>' 
                    + htmlspecialchars(formatDateTime(data[i].borrow_time))
                    + '</td><td>' 
                    + htmlspecialchars(formatDateTime(data[i].estimate_return_time))
                    + '</td><td>' 
                    + htmlspecialchars($.datepicker.formatDate('d',new Date((+new Date()) - (+new Date(data[i].estimate_return_time)))))
                    + '天</td></tr>');
            }else if(type == 'not_return'){
                $('#' + type).find('tbody').append('<tr><td>XXX</td><td>' 
                    + htmlspecialchars(data[i].student_id)
                    + '</td><td>' 
                    + htmlspecialchars(data[i].equip_name)
                    + '</td><td>' 
                    + htmlspecialchars(formatDateTime(data[i].borrow_time))
                    + '</td></tr>');
            }else{
                $('#' + type).find('tbody').append('<tr><td>XXX</td><td>' 
                    + htmlspecialchars(data[i].student_id)
                    + '</td><td>' 
                    + htmlspecialchars(data[i].equip_name)
                    + '</td><td>' 
                    + htmlspecialchars(formatDateTime(data[i].borrow_time))
                    + '</td><td>' 
                    + htmlspecialchars(formatDateTime(data[i].return_time))
                    + '</td></tr>');
            }
            
            i++;
        })
    });
}
function del_select_activity(){
    $.post(url + '/activity/delete',$('#viewActivityForm').serialize(),function(data){
        $('#check_dialog').modal('hide');
        $('input:checked').parent().parent().remove();
        $('.alert').remove();
        $('.breadcrumb').parent().append('<div class="alert alert-success">成功刪除指定的活動</div>');

    })
}
function delete_dialog(namelist_id,namelist_name){
    nid = namelist_id;
    $('.del_name').text(namelist_name);
    $('#check_delete_dialog').modal('show');
}
function delete_NameList(){
    $.post(url + '/namelist/delete',{nid:nid},function(data){
        $('#check_delete_dialog').modal('hide');
        $('tr#nid-' + nid).remove();
        nid = '';
    });
}