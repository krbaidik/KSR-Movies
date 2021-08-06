<script>
      $('#title').on('input', function() {
      title = $('#title').val();
      regx = /(!+|@+|#+|%+|&+|-+| +)/g;
      slug = title.trim().replace(regx,'-');
      $('#slug').val(slug);
    });
</script>