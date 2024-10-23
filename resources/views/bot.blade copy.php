<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }

        /* Transición para mostrar/ocultar el sidebar */
        .sidebar {
            transition: transform 0.3s ease;
        }

        /* Estado cerrado del sidebar */
        .closed {
            transform: translateX(-100%);
        }
    </style>
</head>





<!-- component -->
<!-- full tailwind config using javascript -->
<!-- https://github.com/neurolinker/popice -->

<body class = "body bg-white dark:bg-[#0F172A]">
    <nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-4 bg-white">
        <div class="lg:hidden">
            <button class="flex items-center p-3 text-blue-600 navbar-burger">
                <svg class="block w-4 h-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
    </nav>

    <div class="relative z-50 hidden navbar-menu">
        <div class="fixed inset-0 bg-gray-800 opacity-25 navbar-backdrop"></div>
        <nav
            class="fixed top-0 bottom-0 left-0 flex flex-col w-5/6 max-w-sm px-6 py-6 overflow-y-auto bg-white border-r">
            <div class="flex items-center mb-8">
                <a class="mr-auto text-3xl font-bold leading-none" href="#">
                    <a href="javascript:void(0)"><img src="https://app.proderi.com/img/Logo%20Alena%20-%201.svg"
                            alt="logo" class='w-40 ml-7 max-lg:mr-5' />
                    </a>
                </a>
                <button class="navbar-close">
                    <svg class="w-6 h-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <div
                class="hover:ml-4 w-full text-white hover:text-purple-500 dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 transform ease-in-out duration-300 flex flex-row items-center space-x-3 mb-2">
                <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                <div>Consultas</div>
            </div>

            {{-- Transcripciones --}}
            <div
                class="hover:ml-4 w-full text-white hover:text-purple-500 dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
                <div>Transcripciones</div>
            </div>
            <div class="mt-auto">
                <div class="pt-6 text-center">
                    <div class="flex items-center justify-start mb-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Usuario"
                            class="w-10 h-10 mr-3 rounded-full">
                        <div>
                            <p class="font-medium text-gray-700">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                    <!-- Formulario de cierre de sesión -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="block w-full px-4 py-3 mb-2 text-xs font-semibold leading-loose text-center text-white bg-blue-600 hover:bg-blue-700 rounded-xl">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
                <p class="my-4 text-xs text-center text-gray-400">
                    <span>Copyright © 2024</span>
                </p>
            </div>


        </nav>
    </div>


    <script>
        // Burger menus
        document.addEventListener('DOMContentLoaded', function() {
            // open
            const burger = document.querySelectorAll('.navbar-burger');
            const menu = document.querySelectorAll('.navbar-menu');

            if (burger.length && menu.length) {
                for (var i = 0; i < burger.length; i++) {
                    burger[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            // close
            const close = document.querySelectorAll('.navbar-close');
            const backdrop = document.querySelectorAll('.navbar-backdrop');

            if (close.length) {
                for (var i = 0; i < close.length; i++) {
                    close[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            if (backdrop.length) {
                for (var i = 0; i < backdrop.length; i++) {
                    backdrop[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }
        });
    </script>


    <aside
        class="fixed z-50 hidden h-screen transition duration-1000 ease-in-out transform -translate-x-48 lg:flex w-60 bg-slate-100">

        <!-- open sidebar button -->
        <div
            class="max-toolbar translate-x-24 scale-x-0 w-full transition transform ease-in duration-300 flex items-center justify-between dark:border-[#0F172A] bg-slate-100 absolute top-2 h-12">
            <div class="flex items-center pl-4 space-x-2">
                <div>
                    <div onclick="setDark('light')"
                        class="sun hidden text-white hover:text-blue-500 dark:hover:text-[#38BDF8]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div onclick="openNav()"
            class="-right-0 transition transform ease-in-out duration-500 flex border-4 border-white dark:border-[#0F172A] bg-[#1E293B] dark:hover:bg-blue-500 hover:bg-purple-500 absolute top-2 p-3 rounded-full text-white hover:rotate-45">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={3}
                stroke="currentColor" class="w-4 h-4">
                <path strokeLinecap="round" strokeLinejoin="round"
                    d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
            </svg>
        </div>
        <!-- MAX SIDEBAR-->
        <div class="max hidden text-white mt-20 flex-col space-y-2 w-full h-[calc(100vh)]">
            {{-- Logo --}}
            <div class="mb-8 ml-9">
                <img src="https://app.proderi.com/img/Logo%20Alena%20-%201.svg" alt="Logo Ariel" class="w-40">
            </div>
            {{-- Consultas --}}
            <div
                class="hover:ml-4 w-full text-white hover:text-purple-500 dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                <div>Consultas</div>
            </div>
            {{-- Transcripciones --}}
            <div
                class="hover:ml-4 w-full text-white hover:text-purple-500 dark:hover:text-blue-500 bg-[#1E293B] p-2 pl-8 transform ease-in-out duration-300 flex flex-row items-center space-x-3">
                <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h7" />
                </svg>
                <div>Transcripciones</div>
            </div>
            <!-- Prueba gratis -->
            {{-- <div class="absolute left-0 w-full px-6 bottom-24">
    <div class="p-4 bg-white rounded-lg shadow">
        <p class="text-sm text-gray-500">El tiempo de acceso gratis terminará dentro de 3 días.</p>
        <button class="w-full px-4 py-2 mt-4 text-white bg-blue-500 rounded-md">Ver planes</button>

    </div>
    </div> --}}
            <!-- Perfil de usuario -->
            <div class="absolute w-full px-6 bottom-4">
                <div class="flex items-center">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Usuario"
                        class="w-10 h-10 mr-3 rounded-full">
                    <div>
                        <p class="font-medium text-gray-700">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full px-4 py-2 mt-4 text-white bg-blue-500 rounded-md">Cerrar Sesion</button>

                </form>
            </div>
        </div>
        <!-- MINI SIDEBAR-->
        <div class="mini mt-20 flex flex-col space-y-2 w-full h-[calc(100vh)]">
            <div
                class="hover:ml-4 justify-end pr-5 text-white hover:text-purple-500 dark:hover:text-blue-500 w-full bg-[#1E293B] p-3  transform ease-in-out duration-300 flex">
                <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
            </div>
            <div
                class="hover:ml-4 justify-end pr-5 text-white hover:text-purple-500 dark:hover:text-blue-500 w-full bg-[#1E293B] p-3  transform ease-in-out duration-300 flex">
                <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h7" />
                </svg>
            </div>
            <div
                class="absolute bottom-0 left-0 hover:ml-4 justify-end pr-5 text-white hover:text-purple-500 dark:hover:text-blue-500 w-full bg-[#1E293B] p-3  transform ease-in-out duration-300 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                    stroke="currentColor" class="w-6 h-6">
                    <path strokeLinecap="round" strokeLinejoin="round"
                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
            </div>
        </div>

    </aside>


    <!-- CONTENT -->





    <div
        class="flex flex-col items-center justify-start min-h-screen overflow-hidden bg-white shadow-2xl content logo">
        <!-- Contenedor principal que ocupa todo el espacio -->
        <div class="flex flex-col items-center flex-grow w-full h-full overflow-y-auto" id="mainContainer">
            <div class="w-full max-w-4xl mt-24 text-center" id="chatContent">
                <div id="legal" class="tabContent">
                    <img src="https://app.proderi.com/img/Logo%20Alena%20-%201.svg" alt="Imagen Ariel"
                        class="w-40 mx-auto mb-4">
                    <h1 class="text-2xl font-bold text-gray-800">Alena - Asistente Legal</h1>
                    <p class="mt-2 text-base text-gray-600">Te ayudaré en temas relacionados con GAFILAFT, estaré aquí
                        para ayudarte.</p>
                </div>
            </div>

            <div class="flex-grow w-full max-w-4xl pt-20 pb-36 no-scrollbar" id="conversationContainer"
                style="overflow-y: auto;">
                <div id="conversation" class="p-4 mt-4 no-scrollbar"
                    style="max-height: 60vh; overflow-y: auto; -webkit-overflow-scrolling: touch;">
                    <!-- Aquí se mostrarán los mensajes de la conversación -->
                </div>

                <style>
                    .no-scrollbar::-webkit-scrollbar {
                        display: none;
                    }

                    .no-scrollbar {
                        -ms-overflow-style: none;
                        scrollbar-width: none;
                    }

                    #conversation {
                        -webkit-overflow-scrolling: touch;
                    }
                </style>
            </div>

            <div class="fixed bottom-0 w-full max-w-full px-2 mx-auto mb-4 sm:max-w-lg md:max-w-xl lg:max-w-2xl xl:max-w-4xl"
                id="chatBox">
                <form id="chatForm">
                    <label for="chat" class="sr-only">Escribe tu mensaje aquí...</label>
                    <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                        <textarea id="chat" rows="1"
                            class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Escribe tu mensaje..."></textarea>

                        <!-- Botón para activar/desactivar el procesamiento de audio -->
                        <button type="button" id="audioButton"
                            class="ml-2 inline-flex justify-center p-2 text-gray-600 rounded-full cursor-pointer hover:bg-gray-200 dark:text-gray-400 dark:hover:bg-gray-600">
                            <svg id="audioIcon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M6.9 12q0 .225-.025.463t-.075.462q-.075.425.1.813t.575.537t.763-.025t.462-.575t.15-.825t.05-.85t-.05-.85t-.15-.825t-.462-.575t-.763-.025t-.575.538t-.1.812q.05.225.075.463T6.9 12m3.5 0q0 .6-.075 1.175T10.1 14.3q-.125.425.038.8t.537.525q.4.175.787-.012t.513-.613q.225-.725.325-1.475T12.4 12t-.1-1.525T11.975 9q-.125-.425-.512-.612t-.788-.013q-.375.15-.537.525t-.038.8q.15.55.225 1.125T10.4 12m3.5 0q0 .925-.125 1.813t-.4 1.737q-.125.425.013.825t.537.575t.787 0t.513-.6q.35-1.05.512-2.125T15.9 12t-.163-2.225t-.512-2.125q-.125-.425-.513-.6t-.787 0t-.538.575t-.012.825q.275.85.4 1.738T13.9 12M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8" />
                            </svg>
                        </button>
                        <button type="submit"
                            class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                            <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path
                                    d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                            </svg>
                            <span class="sr-only">Enviar mensaje</span>
                        </button>


                    </div>

                </form>




            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const chatForm = document.getElementById('chatForm');
                    const chatTextarea = document.getElementById('chat');
                    const conversation = document.getElementById('conversation');
                    const audioCheckbox = document.getElementById('audioCheckbox');
                    let isBotResponding = false;
                    let processAudio = true; // Estado inicial: se procesa audio
                    const audioButton = document.getElementById('audioButton');
                    const audioIcon = document.getElementById('audioIcon');

                    // Alternar el estado de procesar audio y el ícono
                    audioButton.addEventListener('click', function() {
                        processAudio = !processAudio;

                        if (processAudio) {
                            // Mostrar ícono de audio activado
                            audioIcon.innerHTML = `
                            <path fill="currentColor" d="M6.9 12q0 .225-.025.463t-.075.462q-.075.425.1.813t.575.537t.763-.025t.462-.575t.15-.825t.05-.85t-.05-.85t-.15-.825t-.462-.575t-.763-.025t-.575.538t-.1.812q.05.225.075.463T6.9 12m3.5 0q0 .6-.075 1.175T10.1 14.3q-.125.425.038.8t.537.525q.4.175.787-.012t.513-.613q.225-.725.325-1.475T12.4 12t-.1-1.525T11.975 9q-.125-.425-.512-.612t-.788-.013q-.375.15-.537.525t-.038.8q.15.55.225 1.125T10.4 12m3.5 0q0 .925-.125 1.813t-.4 1.737q-.125.425.013.825t.537.575t.787 0t.513-.6q.35-1.05.512-2.125T15.9 12t-.163-2.225t-.512-2.125q-.125-.425-.513-.6t-.787 0t-.538.575t-.012.825q.275.85.4 1.738T13.9 12M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22m0-2q3.35 0 5.675-2.325T20 12t-2.325-5.675T12 4T6.325 6.325T4 12t2.325 5.675T12 20m0-8"/>
                             `;
                        } else {
                            // Mostrar ícono de audio desactivado (con una "X")
                            audioIcon.innerHTML = `
                            <path fill="currentColor" d="M13.9 16.925q-.35-.15-.525-.513t-.05-.737q.175-.475.288-.962t.162-.988L15.5 15.45q-.05.225-.125.463t-.15.462q-.125.4-.513.563t-.812-.013m-3.225-1.3q-.375-.15-.537-.513t-.038-.787q.175-.575.238-1.15T10.4 12q0-.475-.025-.925t-.125-.875l2.15 2.15q-.025.7-.137 1.388t-.313 1.337q-.125.375-.5.538t-.775.012m-3.25-1.375q-.35-.15-.525-.5T6.8 13q.05-.25.075-.5T6.9 12t-.025-.5T6.8 11q-.075-.4.1-.763t.525-.487q.425-.175.8 0t.475.6q.1.4.15.813T8.9 12t-.05.838t-.15.812q-.1.425-.475.6t-.8 0m8.45-1.275l-2-2q-.05-.7-.2-1.362t-.35-1.288q-.125-.375.038-.737t.512-.513q.425-.2.825-.025t.525.575q.35 1.05.513 2.138T15.9 12v.488q0 .237-.025.487M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12q0-1.55.425-2.937T3.65 6.475L1.4 4.2q-.3-.3-.3-.712t.3-.713t.713-.3t.712.3L21.2 21.15q.3.3.3.713t-.3.712t-.712.3t-.713-.3l-2.25-2.225q-1.2.8-2.587 1.225T12 22m0-2q1.125 0 2.138-.3t1.912-.825L5.125 7.95q-.525.9-.825 1.912T4 12q0 3.325 2.338 5.663T12 20M7.85 2.9q.975-.45 2.025-.675T12 2q2 0 3.825.75t3.25 2.175t2.175 3.25T22 12q0 1.075-.225 2.125T21.1 16.15q-.175.375-.575.488t-.75-.088t-.475-.6t.05-.8q.325-.75.487-1.55T20 12q0-3.35-2.325-5.675T12 4q-.8 0-1.6.162t-1.55.488q-.4.175-.8.05t-.6-.475t-.088-.75t.488-.575"/>
                            `;
                        }
                    });

                    function scrollToBottom() {
                        conversation.scrollTop = conversation.scrollHeight;
                    }

                    function disableUserInput() {
                        chatTextarea.disabled = true;
                    }

                    function enableUserInput() {
                        chatTextarea.disabled = false;
                    }

                    function formatBotResponse(response) {
                        return response.replace(/\*\*(.*?)\*\*/g, "<strong>$1</strong>").replace(/\n/g, "<br>");
                    }

                    function typeResponse(element, response, speed) {
                        let i = 0;

                        function type() {
                            if (i < response.length) {
                                element.innerHTML += response.charAt(i);
                                i++;
                                setTimeout(type, speed);
                                scrollToBottom();
                            } else {
                                enableUserInput(); // Habilitamos el input del usuario cuando termina la respuesta
                            }
                        }
                        type();
                    }

                    function sendMessage() {
                        if (isBotResponding) return;

                        const userMessage = chatTextarea.value.trim();

                        // Utilizamos el estado global `processAudio` en lugar de `audioCheckbox`
                        const processAudioState = processAudio ? 'true' : 'false';

                        if (!userMessage) return;

                        chatTextarea.value = '';
                        chatTextarea.style.height = 'auto';

                        chatContent.style.display = 'none';
                        conversationContainer.style.display = 'block';

                        // Agregar el mensaje del usuario a la conversación
                        conversation.innerHTML += `
                        <div class="flex justify-end my-2">
                            <div class="w-auto max-w-xl p-3 text-white bg-blue-500 rounded-lg">
                                ${userMessage}
                            </div>
                        </div>`;

                        scrollToBottom();

                        const botResponseElement = document.createElement('div');
                        botResponseElement.classList.add('bot-message');
                        botResponseElement.innerHTML = `
                        <div class="flex justify-start my-2">
                            <div class="w-auto max-w-xl p-3 text-black bg-gray-300 rounded-lg bot-response">
                                <span>El bot está escribiendo...</span>
                            </div>
                        </div>`;
                        conversation.appendChild(botResponseElement);
                        scrollToBottom();
                        disableUserInput();
                        isBotResponding = true;

                        // Enviar el mensaje al backend
                        fetch('/chat', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    message: userMessage,
                                    processAudio: processAudioState // Estado del procesamiento de audio
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                // Limpiar el div del bot "escribiendo"
                                botResponseElement.remove();

                                if (data.response && data.response.length > 0) {
                                    const botMessages = Array.isArray(data.response) ? data.response : [data.response];

                                    botMessages.forEach((message) => {
                                        const formattedMessage = formatBotResponse(message);

                                        const newBotMessage = document.createElement('div');
                                        newBotMessage.classList.add('flex', 'justify-start', 'my-2');
                                        newBotMessage.innerHTML = `
                                        <div class="w-auto max-w-xl p-3 text-black bg-gray-300 rounded-lg bot-response">
                                            <span class="typing-effect"></span>
                                        </div>`;

                                        conversation.appendChild(newBotMessage);

                                        // Simular el efecto de tipeo
                                        const typingElement = newBotMessage.querySelector('.typing-effect');
                                        typeResponse(typingElement, formattedMessage,
                                            30); // velocidad de tipeo: 30ms por carácter

                                        // Si el backend proporciona una URL de audio, reproducir el audio
                                        if (data.audioUrl) {
                                            // Crear el elemento de audio
                                            const audioElement = document.createElement('audio');
                                            audioElement.controls = true;
                                            audioElement.src = data.audioUrl;

                                            // Crear un contenedor para el audio que ocupe toda la fila
                                            const audioContainer = document.createElement('div');
                                            audioContainer.classList.add('w-full',
                                            'my-2'); // Asegura que el audio se muestre en una nueva fila

                                            // Insertar el elemento de audio dentro del contenedor
                                            audioContainer.appendChild(audioElement);

                                            // Insertar el contenedor de audio justo después del mensaje del bot
                                            conversation.appendChild(audioContainer);

                                            // Reproducir el audio automáticamente
                                            audioElement.play();
                                        }

                                    });
                                } else {
                                    conversation.innerHTML += `
                <div class="flex justify-start my-2">
                    <div class="w-auto max-w-xl p-3 text-red-500 bg-gray-300 rounded-lg bot-response">
                        No encontré una respuesta relacionada a tu pregunta, por favor reformúlala.
                    </div>
                </div>`;
                                }

                                scrollToBottom();
                                isBotResponding = false;
                                enableUserInput();
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                botResponseElement.querySelector('.bot-response').innerHTML =
                                    'Ocurrió un error. Inténtalo de nuevo más tarde.';
                                isBotResponding = false;
                                enableUserInput();
                            });
                    }



                    chatTextarea.addEventListener('keypress', function(e) {
                        if (e.key === 'Enter' && !e.shiftKey) {
                            e.preventDefault();
                            sendMessage();
                        }
                    });

                    chatForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        sendMessage();
                    });
                });
            </script>
        </div>












        <script>
            const sidebar = document.querySelector("aside");
            const maxSidebar = document.querySelector(".max")
            const miniSidebar = document.querySelector(".mini")
            const roundout = document.querySelector(".roundout")
            const maxToolbar = document.querySelector(".max-toolbar")
            const logo = document.querySelector('.logo')
            const content = document.querySelector('.content')
            const moon = document.querySelector(".moon")
            const sun = document.querySelector(".sun")

            function setDark(val) {
                if (val === "dark") {
                    document.documentElement.classList.add('dark')
                    moon.classList.add("hidden")
                    sun.classList.remove("hidden")
                } else {
                    document.documentElement.classList.remove('dark')
                    sun.classList.add("hidden")
                    moon.classList.remove("hidden")
                }
            }

            function openNav() {
                if (sidebar.classList.contains('-translate-x-48')) {
                    // max sidebar
                    sidebar.classList.remove("-translate-x-48")
                    sidebar.classList.add("translate-x-none")
                    maxSidebar.classList.remove("hidden")
                    maxSidebar.classList.add("flex")
                    miniSidebar.classList.remove("flex")
                    miniSidebar.classList.add("hidden")
                    maxToolbar.classList.add("translate-x-0")
                    maxToolbar.classList.remove("translate-x-24", "scale-x-0")
                    logo.classList.remove("ml-12")
                    content.classList.remove("ml-12")
                    content.classList.add("ml-12", "md:ml-60")
                } else {
                    // mini sidebar
                    sidebar.classList.add("-translate-x-48")
                    sidebar.classList.remove("translate-x-none")
                    maxSidebar.classList.add("hidden")
                    maxSidebar.classList.remove("flex")
                    miniSidebar.classList.add("flex")
                    miniSidebar.classList.remove("hidden")
                    maxToolbar.classList.add("translate-x-24", "scale-x-0")
                    maxToolbar.classList.remove("translate-x-0")
                    logo.classList.add('ml-12')
                    content.classList.remove("ml-12", "md:ml-60")
                    content.classList.add("ml-12")

                }

            }
        </script>

</html>
