let movie;
const checkCommentById = (movie_id, user_id) => {
  let data = $.param({
    type: "read",
    movie_id,
    user_id
  })

  $.get(`DB/comment.php?${data}`)
  .done(val => {
    if(val != 'null'){
      let json = JSON.parse(val)
      $("#create-comment-section").addClass("hide");
      $("#edit-comment-section").addClass("hide");
      $("#view-comment-section").removeClass("hide");
      $("#view-comment").html(json.comment)
      $("#edit-comment").html(json.comment)
      
    } else {
      $("#create-comment-section").removeClass("hide");
      $("#view-comment-section").addClass("hide");
      $("#edit-comment-section").addClass("hide");
    }
    
  })
}
const createComment = (movie_id, user_id, comment) => {
  let data = {
    type: "create",
    movie_id,
    user_id,
    comment
  }

  $.post("DB/comment.php", data)
  .done(result => {
    M.toast({html: result})
    checkCommentById(movie, USER.ID)

  });
}



const updateComment = (movie_id, user_id, comment) => {
  let data = {
    type: "update",
    movie_id,
    user_id,
    comment
  }
  $.post("DB/comment.php", data)
  .done(result => {
    M.toast({html: result})
    checkCommentById(movie, USER.ID)

  });
}

const deleteComment = (movie_id, user_id) => {
  let data = {
    type: "delete",
    movie_id,
    user_id,
  }
  $.post("DB/comment.php", data)
  .done(result => {
    M.toast({html: result})
    checkCommentById(movie_id, user_id);
  });
}

const getOtherComments = (movie_id, user_id = 'null') => {
  let params = $.param({
    movie_id,
    user_id,
  })
  $.get(`DB/getOtherComments.php?${params}`)
  .done(data => {
    if(data != 'null'){
      let json = JSON.parse(data);
      json.forEach(review => {
        let data = $.param(review)
        $.post('components/comment.php', data)
        .done(htmlstr => {
          $("#comment-list").append(htmlstr)
        })
        
      });
      console.log(json);
    } 
  })
}

const openEditComment = () => {
  $("#view-comment-section").addClass("hide");
  $("#edit-comment-section").removeClass("hide");
}
const openViewComment = () => {
  $("#view-comment-section").removeClass("hide");
  $("#edit-comment-section").addClass("hide");
}