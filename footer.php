<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script>
    // PREVIEW MODAL NUEVOS POSTS
    const avatarInput = document.querySelector('#avatarInput');
    const imagePreview = document.querySelector('.image-preview');

    avatarInput.addEventListener('change', e => {
        let input = e.currentTarget;
        const fileReader = new FileReader();
        fileReader.addEventListener('load', e => {
            let imageData = e.target.result;
            imagePreview.setAttribute('src', imageData);
        })

        fileReader.readAsDataURL(input.files[0]);
    });
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="js/preloader.js"></script>
<script src="js/script.js"></script>
<script>
    $("input:file").change(function() {
        var fileName = $(this).val();
        if (fileName.length > 0) {
            $(this).parent().children(' span').html(fileName);
        } else {
            $(this).parent().children('span').html("Choose file");
        }
    });
</script>
<script src="post.js"></script>

</body>

</html>