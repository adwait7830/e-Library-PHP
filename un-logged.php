<?php
try {
  require_once('db.php');
} catch (\Throwable $th) {
  header('Location: serverDown.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>e Library</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="images/title.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="body">
  <div class="home">
    <nav class="navbar navbar-expand-lg d-flex justify-content-between">
      <div class="container-fluid">
        <a class=" library-logo display-2 d-none d-lg-block">e Library</a>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation" data-bs-target="#toggle-nav" aria-controls="toggle-nav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <button type="button" onclick="toggleProfileModal()" style="display:none;" class=" d-lg-none ms-lg-2 btn rounded-circle profile-btn btn-secondary">
          <i class="fas fa-user"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-lg-end" id="toggle-nav">
          <ul class="navbar-nav text-lg-center align-items-lg-center ">
            <li class="nav-item"><a class="n-item fs-4" href="#topBooks">Top Books</a></li>
            <li class="nav-item"><a class="n-item fs-4" href="#" data-bs-toggle="modal" data-bs-target="#contactForm">Contact Us</a></li>
            <li class="nav-item login-hook"><a class="n-item  fs-4" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Sign Up</a>
            </li>
            <li class="nav-item"><a class="n-item fs-4" href="#about">About</a></li>
            <li class="nav-item d-none d-lg-block">
              <button type="button" onclick="toggleProfileModal()" style="display:none;" class=" ms-lg-2 btn rounded-circle profile-btn btn-secondary">
                <i class="fas fa-user"></i>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="modal fade" id="contactForm" tabindex="-1" aria-labelledby="contactFormLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content d-flex flex-column align-items-center">
          <form class="modal-body contactUs">
            <h2>CONTACT US</h2>
            <input placeholder="Write your name here.." required=''></input>
            <input placeholder="Let us know how to contact you back.." type='email' required=''></input>
            <input placeholder="What would you like to tell us.." required=''></input>
            <button action='' method='post' name='feedback' data-bs-dismiss='modal'>Send Message</button>
          </form>
        </div>
      </div>
    </div>

    <div class="overlay d-none"></div>

    <div class="container intro">
      <p class="quote text-center display-1">The reading of all good books is like a conversation with the finest minds
        of the past centuries.</p>
      <p class="text-center fs-1"><a class="quote" href="https://en.wikipedia.org/wiki/Ren%C3%A9_Descartes" style="text-decoration: none;" target="_blank">- René Descartes -</a></p>
    </div>
  </div>
  </div>
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="d-flex modal-header align-items-center justify-content-center">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Log in to e-library</h1>
        </div>
        <div class="modal-body d-flex justify-content-center">


          <div class="w-100 d-flex flex-column align-items-center justify-content-center d-none" id="signUpDialog">
            <form id="signUpForm" class="d-flex flex-column gap-2 align-items-center justify-content-center w-75">
              <input type="hidden" name="signUp">
              <div class="form-floating w-100">
                <input type="text" class="form-control" id="setName" placeholder="Name" name="setName" required="">
                <label for="setName">Name</label>
              </div>
              <div class="form-floating w-100">
                <input type="text" class="form-control" id="setUsername" placeholder="Username" name="setUsername" required="">
                <label for="setUsername">Username</label>
                <span id='setUsernameBlock' class="form-text ms-0 text-danger"></span>
              </div>
              <div class="form-floating w-100">
                <input type="email" class="form-control" id="setEmail" placeholder="Email" name="setEmail" required="">
                <label for="setEmail">Email</label>
                <span id='setEmailBlock' class="form-text ms-0 text-danger"></span>
              </div>
              <div class="w-100">
                <select class="form-select" name="setProfession" id="setProfession" required="">
                  <option value="" disabled selected>Choose your profession</option>
                  <option value="Student">Student</option>
                  <option value="Working Professional">Working Professional</option>
                  <option value="Not available">Rather not to say</option>
                </select>
              </div>
              <div class="form-floating w-100">
                <input type="password" class="form-control" aria-describedby="passwordHelpBlock" id="setPassword" placeholder="Password" name="setPassword" required="">
                <label for="setPassword">Password</label>
                <span id="passwordHelpBlock" class="form-text ms-0 text-danger"></span>
              </div>
              <button class="mt-3 btn btn-primary w-50" type="submit">Sign Up</button>
            </form>
            <p class="mt-3">Already have an account? <a onclick="toggleLogin()" class="text-decoration-none text-black" style='cursor:pointer'>Sign in</a></p>
          </div>


          <div class="w-100 d-flex flex-column align-items-center justify-content-center" id="signInDialog">
            <form id="signInForm" class="d-flex flex-column align-items-center justify-content-center gap-4 w-75">
              <input type="hidden" name="signIn">
              <div class="form-floating w-100">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required="">
                <label for="username">Username</label>
                <span id='usernameBlock' class="form-text ms-0 text-danger"></span>
              </div>
              <div class="form-floating w-100">
                <input type="password" class="form-control" aria-describedby="passwordHelpBlock" id="password" placeholder="password" name="password" required="">
                <label for="password">Password</label>
                <span id='passwordBlock' class="form-text ms-0 text-danger"></span>
              </div>
              <button type="submit" class="btn btn-primary w-50">Sign In</button>
              <span id='signInBlock' class="form-text ms-0 text-danger"></span>
            </form>
            <p class="mt-3">New to e-Library? <a onclick="toggleLogin()" class="text-decoration-none text-black" style='cursor:pointer'>Sign up</a></p>
            <p>Forget Password? <a onclick="toggleForgetPass()" class="text-decoration-none text-black" style='cursor:pointer'>Reset</a></p>
          </div>


          <div class="w-100 d-flex flex-column align-items-center justify-content-center d-none" id="forgetPassDialog">
            <div class='w-75'>
              <p>Enter email to get reset link:</p>
            </div>
            <form class="d-flex flex-column align-items-center justify-content-center gap-4 w-75" id='forgetPassForm'>
              <input type="hidden" name='forgetPass'>
              <div class="form-floating w-100">
                <input type="email" class="form-control" id="sendLinkMail" placeholder="Email" name="sendLinkMail" required="">
                <label for="sendLinkMail">Email</label>
                <div class='d-flex align-items-center justify-content-center'>
                  <span id='sendEmailBlock' class="form-text text-danger"></span>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Send Link</button>
            </form>
            <p class="mt-3">Have Password? <a onclick="toggleForgetPass()" class="text-decoration-none text-black" style='cursor:pointer'>Sign in</a></p>
          </div>

          <div class="w-100 d-flex flex-column align-items-center justify-content-center d-none" id='linkSent'>
            <i class="fa-solid fa-check text-success" style='font-size:5rem'></i>
            <p>Reset Link Sent to Your Email</p>
            <p>Return to <a onclick="hideLinkSent()" class="text-decoration-none text-black" style='cursor:pointer'>Sign in</a></p>
          </div>

          <div class="w-100 d-flex flex-column align-items-center justify-content-center d-none" id='verificationSent'>
            <i class="fa-solid fa-check text-success" style='font-size:5rem'></i>
            <p>Verification Link Sent to Your Email</p>
            <p>Return to <a onclick="hideVerificationSent()" class="text-decoration-none text-black" style='cursor:pointer'>Sign in</a></p>
          </div>

          <div class="spinner-border d-none m-5 text-primary" style="width: 3rem; height: 3rem;" id='loader' role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="books-body mt-2">
    <h2 class="text-center fs-1" id="topBooks">Top Books</h2>
    <div class="topBooks p-2 d-flex flex-wrap align-items-center justify-content-center">
      <?php
      $stmt = $conn->prepare('SELECT * FROM all_books ORDER BY views DESC LIMIT 10');
      $stmt->execute();
      $result = $stmt->get_result();
      while ($book = $result->fetch_assoc()) {
        echo '

      <div class=" book-card card m-3" style="width:15rem; height:27rem; cursor:pointer;" onclick="openBookInfo(' . $book['id'] . ')">
      <img class="card-img-top h-75" src="' . $book['cover'] . '" alt="Book Image">
        <div class="card-body">
          <h5 class="card-title">' . $book['title'] . '</h5>
          <h6 class="card-subtitle text-body-secondary">' . $book['author'] . '</h6>
        </div>
      </div>
      <style>
        .book-card{
          background-color:inherit;
        }
        .book-card:hover{
          box-shadow: 0 3px 5px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
      </style>

        
              ';
      }
      ?>
    </div>
  </div>
  <div class="user-collection collection-body mt-2" style="display:none;">
    <h2 class="text-center fs-1" id="userCollection">My Collection</h2>
    <div class="collection p-2 d-flex flex-wrap align-items-center justify-content-center"></div>
  </div>
  <div class="overlay" style="display: none;"></div>

  <div class=' bookInfo pc-view-card'>
    <div class="dialog card position-fixed book-dialog  " style="width:55rem; height:auto;">
      <div class="card-header d-flex justify-content-between">
        Book Information <button type="button" class="btn-close align-end" aria-label="Close" onclick="closeBookInfo()"></button>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">

            <h2 id='title' class="placeholder-glow display-4">
              <p class='book-title placeholder'></p>
            </h2>
            <h3 class="placeholder-glow" id='author'>
              <p class='book-author placeholder'></p>
            </h3>
            <br>
            <h6 class="placeholder-glow" id='description'>
              <p class='book-description placeholder'></p>
            </h6>
          </div>
          <div class="book-cover placeholder-glow col-md-4">
            <img src="" alt="Image not available" class="placeholder img-fluid">
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class='bookInfo mobile-view-card'>
    <div class="card dialog position-fixed book-dialog " style="width:19rem;">
      <div class="card-header d-flex justify-content-between">
        Book Information <button type="button" class="btn-close align-end" aria-label="Close" onclick="closeBookInfo()"></button>
      </div>
      <div class="card-body d-flex flex-column align-content-center justify-content-center ">
        <div class="book-cover d-flex align-content-center justify-content-center ms-auto me-auto" style="width:175px; height: 225px;">
          <img src="" class="placeholder img-fluid h-75 w-50" alt="Loader...">
        </div>
        <h2 id='title' class="mb-0 card-title text-black text-center">
          <p class='book-title placeholder' style='margin-bottom:2px'></p>
        </h2>
        <h4 id='author' class="mb-0 card-subtitle text-secondary text-center">
          <p class='book-author placeholder'></p>
        </h4>
        <div class="card-text-scroll" style='margin-top:5px'>
          <div id='description' class=" card-text-scroll-inner text-center">
            <p class='book-description placeholder' style='margin-bottom:2px'></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
    .card-text-scroll {
      height: 200px;
      overflow-y: scroll;
    }

    .card-text-scroll-inner {
      padding-right: 1em;
    }

    .pc-view-card {
      display: none;
    }

    .mobile-view-card {
      display: none;
    }

  </style>
</body>

<footer class='container-fluid g-0 bg-secondary-subtle p-3' id='about'>
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-4 d-none d-lg-block text-center justify-content-center align-items-center p-3 " style='border-right: 1px solid black'>
      <p> Discover the enchanting world of <a href="https://coloredcow.com" style='text-decoration:none' target='_blank'>ColoredCow's</a> e-library, where literature comes to life in a captivating digital oasis of wisdom and imagination. </p>
    </div>
    <div class="col-lg-4 d-none d-lg-block text-center justify-content-center align-items-center p-3" style='border-right: 1px solid black'>
      <a class=" library-logo display-2">e Library</a>
    </div>
    <div class="col-lg-4 text-center">
      <div class='mb-1'><a class="fs-5 text-decoration-none" href="#">Divyanshu Naugai</a></div>
      <div>
        <a class="text-black" href="www.linkedin.com/in/divyanshu-naugai"><i class="fa-brands fa-linkedin-in m-3 fa-lg "></i></a>
        <a class="text-black" href="https://github.com/adwait7830"><i class="fa-brands fa-github m-3 fa-lg"></i></a>
        <a class="text-black" href="https://www.instagram.com/alone.thinktank/"><i class="fa-brands fa-instagram m-3 fa-lg"></i></i></a>
      </div>
    </div>
  </div>
</footer>



<script>
  function toggleLogin() {
    document.getElementById("signInDialog").classList.toggle('d-none');
    document.getElementById('signInForm').reset();
    document.getElementById("signUpDialog").classList.toggle('d-none');
    document.getElementById('signUpForm').reset();
  }

  function toggleForgetPass() {
    document.getElementById('forgetPassDialog').classList.toggle('d-none');
    document.getElementById('signInDialog').classList.toggle('d-none');
  }

  function hideLinkSent() {
    document.getElementById('linkSent').classList.add('d-none');
    document.getElementById('signInDialog').reset();
    document.getElementById('signInDialog').classList.remove('d-none');
  }

  function hideVerificationSent() {
    document.getElementById('verificationSent').classList.add('d-none');
    document.getElementById('signInDialog').classList.remove('d-none');
  }

  document.getElementById('sendLinkMail').addEventListener('input', function() {
    var helpBlock = document.getElementById('sendEmailBlock');
    helpBlock.textContent = '';
  })
  document.getElementById('forgetPassDialog').addEventListener('submit', function(event) {
    var helpBlock = document.getElementById('sendEmailBlock');
    helpBlock.textContent = '';
    event.preventDefault();
    var formData = new FormData(event.target);
    document.getElementById('loader').classList.remove('d-none');
    document.getElementById('forgetPassDialog').classList.add('d-none');
    fetch('services.php', {
        body: formData,
        method: 'POST'
      })
      .then(response => response.json())
      .then(data => {
        setTimeout(() => {
          if (data.response === 'email') {
            helpBlock.textContent = 'Email Not Found'
            document.getElementById('loader').classList.add('d-none');
            document.getElementById('forgetPassDialog').classList.remove('d-none');
          } else if (data.response === 'sent') {
            document.getElementById('forgetPassForm').reset();
            document.getElementById('loader').classList.add('d-none');
            document.getElementById('linkSent').classList.remove('d-none');
          }
        }, 3000);
      })
      .catch(err => console.error(err))

  })


  document.getElementById('setUsername').addEventListener('input', function(event) {
    const username = event.target.value;
    const helpBlock = document.getElementById('setUsernameBlock');

    if (/^\d+.*$/.test(username)) {
      helpBlock.textContent = 'Username can not start with a number';
    } else if (/\s/.test(username)) {
      helpBlock.textContent = 'Username can not have a whitespace';
    } else if (/[!@#$%^&*()+=\[\]{};':"\\|,.<>\/?]/.test(username)) {
      helpBlock.textContent = 'Username can not have special characters except _';
    } else if (/^.{0,4}$|^.{16,}$/.test(username)) {
      helpBlock.textContent = 'Username should be 5 to 15 characters long';
    } else {
      helpBlock.textContent = '';
      document.getElementById('setPassword').addEventListener('input', function(event) {
        var pass = event.target.value;
        const helpBlockText = document.getElementById('passwordHelpBlock');
        if (pass === '') {
          helpBlockText.textContent = 'Password field can not be empty'
        } else if (/^.{0,7}$|^.{21,}$/.test(pass)) {
          helpBlockText.textContent = 'Length should be between 8-20';
        } else if (/^[a-zA-Z\d]*$/.test(pass)) {
          helpBlockText.textContent = 'There should be at least one special character';
        } else if (/^[^A-Z]*$/.test(pass)) {
          helpBlockText.textContent = 'At least one capital letter';
        } else if (/^[^\d]*$/.test(pass)) {
          helpBlockText.textContent = 'There should be at least one number';
        } else {
          helpBlockText.textContent = '';
          document.getElementById('signUpForm').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('setUsernameBlock').textContent = '';
            document.getElementById('setEmailBlock').textContent = '';
            const formData = new FormData(event.target)
            document.getElementById('loader').classList.remove('d-none');
            document.getElementById('signUpDialog').classList.add('d-none');
            fetch('services.php', {
                body: formData,
                method: 'post'
              })
              .then(response => response.json())
              .then(data => {
                console.log(data);
                setTimeout(() => {
                  switch (data.response) {
                    case 'registered': 
                      document.getElementById('loader').classList.add('d-none');
                      document.getElementById('verificationSent').classList.remove('d-none');
                      break;
                    case 'username':
                      document.getElementById('setUsernameBlock').textContent = 'Username is Not Available';
                      document.getElementById('signUpDialog').classList.remove('d-none');
                      document.getElementById('loader').classList.add('d-none');
                      break;
                    case 'email':
                      document.getElementById('setEmailBlock').textContent = 'Email Already in Use';
                      document.getElementById('signUpDialog').classList.remove('d-none');
                      document.getElementById('loader').classList.add('d-none');
                      break;
                  }
                }, 3000);

              })
              .catch(error => console.error(error))
          })

        }

      })

    }
  })

  document.getElementById('signUpForm').addEventListener('submit', event => event.preventDefault());



  document.getElementById('signInForm').addEventListener('submit', function(event) {
    event.preventDefault();
    document.getElementById('passwordBlock').textContent = '';
    document.getElementById('usernameBlock').textContent = '';
    const formData = new FormData(event.target);
    document.getElementById('loader').classList.remove('d-none');
    document.getElementById('signInDialog').classList.add('d-none');
    fetch('services.php', {
        body: formData,
        method: 'post',
      })
      .then(response => response.json())
      .then(data => {
        setTimeout(() => {
          switch (data.response) {
            case 'valid':
              window.location.replace('index.php');
              break;
            case 'password':
              document.getElementById('passwordBlock').textContent = 'Password Does Not Match';
              document.getElementById('loader').classList.add('d-none');
              document.getElementById('signInDialog').classList.remove('d-none');
              break;
            case 'username':
              document.getElementById('usernameBlock').textContent = 'Invalid Username';
              document.getElementById('loader').classList.add('d-none');
              document.getElementById('signInDialog').classList.remove('d-none');
              break;
            case 'unverified':
              document.getElementById('signInBlock').textContent = 'Account not verified. Check your mail';
              document.getElementById('loader').classList.add('d-none');
              document.getElementById('signInDialog').classList.remove('d-none');
              break;
          }
        }, 3000);
      })
      .catch(error => console.error('error'))
  });

  document.getElementById('username').addEventListener('input',function(){
    document.getElementById('usernameBlock').textContent = '';
  })
  document.getElementById('password').addEventListener('input',function(){
    document.getElementById('passwordBlock').textContent = '';
  })

  <?php
  if(verifySessionToken()){
    echo 'window.location.replace("index.php")';
  }
   ?>
</script>
<script src='js/script1.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/8256093c76.js" crossorigin="anonymous"></script>

</html>