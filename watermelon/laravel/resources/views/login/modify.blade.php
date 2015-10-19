@extends('elements.master')
@section('content')
<div>
<form id="user_frm" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table class="table">
    <tbody>
    <tr>
        <td>User id</td>
        <td> {{ $user_info['user_id'] }}  </td>
    </tr>
    <tr>
        <td>User name</td>
        <td> {{ $user_info['user_name'] }}  </td>
    </tr>
    <tr>
        <td>User Mail Address</td>
        <td> {{ $user_info['user_mail'] or '' }}  </td>
    </tr>
    <tr>
        <td> memo </td>
        <td> {{ $user_info['user_memo'] or '' }}  </td>
    </tr>
    </tbody>
</table>
</form>
</div>
@stop