<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<nav aria-label="Page navigation">
			<ul class="pagination">
				<?php 
	    		//Kiểm tra để load nút trang trước
				if($totalOfPage != 1) {
					if ($currentPage != 1) {
						if (isset($homepage)) {
							echo '<li><a href="index.php?c=home&p='.($currentPage-1).'"  aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';	
						}
						else
						{
							echo '<li><a href="index.php?c=products&p='.($currentPage-1).'"  aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
						}
					}
				}

	      		//Load các nút danh sách trang
				for($i = 1; $i <= $totalOfPage; $i++)
				{
	      		//Kiểm tra trang hiện tại
					if($i==$currentPage)
					{
						echo '<li class="active"><span>'.$i.'</span></li>';
					}
					else
					{
						if (isset($homepage)) {
							echo '<li><a href="index.php?c=home&p='.$i.'">'.$i.'</a></li>';
						}
						else
						{
							echo '<li><a href="index.php?c=products&p='.$i.'">'.$i.'</a></li>';
						}
					}
				}

	      		//Kiểm tra để load nút trang kế
				if ($totalOfPage != $currentPage) {
					if (isset($homepage)) {
						echo '<li><a href="index.php?c=home&p='.($currentPage+1).'"  aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
					}
					else
					{
						echo '<li><a href="index.php?c=products&p='.($currentPage+1).'"  aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
					}
				}
				?>

			</ul>
		</nav>
	</div>
</div>

