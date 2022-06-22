const navigate = (str) => {
  $.ajax({
    url: `components/${str}.php`,
    type: "GET",
    success: function (data) {
      $("#root").html(data)
    },
    fail: () => {
      console.log("Encountered an error")
    },
  })
}

function checkWindowsSize() {
  if (window.innerWidth <= 600) {
    $(".movie-card").addClass("horizontal small")
  } else {
    $(".movie-card").removeClass("horizontal small")
  }
}

window.onresize = checkWindowsSize

function displayImage(el) {
  el.classList.remove("hide")
  el.parentElement.previousElementSibling.classList.add("hide")
}

const getMovies = (type, page, el) => {
  $.ajax({
    url: `API/getMovies.php?type=${type}&page=${page}`,
    type: "GET",
    success: function (data) {
      $("a.collection-item").siblings().removeClass("active")
      el.classList.add("active")

      let json = JSON.parse(data)
      $(".movie-list").html("")
      json.results.forEach((val) => {
        $.ajax({
          url: `components/movie-card.php?img_url=${val.poster_path}&title=${val.title}&overview=${val.overview}`,
          type: "GET",
          success: (data) => {
            console.log(data)
            $(".movie-list").append(data)
          },
          fail: (e) => {
            console.log("API test failed: " + e)
          },
        })
      })
    },
    fail: () => {
      console.log("Encountered an error")
    },
  })
}

const searchMovies = (query, page) => {
  $.ajax({
    url: `API/searchMovies.php?query=${query}&page=${page}`,
    type: "GET",
    success: function (data) {
      let json = JSON.parse(data)
      console.log(json)
      $(".movie-list").html("")
      json.results.forEach((val) => {
        $.ajax({
          url: `components/movie-card.php?img_url=${val.poster_path}&title=${val.title}&overview=${val.overview}`,
          type: "GET",
          success: (data) => {
            console.log(data)
            $(".movie-list").append(data)
          },
          fail: (e) => {
            console.log("API test failed: " + e)
          },
        })
      })

      // $(".movie-list").html("")
    },
    fail: () => {
      console.log("Encountered an error")
    },
  })
}
