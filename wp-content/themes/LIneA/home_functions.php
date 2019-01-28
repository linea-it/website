<?php

function page_link_container($page_id, $title='', $link='', $image_id='') {
    $str = '';
    $page_data = get_post( $page_id );
    setup_postdata($page_data);
    if ($image_id == ''){
        $thumbnail_tag = get_the_post_thumbnail($page_id, 'full');
    } else {
        $attach = wp_get_attachment_image_src($image_id, 'full');
        if ($attach){
            $thumbnail_tag = '<img src="' . $attach[0] . '">';
        }
    }

    if ($title == ''){
        $title = $page_data->post_title;
    }

    if ($link == ''){
        $link = get_the_permalink($page_id);
    }

    $str .= '<div class="page-link-container">';
    $str .= '   <a class="page-card-link" href="' . $link . '">';
    if ($thumbnail_tag) {
        $str .= '<div class="page-link-icon-container">';
        $str .= $thumbnail_tag;
        $str .= '</div>';
    }
    $str .= '   <h3 class="page-link-card-title">';
    $str .= $title;
    $str .= '   </h3>';
    $str .= '   </a>';
    $str .= '</div>';
    return $str;
}
