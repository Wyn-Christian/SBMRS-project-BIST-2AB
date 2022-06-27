const getAllRating = () => {
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
      console.log(review.author);
      $(`span:contains(${review.author})`).next("span").remove()
      $(`<span class="card-title">Sentiment Rating: ${review.sentiment.vote} (${review.sentiment.score.toFixed(2)})</span>`)
      .insertAfter($(`span:contains(${review.author})`))
    })
}
