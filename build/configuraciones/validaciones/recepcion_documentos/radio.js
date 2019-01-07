$(document).ready(function(){

    $(function(){
        $('input[type="radio"]').click(function(){
          if ($(this).is(':checked'))
          {
            alert($(this).val());
          }
        });
      });
});