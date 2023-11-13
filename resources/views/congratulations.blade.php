<!DOCTYPE html>
<html dir="ltr">

<head>
    <title>Nova Advanced UI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:regular,600,700%7CTitillium+Web:300,regular,600" media="all">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- local webpage styles -->
    <style type="text/css">
        .bg-hero {
            background-image: url('{{  Vite::asset('resources/assets/images/background.svg') }}');
        }
    </style>
</head>

<body class="bg-black antialiased">

    <x-eduka::responsive-brackets />

    <div id="app">

        <!-- Green rounded spheres background -->
        <div class="absolute -z-1 w-full bg-hero h-screen inset-0 bg-cover"></div>

        <!-- ## nav desktop/mobile common styles (TODO: Make it sticky and transparent) -->
        <nav>
            <div class="px-6 pt-6">
                <!-- nav visible in desktop devices -->
                <nav class="hidden md:flex justify-between items-center">
                    <a href="#" class="flex gap-4">
                        <img class="h-8 w-auto" src="{{  Vite::asset('resources/assets/images/logo.png') }}" />
                        <p class="text-2xl font-bold text-white">Mastering Nova</p>
                    </a>
                    <div>
                        <ul class="flex gap-10 font-bold">
                            <li><a href="#" class="link-primary">About</a></li>
                            <li><a href="{{ route('purchase.view') }}" class="link-primary">Get the course</a></li>
                            <li class="text-white link-primary">The Course</li>
                            <li class="text-white link-primary">Pricing</li>
                            <li class="text-white link-primary">Contact me</li>
                        </ul>
                    </div>
                </nav>
                <!-- nav visible in desktop devices -->
                <nav class="flex md:hidden justify-between items-center">
                    <a href="#" class="flex gap-4">
                        <img class="h-8 w-auto" src="{{  Vite::asset('resources/assets/images/logo.png') }}" />
                        <p class="text-2xl font-bold text-white">Mastering Nova</p>
                    </a>
                    <!-- Hamburger menu group (thumbnail + content) -->
                    <div>
                        <!-- hamburger thumbnail -->
                        <a class="space-y-2" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasExample" href="#offcanvasExample">
                            <div class="w-8 h-0.5 bg-aquacyan"></div>
                            <div class="w-8 h-0.5 bg-aquacyan"></div>
                            <div class="w-8 h-0.5 bg-aquacyan"></div>
                        </a>
                        <div class="offcanvas offcanvas-start fixed bottom-0 flex flex-col max-w-full bg-white invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-bombay-700 top-0 left-0 border-none w-96" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header flex items-center justify-between p-4">
                                <h5 class="offcanvas-title mb-0 leading-normal font-semibold" id="offcanvasExampleLabel">Offcanvas</h5>
                                <button type="button" class="btn-close box-content w-4 h-4 p-2 -my-5 -mr-2 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow p-4 overflow-y-auto">
                                <div>
                                    Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
                                </div>
                                <div class="dropdown relative mt-4">
                                    <button class="dropdown-toggle inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg active:text-white transition duration-150 ease-in-out flex items-center whitespace-nowrap dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        Dropdown button
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-2 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                            <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-bombay-700 hover:bg-bombay-100" href="#">Action</a></li>
                                        <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-bombay-700 hover:bg-bombay-100" href="#">Another action</a></li>
                                        <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-bombay-700 hover:bg-bombay-100" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </nav>

        <!-- ## Hero section -->
        <section class="flex flex-col space-y-8 section-default text-white flex mx-auto">
            <p class="w-4/6 text-2xl mx-auto">
                Thank you for purchasing
            </p>
            <p class="w-4/6 text-5xl font-bold mx-auto mt-6">
                {{ $course->name }}
            </p>
            <p class="w-4/6 text-3xl mx-auto mt-4">
                You'll soon receive an confirmation email and login instructions. Thank you
            </p>
        </section>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

        });

        function switchToPanel(targetVersion) {

            var sourceVersion = targetVersion == 'orion' ? 'silversurfer' : 'orion';

            var targetLink = document.getElementById(targetVersion + '_link');
            var sourceLink = document.getElementById(sourceVersion + '_link');

            console.log(targetLink);

            return;


            var panelsContainer = link.parentElement.parentElement.children[2];

            console.log(panelsContainer.innerHTML);

            return;

            document.getElementById(toHide).classList.add('hidden');
            //slide1.classList.remove('selected');
            document.getElementById(toShow).classList.remove('hidden');
        }
    </script>

</body>

</html>
