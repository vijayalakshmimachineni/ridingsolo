<html>
<head>
	<title>leisureing</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <style type="text/css">
    	.inputwidth{
    		width: 1239px;;
    	}
    </style>
	</head> 
	<body>
		<div class="container" style="margin:0">
			<form action="<?php echo baseURL1.'/leisureiterinarystore'?>" method="post" name="adminform" id="adminform" enctype="multipart/form-data">
				<input type="hidden" class="form-control" id="leisure_id" name="leisure_id" placeholder="" value="<?php echo $leisure_id;?>">
				<?php 
				$i=1;
				if($result){
				foreach($result as $t){ ?>
					<div class="form-group ">
						<div class="btn btn-sm btn-danger">day <?php echo $i++; ?></div>
						<div class="btn btn-sm btn-danger text-right" onclick="deletea('<?php echo $t->lpitinerary_id;?>');">delete</div>
					</div>
					<div class="form-group">
						<div class="mb-3">
					  <label for="exampleFormControlInput1" class="form-label">Title</label>
					  <input type="hidden" class="form-control" id="lpitinerary_id" name="lpitinerary_id[]" placeholder="" value="<?php echo $t->lpitinerary_id;?>">

					  <input type="text" class="form-control inputwidth" id="title" name="title[]" placeholder="iterinary title" value="<?php echo $t->title;?>">

					</div>
					<div class="mb-3">
					  <label for="" class="form-label">Description</label>
					  <textarea class="form-control" id="textare_<?php echo $t->lpitinerary_id;?>" name="description[]" rows="3"><?php echo $t->description;?></textarea>
					</div>
					</div>

				<?php }
				} ?>
				<div id="daysdiv"></div>
				<div class="form-group">
					<div onclick="addday();" class="btn btn-sm btn-primary"> + Add Day
						<span id="day" style="display:none;"><?php $a = $i-1; echo $a; ?></span>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" value="Update">
					<input type="button" name="cancel" value="Cancel" onclick="javascript:history.go(-1);">
				</div>
			</form>
		</div>
		
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>	
		
		
	<script> 
		function deletea(a){
		console.log(a);
				Swal.fire({
				  title: 'Are you sure?',
				  text: "You won't be able to revert this!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				}).then((result) => {
				  if (result.isConfirmed) {
				  	$.ajax({
				      
				      type: "GET",
				      url: '<?php echo baseURL1."/deleteitineraryLeisure/";?>'+a,
				      cache: false,
				      contentType: false,
				      processData: false,
				      success: function(result1) {
				      	console.log(result1);
				      	location.reload();
				      	 
				      }
				    });
				    
				  }
				})
			}
		function addday(){
			 day = parseInt($('#day').html())+1;
			var str = '<div class="form-group "><div class="btn btn-sm btn-danger">day '+day+'</div></div><div class="form-group"><div class="mb-3"><label for="exampleFormControlInput1" class="form-label">Title</label><input type="hidden" class="form-control" id="lpitinerary_id" name="lpitinerary_id[]" placeholder="" value=""><input type="text" class="form-control inputwidth" id="title" name="title[]" placeholder="iterinary title" value=""></div><div class="mb-3"><label for="textarea_'+day+'" class="form-label">Description</label><textarea class="form-control" id="textarea_'+day+'" name="description[]" rows="3"></textarea></div></div>';
			$('#daysdiv').append(str);
			$('#day').html(day);
			$('#textarea_'+day).summernote({
			    height: 200,width: 1239,
			    callbacks: {
			        onImageUpload: function(files, editor, welEditable) {
			            sendFile(files[0], editor, welEditable,this.id);
			        }
			    }
			});
		}

  
  $('textarea').summernote({
	    height: 200,width: 1239,
	    callbacks: {
	        onImageUpload: function(files, editor, welEditable) {
	            sendFile(files[0], editor, welEditable,this.id);
	        }
	    }
	});
    

  function sendFile(file, editor, welEditable,summernotid) {
  	//alert('hi');
  	console.log(file);
    data = new FormData();
    data.append("file", file);
    data.append("foldername",summernotid);
    $.ajax({
      data: data,
      type: "POST",
      url: "<?php echo baseURL1.'/fileupload';?>",
      cache: false,
      contentType: false,
      processData: false,
      success: function(url) {
      	console.log(url);
      	var image = $('<img>').attr('src',url);
            $('#'+summernotid).summernote("insertNode", image[0]);
      	 
      }
    });
  }

		</script>
		</body>
</html>