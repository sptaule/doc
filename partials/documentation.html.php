<!--DEMO01-->
<div id="animatedModal">
    <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID  class="close-animatedModal" -->
    <div class="close-animatedModal">
        <div class="flex items-center justify-center space-x-1.5 mt-6 text-red-600 group cursor-pointer px-4 py-2 rounded-xl shadow">
            <i class="fas fa-times"></i>
            <span class="group-hover:underline">Fermer l'aide</span>
        </div>
    </div>

    <div class="modal-content p-8">
        <iframe src="http://localhost:3000/docs/intro" class="w-full shadow-xl" style="height: 85vh"></iframe>
    </div>
</div>

<script>
    $("#demo01").animatedModal({
        color: '#FFFFFF'
    });
</script>