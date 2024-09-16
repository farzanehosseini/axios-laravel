<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<form id="form">
    {{ csrf_field() }}
    <input type="text" id="name" class="form-control" name="name">
    <input type="file" class="form-control" id="pic" name="pic">
    <button class="btn btn-danger" type="submit" id="uploadButton">Send</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("#form");

    form.addEventListener("submit", function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        // const uploadUrl = "{{ url('/getData') }}";
        axios.post( "{{ url('/getData') }}", formData)
.then(response => console.log("path:", response.data.path,"file name:",response.data.ffffileName))
.catch(error => {
    console.log("Error:", error.response ? error.response.data : error.message);
});
    });
});
</script>

</body>
</html>








<!-- <head>
@vite(['resources/css/app.css','resources/js/app.js'])
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<form id="form">
 {{Csrf_field()}}
    <input type="text" id="name" class="form-control">  

    <input type="file" class="form-control" id="pic" name="pic">

    <button class="btn btn-danger" type='submit' id="uploadButton">send</button>
</form>

<script>
 document.addEventListener("DOMContentLoaded",function(){
    const form=document.querySelector("#form");
    form.addEventListener("submit",function(e){
        e.preventDefault();
        const picInput=document.getElementById("pic");
        const pic1=picInput.files[0];
        // const pic1=e.target.files[0];
        console.log(pic1);
         const formData = new FormData(this);
        // formData.append("pic",'test');
         console.log(formData);
    //     var fileInput = formData.get('#pic')[0].files[0]; 
    //     if (!picInput) {
    // console.log('No file selected.');
    // alert('No file selected.');
    // return;
    //    } else {
    // console.log('File selected:', picInput.name);
    //           }

              axios.post('/getData',formData)
               .then(response=>console.log(response))
               .catch(error=>console.log(error))
    })
 })

 -->




