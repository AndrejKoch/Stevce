<!-- ========== HEADER ========== -->

<style>
    .navbar-brand img {

        max-height: 45px!important;
        object-fit: contain!important;
    }
</style>

<header id="header" class="navbar navbar-expand-lg navbar-center navbar-light bg-white">
    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <a class="navbar-brand" href="#">
                <img class="navbar-brand-logo" src="{{isset($settings->logo) ? asset('assets/img/logo/thumbnails').'/'.$settings->logo : 'Unknown'}}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-default">
          <i class="bi-list"></i>
        </span>
                <span class="navbar-toggler-toggled">
          <i class="bi-x"></i>
        </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav nav-pills">
                    <li class="hs-has-mega-menu nav-item"
                        data-hs-mega-menu-item-options='{
                "desktop": {
                  "maxWidth": "40rem"
                }
              }'>
                        <a id="landingsMegaMenu" class="hs-mega-menu-invoker nav-link" href="#about" role="button" aria-expanded="false">За авторот</a>

                    </li>

                    <li class="hs-has-mega-menu nav-item"
                        data-hs-mega-menu-item-options='{
                "desktop": {
                  "maxWidth": "20rem"
                }
              }'>
                        <a id="docsMegaMenu" class="hs-mega-menu-invoker nav-link " href="#paintings" role="button" aria-expanded="false">Слики</a>
                    </li>


                    <li class="hs-has-mega-menu nav-item">
                        <a id="pagesMegaMenu" class="hs-mega-menu-invoker nav-link " href="#sglass" role="button" aria-expanded="false">Витражи</a>

                    </li>

                    <li class="hs-has-mega-menu nav-item"
                        data-hs-mega-menu-item-options='{
                "desktop": {
                  "maxWidth": "50rem"
                }
              }'>
                        <a id="blogMegaMenu" class="hs-mega-menu-invoker nav-link " href="#mosaics" role="button" aria-expanded="false">Мозаици</a>

                    </li>


                </ul>
            </div>
        </nav>
    </div>
</header>
