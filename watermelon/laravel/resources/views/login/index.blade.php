@extends('elements.master')
@section('content')
    <form id="login_frm" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table class="table table-striped">
        <tr>
            <div id="error_area" style="display:0">
            </div>
        </tr>
        <tr>
            <td> id </td>
            <td> <input type="text" size="20" name="id" class="form-control" placeholder="ID" > </td>
        </tr>
        <tr>
            <td> password</td>
            <td><input type="password" size="20" name="pw" class="form-control" placeholder="Password" ></td>
        </tr>
        <tr>
            <td colspan="2"><a type="button" class="btn btn-info btn-lg btn-block" onclick="javascript:submit('login')">Login</a></td>
        </tr>
    </table>
    </form>
@stop