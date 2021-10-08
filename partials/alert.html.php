<div class="modal" x-data="{ 'showModal': true }" @keydown.escape="showModal = false" style="width: 1050px">

    <!-- Modal -->
    <div class="fixed inset-0 z-30 flex items-center justify-center overflow-auto bg-black bg-opacity-30" x-show="showModal">

        <!-- Modal inner -->
        <div class="z-10 bg-<?= $color ?? 'blue' ?>-100 border-t-4 border-<?= $color ?? 'blue' ?>-500 rounded-b text-<?= $color ?? 'blue' ?>-900 px-4 py-3 shadow-md absolute top-14 mt-0.5 left-1/2 transform -translate-x-1/2" role="alert" @click.away="showModal = false">
            <button type="button" class="group hover:bg-red-500 hover:text-white transition border-2 border-red-200 z-20 cursor-pointer absolute -right-4 -top-5 shadow rounded-full p-1 hover:scale-105 bg-white text-red-500" @click="showModal = false">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="flex items-center justify-center space-x-2">
                <div class="animate-bounce-slow bg-blue-50 rounded-full w-16 h-16 mx-8 flex items-center justify-center shadow-lg">
                    <i class="fas fa-info-circle text-3xl"></i>
                </div>
                <div>
                    <p class="font-bold font-arima tracking-widest"><?= $title ?? 'Astuce' ?></p>
                    <div class="h-0.5 my-2 bg-<?= $color ?? 'blue' ?>-200"></div>
                    <p class="text-sm leading-6 break-words max-w-md"><?= $content ?></p>
                    <div class="h-0.5 my-2 bg-<?= $color ?? 'blue' ?>-200"></div>
                    <p class="text-xs italic">
                        Cliquez sur la croix pour ne plus afficher cette fenêtre.</p>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    <?php if (isset($cookie) && !isset($_COOKIE[$cookie])): ?>
    $('button').on('click', function () {
        Cookies.set('<?= $cookie; ?>', true);
    });
    <?php elseif (isset($cookie) && isset($_COOKIE[$cookie]) && $_COOKIE[$cookie] == true): ?>
    $('.modal').remove();
    <?php endif; ?>
</script>
