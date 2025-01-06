<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    
</head>
<body>
    
    <title>CRUD with AJAX</title>

        <div class="container mt-5">
            <div class="col-12 col-md-12 col-lg-12">
                <form id="form-insert">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="btn-form-insert">Submit</button>
                </form>
            </div>
        </div>

        <ul id="post-list"></ul>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>


        // INI FUNGSI UNTUK GET SELURUH DATA POSTS!
        const API_ITEM = 'http://127.0.0.1:8000/api';
        const API_UPDATE = 'http://127.0.0.1:8000';

            function fetchPosts() {
                    $.ajax({
                        url: `${API_ITEM}/get`,
                        method: 'GET',
                        success: function(posts) {       
                            console.log(posts);
                                           
                            $('#post-list').empty();
                            if(posts.data && posts.data.length){
                                posts.data.forEach(post => {
                                $('#post-list').append(`<li>${post.name} - ${post.id} <button onclick ="Mydelete(${post.id});"" id="btn_loading${post.id}">Delete</button> -
                                     <a href="${API_UPDATE}/update/${post.id}">Update</a>`);                         
                            });
                                console.log("data ada");  
                            }else{
                                console.log("data tidak ada");
                                
                            }    
                        }
                    });
                }
                
        fetchPosts();       
      


        $(document).ready(function () {
            fetchPosts();
        });


        $("#form-insert").submit(function (e) { 
            e.preventDefault();

            let data = {
                name: $("#name").val(),   
            };
            
            $.ajax({
                type: "POST",
                url: `${API_ITEM}/store`,
                data: data,
                dataType: "JSON",
                success: function (response) {
                    fetchPosts();
                    console.log("berhasil insert");
                    
                }
            });            
        });



        // INI FUNGSI UNTUK DELETE DI TABLE ITEM, BUKAN DI TABLE POSTS(EVENT SCROLL)
        function Mydelete(id) {
            $(`#btn_loading${id}`).attr("disabled", true);
            $(`#btn_loading${id}`).html("Loading....");

            $.ajax({
                type: "DELETE",
                url: `http://127.0.0.1:8000/api/delete/${id}`,
            
                success: function (response) {
                    fetchPosts();
                },
                error: function (xhr, status, error) {
                    console.error("Error status:", status);
                    console.error("Error response:", xhr.responseText);
                    alert('Terjadi kesalahan saat menghapus data');
                }
            });
        }



        



    </script>
</body>
</html>