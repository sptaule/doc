{{--<img src="/ressources/images/scuba/templates/wavesOpacity.svg" class="w-full h-48" alt="">--}}
<div class="relative">

    <svg preserveAspectRatio="xMinYMin" class="absolute top-0" id="wave" style="transform:rotate(0deg) translateY(-97px); transition: 0.3s" width="100%" height="100" viewBox="0 0 100% 100" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(255, 255, 255, 1)" offset="0%"></stop><stop stop-color="rgba(216.722, 214.602, 209.916, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,90L80,88.3C160,87,320,83,480,76.7C640,70,800,60,960,50C1120,40,1280,30,1440,36.7C1600,43,1760,67,1920,68.3C2080,70,2240,50,2400,43.3C2560,37,2720,43,2880,41.7C3040,40,3200,30,3360,35C3520,40,3680,60,3840,56.7C4000,53,4160,27,4320,21.7C4480,17,4640,33,4800,45C4960,57,5120,63,5280,55C5440,47,5600,23,5760,26.7C5920,30,6080,60,6240,65C6400,70,6560,50,6720,38.3C6880,27,7040,23,7200,30C7360,37,7520,53,7680,51.7C7840,50,8000,30,8160,33.3C8320,37,8480,63,8640,73.3C8800,83,8960,77,9120,68.3C9280,60,9440,50,9600,53.3C9760,57,9920,73,10080,71.7C10240,70,10400,50,10560,45C10720,40,10880,50,11040,53.3C11200,57,11360,53,11440,51.7L11520,50L11520,100L11440,100C11360,100,11200,100,11040,100C10880,100,10720,100,10560,100C10400,100,10240,100,10080,100C9920,100,9760,100,9600,100C9440,100,9280,100,9120,100C8960,100,8800,100,8640,100C8480,100,8320,100,8160,100C8000,100,7840,100,7680,100C7520,100,7360,100,7200,100C7040,100,6880,100,6720,100C6560,100,6400,100,6240,100C6080,100,5920,100,5760,100C5600,100,5440,100,5280,100C5120,100,4960,100,4800,100C4640,100,4480,100,4320,100C4160,100,4000,100,3840,100C3680,100,3520,100,3360,100C3200,100,3040,100,2880,100C2720,100,2560,100,2400,100C2240,100,2080,100,1920,100C1760,100,1600,100,1440,100C1280,100,1120,100,960,100C800,100,640,100,480,100C320,100,160,100,80,100L0,100Z"></path></svg>

    <div class="container mx-auto px-4 relative">

        <div class="sm:flex sm:flex-wrap sm:-mx-4">
            <div class="w-full flex flex-col items-center justify-center space-y-3">
                <div class="flex flex-col justify-center items-center">
                    <span class="text-gray-600 italic">{{ \App\Models\Club::getValue('club_name') }}</span>
                </div>
                <div class="mt-4">
                    <a href="/">
                        <img src="/ressources/images/club/logo/logo_small.jpg" alt="" class="w-20 h-20">
                    </a>
                </div>
                <ul class="flex flex-row p-2 mt-4">
                    <li class="h-12 w-12"><a class="h-12 w-12 transform hover:scale-125 origin-center text-center transition inline-block" href="/"><i class="fab fa-facebook text-4xl" style="color:#0D8CF0"></i></a></li>
                    <li class="h-12 w-12"><a class="h-12 w-12 transform hover:scale-125 origin-center text-center transition inline-block" href="/"><i class="fab fa-instagram text-4xl" style="color:#B9328F"></i></a></li>
                </ul>
                <div class="flex flex-col justify-center items-center">
                    <p class="flex flex-row items-center space-x-1.5 mb-3 text-gray-600 text-sm">
                        <span>Site apporté par</span>
                        <a href="https://www.lucaschaplain.design/" class="flex flex-row items-center space-x-1.5 hover:underline">
                            <span class="font-semibold">Scuba</span>
                            <img src="/ressources/images/scuba/logo.svg" width="20" alt="">
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="sm:flex sm:flex-wrap sm:-mx-4">
            <div class="w-full flex flex-col items-center justify-center space-y-3">
                <a href="#" class="text-gray-700 hover:bg-scuba-green hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                    Accueil
                </a>
                <a href="#" class="text-gray-700 hover:bg-scuba-green hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                    Team
                </a>
                <a href="#" class="text-gray-700 hover:bg-scuba-green hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                    Projects
                </a>
                <a href="#" class="text-gray-700 hover:bg-scuba-green hover:text-white rounded-md py-2 px-3 inline-flex items-center text-sm font-medium">
                    Calendar
                </a>
            </div>
        </div>

    </div>

</div>

{{ partial('mixed_flash_message') }}