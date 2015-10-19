@extends('elements.master')
@section('content')
<div>
<form id="user_frm" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
    <tbody>
    <tr>
        <td>User id</td>
        <td> {{ $user_info['user_id'] }}  </td>
    </tr>
    </tbody>
</table>
</form>
</div>
@stop