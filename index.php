<?php include 'includes/header.php'; ?>

<?php

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $body = $_POST['body'];
  if (!empty($name) && !empty($email) && !empty($body)) {
    $sql = "INSERT INTO user_feedback (name, email, body) VALUES('$name', '$email', '$body')";
    if (mysqli_query($conn, $sql)) {
      header('Location:feedback.php');
    } else {
      $message = 'feedback insertd error';
    }
  }
}

?>

<main>
  <div class="container d-flex flex-column align-items-center">
    <h2>Feedback</h2>
    <h2 class="text-red"><?php echo $message; ?></h2>
    <p class="lead text-center">Leave feedback for The RamimCodes</p>
    <form action="" method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
      </div>
      <div class="mb-3">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control" id="body" name="body" placeholder="Enter your feedback"></textarea>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>
  </div>
</main>

<?php include 'includes/footer.php'; ?>