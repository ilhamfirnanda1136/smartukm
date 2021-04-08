 <!-- partial:{{asset('')}}/partials/_sidebar.html -->
 <style>
.img-xs {
    width: 58px;
    min-width: 55px;
    height: 56px;
}
 </style>
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <?php
                        if(Session::get('anggota')->foto_anggota == null) {
                            $foto = url('images/noimage.jpg');
                        } else {
                            $foto = url("images/anggota/".Session::get('anggota')->foto_anggota);
                        }
                   ?>
                    <img class="img-xs rounded-circle" src="{{$foto}}"
                        alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name">{{Session::get('anggota')->nama}}</p>
                    <p class="profile-name">{{Session::get('anggota')->no_anggota}}</p>
                    <p class="designation">Anggota</p>
                </div>
            </a>
        </li>
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/anggota/dashboard')}}">
                <i class="menu-icon typcn typcn-mail"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/anggota/profile')}}">
                <i class="menu-icon typcn typcn-mail"></i>
                <span class="menu-title">Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/anggota/galery')}}">
                <i class="menu-icon typcn typcn-mail"></i>
                <span class="menu-title">Galery Foto</span>
            </a>
        </li>
    </ul>
</nav>