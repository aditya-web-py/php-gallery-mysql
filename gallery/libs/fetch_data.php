<?php

function getcategory( $table ) {
	require( "db.php" );
	$sql = "SELECT * FROM $table";
	if ( $result = mysqli_query( $con, $sql ) ) {
		//count number of rows in query result
		$rowcount = mysqli_num_rows( $result );
		//if no rows returned show no news alert
		if ( $rowcount == 0 ) {
			# code...
			echo 'No category';
		}
		//if there are rows available display all the results
		foreach ( $result as $category => $cat ) {
			# code...fetch actual category from categories table
			$category_id = $cat[ 'id' ];
			$sql = "SELECT * FROM photo WHERE cat_id='$category_id' ORDER BY id DESC LIMIT 1";
			if ( $result = mysqli_query( $con, $sql ) ) {
				foreach ( $result as $results => $actualphoto ) {
					$photo = $actualphoto[ 'name' ];
				}
			}
			#code...display the results
			echo '<div class="col-md-4 col-sm-6">
		<div class="portfolio-item">
				<div class="thumb">
						<a href="gal.php?id=' . $cat[ 'id' ] . '"><div class="hover-effect">
								<div class="hover-content">
										<h1>' . $cat[ 'cat_name' ] . '</h1>
										<p><br></p>
								</div>
						</div></a>
						<div class="image">
								<img src="admin/images/' . $photo . '" width="360px" height="278.11px">
						</div>
				</div>
		</div>
</div>';
		}
	}
	mysqli_close( $con );
}

function getphotos( $table, $id ) {
	require( "db.php" );
	$sql = "SELECT * FROM $table WHERE cat_id='$id' ORDER BY id DESC";
	if ( $result = mysqli_query( $con, $sql ) ) {
		//count number of rows in query result
		$rowcount = mysqli_num_rows( $result );
		//if no rows returned show no news alert
		if ( $rowcount == 0 ) {
			# code...
			echo 'No photo';
		}
		foreach ( $result as $results => $photo ) {
			# code...
			echo '<div class="col-md-4 col-sm-6">
                <div class="portfolio-item">
                    <a href="admin/images/' . $photo[ 'name' ] . '" data-lightbox="image-1"><div class="thumb">
                         <div class="hover-effect">
                            <div class="hover-content">
                                <h1>'.$photo['title'].'</h1>
                                <p><br></p>
                            </div>
                        </div>
                        <div class="image">
                            <img src="admin/images/' . $photo[ 'name' ] . '" width="452.66px" height="349.69px">
                        </div>
                    </div></a>
                </div>
            </div>';
		}
	}
}
?>