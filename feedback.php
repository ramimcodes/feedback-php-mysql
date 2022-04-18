<!-- includes header part -->
<?php include 'includes/header.php'; ?>

<?php

$sql = "SELECT * FROM user_feedback";
$restult = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($restult, MYSQLI_ASSOC);

?>
<main>
  <div class="container d-flex flex-column align-items-center">

    <h2>Feedback</h2>
    <!-- if feedback value empty -->
    <?php if (empty($feedback)) : ?>
      <div>
        <p class="lead mt-4">There is no feedback</p>
      </div>
    <?php endif; ?>

    <!-- fetch all feedback -->
    <?php foreach ($feedback as $value) : ?>
      <div class="card my-3 w-75 text-center">
        <div class="card-body">
          <?php echo $value['body'] ?? ''; ?>
        </div>
        <div class="text-secondary">
          <?php echo 'by ' . $value['name'] . ' on ' . $value['created_at']; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>



<!-- includes footer part -->

<?php include 'includes/footer.php'; ?>