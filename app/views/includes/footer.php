
<script>
    document.querySelector('.back-button').addEventListener('click', () => {
        window.location.href = 'filter';
    })

    window.addEventListener('load', () => {
        document.querySelector('#sort_rating').value = '';
        document.querySelector('#minimum_rating').value = 1;
        document.querySelector('#sort_by_date').value = '';
        document.querySelector('#text_priority').value = '';
    })
</script>
</body>
</html>