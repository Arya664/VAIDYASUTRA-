<?php
include('dbconnection.php');
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query=mysqli_query($con, "insert into login(email, password) value('$email', '$password')");
    if ($query) {
    echo "<script>alert('You have successfully inserted the data');</script>";
    echo "<script type='text/javascript'> document.location ='3details.html'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>


<style>
  .login-page { background-color: #fff; padding-right: 48px; overflow: hidden; }
  .login-container { display: flex; gap: 20px; }
  .image-column { display: flex; flex-direction: column; width: 55%; }
  .login-image { aspect-ratio: 0.7; object-fit: contain; width: 100%; flex-grow: 1; }
  .form-column { display: flex; flex-direction: column; width: 45%; margin-left: 20px; }
  .form-wrapper { display: flex; margin-top: 48px; flex-direction: column; }
  .header-container { align-self: flex-end; display: flex; width: 454px; max-width: 100%; flex-direction: column; }
  .signup-link { align-self: flex-end; display: flex; flex-direction: column; color: #666; justify-content: center; font: 16px Poppins, sans-serif; }
  .signup-text { gap: 10px; padding: 2px; }
  .brand-name { color: #051a37; align-self: flex-start; margin-top: 89px; font: 48px Righteous, sans-serif; }
  .login-form { display: flex; margin-top: 89px; width: 568px; max-width: 100%; flex-direction: column; }
  .login-title { color: #333; font: 500 32px Roboto, sans-serif; }
  .form-fields { display: flex; margin-top: 48px; width: 100%; flex-direction: column; }
  .input-group { display: flex; width: 100%; flex-direction: column; color: #666; font: 16px Poppins, sans-serif; }
  .input-label { width: 100%; padding: 2px 0; }
  .input-field { border-radius: 12px; display: flex; min-height: 56px; margin-top: 4px; width: 100%; border: 1px solid rgba(102, 102, 102, 0.35); }
  .password-group { display: flex; margin-top: 18px; width: 100%; flex-direction: column; align-items: flex-end; font-family: Poppins, sans-serif; }
  .password-wrapper { display: flex; width: 100%; max-width: 568px; flex-direction: column; }
  .password-header { display: flex; width: 100%; padding-right: 9px; gap: 20px; flex-wrap: wrap; justify-content: space-between; }
  .password-label { color: #666; font-size: 16px; }
  .password-toggle { display: flex; gap: 8px; font-size: 18px; color: rgba(102, 102, 102, 0.8); white-space: nowrap; text-align: right; }
  .toggle-icon { aspect-ratio: 1; object-fit: contain; width: 24px; align-self: flex-start; }
  .login-button-wrapper { display: flex; margin-top: 18px; width: 304px; max-width: 100%; flex-direction: column; }
  .login-button { border-radius: 32px; background-color: #111; display: flex; width: 100%; max-width: 304px; flex-direction: column; overflow: hidden; align-items: center; color: #fff; white-space: nowrap; text-align: center; justify-content: center; padding: 19px 70px; font: 22px Roboto, sans-serif; }
  .button-text { align-self: stretch; gap: 8px; }
  .mobile-signup-link { align-self: flex-start; margin-top: 8px; gap: 10px; color: #666; padding: 2px; font: 16px Poppins, sans-serif; }
  .visually-hidden { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0; }
  
  @media (max-width: 991px) {
    .login-page { padding-right: 20px; }
    .login-container { flex-direction: column; align-items: stretch; gap: 0; }
    .image-column, .form-column { width: 100%; }
    .login-image { max-width: 100%; margin-top: 40px; }
    .form-wrapper { max-width: 100%; margin-top: 40px; }
    .brand-name { margin-top: 40px; font-size: 40px; }
    .login-form { margin-top: 40px; }
    .form-fields { margin-top: 40px; }
    .input-label { max-width: 100%; padding-right: 20px; }
    .input-field { max-width: 100%; }
    .password-wrapper { max-width: 100%; }
    .password-header { max-width: 100%; }
    .password-toggle { white-space: initial; }
    .login-button { white-space: initial; padding: 19px 20px; }
    .button-text { white-space: initial; }
  }
  </style>
  
  

  <section class="login-page">
    <div class="login-container">
      <div class="image-column">
        <img height="150px" loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/85d5ac8306c6a6e9cf2aad65eef144ae64b86f138f1f003f65f985984f503f99?placeholderIfAbsent=true&apiKey=f58a2b2b5bf2488ead47f03c304dfa45" class="login-image" alt="Login page illustration" />
      </div>
      <div class="form-column">
        <div class="form-wrapper">
          <header class="header-container">
            <div class="signup-link">
            </div>
            <h1 class="brand-name">VAIDYASUTRA</h1>
          </header>
          <form class="login-form">
            <h2 class="login-title">Signup</h2>
            <table>
            <tr>
                <td class="lbl">Email</td>
                <td>:</td>
                <td>
                    <input type="email" name="email" class="txtbx" placeholder="Enter Email Id" required="true">
                </td>
            </tr>
            <tr>
                <td class="lbl">Password</td>
                <td>:</td>
                <td>
                    <input type="password" id="password" name="password" placeholder="Enter Password" class="txtbx" required>
                </td>
            </tr>     
            </table>       
              <div class="login-button-wrapper">
                <input type="submit" name="submit" class="login-button" onclick="window.location.href='3details.html'">
                  <span class="button-text">SignUp</span>
                </input>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>