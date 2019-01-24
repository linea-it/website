<?php

function page_link_container($page_id) {
    $str = '';
    $page_data = get_post( $page_id );
    setup_postdata($page_data);
    $thumbnail_tag = get_the_post_thumbnail($page_id, 'full');
    $str .= '<div class="page-link-container">';
    $str .= '   <a class="page-card-link" href="' . get_the_permalink($page_id) . '">';
    if ($thumbnail_tag) {
        $str .= '<div class="page-link-icon-container">';
        $str .= $thumbnail_tag;
        $str .= '</div>';
    }
    $str .= '   <h3 class="page-link-card-title">';
    $str .= $page_data->post_title;
    $str .= '   </h3>';
    $str .= '   </a>';
    $str .= '</div>';
    return $str;
}
