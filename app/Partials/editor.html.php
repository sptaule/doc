<div class="w-full flex items-center justify-center bg-yellow-50 shadow-md rounded-xl border-l-2 border-r-2 border-yellow-400">
    <div id="editorjs"></div>
</div>

<script>
    const uploadURL = "<?= EDITOR_IMAGE_UPLOAD; ?>";
</script>
<script src="/assets/custom_scripts/editor.js"></script>

<style>
    .ce-block__content, .ce-toolbar__content { max-width:calc(100% - 80px) !important; } .cdx-block { max-width: 100% !important; }
    h1.ce-header { font-size: 2em !important; }
    h2.ce-header { font-size: 1.75em !important; }
    h3.ce-header { font-size: 1.5em !important; }
    h4.ce-header { font-size: 1.25em !important; }
    h5.ce-header { font-size: 1em !important; }
    h6.ce-header { font-size: 0.85em !important; }
</style>