<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'CCATtest.COM') }}</title>
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead

        <!-- DMCA Badge Styles -->
        <style>
            #dmca-badge {
                position: fixed;
                bottom: 10px;
                left: 10px;
                z-index: 1000;
                transition: opacity 0.3s ease;
            }
            #dmca-badge img {
                width: 100px;
                height: auto;
                transition: width 0.3s ease;
            }
            @media (max-width: 768px) {
                #dmca-badge {
                    opacity: 0.3;
                }
                #dmca-badge img {
                    width: 80px;
                }
            }
            @media (max-width: 480px) {
                #dmca-badge {
                    opacity: 0.1;
                }
                #dmca-badge img {
                    width: 60px;
                }
            }
            #dmca-badge:hover {
                opacity: 1;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        @inertia

        <!-- DMCA Badge -->
        <div id="dmca-badge">
            <a href="//www.dmca.com/Protection/Status.aspx?ID=d238b6ca-4c84-4c15-aff0-86f35d52ddbb" title="DMCA.com Protection Status" class="dmca-badge">
                <img src="https://images.dmca.com/Badges/dmca-badge-w100-5x1-10.png?ID=d238b6ca-4c84-4c15-aff0-86f35d52ddbb" alt="DMCA.com Protection Status" />
            </a>
            <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
        </div>
    </body>
</html>
