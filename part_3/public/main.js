// Image validation and thumbnail display
document
    .getElementById("formFile")
    .addEventListener("change", function (event) {
        var file = event.target.files[0];
        var imageType = /image.*/;

        if (!file.type.match(imageType)) {
            alert("Invalid image format. Please select an image file.");
            return;
        }

        var reader = new FileReader();

        reader.onload = function (event) {
            var image = new Image();
            image.src = event.target.result;

            image.onload = function () {
                var thumbnailContainer =
                    document.getElementById("thumbnailContainer");
                thumbnailContainer.innerHTML = "";

                var thumbnail = document.createElement("img");
                thumbnail.classList.add("thumbnail");
                thumbnail.src = image.src;
                thumbnail.width = "300";
                thumbnail.style.textAlign = "center";

                thumbnailContainer.appendChild(thumbnail);
            };
        };

        reader.readAsDataURL(file);
    });
