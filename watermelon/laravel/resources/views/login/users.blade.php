@extends('elements.master')
@section('content')
<div>
    <div>
        <h3>Member total : <?= count( $mem_list ) ?></h3>
    </div>
    <table class="table table-striped" >
        <thead>
        <tr>
            <th> NO </th>
            <th> USER NAME </th>
            <th> USER ID </th>
            <th> USER MAIL </th>
            <th> USER AUTH </th>
            <th> USER MEMO </th>
            <th> 상세정보 </th>
        </tr>
        </thead>
        <tbody>
<!-- {{ $count = 1 }} -->
@foreach( $mem_list as $list )
        <tr>
            <form id="mem_frm_{{ $count }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <th>{{ $count }} </th>
            <td><input type="hidden" name="user_name" value="{{ $list['user_name'] }}" >{{ $list['user_name'] or '' }} </td>
            <td><input type="hidden" name="user_id"   value="{{ $list['user_id'] }}"   >{{ $list['user_id']   or '' }} </td>
            <td><input type="hidden" name="user_mail" value="{{ $list['user_mail'] or '' }}" >{{ $list['user_mail'] or '' }} </td>
            <td>
            @if( $list['user_auth'] ==="1" )
                <span class="glyphicon glyphicon-eye-open" ></span>Master
            @else
                <span class="glyphicon glyphicon-eye-close" ></span>Normal
            @endif
            </td>
            <td><input type="hidden" name="user_memo" value="{{ $list['user_memo'] or '' }}" >{{ $list['user_memo'] or '' }} </td>
            <td> <a class="btn btn-info" onclick="javascript:modify('{{ $count }}');" > 상세보기 </a></td>
            </form>
<!-- {{ $count++ }} -->
        </tr>
@endforeach
        <tr>
            <td colspan="6" ><a href="/new_mem"  class="btn btn-info btn-lg" ><span class="glyphicon glyphicon-user"></span> User Regist </a></td>
        </tr>
        </tbody>
    </table>
</div>
@stop