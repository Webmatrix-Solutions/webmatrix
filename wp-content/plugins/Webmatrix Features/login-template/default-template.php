<?php 

echo "

<style>

@import url('https://fonts.googleapis.com/css2?family=Raleway&display=swap');

body.login {
  background: #C1B28F /* url('../img/footer-trillium.png') no-repeat right bottom */;
  display: flex;
  flex-direction: column;
  align-items: center;
  font-family: 'Raleway', sans-serif;
  font-size: 14px;
}

@media (min-width: 1200px) {
  body.login {
    background-size: 35%;
  }
}

#login {
  background: #ffffff;
  padding-top: 20px !important;
  -webkit-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.3);
}

body.login div#login h1 a {
  background-image: none, url(add_action('login_head', 'upload_img'););
  width: 100%;
  background-size: contain;
  margin-bottom: 0;
}

.login form {
  border: 0px !important;
  margin-top: 0 !important;
}

.login form .forgetmenot {
  float: none;
}

#login form p.submit {
  margin-top: 15px;
}

#wp-submit {
  -webkit-box-shadow: inset 0 0 0 4px #047bc1;
  -moz-box-shadow: inset 0 0 0 4px #047bc1;
  -ms-box-shadow: inset 0 0 0 4px #047bc1;
  -o-box-shadow: inset 0 0 0 4px #047bc1;
  box-shadow: inset 0 0 0 4px #047bc1;
  background-color: #047bc1;
  color: #FFFFFF;
  display: block;
  width: 100%;
  text-align: center;
  user-select: none;
  float: none;
  clear: both;
  height: auto;
  text-transform: uppercase;
  padding: 12px 30px;
  font-family: 'Raleway', sans-serif;
  white-space: nowrap;
  font-weight: 700;
  line-height: 1;
  border: 0 none;
  border-radius: 5px;
  transition: .3s;
  white-space: break-spaces;
  margin-top: 2.5rem;
}

#wp-submit:hover,
#wp-submit:focus {
  background-color: #000000;
  -webkit-box-shadow: inset 0 0 0 4px #000000;
  -moz-box-shadow: inset 0 0 0 4px #000000;
  -ms-box-shadow: inset 0 0 0 4px #000000;
  -o-box-shadow: inset 0 0 0 4px #000000;
  box-shadow: inset 0 0 0 4px #000000;
}

/* #backtoblog,
#nav {
  display: none;
} */

.login .privacy-policy-page-link {
  margin: 2em 0 2em;
}

body.login div#login input[type='checkbox'] {
  width: 1.5rem;
  height: 1.5rem;
}

body.login div#login input[type='checkbox']:before {
  margin: -.40rem 0 0 -0.60rem;
  height: 2.3rem;
  width: 2.3rem;
}

.adminfootermenu {
  background: rgba(0, 0, 0, 0.3);
  padding: 10px 0px;
  width: 100%;
  text-align: center;
}

.adminfootermenu ul li {
  display: inline-block;
  list-style: none;
}

.adminfootermenu ul li+li {
  margin-left: 10px;
}

.adminfootermenu ul li a {
  color: #ffffff;
}

.login #login_error, .login .message, .login .success{
    padding-top: 30px;
}

.login .button.wp-hide-pw{
  margin-top: -5px !important;
}

.login #nav{
  margin: 0 !important;
}

/* .login #backtoblog, .login #nav{
  margin-top: -15px !important;
} */

/* .login #backtoblog, .login #nav{
  margin-top: -20px !important;
} */

</style>

"


?>