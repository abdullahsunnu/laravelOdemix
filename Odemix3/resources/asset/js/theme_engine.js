function themeSwitcher(id, type, lightColor) {
    if (type == "color") {
        if (
            document.getElementById(id).checked ||
            getCookie("themeMode") == "darkMode"
        ) {
            document.body.style.backgroundColor = "#111";
            $("#navbar").removeClass("navbar-light");
            $("#navbar").removeClass("bg-white");
            $("#navbar").addClass("navbar-dark");
            $("#navbar").addClass("bg-black");
            $("#navbar").addClass("text-white");
            $(".nav-item-text").removeClass("text-dark");
            $(".nav-item-text").addClass("text-white");
            $("#form-container").removeClass("bg-white");
            $("#form-container").addClass("bg-black");
            $("#form-container").addClass("text-white");
            $("#banks-container").removeClass("bg-white");
            $("#banks-container").addClass("bg-black");
            $(".footer-container").removeClass("bg-white");
            $(".footer-container").addClass("bg-black");
            $(".form-control, .form-select").removeClass("bg-white");
            $(".form-control, .form-select").addClass("bg-dark");
            $(".modal-content").removeClass("bg-white");
            $(".modal-content").addClass("bg-black");
            $(".modal-content, .modal-title").removeClass("text-dark");
            $(".modal-content, .modal-title").addClass("text-light");
            $(".switcher-text").removeClass("text-dark");
            $(".switcher-text").addClass("text-light");
        } else {
            document.body.style.backgroundColor = lightColor;
            $("#navbar").removeClass("navbar-dark");
            $("#navbar").removeClass("bg-black");
            $("#navbar").addClass("navbar-light");
            $("#navbar").addClass("bg-white");
            $(".nav-item-text").removeClass("text-white");
            $(".nav-item-text").addClass("text-dark");
            $("#form-container").removeClass("bg-black");
            $("#form-container").addClass("bg-white");
            $("#form-container").removeClass("text-white");
            $("#banks-container").removeClass("bg-black");
            $("#banks-container").addClass("bg-white");
            $(".footer-container").removeClass("bg-black");
            $(".footer-container").addClass("bg-white");
            $(".form-control, .form-select").removeClass("bg-dark");
            $(".form-control, .form-select").addClass("bg-white");
            $(".modal-content").removeClass("bg-black");
            $(".modal-content").addClass("bg-white");
            $(".modal-content, .modal-title").removeClass("text-light");
            $(".modal-content, .modal-title").addClass("text-dark");
            $(".switcher-text").removeClass("text-light");
            $(".switcher-text").addClass("text-dark");
        }

        /* for mobile */
        /*         if (document.getElementById('theme-switcher-mobile').checked) {
            document.body.style.backgroundColor = '#111'
            $("#navbar").removeClass('navbar-light')
            $("#navbar").removeClass('bg-white')
            $("#navbar").addClass('navbar-dark')
            $("#navbar").addClass('bg-black')
            $("#navbar").addClass('text-white')
            $(".nav-item-text").removeClass('text-dark')
            $(".nav-item-text").addClass('text-white')
            $("#form-container").removeClass('bg-white');
            $("#form-container").addClass('bg-black');
            $("#form-container").addClass('text-white');
            $("#banks-container").removeClass('bg-white');
            $("#banks-container").addClass('bg-black');
            $(".footer-container").removeClass('bg-white');
            $(".footer-container").addClass('bg-black');
            $(".form-control, .form-select").removeClass('bg-white');
            $(".form-control, .form-select").addClass('bg-dark');
            $(".modal-content").removeClass('bg-white');
            $(".modal-content").addClass('bg-black');
            $(".modal-content, .modal-title").removeClass('text-dark');
            $(".modal-content, .modal-title").addClass('text-light');
        } else {
            document.body.style.backgroundColor = lightColor
            $("#navbar").removeClass('navbar-dark')
            $("#navbar").removeClass('bg-black')
            $("#navbar").addClass('navbar-light')
            $("#navbar").addClass('bg-white')
            $(".nav-item-text").removeClass('text-white')
            $(".nav-item-text").addClass('text-dark')
            $("#form-container").removeClass('bg-black');
            $("#form-container").addClass('bg-white');
            $("#form-container").removeClass('text-white');
            $("#banks-container").removeClass('bg-black');
            $("#banks-container").addClass('bg-white');
            $(".footer-container").removeClass('bg-black');
            $(".footer-container").addClass('bg-white');
            $(".form-control, .form-select").removeClass('bg-dark');
            $(".form-control, .form-select").addClass('bg-white');
            $(".modal-content").removeClass('bg-black');
            $(".modal-content").addClass('bg-white');
            $(".modal-content, .modal-title").removeClass('text-light');
            $(".modal-content, .modal-title").addClass('text-dark');

        } */
    } else {
        if (
            document.getElementById(id).checked ||
            getCookie("themeMode") == "darkMode"
        ) {
            $("#navbar").removeClass("navbar-light");
            $("#navbar").removeClass("bg-white");
            $("#navbar").addClass("navbar-dark");
            $("#navbar").addClass("bg-black");
            $("#navbar").addClass("text-white");
            $(".nav-item-text").removeClass("text-dark");
            $(".nav-item-text").addClass("text-white");
            $("#form-container").removeClass("bg-white");
            $("#form-container").addClass("bg-black");
            $("#form-container").addClass("text-white");
            $("#banks-container").removeClass("bg-white");
            $("#banks-container").addClass("bg-black");
            $(".footer-container").removeClass("bg-white");
            $(".footer-container").addClass("bg-black");
            $(".form-control, .form-select").removeClass("bg-white");
            $(".form-control, .form-select").addClass("bg-dark");
            $(".modal-content").removeClass("bg-white");
            $(".modal-content").addClass("bg-black");
            $(".modal-content, .modal-title").removeClass("text-dark");
            $(".modal-content, .modal-title").addClass("text-light");
            $(".switcher-text").removeClass("text-dark");
            $(".switcher-text").addClass("text-light");
        } else {
            $("#navbar").removeClass("navbar-dark");
            $("#navbar").removeClass("bg-black");
            $("#navbar").addClass("navbar-light");
            $("#navbar").addClass("bg-white");
            $(".nav-item-text").removeClass("text-white");
            $(".nav-item-text").addClass("text-dark");
            $("#form-container").removeClass("bg-black");
            $("#form-container").addClass("bg-white");
            $("#form-container").removeClass("text-white");
            $("#banks-container").removeClass("bg-black");
            $("#banks-container").addClass("bg-white");
            $(".footer-container").removeClass("bg-black");
            $(".footer-container").addClass("bg-white");
            $(".form-control, .form-select").removeClass("bg-dark");
            $(".form-control, .form-select").addClass("bg-white");
            $(".modal-content").removeClass("bg-black");
            $(".modal-content").addClass("bg-white");
            $(".modal-content, .modal-title").removeClass("text-light");
            $(".modal-content, .modal-title").addClass("text-dark");
            $(".switcher-text").removeClass("text-light");
            $(".switcher-text").addClass("text-dark");
        }
    }
}
