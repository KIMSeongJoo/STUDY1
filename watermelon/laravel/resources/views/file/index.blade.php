@extends('elements.master')
@section('content')
<div>
{{--login --}}
@if( strlen( $login_info['login_chk'] ) > 0 )
{{-- Music list! --}}
@if( count( $music_list  ) > 0 )
<div>
<form>
<table class="table table-striped">
    <thead>
        <tr>
            <th>No.</th>
            <td>이미지</td>
            <th>음악</th>
            <th>제목</th>
            <th>가수</th>
            <th>앨범명</th>
            <th>장르</th>
        </tr>
    </thead>
<!-- {{ $cnt=1 }}  -->
@foreach( $music_list as $music )
@if( $music['ganre'] == "0" )
<!-- {{ $ganre="nothing" }} -->
@elseif( $music['ganre'] == "1" )
<!-- {{ $ganre="K-Pop" }} -->
@elseif( $music['ganre'] == "2" )
<!-- {{ $ganre="J-Pop", $class="primary" }} -->
@elseif( $music['ganre'] == "3" )
<!-- {{ $ganre="POP" }} -->
@elseif( $music['ganre'] == "4" )
<!-- {{ $ganre="Animation" }} -->
@elseif( $music['ganre'] == "5" )
<!-- {{ $ganre="Hip-Hop" }} -->
@else
<!-- {{ $ganre="O.S.T" }} -->
@endif
        <tr>
            <td>{{ $cnt }}</td>
            <td><img src="/photos/{{ $music['jacket_name'] }}" class="img-thumbnail" style="width:100px; height:100px;"></td>
            <td><audio controls="controls" preload="auto" loop="">
                    <source src="/music/{{ $music['file_name'] }}" type="audio/mp3" />
                </audio>
            </td>
            <td>{{ $music['title'] }}</td>
            <td>{{ $music['singer'] }}</td>
            <td>{{ $music['album_name'] }}</td>
            <td><span class="label label-{{ $class }}">{{ $ganre }}</span> </td>
        </tr>
<!-- {{ $cnt++ }} -->
@endforeach
    <tbody>

    </tbody>
</table>
</form>
</div>
{{-- music list check --}}
@elseif( count( $music_list ) === 0 )
<div class="jumbotron" style="text-align:center;">
  <h1>등록된 음악이 없습니다!!</h1>
</div>
@else

@endif

{{-- master --}}
@if( $login_info['login_auth'] === "1" )
<div>
    <a href="/new_music" class="btn btn-primary btn-lg"> Music Regist </a>
</div>
@endif

@else
{{-- unlogin --}}
@endif
</div>
@stop