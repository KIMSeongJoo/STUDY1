@extends('elements.master')
@section('content')
<div class="jumbotron" style="text-align:center;">
@if( $result == true )
    <h1> 성공적으로 등록 되었습니다! </h1><br/>
    <a class="btn btn-primary btn-lg" href="/music_list" > 리스트로 돌아가기 </a>
@else
    <h1> 등록에 실패 하였습니다! </h1><br />
    <a class="btn btn-primary btn-lg" href="/new_music" > 다시 등록하기 </a>
@endif
</div>
@stop