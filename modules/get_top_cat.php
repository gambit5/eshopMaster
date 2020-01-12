<?php
	$li_index = 0;
	include ('../simple_html_dom.php');
	$main_page = file_get_html('https://alser.kz/');
    //
    foreach($main_page->find('.nav-main') as $nav_main)
    {
        foreach($nav_main->find('li') as $li)
        {
			foreach($li->find('a') as $a){
				$a->last_child()->outertext = " ";
			}
			foreach($li->find('.nav-main-catalog') as $nav_main_catalog){
                //
                $link_index = 0;
				foreach($nav_main_catalog->find('a') as $last_link){
                //
                $link_index++;
				echo '<div class="row">';
					echo '<div class="col-lg-6">';
						echo $last_link->innertext();
						echo '<br>';
						$catalog_page = 'https://alser.kz'.$last_link->href;
						echo '<small><b><a id="cat_link_ur'.$link_index.'" href="'.$catalog_page.'" target="_blank;"> <i class="fas fa-link"></i> '.$catalog_page.'</a></b></small>';
					echo '</div>';
					echo '<div class="col-lg-6" style="text-align:right;">';
						echo '<button type="button" class="btn btn-primary get_cat_info" id="ur'.$link_index.'"> <i class="fas fa-info-circle"></i></button> <button type="button" class="btn btn-success"> <i class="fas fa-download"></i></button>';
					echo '</div>';
                    echo '<div class="col-lg-12 url_result" id="panel_ur'.$link_index.'" >';
                    echo '</div>';
					echo '<div class="col-lg-12">';
						echo '<hr>';
					echo '</div>';
				echo '</div>';
				}
			}

        }
    }
?>

<script>
    //
    $('.get_cat_info').click(function() {
        $('.status').fadeIn('fast');
        var link_index = $(this).attr('id');
        var link_url = $("#cat_link_"+link_index).attr('href');
        //
        $.ajax({
            type: 'POST',
            url: '../modules/get_cat_info_link.php',
            data: 'link_url='+link_url,
            success: function(data) {
                $('#panel_'+link_index).html(data);
            }
        });

    });
    $('.status').fadeOut('fast');
    //
</script>
