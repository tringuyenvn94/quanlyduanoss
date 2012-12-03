<body>
<table width="1000" border="0" align="center" cellpadding="1" cellspacing="1">
	<tr valign="top">
		<td width="175" rowspan="4">
		
		<div class='sidebarmenu'>
		<ul id='sidebarmenu1'>
		<?php
		foreach($cats as $row)
		{
			echo "<li><a href='#'>$row[cat_name]</a><ul>";
			foreach($subcats as $subrow)
			{
				foreach($subrow as $subcat)
				{
					if($subcat['cat_id']==$row['cat_id'])
					{
						echo "<li>";
						//echo anchor('cat/'.$subcat['subcat_id'], $subcat['subcat_name']);
						echo "<a href='".link_cat($subcat['subcat_id'], $subcat['subcat_name'], $row['cat_name'])."'>".$subcat['subcat_name']."</a>";
						echo "</li>";
					}
				}
				
			}
			echo "</ul></li>";
		}
		?>
		</ul>
		</div>
		</td>	
