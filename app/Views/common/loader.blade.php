<div
    x-ref="loading"
    id="loading-div"
    class="fixed h-screen w-screen top-0 left-0 flex space-x-2 p-5 justify-center items-center bg-black bg-opacity-50"
    style="backdrop-filter: blur(5px); -webkit-backdrop-filter: blur(5px); z-index: 999999 !important;">
    <div class="px-8 py-4 bg-white shadow rounded-full flex space-x-2">
        <div class="bg-scuba-light p-2 w-4 h-4 rounded-full animate-bounce light-circle"></div>
        <div class="bg-scuba-green p-2 w-4 h-4 rounded-full animate-bounce green-circle"></div>
        <div class="bg-scuba-dark p-2 w-4 h-4 rounded-full animate-bounce dark-circle"></div>
    </div>
</div>

<style>
    .light-circle{
        animation-delay: 0.1s;
    }
    .green-circle{
        animation-delay: 0.2s;
    }
    .dark-circle{
        animation-delay: 0.3s;
    }
</style>

<script>
    let loader = document.getElementById('loading-div');
    window.addEventListener("DOMContentLoaded", () => {
        $(loader).fadeOut(50);
    });
</script>