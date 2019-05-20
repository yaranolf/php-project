$(document).ready(function(){
    //comment toevoegen
    $("#commentSubmit").on("click", function(e) {
        var postId = $(this).data("post_id");
        var userId = $(this).data("userid");
        var commentText = $("#commentText").val();

        e.preventDefault();
        //ajax comment
        $.ajax({
            method: "POST",
            url: "ajax/comment.php", 
            data: { 
                postId: postId,
                userId: userId,
                commentText: commentText
            },
                dataType: "JSON" 
            }).done(function(res) {
                console.log(res);
                if(res.status == 'success') {
                    var newComment =  "<p>" + $("#commentText").val() + "</p>";

                    $("#comments").append(newComment);

                    $("#commentText").val("");
                }
            });
    
            e.preventDefault();
        });
});
            