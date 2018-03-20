<nav class="navbar is-link">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{url('/')}}">
                <b>Pendaftaran Tenaga Pendamping BSPS Provinsi Jawa Timur Tahun 2018</b>
            </a>
            <div class="navbar-burger burger" data-target="main-navigation">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div id="main-navigation" class="navbar-menu">
            <div class="navbar-start">
            </div>
        </div>
    </div>
</nav>
<section class="hero is-link is-bold">
    <div class="hero-body">
        <div class="container">
            <article class="media">
                <figure class="media-left">
                    <p class="image is-64x64">
                        <img src="{{asset('images/kementerian-PU.png')}}">
                    </p>
                </figure>
                <div class="media-content">
                    <div class="content">
                        <h3 style="color: white;">
                            <b>KEMENTERIAN PEKERJAAN UMUM DAN PERUMAHAN RAKYAT
                                <br> DIREKTORAT JENDERAL PENYEDIAAN PERUMAHAN
                                <br> SNVT PENYEDIAAN PERUMAHAN PROVINSI JAWA TIMUR
                                <br>
                            </b>
                        </h3>
                        <small>Jl. Gayung Kebonsari No. 50 Surabaya 60233 Telp./Fax (031) 82516822 Email:
                            <a href="mailto:satkerperumahan.jatim@gmail.com">satkerperumahan.jatim@gmail.com</a>
                        </small>
                    </div>
                </div>
                <div class="media-right">
                </div>
            </article>
        </div>
    </div>
    @if(Auth::check())
    <div class="hero-foot">
        <div class="container">
            <div class="field is-grouped is-grouped-multiline is-grouped-right">
                <p class="control">
                    <a class="button is-primary" href="{{url('verifikasi-berkas')}}">
                        <span class="icon">
                            <i class="fa fa-check"></i>
                        </span>
                        <span>Verifikasi Berkas</span>
                    </a>
                </p>
                <p class="control">
                    <a class="button is-white" href="{{url('verifikasi-saya')}}">
                        <span class="icon">
                            <i class="fa fa-check"></i>
                        </span>
                        <span>Proses Verifikasi Saya</span>
                    </a>
                </p>
                <p class="control">
                    <a class="button is-black" href="{{url('ubah-password')}}">
                        <span class="icon">
                            <i class="fa fa-key"></i>
                        </span>
                        <span>Ubah Password</span>
                    </a>
                </p>
                <p class="control">
                    <a class="button is-warning" href="{{url('signout')}}">
                        <span class="icon">
                            <i class="fa fa-sign-out"></i>
                        </span>
                        <span>Log out</span>
                    </a>
                </p>
            </div>
        </div>
    </div>
    @endif
</section>