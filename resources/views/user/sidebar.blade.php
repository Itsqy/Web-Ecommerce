 <!-- Sidebar -->
 <div class="sidebar sidebar-style-2">
     <div class="sidebar-wrapper scrollbar scrollbar-inner">
         <div class="sidebar-content">
             <div class="user">
                 <div class="avatar-sm float-left mr-2">
                     @if (Auth::user()->img == '')
                         <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}" alt="..."
                             class="avatar-img rounded-circle">
                     @else
                         <img src="{{ $User->img }}" class="avatar-img rounded-circle" alt="">
                     @endif

                 </div>
                 <div class="info">
                     <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                         <span>
                             {{ Auth::user()->name }}
                             <span class="user-level">{{ Auth::user()->role }}</span>
                             <span class="caret"></span>
                         </span>
                     </a>
                     <div class="clearfix"></div>

                     <div class="collapse in" id="collapseExample">
                         <ul class="nav">
                             <li>
                                 <a href="{{ route('profile.show', Auth::user()->username) }}">
                                     <span class="link-collapse">My Profile</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="{{ route('profile.edit', Auth::user()->username) }}">
                                     <span class="link-collapse">Edit Profile</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="{{ route('editpassword') }}">
                                     <span class="link-collapse">Edit Password</span>
                                 </a>
                             </li>
                             <li>
                                 <a href="#">
                                     <span class="link-collapse">Settings</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <ul class="nav nav-primary">

                 <!-- <li class="nav-section">
       <span class="sidebar-mini-icon">
        <i class="fa fa-ellipsis-h"></i>
       </span>
       <h4 class="text-section">Pengaturan Akun</h4>
      </li> -->

                 @if (Auth::user()->role == 'Admin')
                     <li class="nav-item">
                         <a data-toggle="collapse" href="#user">
                             <i class="fas fa-users"></i>
                             <p>Data User</p>
                             <span class="caret"></span>
                         </a>
                         <div class="collapse" id="user">
                             <ul class="nav nav-collapse">
                                 <li>
                                     <a href="{{ route('table') }}">
                                         <span class="sub-item">List User</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </li>

                     <li class="nav-item">
                         <a data-toggle="collapse" href="#produk">
                             <i class="fas fa-store-alt"></i>
                             <p>Data Produk</p>
                             <span class="caret"></span>
                         </a>
                         <div class="collapse" id="produk">
                             <ul class="nav nav-collapse">
                                 <li>
                                     <a href="{{ route('produk.index') }}">
                                         <span class="sub-item">List Produk</span>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="{{ route('kategori.index') }}">
                                         <span class="sub-item">List kategori</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </li>

                     <li class="nav-item">
                         <a data-toggle="collapse" href="#pesanan">
                             <i class="fas fa-wallet"></i>
                             <p>Transaksi</p>
                             <span class="caret"></span>
                         </a>
                         <div class="collapse" id="pesanan">
                             <ul class="nav nav-collapse">
                                 <li>
                                     <a href="{{ route('status.pending') }}">
                                         <span class="sub-item">Pending</span>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#">
                                         <span class="sub-item">Lunas</span>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="#">
                                         <span class="sub-item">Dikirim</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </li>
                 @else

                     <li class="nav-item">
                         <a data-toggle="collapse" href="#pesanan">
                             <i class="fas fa-wallet"></i>
                             <p>Transaksi</p>
                             <span class="caret"></span>
                         </a>
                         <div class="collapse" id="pesanan">
                             <ul class="nav nav-collapse">
                                 <li>
                                     <a href="#">
                                         <span class="sub-item">Pesanan</span>
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </li>
                 @endif
             </ul>
         </div>
     </div>
 </div>
 <!-- End Sidebar -->
