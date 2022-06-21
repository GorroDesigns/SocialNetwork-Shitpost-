<?php
include_once("header.php");

if (isset($_POST["logout"])) {
    session_destroy();
}
$titulo = "Shitpost";
include_once("header.php");
?>



<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.7.3/tailwind.min.css'>
<div class="container fitPage">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="signup-form">
                <form action="registerOk.php" method="post">
                    <h1 class="text-center">Únete jejejeje, hagamo shitpost 兄弟起拉屎</h1>

                    </br>
                    <hr>

                    <!-- IMAGEN AVATAR -->
                    <section class="avatarContainer">


                        <!-- If you wish to reference an existing file (i.e. from your database), pass the url into imageData() -->
                        <div x-data="imageData()" class="file-input flex items-center">

                            <!-- Preview Image -->
                            <div class="h-12 w-12 rounded-full border-2 border-black-500 overflow-hidden bg-black-100">
                                <!-- Placeholder image -->
                                <div x-show="!previewPhoto">
                                    <svg class="h-full w-full text-black-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <!-- Show a preview of the photo -->
                                <div x-show="previewPhoto" class="h-12 w-12 rounded-full overflow-hidden">
                                    <img :src="previewPhoto" alt="" class="h-12 w-12 object-cover">
                                </div>
                            </div>

                            <div class="flex items-center">
                                <!-- File Input -->
                                <div class="ml-5 rounded-md shadow-sm">
                                    <!-- Replace the file input styles with our own via the label -->
                                    <input @change="updatePreview($refs)" x-ref="input" type="file" accept="image/*,capture=camera" name="photo" id="photo" class="custom">
                                    <label for="photo" class="avatarBtn">
                                        Avatar
                                    </label>
                                </div>
                                <div class="flex items-center text-sm text-black-500 mx-2">
                                    <!-- Display the file name when available -->
                                    <span x-text="fileName || emptyText"></span>
                                    <!-- Removes the selected file -->
                                    <button x-show="fileName" @click="clearPreview($refs)" type="button" aria-label="Remove image" class="mx-1 mt-1">
                                        <svg viewBox="0 0 20 20" fill="currentColor" class="x-circle w-4 h-4" aria-hidden="true" focusable="false">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>

                            </div>

                        </div>


                    </section>
                    <!--  -->
                    <div class="form-group">

                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="username" placeholder="Usuario" required="required">
                        </div>
                        <!-- <span class="iconoFile">
                            <label for="icon"><span class="fa-solid fa-image"></span> </label>
                            <input id="icon" type="file" name="file" accept=".jpg,.jpeg,.png" onchange="loadFile(event)">
                            <img id="output" />
                        </span> -->
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                            <input type="email" class="form-control" name="email" placeholder="Email " required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                                <i class="fa fa-check"></i>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline"><input type="checkbox" required="required"> Asepto los <a href="#">Uso de terminos</a> &amp; <a href="#">Privasidades</a></label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Registrarse</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.6.0/alpine.js'></script>
<script src="./script.js"></script>
<script>
    function imageData(url) {
        const originalUrl = url || '';
        return {
            previewPhoto: originalUrl,
            fileName: null,
            emptyText: originalUrl ? 'No new file chosen' : 'Selecciona una imagen',
            updatePreview($refs) {
                var reader,
                    files = $refs.input.files;
                reader = new FileReader();
                reader.onload = (e) => {
                    this.previewPhoto = e.target.result;
                    this.fileName = files[0].name;
                };
                reader.readAsDataURL(files[0]);
            },
            clearPreview($refs) {
                $refs.input.value = null;
                this.previewPhoto = originalUrl;
                this.fileName = false;
            }
        };
    }
</script>

<?php include_once "footer.php"; ?>