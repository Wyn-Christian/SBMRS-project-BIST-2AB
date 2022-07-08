let rating = [];
let total = 0;
const getAllRating = () => {
  rating = [];
  total = reviews.length;
  reviews.forEach((review, i)=> {
    getSentimentRating(review, i);
  }) 
}



const getSentimentRating = (review, i) => {
  let base_url = "http://localhost:3000"
  let data = {
    comment: review.content
  }
  $.post(`${base_url}`, data)
    .done(res => {
      reviews[i].sentiment = res
      $(`span:contains(${review.author})`).next("span").remove()
      $(`<span class="card-title">Sentiment Rating: ${review.sentiment.vote} (${review.sentiment.score.toFixed(2)})</span>`)
      .insertAfter($(`span:contains(${review.author})`))
      rating.push(review.sentiment.score);
      let average_rate = (rating.reduce((a, b) => a + b) / total).toFixed(2);
      $("#movie-rating").html(average_rate);

    })
    .fail((jqXHR, textStatus, error) => {
      console.log(error)
    })
}
