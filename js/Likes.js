$(document).ready(function(){
    $(".like").on("click", function(e){
        var button = $(this);
        var postId = $(this).data('id');
        var elLikes = $(this).parent().find(".likes");
        var likes = elLikes.html();

        $.ajax({
            method: "POST",
            url: "ajax/like.php",
            data: { postId: postId },
            dataType: "json",
            
        })
        .done(function( res ) {
            console.log(res);
            if(res.status === "success") {
              likes++;
              elLikes.html(likes);
            } else if (res.status === "fail"){
                likes--;
                elLikes.html(likes);
            }
        });

        e.preventDefault();
    });

   

  });

  $(document).ready(function(){
    $(document).on("click",".like", function(e){
        var button = $(this);
        var postId = $(this).data('id');
        var elLikes = $(this).parent().find(".likes");
        var likes = elLikes.html();

        $.ajax({
            method: "POST",
            url: "ajax/like.php",
            data: { postId: postId },
            dataType: "json",
            
        })
        .done(function( res ) {
            console.log(res);
            if(res.status === "success") {
              likes++;
              elLikes.html(likes);
            } else if (res.status === "fail"){
                likes--;
                elLikes.html(likes);
            }
        });

        e.preventDefault();
    });

   

  });