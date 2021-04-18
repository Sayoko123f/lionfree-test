const data = {
    preview: (filelist) => {
        let d = document.getElementById('previewDiv');
        let img = document.createElement("img");
        img.id = "image";
        img.src = URL.createObjectURL(filelist[0]);

        d.innerHTML = "";
        d.appendChild(img);
        data.mycropper(img);
    },
    mycropper: (img) => {
        const cropper = new Cropper(img, {
            aspectRatio: 16 / 9,
            crop(event) {
                console.log(event.detail.x);
                console.log(event.detail.y);
                console.log(event.detail.width);
                console.log(event.detail.height);
                console.log(event.detail.rotate);
                console.log(event.detail.scaleX);
                console.log(event.detail.scaleY);
            },
        });
    }

}
console.log(data);