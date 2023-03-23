<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="container">
    <form action="<?php echo URLROOT; ?>/pages/index" method="POST">
        <label for="sort_rating">Order By Rating:</label>
        <select name="sort_rating" id="sort_rating">
            <option value="highest">Highest</option>
            <option value="lowest">Lowest</option>
        </select>

        <label for="minimum_rating">Minimum Rating:</label>
        <select name="minimum_rating" id="minimum_rating">
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>
        </select>

        <label for="sort_by_date">Order by date:</label>
        <select name="sort_by_date" id="sort_by_date">
            <option value="newest">Newest</option>
            <option value="oldest">Oldest</option>
        </select>

        <label for="text_priority">Prioritize by text:</label>
        <select name="text_priority" id="text_priority">
            <option value="yes">Yes</option>
            <option value="no">no</option>
        </select>
        <div class="button_wrap">
            <button type="submit" class="filter-btn">Filter</button>
        </div>
    </form>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>