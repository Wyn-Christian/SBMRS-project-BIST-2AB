const navigate = (str, name = "", id = 0) => {
  
  let url = ""
  switch (str) {
    case "GenreMovies":
      url = `components/${str}.php?page=1&genre_id=${id}&genre=${name}`
      break
    case "Home":
      url = `API/getMovies.php?type=popular&page=1`
      break
    default:
      url = `components/${str}.php?page=1`
  }

  $.get(url)
    .done((data) => {
      if (str != "Home") {
        $("#root").html(data)
      } else {
        let js = JSON.parse(data)
        let params = $.param({
          url_1 : js.results[0].backdrop_path,
          url_2 : js.results[1].backdrop_path,
        })
        $.get(`components/${str}.php?${params}`)
          .done((data) => {
            $("#root").html(data)
          })
      }
    })
}

const displayMovies = (json) => {
  $(".movie-list").html("")

  json.results.forEach((val) => {
    let aos = get_fade()
    params = $.param({
      img_url: val.poster_path ? val.poster_path : "null",
      id: val.id,
      aos: aos,
      title: val.title,
      overview: val.overview,
    })
    $.get(`components/movie-card.php?${params}`)
    .done((data) => {
      $(".movie-list").append(data)
      AOS.refreshHard()
    })
  })
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
  $.getJSON(`API/getMovies.php?type=${curr_type}&page=${page}`)
    .done((json) => {
    $("ul.pagination > li")
      .siblings()
      .not(".waves-effect")
      .removeClass("active")
      .removeClass("disabled")

    el.classList.add("active")
    el.classList.add("disabled")
    el.classList.remove("waves-effect")

    displayMovies(json)
  })
}

const getMovies = (type, page, el) => {
  $.getJSON(`API/getMovies.php?type=${type}&page=${page}`)
    .done((json) => {
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

      curr_type = type
      displayMovies(json)
    })
}

const searchMovies = (query, page) => {
  if (query == "") return
  let params = $.param({
    query,
    page,
  })
  $.getJSON(`API/searchMovies.php?${params}`)
    .done((json) => {
      displayMovies(json)
    })
}

const getMovie = (id) => {
  $.get(`components/Movie.php?id=${id}`)
    .done((data) => {
      $("#root").html("")
      $("#root").html(data)
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
  let params = $.param({
    genre_id: id,
    page: p,
  })
  $.getJSON(`API/getGenreMovies.php?${params}`)
    .done((json) => {
      onPage ? updatePage(p) : navigate("GenreMovies", name, id)

      displayMovies(json);
    })
}
