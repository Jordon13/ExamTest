<div id="transcriptform">
<form id="formd" method="post" novalidate="novalidate" enctype="multipart/form-data" >
        <input type="file" name="file" id="file" accept="application/pdf"/><br/><br/>
        <input type="submit" id="sub" name='submit' style="cursor:pointer" value="submit" />
    </form>
<p class="gets"></p>
<p class="results"></p>

<script>
    
    var files = $('#file').attr('name');
            var form = $('#formd');
            var fromd = form.serialize();
            var path = 'classes/Upload.php?classID=<?php echo $_GET["classID"];?>';
            $('#formd').on("submit",function(e){
                e.preventDefault();
                var formData = new FormData($(form)[0]);
            $.ajax({
                url: path,
                data: formData,
                type: 'POST',
                contentType: false,
                processData: false,
                success: function(data){
                    $('#file').replaceWith($('#file').val('').clone(true));
                    $('.results').html(data);
                }
            });
          });
    
</script>
</div>

