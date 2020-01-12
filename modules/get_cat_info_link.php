<?php
    include ('../simple_html_dom.php');
    $link = $_POST['link_url'];
    //
    echo '<div style="background:#f4f4f4;margin-top: 10px;padding: 10px;max-height:100px;overflow-y:scroll;font-size:13px;color: #0b0b0b;padding-left: 20px;border: 1px solid #cacaca;margin-left: 15px;">';
        $url_html = file_get_html($link);

        $pc = 0;
        foreach($url_html->find('.pagination--block') as $pages_count_block){
            foreach($pages_count_block->find('.list-inline') as $pages_count){
                //
                echo 'Всего страниц c товаром: '.$pages_count->last_child()->prev_sibling()->last_child()->innertext().'<br>';
                $pc = $pages_count->last_child()->prev_sibling()->last_child()->innertext();
                //
            }
        }
        //
        for ($i = 1; $i <= $pc; $i++) {
            $url_html = file_get_html($link.'?page='.$i);
            echo '<b style="color: grey;">страница'.$i.'</b><br>';
            //
            foreach($url_html->find('.good-items-list') as $product_list){
                foreach($product_list->find('.good-item') as $product){
                    foreach($product->find('.good-item-title') as $product_title){
                        echo $product_title->last_child()->innertext.'<br>';
                        echo 'Сылка: '.$product_title->last_child()->href.'<br>';
                        $product_page = file_get_html('https://alser.kz'.$product_title->last_child()->href);
                        foreach($product_page->find('.product-info--tech') as $product_info){
                            foreach($product_info->find('.block-inner') as $product_table){
                                foreach($product_table->find('.row') as $info){
                                    echo $info->first_child()->innertext.': ';
                                    echo $info->first_child()->next_sibling()->innertext.'<br>';
                                }
                            }
                        }
                    }
                    foreach($product->find('.good-item-meta') as $product_id){
                        echo $product_id->innertext.'<br>';
                    }
                }
            }
        }


    echo '</div>';
?>
<script>
$('.status').fadeOut('fast');
</script>
