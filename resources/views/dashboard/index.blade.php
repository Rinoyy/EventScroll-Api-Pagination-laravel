@extends('layout.app')

@section('content')
    <table style="margin-top: 50px">
         <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>class</th>
            <th>mapel</th>
            <th>action</th>
        </tr>         
      </thead>
      <tbody>
      </tbody>
    </table>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
      
      const API_URL = 'http://127.0.0.1:8000/api';
      const API_biasa = 'http://127.0.0.1:8000';

      function fecthData(){
        $.ajax({
          type: "GET",
          url: `${API_URL}/getLatihan`,
          dataType: "JSON",
          success: function (posts) {
            $('tbody').empty();
            posts.data.forEach(post => {
              $('tbody').append(`
                   <tr>
                    <td>${post.id}</td>
                    <td>${post.name}</td>
                    <td>${post.class}</td>
                    <td>${post.mapel}</td>
                    <td>
                      <a href="${API_biasa}/updateLatihan/${post.id}">Update</a>
                      <a href="${API_biasa}/showLatihan/${post.id}">Show</a>
                      <button onclick="Mydelete(${post.id});" id="btn_loading${post.id}">Delete</button>
                      

                      </td>
                   </tr>  
              `);              
            });
          }
        });
      }

      $(document).ready(function () {
        fecthData();
      });

      function Mydelete(id){
            $.ajax({
                type: "DELETE",
                url: `${API_URL}/deleteLatihan/${id}`,
            
                success: function (response) {
                  fecthData();

                  console.log("berhasi;");
                  
                },
                
            });
      } 

      // Mydelete();
      
</script>