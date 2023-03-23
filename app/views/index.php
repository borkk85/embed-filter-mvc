<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="table-container">
  <table class="table-header">
    <thead>
      <tr>
        <th>Title</th>
        <th>Content</th>
        <th>Rating</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody class='table-body'>
      <?php foreach ($data['reviews'] as $review) : ?>
        <tr>
          <td><?php echo $review['reviewerName']; ?></td>
          <td><?php echo $review['reviewText']; ?></td>
          <td><?php echo $review['rating']; ?></td>
          <td><?php echo $review['reviewCreatedOn']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <button class="back-button">Back</button>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>