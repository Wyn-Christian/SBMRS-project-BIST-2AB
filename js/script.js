const navigate = (str, name = "", id = 0) => {
  if (str == "Home") {
    $.ajax({
      url: `API/getMovies.php?type=popular&page=1`,
      type: "GET",
      success: (data) => {
        let js = JSON.parse(data)
        $.ajax({
          url: `components/${str}.php?url_1=${js.results[0].backdrop_path}&url_2=${js.results[1].backdrop_path}`,
          type: "GET",
          success: function (data) {
            $("#root").html(data)
          },
          fail: () => {
            console.log("Encountered an error")
          },
        })
      },
    })
  }
  if (str == "GenreMovies") {
    $.ajax({
      url: `components/${str}.php?page=1&genre_id=${id}&genre=${name}`,
      type: "GET",
      success: function (data) {
        $("#root").html(data)
      },
      fail: () => {
        console.log("Encountered an error")
      },
    })
  } else {
    $.ajax({
      url: `components/${str}.php?page=1`,
      type: "GET",
      success: function (data) {
        $("#root").html(data)
      },
      fail: () => {
        console.log("Encountered an error")
      },
    })
    $.ajax({
      url: `components/${str}.php?page=1`,
      type: "GET",
      success: function (data) {
        $("#root").html(data)
      },
      fail: () => {
        console.log("Encountered an error")
      },
    })
  }
}

function checkWindowsSize() {
  if (window.innerWidth <= 600) {
    $(".movie-card").addClass("horizontal small")
  } else {
    $(".movie-card").removeClass("horizontal small")
  }
}

function displayImage(el) {
  el.classList.remove("hide")
  el.parentElement.previousElementSibling.classList.add("hide")
}

let curr_type = "discover"
let fade_animations = ["fade-up", "fade-up-right", "fade-up-left"]

let get_fade = () => {
  return fade_animations[Math.floor(Math.random() * fade_animations.length)]
}

const getMoviesPage = (page, el) => {
  $.ajax({
    url: `API/getMovies.php?type=${curr_type}&page=${page}`,
    type: "GET",
    success: function (data) {
      $("ul.pagination > li")
        .siblings()
        .not(".waves-effect")
        .removeClass("active")
        .removeClass("disabled")

      el.classList.add("active")
      el.classList.add("disabled")
      el.classList.remove("waves-effect")

      let json = JSON.parse(data)
      $(".movie-list").html("")

      json.results.forEach((val) => {
        let aos = get_fade()
        $.ajax({
          url: `components/movie-card.php?img_url=${val.poster_path}&title=${val.title}&overview=${val.overview}&id=${val.id}&aos=${aos}`,
          type: "GET",
          success: (data) => {
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

const getMovies = (type, page, el) => {
  $.ajax({
    url: `API/getMovies.php?type=${type}&page=${page}`,
    type: "GET",
    success: function (data) {
      $("ul.pagination > li")
        .siblings()
        .not(".waves-effect")
        .addClass("waves-effect")

      $("ul.pagination > li")
        .siblings()
        .removeClass("active")
        .removeClass("disabled")

      $("#firstpage")
        .removeClass("waves-effect")
        .addClass("active")
        .addClass("disabled")

      if (el) {
        $("a.collection-item").siblings().removeClass("active")
        el.classList.add("active")
      }

      let json = JSON.parse(data)
      curr_type = type
      $(".movie-list").html("")
      json.results.forEach((val) => {
        let aos = get_fade()
        $.ajax({
          url: `components/movie-card.php?img_url=${val.poster_path}&title=${val.title}&overview=${val.overview}&id=${val.id}&aos=${aos}`,
          type: "GET",
          success: (data) => {
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
      $(".movie-list").html("")
      console.log(json)
      json.results.forEach((val) => {
        console.log(val)
        let aos = get_fade()
        $.ajax({
          url: `components/movie-card.php?img_url=${
            val.poster_path
          }&title=${val.title.replace("#", "%23")}&id=${
            val.id
          }&aos=${aos}&overview=${val.overview}`,
          type: "GET",
          success: (data) => {
            $(".movie-list").append(data)
            AOS.refreshHard()
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

const getMovie = (id) => {
  $.ajax({
    url: `components/Movie.php?id=${id}`,
    type: "GET",
    success: (data) => {
      $("#root").html("")
      $("#root").html(data)
    },
    fail: () => {
      console.log("Encountered an error")
    },
  })
}

const updatePage = (num) => {
  $(".page-list")
    .children()
    .removeClass("waves-effect")
    .addClass("waves-effect")

  $(".page-list")
    .children(`.disabled`)
    .removeClass("disabled")
    .removeClass("active")

  $(".page-list")
    .children(`#${num}`)
    .addClass("disabled")
    .addClass("active")
    .removeClass("waves-effect")
}

const getGenreMovies = (id, name, p, onPage = false) => {
  $.ajax({
    url: `API/getGenreMovies.php?genre_id=${id}&page=${p}`,
    type: "GET",
    success: (data) => {
      let json = JSON.parse(data)
      onPage ? updatePage(p) : navigate("GenreMovies", name, id)

      $(".movie-list").html("")
      json.results.forEach((val) => {
        let aos = get_fade()
        $.ajax({
          url: `components/movie-card.php?img_url=${val.poster_path}&title=${val.title}&overview=${val.overview}&id=${val.id}&aos=${aos}`,
          type: "GET",
          success: (data) => {
            $(".movie-list").append(data)
            AOS.refreshHard()
          },
          fail: (e) => {
            console.log("API test failed: " + e)
          },
        })
      })
    },
    fail: (e) => {
      console.log("API test failed: " + e)
    },
  })
}
