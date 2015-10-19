function submit( cmd ){
    var $frm_id = cmd + "_frm";
    var $frm

    frm = document.getElementById( $frm_id )
    switch( cmd ){
        case "login":
            frm.action="/login_chk";
            break;
        case "regi":
            frm.action="/mem_regist";
            break;
        case "music":
            frm.action="/new_music";
            break;
    }
    
    frm.method="POST";
    frm.submit();
}

function modify( id ){
    var frm = document.getElementById('mem_frm_' + id);
    
    frm.method="POST";
    frm.action="/modi_mem";
    frm.submit()
}


$(document).ready(function(){

    var dialog1 = $("#dialog").dialog({ 
        autoOpen: false,
        height: 600,
        width: 350
      });
    
    $("#button_open_dialog").click(function(){
//        $('#dialog').dialog('open');
        dialog1.load('/mem_list').dialog('open');
    });
    
    
    $("#clear").click(function(){
        alert("cyka1818");
    });
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    // default image settig
    var img = $('#blah').attr('src');
    if( img == "#" ){
        $('#blah').attr('src', '/photos/default.jpg');
    }
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader(); //파일을 읽기 위한 FileReader객체 생성
            reader.onload = function (e) {
            //파일 읽어들이기를 성공했을때 호출되는 이벤트 핸들러
                $('#blah').attr('src', e.target.result);
                //이미지 Tag의 SRC속성에 읽어들인 File내용을 지정
                //(아래 코드에서 읽어들인 dataURL형식)
            }                   
            reader.readAsDataURL(input.files[0]);
            //File내용을 읽어 dataURL형식의 문자열로 저장
        }
    }//readURL()--

    //file 양식으로 이미지를 선택(값이 변경) 되었을때 처리하는 코드
    $("#imgInput").change(function(){
        //alert(this.value); //선택한 이미지 경로 표시
        readURL(this);
    });
    
    $("input[name='user_id'],input[name='user_pw'],input[name='user_mail_add']").blur( function(){
        var input_val = this.value;
        var target_id = this.id;
        var target_name = this.name;
        var token = $("input[name='_token']").val();
        
        switch( target_id ){
            case "user_pw":
            case "user_mail":
                if( input_val.length == 0 ){
                    $("td[name='" + target_id + "']").attr('class', 'has-error');
                }else{
                    $("td[name='" + target_id + "']").attr('class', 'has-success');
                }
                var pw_length   = $("input[name='user_pw']").val().length;
                var mail_length = $("input[name='user_mail_add']").val().length;
                if( pw_length == 0 || mail_length == 0){
                    $("#sub_button").attr({'class'    : 'btn btn-info btn-lg btn-block disabled',
                                           'onclick'  : '' });
                }else{
                    $("#sub_button").attr({'class'    : 'btn btn-info btn-lg btn-block',
                                           'onclick'  : "javascript:submit('regi')" });
                }
                break;
            case "user_id":
            case "user_nickname":
                if( input_val.length <= 5 ){
                    $("#id_error").html('You need more length');
                    $("#id_error").show();
                    $("#sub_button").attr({'class'    : 'btn btn-info btn-lg btn-block disabled',
                                           'onclick'  : '' });
                }else if( input_val.length >= 6 ){
                    $.ajax({
                        type     : "POST",
                        url      : "chk_inputval",
                        dataType : "JSON",
                        data     : { "cmd" : target_name , "value" : input_val },
                        complete : function( data ){
                            console.log( data.responseJSON.result.length );
                            // success
                            if( data.responseJSON.result.length == "0" ){
                                $("#id_error").hide();
                                $("#user_id_group").attr({ 'class' : 'form-group has-success' });
                                $("#sub_button").attr({'class'    : 'btn btn-info btn-lg btn-block',
                                                       'onclick'  : "javascript:submit('regi')" });
                            // false
                            }else{
                                $("#id_error").html( "이미 사용중입니다." );
                                $("#id_error").show();
                                $("#user_id_group").attr({ 'class' : 'form-group has-error' });
                                $("#sub_button").attr({'class'    : 'btn btn-info btn-lg btn-block disabled',
                                                       'onclick'  : '' });
                            }
                                
                                
                        }
                     });
                }else{
                    
                }
                break;
            case "user_nickname":
                break;
        }
        
    } );
    

});