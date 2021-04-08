 <!-- partial:{{asset('')}}/partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
     <ul class="nav">
         <li class="nav-item nav-profile">
             <a href="#" class="nav-link">
                 <div class="profile-image">
                     <img class="img-xs rounded-circle" src="{{asset('images/noimage.jpg')}}" alt="profile image">
                     <div class="dot-indicator bg-success"></div>
                 </div>
                 <div class="text-wrapper">
                     <p class="profile-name"> {{ Auth::user()->name }}</p>
                     <p class="designation">Admin</p>
                 </div>
             </a>
         </li>
         <li class="nav-item nav-category">Main Menu</li>
         <li class="nav-item">
             <a class="nav-link" href="{{url('/home')}}">
                 <i class="menu-icon typcn typcn-mail"></i>
                 <span class="menu-title">Dashboard</span>
             </a>
         </li>
         <li class="nav-item nav-category">Aplikasi </li>
          <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#page-anggota" aria-expanded="false"
                 aria-controls="page-anggota">
                 <i class="menu-icon typcn typcn-archive"></i>
                 <span class="menu-title">Anggota</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="page-anggota">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/anggota')}}">Data Anggota</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/anggota/approval')}}">Approval Anggota</a>
                     </li>
                 </ul>
             </div>
         </li>
         <li class="nav-item">
             <a class="nav-link" data-toggle="collapse" href="#page-master" aria-expanded="false"
                 aria-controls="page-master">
                 <i class="menu-icon typcn typcn-archive"></i>
                 <span class="menu-title">Master</span>
                 <i class="menu-arrow"></i>
             </a>
             <div class="collapse" id="page-master">
                 <ul class="nav flex-column sub-menu">
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/kategori')}}">Master Kategori</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="{{url('/kategori/sub')}}">Master Sub Kategori</a>
                     </li>
                 </ul>
             </div>
         </li>
     </ul>
 </nav>
