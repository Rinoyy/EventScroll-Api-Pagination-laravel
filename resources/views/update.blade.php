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
                <form id="form-update">
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </form>
            </div>
            <a class="box" id="box">Pindah KE HOME</a>
        </div>


        <ul id="post-list"></ul>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>


        // INI FUNGSI UNTUK GET SELURUH DATA POSTS!
        const API_ITEM = 'http://127.0.0.1:8000/api';


        $("#box").click(function (e) { 
            e.preventDefault();
            let pindah = window.location.href = 'http://127.0.0.1:8000/';
        });

      $("#form-update").submit(function (e) { 
            e.preventDefault();

            let data = {
                name : $("#name").val(),
            };


        const currentUrl = window.location.href;
        const parts = currentUrl.split('/');
        
            $.ajax({
                type: "PUT",
                url: `${API_ITEM}/update/${parts[4]}`,
                data: data,
                dataType: "dataType",
                success: function (response) {
                    
                }
            });
      });

       

    </script>
</body>
</html>