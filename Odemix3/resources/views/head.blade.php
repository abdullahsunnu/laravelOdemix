<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('head')
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', ' | Ödemeix Ödeme Sistemleri') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon-247.png') }}">
    <link rel="stylesheet" href="{{ asset('Odemix3/resources/css/system.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Odemix3/resources/css/payment.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!--[if (lt IE 9) & (!IEMobile)]><script src="{{ asset('/Scripts/respond.src.js') }}"></script><![endif]-->
    <meta name="robots" content="noindex, nofollow, noarchive, noodp, noydir">
    <meta content="True" name="HandheldFriendly">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="">
    <meta content="{{ csrf_token() }}" name="csrf-token" />
    <link rel="stylesheet" href="{{ asset('cookie-banner.css') }}">
    <link rel="stylesheet" type="text/css"
        href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('Odemix3/resources/css/banksInstallments.css') }}">
    <script type="text/javascript"
        src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=Y_gk84ZXcTRvVGpPNvOWfds70WyeQUOFkEJvB58XhXEnfe0Mij0se2I4aeBmbp5-"
        charset="UTF-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="{{ asset('Odemix3/resources/css/paymentCustom.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.2/b-2.3.4/b-colvis-2.3.4/b-html5-2.3.4/b-print-2.3.4/r-2.4.0/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body style="background-color: #d9d9d9">
    <div id="paymentAuth" class="modal pe-0 user-select-none" tabindex="-1" data-bs-backdrop="static"
        data-bs-keyboard="false" aria-labelledby="paymentAuth" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Doğrulama</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe id="payment-iframe" frameborder="0" height="100%" width="100%"></iframe>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
    <noscript>
        bu yazılım javascript olmadan çalışamaz!
    </noscript>
    <div id="loading">
        <div class="loader">
            <div class="loader-body word-spacing">
                <img id="loader-image" src="https://odemeix.com.tr/images/logo/logo-6849.png"
                    style="width:200px; transition:500ms" alt="">
            </div>
        </div>
    </div>
    <div class="container ps-5 pe-5 main-container">
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
    </div>
    <div class="modal fade" id="serviceModal" data-bs-backdrop="modal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="serviceModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-white text-dark">
                <div class="modal-header">
                    <h1 class="modal-title text-dark fs-5" id="serviceModalTitle">Hizmet Sözleşmesi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Hizmet Sözleşmesi Kullanım Şartları
                        Demo A.Ş. Ödeme Sistemine Hoş Geldiniz.
                        Bu web sitesinde sunulan hizmetlerin kullanım şartlarını, sitemize üye olarak veya
                        hizmetlerimizden yararlanma aşamasında, bu sözleşmeyi kabul ettiğinizi beyan eden kutucuğu
                        işaretleyerek kabul etmiş oluyorsunuz. Demo A.Ş. web sitesinde bulunan hizmetlerde kullanım
                        özellik ve şartlarında önceden bir bildirimde bulunmaksızın, herhangi bir zamanda değişiklik
                        yapma, yürürlükten kaldırma ve güncelleme haklarını saklı tutar.
                        ÜYELİK İŞLEMLERİ
                        Demo A.Ş. web sitesinde sağlanan hizmetler için siteye üye olmanız ve kayıt sırasında kayıt
                        formunda istenen bilgileri tam ve doğru olarak sağlamanız gerekmektedir.
                        Bilgilerinizdeki değişiklik olduğu zaman, üyelik profilinize girerek ilgili bölümleri
                        güncellemek sizin sorumluluğunuzdadır. Güncellenmemiş bilgilerden dolayı size ulaşamadığımız
                        zaman sorumluluk size aittir.
                        Eğer bu hizmetlerden işvereniniz hesabına kullanıyorsanız, bu kullanım şartlarını onun adına
                        kabul etmeye yetkili olduğunuz anlamına gelmektedir.
                        Kayıt esnasında tarafınızca belirlenen şifreniz yalnızca sizin kullanımınız içindir. Sizin
                        hesabınız ile yapılan bütün işlemlerin sorumluluğu tamamıyla size aittir. Bu sözleşmeyi
                        onaylanarak bunu kabul ve teyit etmiş oluyorsunuz.
                        Bu sözleşmeyi onaylayarak şifrenizin veya hesabınızın haksız kullanımı durumunda Demo A.Ş.
                        personelini hemen bilgilendirmeyi de peşinen kabul ediyorsunuz.
                        Demo A.Ş., hesabınızın veya şifrenizin başkası tarafından kullanımı nedeniyle, bilginiz olsun
                        veya olmasın, oluşacak zararınızla ilgili herhangi bir yükümlülük kabul etmez. Ancak,
                        hesabınızın veya şifrenizin başka bir kişi tarafından kullanımından Demo A.Ş. veya başka bir
                        kişi
                        veya kuruluş zarar görürse, bu zarardan siz sorumlu tutulabilirsiniz. Hesap sahibinin izni
                        olmaksızın başka bir hesabı kullanmanız yasaktır.
                        GARANTİ VE FERAGAT
                        Demo A.Ş. ve sizin aranızda yapılan ayrı bir sözleşme ile açıkça belirlenmediği sürece, bu web
                        sitesinden edinilen bütün hizmetler size olduğu haliyle sağlanmış olup, herhangi bir amaca
                        uygunluk açısından veya başka bir açıdan herhangi bir garantiye tabi değildir.
                        Demo A.Ş. hiçbir şekilde tarafınız veya başka bir üçüncü kişi tarafından bu web sitesine
                        erişimden, bu web sitesinin veya bu web sitesinden linkle yönlendirilmiş başka bir web
                        sitesine erişimden veya bu web sitesinde yer alan hizmetlerin kullanımı vasıtasıyla
                        uğranılmış dolaysız veya dolaylı bir zarardan, gelir veya veri kaybından veya başka bir
                        zarardan sorumlu değildir.
                        BU WEB SİTESİNDE SAĞLANAN ÜÇÜNCÜ KİŞİLERE AİT İÇERİK
                        Bu web sitesi üçüncü kişiler tarafından sağlanmış içerik veya yazılımlar bulunmaktadır. Bu
                        web sitesinde yer alan bütün üçüncü kişilere ait içerik ve yazılımlar için de yukarıda yer
                        alan “GARANTİ VE FERAGAT” bölümü hükümleri geçerlidir.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Okudum, Anladım.</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="kvkkModal" data-bs-backdrop="modal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="kvkkModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="kvkkModalTitle">KVKK Bilgilendirmesi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Ödemeix olarak müşterilerimize ürün ve hizmet sunarken kişisel verilerinizin gizliliğini
                        sağlamaya ve verilerinizi 6698 sayılı kanuna ve mevzuata uygun bir şekilde işlemeye özen
                        gösteriyoruz.

                        Sizlere bu kapsamda sunduğumuz aydınlatma metnimizde aşağıdaki konular hakkında bilgi vermek
                        istiyoruz:

                        1. Kişisel verilerinizi bizimle hangi yollarla paylaşabiliyorsunuz?
                        2. Hangi kişisel verilerinizi işliyoruz?
                        3. Kişisel verilerinizi hangi amaçlarla işliyoruz?
                        4. Kişisel verilerinizi hangi amaçla ve kimlerle paylaşabiliriz?
                        5.Kişisel verilere ilişkin yasal haklarınız neler ve bu haklarınızı nasıl kullanabilirsiniz?


                        Kişisel verilerinizi bizimle hangi yollarla paylaşabiliyorsunuz?
                        Demo ABC Mağazası olarak siz müşterilerimizle ;
                        -web sitemiz üzerinden
                        -ofislerimizden
                        -telefon görüşmeleri yoluyla
                        -e-postalarla

                        temaslar kurabiliyoruz ve bu mecralar üzerinden gerçekleştirdiğimiz görüşmelerde bize sunduğunuz
                        kişisel verilerinizi elde etmiş oluyoruz.





                        Aşağıdaki yer alan tüm bilgiler; her müşterimiz açısından geçerli olmayabilir.

                        Hangi kişisel verilerinizi işliyoruz?
                        Kimlik ve iletişim bilgileriniz; Ad, Soyad, TCKN, Telefon No, Adres, e-posta, gibi bilgileriniz
                        Tahsilat bilgileriniz; hesap numaranız, kart numaranızın banka işlem kontrolü sebebi ile ilk ve
                        son 4 haneleri, borç bilgileriniz
                        Güncel ve geçmiş işlem bilgileriniz; mevcut ve geçmişteki ürün hizmet ve bakiye ekstreleriniz

                        Bağlantı bilgileriniz; web sitemiz üzerinden yapacağınız işlemlerde sizlere satış/hizmet sonrası
                        da doğru ve kolay işlemler yapabilmeniz için sistem iyileştirmelerinde kullanılmak üzere, ip
                        numarası, tarayıcı(browser) bilgileri vs şeklinde çerez bilgileriniz

                        Kişisel verilerinizi hangi amaçla işliyoruz?
                        Talep etmiş olduğunuz ürün/hizmet i sizlere en iyi şekilde sunmak; Demo ABC Mağazası olarak
                        sizlere sunduğumuz ürün ve hizmetleri kesintisiz sağlamak, hizmet kalitemizi artırmak amacıyla
                        işleyebiliriz.
                        Finansal kayıt ve işlemleri oluşturmak; Demo ABC Mağazası olarak finansal süreçlerin yürütülmesi
                        ve yönetilmesini sağlarken kişisel verilerinizi işleyebiliriz, bir basit ticari fatura
                        düzenleneceğinde bile Vergi Usül Kanunu’na göre kişisel verilere ihtiyaç duyulmaktadır.
                        Talep ve şikayetleri en verimli şekilde değerlendirmek; sizlere sunduğumuz ürün ve hizmetler
                        neticesinden yine sizlerden gelen talep ve şikayetlerin yerinde ve doğru değerlendirmesi için
                        bir takım kişisel verilerinizi işleyip, konu olan durumları değerlendirmek ve sizlere geri dönüş
                        sağlayabilmek amacıyla işleyebiliriz.
                        Şirket faaliyetlerimizi yürütebilmek; Her şirkette iş geliştirmek, yönetmek ve daha iyi hizmet
                        verebilmek adına bir takım çalışmalar yapılır. Bu kapsamda örneğin Bilgi Teknolojileri
                        departmanımız altyapımızda iyileştirme çalışmaları yapıyor, CRM çalışmalarında,
                        personellerimizin performansını ölçerek ödüller verme ya da eksiklerini giderme konusunda iç
                        denetim çalışmalarımız olmaktadır. Bunlar gibi süreçlerde kişisel verilerinize de ihtiyaç
                        olabiliyor. Bu amaçla işleyebiliriz.

                        Kişisel verilerinizi hangi amaçlarla ve kimlerle paylaşabiliriz?
                        İş Ortaklarımız ve tedarikçilerimiz; ürün ve hizmetlerimiz kapsamında size sunulan hizmetlerin
                        düzgün işleyebilmesi için operasyonların başındaki bizler, altyapı sağlayıcı yazılım ve bilişim
                        firmaları, firmaların kullandığı bulut hizmeti sağlayan datacenterlar, hukuki süreçler için
                        anlaşmalı olduğumuz avukatlar, tahsilatlar için ödeme kuruluşları, bankalar, sair ilgili kişi
                        veya kurumlara 6698 sayılı kanun ve mevzuatın izin verdiği ölçüde kişisel verilerinizi
                        paylaşabiliriz.
                        Genel olarak; Mali Suçlar Araştırma Kurulu, Hazine ve Maliye Bakanlığı, Bankacılık Düzenleme ve
                        Denetleme Kurulu, Kişisel Verileri Koruma Kurumu, işbirliği yaptığımız bankalar, iş ortakları,
                        şirketimizin pay sahipleri, hizmet alınan firmalar ve tedarikçiler, yetkili kurum ve kuruluşlar,
                        aracılık ettiğimiz üçüncü kişiler, kolluk kuvvetleri gibi üçüncü taraflarla kişisel verilerinizi
                        paylaşabiliriz.

                        Kişisel verilere ilişkin yasal haklarınız neler ve bu haklarınızı nasıl kullanabilirsiniz?
                        6698 Sayılı Kişisel Verileri Koruma Kanunu’nun 11. Maddesi uyarınca kişisel veri sahibi olarak
                        yasal bir çok hakkınız bulunmaktadır. Aşağıda bu haklarınızı listeledik.

                        -Kişisel verilerinizin bizim tarafımızdan işlenip işlenmediği hakkında bilgi sahibi olma
                        hakkınız var.
                        -Eğe kişisel verileriniz tarafımızdan işlenmiş ise; bu bilgilere ilişkin bütün süreçleri
                        öğrenebilmek adına bizden bilgi talep edebilirsiniz.
                        -Bu bilgileri hangi amaçla işlediğimizi, kimlerle paylaştığımızı ve amaçlara uygun olarak
                        kullanılıp kullanılmadığını öğrenebilirsiniz.
                        -Kişisel verilerinizi yurtiçinde veya yurtdışında paylaşımımız varsa paylaştığımız üçüncü
                        kişileri öğrenebilirsiniz.
                        -Kişisel verilerinizi yanlış ya da eksik işlemiş isek bunların düzeltilmesini ve aktarım söz
                        konusu ise aktardığımız üçüncü kişilere de bu düzeltmelerin iletilmesini isteyebilirsiniz.
                        Kanunen bu sayılan haklarınızı size bildirir daha fazlası için 6698 Sayılı Kişisel Verileri
                        Koruma Kanunu’na göz atmanızı rica ederiz.
                        Adres : Fetih Mahallesi Adana Çevre Yolu Cad. No : 96/A Karatay/KONYA
                        Telefon : 03323557470
                        E-mail : bilgi@buyukaygin.com.tr

                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        onclick="kvkkConfirmation()">Okudum,
                        Anladım.</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="offersModal" data-bs-backdrop="modal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="offersModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="offersModalTitle">Kampanayalar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Axess</h3>

                    <ul>
                        <li>Kampanya +3 Taksit imkanı vade farksız 2-9 taksitli işlemlerde ge&ccedil;erlidir.</li>
                        <li>Kampanya Bireysel (Axess, Wings, Free) ve ticari kartlar faydalanabilir.</li>
                    </ul>

                    <h3>World</h3>

                    <ul>
                        <li>Kampanyada +3 taksit imkanı vade farksız 2-9 taksitli işlemlerde ge&ccedil;erlidir..</li>
                        <li>Kampanyadan bireysel ve ticari kartlar faydalanabilir.</li>
                    </ul>

                    <h3>Maximum</h3>

                    <ul>
                        <li>Kampanyada +2 Taksit imkanı vade farksız 3-6 taksitli işlemlerde ge&ccedil;erlidir.</li>
                        <li>Kampanyadan bireysel ve ticari kartlar faydalanabilir.(Aidatsız kartlar hari&ccedil;
                            olacaktır.)</li>
                    </ul>

                    <h3>Bonus</h3>

                    <ul>
                        <li>500 TL ve &uuml;zeri işlemler kampanyadan yararlanabilir.</li>
                        <li>Kampanyaya toptan satış yapan MCC grubundaki &uuml;ye işyerleri dahildir.</li>
                        <li>+2 Taksit peşin veya işyeri tarafından tercih edilen herhangi bir taksit se&ccedil;eneği
                            uygulanır. (Denizbank bireysel kartları, şekerbank, ICBC, Fiba ve alternatif Bank,
                            bireysel/ticari t&uuml;m kartlar kampanyaya dahil değildir.)</li>
                    </ul>

                    <h3>BankKart</h3>

                    <ul>
                        <li>5000 tl ve &uuml;zeri işlemler kampanyadan yararlanabilir</li>
                        <li>Ziraat bankası combo kredi kartlarında +2 ve +5 taksit se&ccedil;enekleri sekt&ouml;rel
                            bazlıdır.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                        onclick="kvkkConfirmation()">Kapat</button>
                </div>
            </div>
        </div>
    </div>
    <div id="main" class="container mt-5 mb-1 ps-5 pe-5 ">
        <div id="spinner" class="spinner-border position-absolute end-50 top-50" role="status" style="display:none">
            <span class="visually-hidden">Yükleniyor...</span>
        </div>
        <div id="banks-container"
            class="container  rounded-3 rounded-bottom bg-white border-top border-secondary border-start border-end"
            style="border-bottom: none !important;">
            <div class="slider-brand pt-0">

                <div class="container position-relative ps-3 pb-0 mb-0">
                    <div class="position-absolute top-50 start-0 translate-middle-y">
                        <div class="left-arrow"><i class="fa-solid fa-solid fa-chevron-left text-primary fs-5"></i>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 mx-auto">
                        <div class="slider-brand-content py-0 px-2">
                            <div id="Axess" class="item py-3 d-flex justify-content-center bank"
                                onclick="showInstallments('Axess')">
                                <img src="assets/images/banks/axess.png" loading="lazy" alt="brand-logo"
                                    class="logo_footer" />
                            </div>
                            <div id="World" class="item py-3 d-flex justify-content-center bank"
                                onclick="showInstallments('World')">
                                <img src="assets/images/banks/world.png" loading="lazy" alt="brand-logo"
                                    class="logo_footer" />
                            </div>


                            <div id="CardFinans" class="item py-3 d-flex justify-content-center bank"
                                onclick="showInstallments('CardFinans')">
                                <img src="assets/images/banks/cardfinans.png" loading="lazy" alt="brand-logo"
                                    class="logo_footer" />
                            </div>
                            <div id="Bonus" class="item py-3 d-flex justify-content-center bank"
                                onclick="showInstallments('Bonus')">
                                <img src="assets/images/banks/bonus.png" loading="lazy" alt="brand-logo"
                                    class="logo_footer" />
                            </div>

                            <div id="saglamkart" class="item py-3 d-flex justify-content-center bank"
                                onclick="showInstallments('Sağlam Kart')">
                                <img src="assets/images/banks/saglamkart.png" loading="lazy" alt="brand-logo"
                                    class="logo_footer" />
                            </div>
                            <div id="Paraf" class="item py-3 d-flex justify-content-center bank"
                                onclick="showInstallments('Paraf')">
                                <img src="assets/images/banks/paraf.png" loading="lazy" alt="brand-logo"
                                    class="logo_footer" />
                            </div>

                            <div id="Paraf" class="item py-3 d-flex justify-content-center bank"
                                onclick="showInstallments('Paraf')">
                                <img src="assets/images/banks/isbank.png" loading="lazy" alt="brand-logo"
                                    class="logo_footer" />
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute top-50 end-0 translate-middle-y">
                        <div class="right-arrow">
                            <i class="fa-solid fa-chevron-right text-primary fs-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container px-0 mt-0 pt-0 ">
            <div id="installments-container" class="container border-start border-end border-secondary"
                style="background-color: rgb(255, 255, 255);">
                <div class="position-relative px-3">
                    <div class="position-absolute top-50 start-0 translate-middle-y">
                        <div class="left-arrow-installment installment-arrow" style="display:none; color:white;"><i
                                class="fa-solid fa-chevron-left"></i>
                        </div>
                    </div>
                    <div class="installment-col mt-0 mb-0 col-md-12 col-sm-12 mx-auto py-2">
                        <div id="installments" class="mt-0 mb-0 py-0 px-2 text-white">
                            <div class="item default-installment-item text-white text-center">
                                <span>
                                    Taksitleri Görüntüleyebilmek için Lütfen Banka Seçiniz. Bankaların tamamını
                                    görüntüleyebilmek için oklara basınız.
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute top-50 end-0 translate-middle-y">
                        <div class="right-arrow-installment installment-arrow" style="display:none; color:white;">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="form-container" class="jumbotron main-container bg-white border-primary">
            <div class="container">
                <div id="alert" class="rounded-2 alert alert-danger mt-2" role="alert" style="display:none">
                </div>
            </div>
            <div class="container py-2">
                <form id="paymentForm" action="https://demo.tahsilate.com/3d-payment" method="post" novalidate
                    class="paymentForm">
                    <input type="hidden" name="_token" value="swJv15HuMG1xvQWwIJdnVT6BEdpRxfEcrrQhxl2y"> <input
                        type="hidden" name="installment" value="0">
                    <input type="hidden" name="card_program" value="">
                    <div class="row mt-3 lg-md-px-4">
                        <div class="col">
                            <label for="description">Açıklama</label>
                            <input id="description" type="text" name="description"
                                class="form-control border-soft bg-white bg-white" required value="">
                            <small class="info text-secondary">Ödeme açıklaması.</small>
                        </div>
                        <div class="col lg-md-px-4">
                            <label for="email">E-Posta</label>
                            <input id="email" type="text" name="email" class="form-control border-soft bg-white"
                                required value="">
                            <small class="info text-secondary">E-Posta adresiniz.</small>
                        </div>
                    </div>
                    <div class="row mt-2 lg-md-px-4">
                        <div class="col">
                            <label for="company_name_surname">Firma Ünvan / İsim Soyisim</label>
                            <input id="company_name_surname" type="text" name="company_name_surname"
                                class="form-control border-soft bg-white" required value="" minlength="2">
                            <small class="info text-secondary">Firma ünvan yada isim, soyisim</small>
                        </div>
                        <div class="col mt-auto">
                            <label for="phone_number">Telefon&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input id="phone_number" type="text" name="phone_number"
                                class="form-control border-soft bg-white" required value="">
                            <small class="info text-secondary">Telefon numaranız.</small>
                        </div>
                    </div>
                    <div class="bg-primary mt-5 mb-4 w-90" style="height: 1px">&nbsp;</div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row lg-md-px-4">
                                <div class="col-md-9">
                                    <label for="amount">Tutar</label>
                                    <input id="amount" type="text" name="amount"
                                        class="form-control border-soft bg-white" required value="">
                                    <small class="info amount-info text-secondary">Tutarı doğru girdiğinizden emin
                                        olunuz.</small>
                                </div>
                                <div class="col-md-3">
                                    <label for="currency">&nbsp;</label>
                                    <select name="currency" id="currency" class="form-select border-soft bg-white">
                                        <option value="">TL</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row lg-md-px-4 mt-3">
                                <div class="col">
                                    <label for="cc_number">Kart Numarası</label>
                                    <input id="cc_number" type="text" name="cc_number"
                                        class="form-control border-soft bg-white" required value="">
                                    <small class="info text-secondary">Kart numarası.</small>
                                </div>
                                <div class="col">
                                    <label for="cc_holder_name">İsim, Soyisim</label>
                                    <input id="cc_holder_name" type="text" name="cc_holder_name"
                                        class="form-control border-soft bg-white" required value="">
                                    <small class="info text-secondary">Kart sahibi isim, soyisim.</small>
                                </div>
                            </div>
                            <div class="row  lg-md-px-4 mb-5 mt-3">
                                <div class="col">
                                    <label for="cc_expiry">Ay Yıl</label>
                                    <input id="cc_expiry" type="text" name="cc_expiry"
                                        class="form-control border-soft bg-white" required value="">
                                    <small class="info text-secondary">Ay / Yıl şeklinde.</small>
                                </div>
                                <div class="col">
                                    <label for="cc_cvc">CVV</label>
                                    <input id="cc_cvc" type="text" name="cc_cvc"
                                        class="form-control border-soft bg-white" required value="">
                                    <small class="info text-secondary">Kartın arkasındaki güvenlik
                                        kodu.</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                            <div id="card-container">
                                <div class="card-wrapper"></div>
                            </div>
                        </div>
                        <div class="row mb-5 pe-1">
                            <div class="col-md-12 text-end">
                                <div class="row">
                                    <div class="col">
                                        <span>
                                            <input id="kvkk-check" type="checkbox" name="kvkk-check"
                                                class="form-input-check border-primary kvkk-check" required
                                                value="confirmed">
                                            &nbsp;<a class="text-primary fw-bold" data-bs-toggle="modal"
                                                data-bs-target="#kvkkModal" onclick="showKvkk()" style="cursor: pointer"
                                                class="text-decoration-none">Mesafeli Satış
                                                Sözleşmesi ve Gizlilik & Güvenlik Politikası</a>'nı okudum, kabul
                                            ediyorum.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <button id="pay-button" type="submit" class="btn btn-primary w-100" disabled>Güvenli
                                Ödeme
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="my-auto">&nbsp;</div>
    <div id="footer-container" class="container ps-5 pe-5">
        <div class="container border-top border-primary footer-container bg-white" style="border-bottom:0px">
            <footer class="d-flex align-items-center py-3 ps-2 pe-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-footer-logo d-flex align-items-center justify-content-start">
                            <a href="https://odemeix.com.tr">
                                <img src="https://odemeix.com.tr/images/logo/logo-6849.png" alt="">
                            </a>
                        </div>
                        <div id="footer-banks-col" class="col-md-8 col-sm-12 d-flex justify-content-end">
                            <ul class="nav list-unstyled bg-transparent banks-list ps-3">
                                <li class="ms-3 nav-item">
                                    <img src="https://demo.tahsilate.com/assets/images/banks/visa-logo.png" alt="">
                                </li>
                                <li class="ms-3 nav-item">
                                    <img src="https://demo.tahsilate.com/assets/images/banks/mastercard-logo.png"
                                        alt="">
                                </li>
                                <li class="ms-3 nav-item">
                                    <img src="https://demo.tahsilate.com/assets/images/banks/troy-logo.png" alt="">
                                </li>
                                <li class="ms-3 nav-item">
                                    <img src="https://demo.tahsilate.com/assets/images/banks/discover-logo.png" alt="">
                                </li>
                                <li class="ms-3 nav-item">
                                    <img src="https://demo.tahsilate.com/assets/images/banks/BkmExpress-logo.png"
                                        alt="">
                                </li>
                                &nbsp;&nbsp;
                                <span class="vert">&vert;</span>
                                <li class="ms-2 nav-item">
                                    <img src="https://demo.tahsilate.com/assets/images/banks/ssl-256-logo.png" alt=""
                                        width="70" class="">
                                </li>
                                <li class="ms-3 nav-item">
                                    <img src="https://demo.tahsilate.com/assets/images/banks/safe-payment-logo.png"
                                        alt="">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div id="cb-cookie-banner" class="alert alert-dark text-center mb-0" role="alert">
        &#x1F36A; Bu yazılım kullanıcı deneyimini iyileştirmek ve sistemsel fonksiyonların doğru çalışması için
        çerezleri kullanmaktadır.
        <a href="https://demo.tahsilate.com/cerezler-hakkinda" target="blank">Daha fazla bilgi</a>
        <button type="button" class="btn btn-primary btn-sm ms-3" onclick="window.cb_hideCookieBanner()">
            Tamam, anlıyorum.
        </button>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fa-solid fa-circle-chevron-up"></i>
    </button>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.card.min.js') }}"></script>
    <script>
        $('#paymentForm').card({
            container: '.card-wrapper',
            formSelectors: {
                numberInput: 'input[name="cc_number"]',
                expiryInput: 'input[name="cc_expiry"]',
                cvcInput: 'input[name="cc_cvc"]',
                nameInput: 'input[name="cc_holder_name"]'
            },
        });
    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.3/b-2.3.5/b-html5-2.3.5/b-print-2.3.5/r-2.4.0/datatables.min.js"></script>
    <script src="https://demo.tahsilate.com/assets/js/custom/payment_form_validation.js"></script>
    <script src="https://demo.tahsilate.com/assets/js/custom/theme_engine.js"></script>
    <script src="https://demo.tahsilate.com/assets/js/bootstrap.min.js"></script>
    <script src="https://demo.tahsilate.com/assets/js/custom/banks.js"></script>
    <script src="https://demo.tahsilate.com/assets/js/cookie-banner.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://demo.tahsilate.com/assets/js/preloader.js"></script>
    <script src="https://demo.tahsilate.com/assets/js/custom/banks.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="module" src="https://demo.tahsilate.com/assets/js/app.js"></script>


    <script>
        function kvkkConfirmation() {
            if ($('#kvkk-check').is(":checked")) { } else {
                $('#kvkk-check').prop('checked', true);

            }
            $('#pay-button').attr('disabled', false);
        }

        $(function () {
            if ($('#kvkk-check').is(":checked")) {
                $('#kvkk-check').prop('checked', false);
            }
            setCookie('selectedDebt', 'false', -1);
            $("#installments-container").css('background-color', 'gray');
            $('#kvkk-check').on('change', function () {
                if ($(this).is(":checked")) {
                    $('#pay-button').attr('disabled', false);
                } else {
                    $('#pay-button').attr('disabled', true);
                }
            });

        });

        $('td:last-child').css('min-width', '500px !important');

        document.querySelector('input[id="amount"]').addEventListener('keyup', () => {
            filterInstallments();
        });

        function generateInstallmentsTable({
            cardProgram,
            installments,
            offers,
            offerLimitMin,
            offerLimitMax,
            sourceUrl,
            commissions,
            isCommissionsActive,
            installmentLimit,
            installmentAmountLimits,
            offerMinimumAmountLimit,
        }) {

            if (offers && offerLimitMin && offerLimitMax) {
                offers = JSON.parse(offers);
                offerLimitMin = parseInt(JSON.parse(offerLimitMin));
                offerLimitMax = parseInt(JSON.parse(offerLimitMax));
            }

            const defaultInstallmentItem = document.querySelector('.default-installment-item');
            const installmentsEl = document.querySelector('#installments');

            if (defaultInstallmentItem) {
                defaultInstallmentItem.remove();
            }

            installments = JSON.parse(installments);

            let minInstallment = installments[0];
            let maxInstallment = installments.at(-1);

            commissions = JSON.parse(commissions);
            installmentAmountLimits = JSON.parse(installmentAmountLimits);

            if (installmentsEl.classList.contains("slick-initialized")) {

                unslick("installments");

                installmentsEl.classList.remove("slick-initialized");

            }

            installmentsEl.innerText = '';

            let offerResult = "";
            let offerDarkMode = "";


            if (cardProgram == "Axess") {
                offerDarkMode = "_dark";
            }

            let commissionColor = offerDarkMode == "_dark" ? "#000" : "#fff";

            installments.forEach(installment => {

                let commissionItem = isCommissionsActive == true ? `<div style="border-top:1px solid${commissionColor}">%${commissions[installment]}</div>` : "";

                if (offers) {
                    offers.forEach((offer) => {
                        offerResult = getOffer(offer);
                    });
                }

                let offerItem = '';

                /* if ((installment <= offerLimitMax) && (installment >= offerLimitMin) && (offers)) {
                                                                                                                                                                                                        offerItem = `
            <div class="position-absolute" style="top:5px;right:5px">
                <img src="${sourceUrl}${offerResult}${offerDarkMode}.png" style="width:20px">
            </div>
            `;
                                                                                                                                                                                                    } */

                const installmentEl = document.createElement('div');

                installmentEl.id = `installment${installment}`;

                installmentEl.classList.add('item');
                installmentEl.classList.add('installment-item');

                let installmentText = installment > 1 ? `${installment} Taksit` : 'Tek Çekim';


                const amountEl = document.querySelector('input[id="amount"]');

                let maxRequiredCondition = installment <= offerLimitMax;
                let minRequiredCondition = installment >= offerLimitMin;
                let isOffersExists = false;

                if (typeof (offers) === 'array' || typeof (offers) === 'object') {
                    if (offers.length > 0) {
                        if (offers[0] !== "" && offers[0] !== null) {
                            isOffersExists = true;
                        }
                    }
                }

                let offerMinimumAmountLimitCondition = parseInt(amountEl.value) >= offerMinimumAmountLimit;
                let offerConditions = (maxRequiredCondition && minRequiredCondition) && (isOffersExists && offerMinimumAmountLimitCondition)

                if (offerConditions) {
                    offerItem = `
                            <div class="position-absolute offer-item" style="top:5px;right:5px">
                                <img src="${sourceUrl}${offerResult}${offerDarkMode}.png" style="width:20px">
                            </div>
                            `;
                }

                installmentEl.innerHTML =
                    `<div class="installment-selector border border-white ms-2 py-0 pe-0 text-center fs-7 rounded-1 position-relative"
                              style="max-width:90%"
                              data-installment="${installment}"
                              onclick="selectInstallment(${installment}, '${cardProgram}' )"
                         >
                            ${installmentText}
                            ${offerItem}
                            ${commissionItem}
                        </div>
                    `;

                var installmentCounter = 0;

                if (installmentLimit && parseInt(installmentLimit) > 0) {

                    if (!(installment > installmentLimit)) {

                        if (window.localStorage.hasOwnProperty('installmentLimit')) {

                            if (!(installment > parseInt(window.localStorage.getItem('installmentLimit')))) {

                                if ((parseInt(amountEl.value) >= installmentAmountLimits[installment]) || parseInt(installmentAmountLimits[installment]) == 0) {
                                    installmentsEl.append(installmentEl);
                                    installmentCounter++;
                                }

                            }

                        } else {

                            if ((parseInt(amountEl.value) >= installmentAmountLimits[installment]) || parseInt(installmentAmountLimits[installment]) == 0) {
                                installmentsEl.append(installmentEl);
                                installmentCounter++;
                            }

                        }

                    }

                } else {

                    if ((parseInt(amountEl.value) >= installmentAmountLimits[installment]) || parseInt(installmentAmountLimits[installment]) == 0) {
                        installmentsEl.append(installmentEl);
                        installmentCounter++;
                    }

                }

                /* if (installmentCounter == 0 && !window.localStorage.hasOwnProperty('installmentAlertShowed')) {

                    window.localStorage.setItem('installmentAlertShowed', true)

                    alert('Girdiğiniz tutara göre bir taksit bulunamadı.')

                } */


            });


            $("#installments-container").slideDown("slow");

            configureStyle(cardProgram);

            if (installments.length > 8) {
                createSlick("installments", installments.length - 3);
            } else {
                createSlick("installments", installments.length);
            }

            $("#installments").addClass("slick-initialized");
            $(".installment-arrow").show(250);

            $(".installment-item").hide();
            $(".installment-item").fadeIn(250);
        }

        function unslick(id) {
            $("#" + id).slick("unslick");
        }

        function configureStyle(cardProgram) {
            switch (cardProgram) {
                case "Axess":
                    configure({
                        backgroundColor: 'rgb(255,194,14)',
                        theme: 'dark'
                    });

                    break;
                case "World":
                    configure({
                        backgroundColor: 'rgb(120,43,144)',
                        theme: 'light'
                    });

                    break;
                case "Maximum":
                    configure({
                        backgroundColor: 'rgb(236,0,140)',
                        theme: 'light'
                    });

                    break;
                case "Combo":
                    configure({
                        backgroundColor: 'rgb(228,23,37)',
                        theme: 'light'
                    });

                    break;
                case "CardFinans":
                    configure({
                        backgroundColor: 'rgb(18,89,151)',
                        theme: 'light'
                    });

                    break;
                case "Bonus":
                    configure({
                        backgroundColor: 'rgb(141,198,63)',
                        theme: 'light'
                    });

                    break;
                case "Wings":
                    configure({
                        backgroundColor: 'rgb(34,30,31)',
                        theme: 'light'
                    });

                    break;
                case "Sağlam Kart":
                    configure({
                        backgroundColor: 'rgb(0,111,81)',
                        theme: 'light'
                    });

                    break;
                case "Paraf":
                    configure({
                        backgroundColor: 'rgb(13,171,214)',
                        theme: 'light'
                    });

                    break;
                default:
                    configure({
                        backgroundColor: 'rgb(255,255,255)',
                        theme: 'light'
                    });

                    break;
            }
        }

        function configure({
            backgroundColor,
            theme
        }) {
            const installmentContainer = document.querySelector('#installments-container')
            const installmentSelectors = document.querySelectorAll('.installment-selector');
            const installmentSliderArrows = document.querySelectorAll('.installment-arrow');

            installmentContainer.style.backgroundColor = backgroundColor;

            installmentSelectors.forEach(selectorItem => {

                if (theme && theme == 'dark') {
                    if (selectorItem.classList.contains('border-white')) {
                        selectorItem.classList.remove('border-white');
                    }

                    if (!selectorItem.classList.contains('border-dark')) {
                        selectorItem.classList.add('border-dark');
                    }
                }

                selectorItem.style.color = theme == 'dark' ? 'rgb(18, 20, 23)' : 'rgb(255,255,255)';

                selectorItem.addEventListener('mouseover', () => {
                    selectorItem.style.backgroundColor = theme == 'dark' ? 'rgba(0,0,0, 0.3)' : 'rgba(255,255,255, 0.4)';
                });

                selectorItem.addEventListener('mouseout', () => {
                    selectorItem.style.backgroundColor = 'rgba(0,0,0,0.3)';
                    installmentSelectors.forEach(element => {
                        if (!element.classList.contains('selected-installment')) {
                            element.style.backgroundColor = backgroundColor;
                        }
                    });
                });
            });

            installmentSliderArrows.forEach(arrowElement => {
                arrowElement.style.color = theme == 'dark' ? 'black' : 'white';
            });
        }

        var installmentsArea = $("#installments");

        function showInstallments(cardProgram) {
            window.localStorage.setItem('lastSelectedCardProgram', cardProgram);
            $(".bank")
                .not($("#" + cardProgram))
                .css("background-color", "white");
            if (cardProgram == "Sağlam Kart") {
                $("#" + "saglamkart").css("background-color", "rgba(0, 0, 0, 0.2)");
            } else {
                $("#" + cardProgram).css("background-color", "rgba(0, 0, 0, 0.2)");
            }

            axios.post('/get-installments', {
                card_program: cardProgram
            }).then((res) => {
                generateInstallmentsTable({
                    cardProgram: res.data?.cardProgram,
                    installments: res.data?.installments,
                    offers: res.data?.offers,
                    offerLimitMin: res.data?.offerLimitMin,
                    offerLimitMax: res.data?.offerLimitMax,
                    sourceUrl: res.data?.sourceUrl,
                    commissions: res.data?.comissions,
                    isCommissionsActive: res.data?.isComissionsActive,
                    installmentLimit: res.data?.installmentLimit || null,
                    installmentAmountLimits: res.data?.installmentAmountLimits || null,
                    offerMinimumAmountLimit: res.data?.offerMinimumAmountLimit,
                });
            });
        }

        function getBankColor(bank) {
            var color = "";
            switch (bank) {
                case "Axess":
                    color = "rgb(255,194,14)";
                    break;
                case "World":
                    color = "rgb(120,43,144)";
                    break;
                case "Maximum":
                    color = "rgb(236,0,140)";
                    break;
                case "Combo":
                    color = "rgb(228,23,37)";
                    break;
                case "CardFinans":
                    color = "rgb(18,89,151)";
                    break;
                case "Bonus":
                    color = "rgb(141,198,63)";
                    break;
                case "Wings":
                    color = "rgb(34,30,31)";
                    break;
                case "Sağlam Kart":
                    color = "rgb(0,111,81)";
                    break;
                case "Paraf":
                    color = "rgb(13,171,214)";
                    break;
                default:
                    color = "rgb(255,255,255)";
                    break;
            }

            return color;
        }

        function createSlick(id, value) {
            $("#" + id).slick({
                infinite: false,
                slidesToShow: value,
                slidesToScroll: 1,
                //autoplay: true,
                arrows: false,
                touchThreshold: 100,
                responsive: [{
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 6,
                        slidesToScroll: 1,
                    },
                },
                {
                    breakpoint: 899,
                    settings: {
                        slidesToShow: 6,
                        slidesToScroll: 1,
                    },
                },
                ],
            });
            setCookie("slickCreated", "true", 1);
        }

        function getOffer(offer) {
            let result = "";
            switch (offer) {
                case "+1":
                    result = "1_plus";
                    break;
                case "+2":
                    result = "2_plus";
                    break;
                case "+3":
                    result = "3_plus";
                    break;
                case "+4":
                    result = "4_plus";
                    break;
                case "+5":
                    result = "5_plus";
                    break;
                case "+6":
                    result = "6_plus";
                    break;
                case "+7":
                    result = "7_plus";
                    break;
                case "+8":
                    result = "8_plus";
                    break;
                case "+9":
                    result = "9_plus";
                    break;
            }

            return result;
        }

        function selectInstallment(id, card_program) {
            $("#installment" + id)
                .find(".installment-selector")
                .css("background-color", "rgba(0, 0, 0, 0.5)");
            $(".installment-selector").removeClass("selected-installment");
            $("#installment" + id)
                .children(".installment-selector")
                .addClass("selected-installment " + card_program);
            var element = $("#installment" + id).find(".installment-selector");
            var bankColor = getBankColor(card_program);
            $(".installment-selector").not(element).css("background-color", bankColor);
            $("input[name='installment']").val(id);
            $("input[name='card_program']").val(card_program);
        }

        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
            var expires = "expires=" + d.toGMTString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(";");
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == " ") {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function filterInstallments() {

            if (window.localStorage.hasOwnProperty('lastSelectedCardProgram')) {
                showInstallments(window.localStorage.getItem('lastSelectedCardProgram'))
            } else {
                showInstallments('Axess')
            }

        }

        window.onload = () => {
            if (window.localStorage.hasOwnProperty('installmentLimit')) {
                window.localStorage.removeItem('installmentLimit')
            }
        }
    </script>
</body>

</html>
