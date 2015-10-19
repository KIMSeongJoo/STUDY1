@extends('elements.master')
@section('content')
<?php if( strlen( $login_info['login_chk'] ) > 0 ): ?>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<div>
    <h1> Regist New Member </h1>
</div>
<div>
    <button id = "dialog"> test123 </button><br />
    <button id='button_open_dialog'>대화상자 열기</button>
</div>
<div>
    <form id="regi_frm" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table class="table table-striped table-bordered" id="regi_table">
        <div style="display:0" id="error_area"></div>
        <tr>
            <td> Name </td>
            <td> <input type="text" class="form-control" name="user_name" id="user_name" > </td>
        </tr>
        <tr id="user_id_group" >
            <td> <span class="glyphicon glyphicon-check"></span> Account </td>
            <td name="user_id">
                <div class="alert alert-danger" style="display: none;" id="id_error"></div>
                <input type="text" class="form-control" name="user_id" id="user_id" >
            </td>
        </tr>
        <tr>
            <td> Nickname </td>
            <td name="user_nickname" >
                <p class="glyphicon glyphicon-exclamation-sign" style="padding:15px; border-radius:15px; display:none;" id="nickname_err"></p>
                <input type="text" class="form-control" name="user=id" id="user_nickname" >
            </td>
        </tr>
        <tr>
            <td> <span class="glyphicon glyphicon-check"></span> Mail Address </td>
            <td name="user_mail" > <input type="email" class="form-control" name="user_mail_add" id="user_mail" > </td>
        </tr>
        <tr>
            <td> <span class="glyphicon glyphicon-check"></span>Base Passwd </td>
            <td name="user_pw" > <input type="password" class="form-control" name="user_pw" id="user_pw" > </td>
        </tr>
        <tr>
            <td> Auth </td>
            <td>
                <select  class="form-control" name="user_auth" >
                    <option value="1"> Manager </option>
                    <option value="2"> Basic </option>
                </select>
            </td>
        </tr>
        <tr>
            <td> memo </td>
            <td> <textarea class="form-control" rows="3" name="user_memo" ></textarea> </td>
        </tr>
        <tr>
            <td> <a class="btn btn-info btn-lg btn-block" onclick="javascript:submit('regi')" id="sub_button"> Regist </a> </td>
            <td> <a class="btn btn-info btn-lg btn-block" id="clear"> Form Clear </a> </td>
        </tr>
    </table>
    </form>
</div>
<?php else: ?>
<h1>You Need Login <br /></h1>
plz login
<?php endif; ?>
@stop
