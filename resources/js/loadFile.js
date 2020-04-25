console.log("asdasdas");
$('#myFileUpload').on("change", function () {

    const imgFile = document.getElementById('myFileUpload').files[0];
    $("#textFile").text(imgFile.name);
});


