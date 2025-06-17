<script src="https://cdn.tiny.cloud/1/fjgvon27bnjf1zyhqmsy7ldfpil6pi6o9m9l8l6c71ysw6cx/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea', // Target all <textarea> elements
    plugins: 'code table lists ',
    toolbar: 'blocks | bold italic | alignleft aligncenter alignright | numlist | fontfamily | indent outdent ',
    menubar: false,
    branding: false,
    resize: false,
    height: 300,
    content_style: "body { line-height: 1.2}",
    setup: function (editor) {
      editor.on('change', function () {
        editor.save(); // Synchronize TinyMCE content with the underlying <textarea>
      });
    }
  });
</script>