<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>

    <input type="text" name="page" id="page" value="0">
    <div class="container d-flex flex-row justify-content-center mt-5">

        <div class="row gap-4">
        </div>  

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>

    $(document).ready(function () {
        // let currentPage = -1;

        const API_URL = 'http://127.0.0.1:8000/api';

        function GetPosts(){
            $.ajax({
                type: "POST",
                url: `${API_URL}/getLimit`,
                data: { page: $("#page").val() },
                dataType: "JSON",

                success: function (posts) {
                    console.log(posts);
                    
                        posts.forEach(post => {
                            $(".row").append(`
                             
                                <div class="card col-md-2">
                                    <div class="">
                                        <h5 class="card-title">${post.nama}</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>

                        `);
                        
                    });    
                    let page =  parseInt( $("#page").val())+1; 
                    $("#page").val(page);
                    

                  
                    
                }
            });
        }

        $(document).ready(function () {
            GetPosts();
        });


        $(window).on('scroll', function () {
            const scrollTop = $(this).scrollTop(); 
            const windowHeight = $(this).height();
            const docHeight = $(document).height();
            

            // console.log(windowHeight + scrollTop); //852
            // console.log(docHeight); //853
    
            if (scrollTop + windowHeight + 1 >= docHeight) {
                GetPosts();
                console.log('Sudah scroll sampai bawah!');
            }
        });

        
    });
</script>
</body>
</html>