@include('navbar')


<nav id="navbar" class="navbar navbar-expand-lg border-primary navbar-light navbar-container bg-white"
            style="border-top:0px">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="https://odemeix.com.tr/images/logo/logo-6849.png" alt="logo" class=""
                        style="max-height:50px !important; max-width:250px !important">
                </a>
                <button class="navbar-toggler border border-primary collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">

                    <span class="toggler-icon top-bar"></span>
                    <span class="toggler-icon middle-bar"></span>
                    <span class="toggler-icon bottom-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="navbar-item menuTitle nav-link text-dark" data-bs-toggle="modal"
                                data-bs-target="#offersModal" href="#">
                                <i class="fa-solid fa-bullhorn text-primary"></i></i>&nbsp;&nbsp;
                                <span class="nav-item-text">Kampanyalar</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="navbar-item menuTitle nav-link text-dark" data-bs-toggle="modal"
                                data-bs-target="#serviceModal" href="#">
                                <i class="fa-solid fa-file-contract text-primary"></i>&nbsp;&nbsp;
                                <span class="nav-item-text">Hizmet Sözleşmesi</span></a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="nav-link text-dark" href="https://demo.tahsilate.com/musteri-giris-sayfasi">
                                <i class="fa-solid fa-user text-primary"></i></i>&nbsp;&nbsp;
                                <span class="nav-item-text">Müşteri Girişi</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
