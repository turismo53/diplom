async function uploadImage() {
    const imgFile = document.getElementById('myFileUpload').files[0];
    console.log(imgFile);
    document.getElementById('myImg').src =imgFile.name;
}
