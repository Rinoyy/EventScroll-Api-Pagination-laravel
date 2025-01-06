@extends('layout.app')
@section('content')
    
<table style="margin-top: 50px">
    <thead>
     <tr>
       <th>ID</th>
       <th>Name</th>
       <th>class</th>
       <th>mapel</th>
   </tr>         
 </thead>
 <tbody>
 </tbody>
</table>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        
        const API_URL = 'http://127.0.0.1:8000/api';

        const currentUrl = window.location.href;
        const parts = currentUrl.split('/');

        function show(){
            $.ajax({
                type: "GET",
                url: `${API_URL}/showLatihan/${parts[4]}`,
                dataType: "JSON",
                success: function (posts) {
                    posts.data.forEach(post => {
                        $("tbody").append(`

                        <tr>
                            <td>${post.id}</td>
                            <td>${post.name}</td>
                            <td>${post.class}</td>
                            <td>${post.mapel}</td>
                        </tr>  

                        `);
                        
                    });
                }
            });
        }

        show();
    });
</script>
@endsection
