<link href="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.11.0/mapbox-gl.js"></script>

<style>
    #map {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 100%;
    }

    #menu {
        position: absolute;
        background: #efefef;
        padding: 10px;
        right: 0;
        top: 0;
        z-index: 99999;
        font-family: 'Open Sans', sans-serif;
    }
</style>

<style>
    @import url(https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700&display=swap);

    a {
        text-decoration: none !important;
    }

    .navs,
    .navs-item {
        position: relative;
    }

    .navs-item:before,
    .navs1 .navs-item:before {
        width: 100%;
        height: 5px;
        background-color: #dfe2ea;
        opacity: 0;
    }

    .wrapper {
        width: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .navs {
        display: -webkit-inline-box;
        display: -ms-inline-flexbox;
        display: inline-flex;
        overflow: hidden;
        background-color: #fff;
        /* padding: 0 20px; */
        border-radius: 5px;
        width: 100%;
        -webkit-box-shadow: 0 8px 36px rgba(157, 160, 175, 0.8);
        box-shadow: 0 8px 36px rgba(157, 160, 175, 0.8);
    }

    .navs-item {
        color: #83818c;
        padding: 10px 0px;
        text-decoration: none;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
        margin: 0 6px;
        z-index: 1;
        font-family: "Open Sans", sans-serif;
        font-weight: 700;
    }

    .navs-item:before {
        content: "";
        position: absolute;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
    }

    .navs-item:not(.active):hover:before {
        opacity: 1;
        bottom: 0;
    }

    .navs-item.act:not(.active):before {
        opacity: 1;
        background-color: #6777ef;

    }

    .navs-item:not(.active):hover {
        color: #333;
    }

    .navs-indicator {
        position: absolute;
        bottom: 0;
        -webkit-transition: 0.4s;
        -o-transition: 0.4s;
        transition: 0.4s;
        height: 5px;
        z-index: 1;
    }

    .navs1 .navs-indicator {
        height: 5px;
        left: 0;
        border-radius: 8px 8px 0 0;
    }

    .navs1 .navs-item:before {
        bottom: -6px;
        left: 0;
        border-radius: 8px 8px 0 0;
        -webkit-transition: 0.3s;
        -o-transition: 0.3s;
        transition: 0.3s;
    }

    .navs2,
    .navs3 {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        padding: 20px;
    }

    .navs2 .navs-indicator {
        width: 5px;
        left: 0;
        border-radius: 0 8px 8px 0;
    }

    .navs2 .navs-item:before {
        bottom: 0;
        left: -27px;
        width: 6px;
        height: 100%;
        border-radius: 0 8px 8px 0;
    }

    .navs3 .navs-indicator {
        width: 5px;
        border-radius: 8px 0 0 8px;
        left: initial;
        right: 0;
    }

    .navs3 .navs-item:before {
        bottom: 0;
        left: initial;
        right: -27px;
        width: 6px;
        height: 100%;
        border-radius: 8px 0 0 8px;
    }

    @media (max-width: 992px) {
        .wrapper {
            padding: 30px 0;
        }
    }

    @media only screen and (max-width: 768px) {
        .navs {
            min-width: 100%;
        }

        .navs1 {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .navs-item {
            padding: 25px 15px;
        }
    }

    @media (max-width: 580px) {
        .navs1 {
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            overflow-x: auto;
        }
    }
</style>