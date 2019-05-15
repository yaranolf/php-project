$(".report").on("click", function(e){
    var postId = $(this).data('id');
    var elInappropriate = $(this).parent().find(".inappropriate");
    var inappropriate = elInappropriate.html();

    $.ajax({
      method: "POST",
      url: "ajax/report.php",
      data: { postId: postId },
      dataType: "json"
    })

    .done(function(res){
      console.log(res);
      if(res.status === "success"){
        inappropriate++;
        elInappropriate.html(inappropriate);
      } 
    });

    
    e.preventDefault();
});
