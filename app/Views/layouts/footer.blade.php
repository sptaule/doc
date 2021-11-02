<div class="relative">

    <div class="container mx-auto px-4 relative">

        <div class="sm:flex sm:flex-wrap sm:-mx-4">
            <div class="w-full flex flex-col items-center justify-center space-y-3">
                <div class="flex flex-col justify-center items-center">
                    <span class="text-gray-600 italic">{{ \App\Models\Club::getValue('club_name') }}</span>
                </div>
                <div class="mt-4">
                    <a href="/">
                        <img src="{{ CLUB_LOGO }}" alt="" class="w-auto h-20">
                    </a>
                </div>
                <ul class="flex flex-row p-2 mt-4">
                    <li class="h-12 w-12"><a class="h-12 w-12 transform hover:scale-125 origin-center text-center transition inline-block" href="/"><i class="fab fa-facebook text-4xl" style="color:#0D8CF0"></i></a></li>
                    <li class="h-12 w-12"><a class="h-12 w-12 transform hover:scale-125 origin-center text-center transition inline-block" href="/"><i class="fab fa-instagram text-4xl" style="color:#B9328F"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="sm:flex sm:flex-wrap flex-col sm:-mx-4">
            @include('includes.nav', ['navElements' => \App\Models\Navigation::getNav()])
        </div>

    </div>

</div>

{{ partial('mixed_flash_message') }}