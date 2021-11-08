<script src="https://cdn.jsdelivr.net/npm/showdown@latest/dist/showdown.min.js"></script>
<script>
    function run() {
        let text = document.getElementById('helper-source').value;
        let target = document.getElementById('helper-target');
        let converter = new showdown.Converter();
        target.innerHTML = converter.makeHtml(text);
    }
    run();
</script>