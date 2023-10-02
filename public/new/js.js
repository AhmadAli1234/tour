 let data = $('#data').val();

 $.ajax({
    url : 'logout.php',
    type : 'POST',
    data : ({data:data}),
    success: function(html) 
    {
      $('#question').html(html);
      alert(html);
    }
  });