<?php
	if ($number>1)
	{
?>

				<ul class="pagination justify-content-end" style="margin:20px ; ">
					<?php
						if ($page>1)
						{
							echo '<li class="page-item "><a class="page-link" href="?page='.($page-1).'&s='.$s.'">Previous</a></li> ';
						} 
					?>
					<?php
						$avaiablePage=[1, $page-1, $page, $page+1, $number];
						$isFirst= $isLast= false;
						for ($i=0; $i < $number; $i++)
						{
							if (!in_array($i+1,$avaiablePage))
							{
								if (!$isFirst && $page >3)
								{
									echo '<li class="page-item"><a class="page-link" href="?page='.($page-2).'&s='.$s.'">...</a></li> ';
									$isFirst= true;
								}
								if (!$isLast && $i > $page)
								{
									echo '<li class="page-item"><a class="page-link" href="?page='.($page+2).'&s='.$s.'">...</a></li> ';
									$isLast= true;
								}
								continue;
							}
							if ($page==$i+1)
							{
								echo '<li class="page-item active"><a class="page-link" href="?page='.($i+1).'">'.($i+1).'</a></li> ';
							} 
							else{
								echo '<li class="page-item"><a class="page-link" href="?page='.($i+1).'&s='.$s.'">'.($i+1).'</a></li> ';
							}
							
						}
					?>
					<?php
						if ($page<$number)
						{
							echo '<li class="page-item "><a class="page-link" href="?page='.($page+1).'&s='.$s.'">Next</a></li> ';
						} 
					?>
					
				</ul>
<?php
	}
?>