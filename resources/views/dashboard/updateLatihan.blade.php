@extends('layout.app')

@section('content')

<form id="form-update">
    <h1>Update</h1>
    {{-- @method('PUT') --}}

    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Enter your name">
    
    <label for="class">Class</label>
    <input type="text" id="class" name="class" placeholder="Enter your class">
    
    <label for="mapel">mapel</label>
    <input type="text" id="mapel" name="mapel" placeholder="Enter your Mapel">
    
    <button type="submit" >Submit</button>
</form>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>

    const API_URL = 'http://127.0.0.1:8000/api';

 

    $("#form-update").submit(function (e) { 
        e.preventDefault();
            let data = {
                name : $("#name").val(),
                class : $("#class").val(),
                mapel : $("#mapel").val(),
            };

            const currentUrl = window.location.href;
            const parts = currentUrl.split('/');
            
            

        $.ajax({
            type: "POST",
            url: `${API_URL}/updateLatihan/${parts[4]}`,
            data: data,
            dataType: "dataType",
            success: function (response) {
                console.log("Berhasil");
                
            }
        });
    });
            

     

</script>
@endsection


