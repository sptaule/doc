<link href="https://cdn.quilljs.com/1.3.3/quill.snow.css" rel="stylesheet">
<link href="/admin/assets/css/quill.imageUploader.min.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.3/quill.min.js"></script>
<script src="/admin/assets/js/quill.imageUploader.min.js"></script>
<script src="/admin/assets/js/fgEmojiPicker.js"></script>
<script src="https://cdn.rawgit.com/kensnyder/quill-image-resize-module/3411c9a7/image-resize.min.js"></script>

<style>
    .ql-container{font-size:16px}.ql-font-brizel{font-family:Brizel,serif}.ql-snow .ql-picker.ql-font{width:150px}.ql-snow .ql-picker.ql-font .ql-picker-item[data-value='']::before,.ql-snow .ql-picker.ql-font .ql-picker-label[data-value='']::before{content:'Default'}.ql-snow .ql-picker.ql-font .ql-picker-item[data-value=open-sans]::before,.ql-snow .ql-picker.ql-font .ql-picker-label[data-value=open-sans]::before{content:'Open Sans';font-family:'Open Sans',sans-serif}.ql-snow .ql-picker.ql-font .ql-picker-item[data-value=brizel]::before,.ql-snow .ql-picker.ql-font .ql-picker-label[data-value=brizel]::before{content:'Brizel';font-size:20px;font-family:Brizel,serif}.ql-snow .ql-picker.ql-font .ql-picker-item[data-value=times-new-roman]::before,.ql-snow .ql-picker.ql-font .ql-picker-label[data-value=times-new-roman]::before{content:'Times New Roman';font-family:'Times New Roman',serif}.ql-snow .ql-picker.ql-size .ql-picker-item[data-value="14px"]::before{content:'14px';font-size:14px!important}.ql-snow .ql-picker.ql-size .ql-picker-item[data-value="16px"]::before{content:'16px';font-size:16px!important}.ql-snow .ql-picker.ql-size .ql-picker-item[data-value="18px"]::before{content:'18px';font-size:18px!important}.ql-snow .ql-picker.ql-size .ql-picker-item[data-value="24px"]::before{content:'24px';font-size:24px!important}.ql-snow .ql-picker.ql-size .ql-picker-item[data-value="36px"]::before{content:'36px';font-size:36px!important}
</style>

<div class="mb-4 mt-4 <?= $size ?? '' ?>">
    <label class="block text-xs mb-1" for="<?= $name ?>"><?= $label ?></label>
    <div class="flex flex-row items-center space-x-3 mb-1">
        <button type="button" id="emojiPickerBtn" class="bg-aup-orange rounded p-1">
            <svg class="w-6 h-6" fill="none" stroke="whitesmoke" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </button>
        <textarea class="border border-aup-orange text-2xl bg-gray-100" id="emojiTextarea" cols="10" rows="1" style="resize:none"></textarea>
    </div>
    <div class="quillArea <?= $class ?? 'h-48' ?> bg-white dark:bg-gray-700 dark:text-white text-black px-2 py-1 shadow focus:outline-none w-full" placeholder="<?= $placeholder ?? '' ?>" name="<?= $name ?>" id="<?= $name ?>" <?php if (isset($required)): ?>required<?php endif; ?> style="min-height: 250px" ><?= get_input($name) ?? $model->{$name} ?? '' ?></div>
    <input type="hidden" name="<?= $name ?>" id="quill-html">
    <?= partial('form_error', ['name' => $name]) ?>
</div>

<?php if (!isset($simple)): ?>
    <script>
        let Font = Quill.import('formats/font');
        Font.whitelist = ['brizel'];
        Quill.register(Font, true);

        let Size = Quill.import('attributors/style/size');
        Size.whitelist = ['14px', '16px', '18px', '24px', '36px'];
        Quill.register(Size, true);

        Quill.register("modules/imageUploader", ImageUploader);

        const toolbarOptions = [
            { 'font': ['open-sans', 'brizel', 'times-new-roman'] },
            { 'size': ['14px', '16px', '18px', '24px', '36px'] },
            {'header': [1, 2, 3, 4, 5, 6, false] },
            {'align': []},
            'bold', 'italic', 'underline',
            {'color': []},
            {'background': []},
            { 'list': 'bullet' },
            'link',
            'image',
        ];
        const options = {
            placeholder: "<?= $placeholder ?? 'Description épique du produit...'; ?>",
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions,
                imageUploader: {
                    upload: file => {
                        return new Promise((resolve, reject) => {
                            const formData = new FormData();
                            formData.append("image", file);

                            fetch(
                                "https://api.imgbb.com/1/upload?key=c90415b38fa9d03a874966aecce9afd0",
                                {
                                    method: "POST",
                                    body: formData
                                }
                            )
                                .then(response => response.json())
                                .then(result => {
                                    console.log(result);
                                    resolve(result.data.url);
                                })
                                .catch(error => {
                                    reject("Upload failed");
                                    console.error("Error:", error);
                                });
                        });
                    }
                },
                imageResize: {
                    displaySize: true,
                },
            }
        };
        const quill = new Quill('.quillArea', options);

        const area = document.getElementsByTagName('textarea');

        const emojiPicker = new FgEmojiPicker({
            trigger: ['#emojiPickerBtn'],
            removeOnSelection: false,
            closeButton: true,
            position: ['bottom', 'right'],
            preFetch: true,
            insertInto: document.getElementsByTagName('textarea'),
            emit(obj, triggerElement) {
                let chosenEmoji = obj.emoji;
                $(area).append(chosenEmoji);
            }
        });

        $("form").on("submit", function () {
            let html = quill.root.innerHTML;
            $('#quill-html').val(html);
            $("form").submit();
        });
    </script>

<?php endif; ?>