@extends('elements.master')
@section('content')
<div>
    <form id="music_frm" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table class="table table-striped">
        <thead>
            <tr style="style="text-align:center;">
                <h1> 음악 상세 정보 </h1>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> 파일 </td>
                <td> <input type="file" name="music_file"> </td>
            </tr>
            <tr>
                <td> 가수 </td>
                <td> <input type="text" name="singer" class="form-control" > </td>
            </tr>
            <tr>
                <td> 앨범 </td>
                <td> <input type="text" name="album_name" class="form-control" > </td>
            </tr>
            <tr>
                <td> 제목 </td>
                <td> <input type="text" name="title" class="form-control" > </td>
            </tr>
            <tr>
                <td> 장르 </td>
                <td>
                    <select name="ganre" class="form-control">
                        <option value="0">nothing</option>
                        <option value="1">K-pop</option>
                        <option value="2">J-pop</option>
                        <option value="3">POP</option>
                        <option value="4">Animation</option>
                        <option value="5">Hiphop</option>
                        <option value="6">O.S.T</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td> 자켓 이미지 </td>
                <td>
                    <input type="file" name="album_jacket" id="imgInput" >
                    <di>
                        <img src="#" id="blah" style="width:300px; height:300px" >
                    </di>
                </td>
            </tr>
            <tr>
                <td colspan="2"> <a class="btn btn-info btn-lg btn-block" onclick="javascript:submit('music')"> 등록 </a> </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>
@stop