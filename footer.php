<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<script>
    // VISUALIZAR IMAGEN MODAL
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
<footer class="bg-light text-center text-dark">



    </div>

    <div class="text-left p-3  footer2">

        <div class="p-4 d-inline" style="text-align: left;">

            <!-- Twitter -->
            <a class="btn m-1 agrandar" href="https://twitter.com/gorrodesigns" target="_blank" role="button"><i class="bi-twitter"></i></a>
            <!-- Github -->
            <a class="btn m-1 agrandar" href="https://github.com/GorroDesigns" target="_blank" role="button"><i class="bi-github"></i></a>
            <!-- Instagram -->
            <a class="btn  m-1 agrandar" href="https://www.instagram.com/srgorro/" target="_blank" role="button"><i class="bi-instagram"></i></a>
            <!-- Linkedin -->
            <a class="btn m-1 agrandar" href="https://www.linkedin.com/in/daniel-orera-garcia/" target="_blank" role="button"><i class="bi-linkedin"></i></a>
            <!-- Behance -->
            <a class="btn m-1 agrandar" href="https://www.behance.net/gorrodesigns" target="_blank" role="button"><i class="bi-behance"></i></a>

        </div>

    </div>
</footer>
</body>

</html>