<style>
    /*
 * Globals
 */

    /* Links */
    a,
    a:focus,
    a:hover {
        color: #fff;
    }

    /* Custom default button */
    .btn-secondary,
    .btn-secondary:hover,
    .btn-secondary:focus {
        color: #333;
        text-shadow: none;
        /* Prevent inheritance from `body` */
        background-color: #fff;
        border: .05rem solid #fff;
    }


    /*
 * Base structure
 */

    html,
    body {
        height: 100%;
        background-color: #333;

    }

    body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-pack: center;
        -webkit-box-pack: center;
        justify-content: center;
        color: #fff;
        text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
        box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);

    }

    .cover-container {
        max-width: 42em;
    }


    /*
 * Header
 */
    .masthead {
        margin-bottom: 2rem;
    }

    .masthead-brand {
        margin-bottom: 0;
    }

    .nav-masthead .nav-link {
        padding: .25rem 0;
        font-weight: 700;
        color: rgba(255, 255, 255, .5);
        background-color: transparent;
        border-bottom: .25rem solid transparent;
    }

    .nav-masthead .nav-link:hover,
    .nav-masthead .nav-link:focus {
        border-bottom-color: rgba(255, 255, 255, .25);
    }

    .nav-masthead .nav-link+.nav-link {
        margin-left: 1rem;
    }

    .nav-masthead .active {
        color: #fff;
        border-bottom-color: #fff;
    }

    @media (min-width: 48em) {
        .masthead-brand {
            float: left;
        }

        .nav-masthead {
            float: right;
        }
    }


    /*
 * Cover
 */
    /* .cover {
        padding: 0 1.5rem;
    } */

    .cover .btn-lg {
        padding: .75rem 1.25rem;
        font-weight: 700;
    }


    /*
 * Footer
 */
    .mastfoot {
        color: rgba(255, 255, 255, .5);
    }

    #bg-cover-image {
        background-image: url(<?= base_url('assets/uploads/banner/pexels-photo-370659.jpeg') ?>);
        background-size: cover;
        width: 100%;
        opacity: 0.5;
    }

    .hitam-trans {
        width: 100%;
        height: 100%;
        background-color: #000;
        color: #000;
        position: absolute;
        opacity: 0.5;
    }

    .main {
        position: relative;
        z-index: 999;
    }
</style>

<div class="text-center" id="bg-cover-image">
    <!-- <div class="hitam-trans"></div> -->
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand text-white">EVENT PTIK</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="<?= base_url() ?>">BERANDA</a>
                    <a class="nav-link" href="<?= base_url('home/event/ongoing') ?>">AKAN DATANG</a>
                    <a class="nav-link" href="<?= base_url('home/event/eventselesai') ?>">EVENT SELESAI</a>
                </nav>
            </div>
        </header>