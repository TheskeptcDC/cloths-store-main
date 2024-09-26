<?php
include("partials/menu.php");
?>
	<!-- main section starts-->
	<div class="main-content">
		<div class="wrapper">
			<strong>
				<?php
						//check if the cat add failed
					if (isset($_SESSION['cat-failed'])) {
						// show failure messege
						echo $_SESSION['cat-failed'];
						//remove messege
						unset($_SESSION['cat-failed']);
					}else{
						//show add category title 
						echo "Add Category";
					}
				?>
			</strong>
			<br>
			<!-- CODE FOR ADD category TABLE-->
			<form action="#" method="POST" enctype="multipart/form-data">
				
				<table class="table-full">
					<tr>
						<td>Title</td>
						<td><input type="text" name="title"></td>
					</tr>
					<tr>
						
						<td>Description</td>
						<td><input type="text" name="description"></td>
					</tr>
					<tr>
						<td>Featured</td>
						<td>
							yes<input type="radio" name="featured" value="yes">
							no<input type="radio" name="featured" value="no">
					</td>
						</tr>
						<tr>
						<td>Active</td>
						<td>
							yes<input type="radio" name="active" value="yes">
							no<input type="radio" name="active" value="no">
					</td>
						</tr>
						<!--upload the image -->
						<tr>
							<td>Image</td>
							<td>
								<input type="file" name="image">
							</td>
						</tr>

						<tr>
							<td colspan="2">
								<input type="submit" name="submit" class="primary-button">
							</td>
							
						</tr>
				</table>
			</form>

		</div>
	</div>
			
	<!-- main section ends-->
	<!-- footer section starts-->
	<?php
		include("partials/footer.php");
	?>

	<?php

			if (isset($_POST['submit'])) {
				// data is entered
				//get the value from category form 

				$title = $_POST['title'];
				$description = $_POST['description'];
				//check if the radio buttons have been checked or not 
				if (isset($_POST['featured'])) {
					// get the value from form 
					$featured = $_POST['featured'];
				}else{
					//set default value
					$featured = 'no';
				}
			
			if (isset($_POST['active'])) {
				//get value
				$active = $_POST['active'];

			}else{
				//set default no
				$active = "no";
			}

			//check if image has been uploaded or not 
			//print_r($_FILES['image']['name']);
				//die();	//break the code 
			if (isset($_FILES['image']['name'])) {
				// if the file has name vale ..then upload the image
				 $image_name = $_FILES['image'['name']];
				 $source_path = $_FILES['image'['tmp_name']];

			}
			else{
				//set image name value as blank 
				$image_name ="";
			}

			//create sql query 
			$sql = "INSERT INTO category SET 
					title = '$title',
					featured = '$featured',
					active = '$active',
					description ='$description'";

			//execute the sql query
			$res = mysqli_query($conn,$sql);
			//check if query has been executed nively
			if ($res==TRUE) {
				// the good
				//create message that category has been added 
				$_SESSION['cat-added'] = "new category added ";
				//redirect to manage category page 
				header('location:'.SITEURL.'admin/manage-category.php'); 
			}
			else{
				//then it failed to add the new category
				//create messege of failure
				$_SESSION['cat-failed'] = "failed to add new category";
				//redirect to manage category page 
				//header('location:'.SITEURL.'admin/manage-category.php');
			}
		}
    ?>