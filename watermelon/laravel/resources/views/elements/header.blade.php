<!-- header menu -->
<div>
    <h1> Water Melon </h1>
    <div style="float:left; margin-right:10px; padding-bottom: 15px;">
        <a href="/" class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-home"></span> HOME </a>
<?php if( strlen( $login_info['login_chk'] ) > 0 ): ?>
        <?php if( $login_info['login_auth'] === "1" ): ?>
<!--
        <div class="btn-group">
            <button type="button" class="btn btn-danger btn-lg">Action</button>
            <button type="button" class="btn btn-danger dropdown-toggle btn-lg" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
            </ul>
        </div>
        <a href="/new_mem"  class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-user"></span> User Regist </a>
 -->
        <a href="/mem_list" class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-th-list"></span> Member List </a>
        <?php endif;?>
        <a href="/music_list" class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-music"></span> Music </a>
        <a href="/logout" class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-log-in"></span> LOGOUT </a>
<?php else: ?>
        <a href="/login" class="btn btn-primary btn-lg" ><span class="glyphicon glyphicon-log-out"></span> LOGIN </a>
<?php endif; ?>
    </div>
</div>