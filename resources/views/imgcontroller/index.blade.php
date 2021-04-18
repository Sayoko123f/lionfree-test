<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.9/cropper.min.css"
        integrity="sha512-w+u2vZqMNUVngx+0GVZYM21Qm093kAexjueWOv9e9nIeYJb1iEfiHC7Y+VvmP/tviQyA5IR32mwN/5hTEJx6Ng=="
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.9/cropper.min.js"
        integrity="sha512-9pGiHYK23sqK5Zm0oF45sNBAX/JqbZEP7bSDHyt+nT3GddF+VFIcYNqREt0GDpmFVZI3LZ17Zu9nMMc9iktkCw=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <title>ImageController</title>
    <style>
        /* Ensure the size of the image fit the container perfectly */
        img {
            display: block;

            /* This rule is very important, please don't ignore this */
            max-width: 100%;
        }
    </style>
</head>

<body>
    <form action="{{route('image-upload')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="previewDiv" style="width:400px;height: 400px;">
        </div>
        <input type="file" accept=".jpg, .jpeg, .png" name="photo" onchange="data.preview(this.files)" />
        <button type="submit">Submit</button>
    </form>
    <script src="{{asset('js/imagecontroller.js')}}" defer></script>
</body>

</html>