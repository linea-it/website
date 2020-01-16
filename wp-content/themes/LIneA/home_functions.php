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

function get_tweets($screen_name, $count){
    $ch = curl_init('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$screen_name.'&count='.$count);
    $authorization = "Authorization: Bearer ".TWITTER_KEY;
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    return json_decode($result);
}

function get_tweet_url($tweet, $twitter_base_url){
    return $twitter_base_url.$tweet->user->screen_name.'/status/'.$tweet->id_str;
}

function get_tweet_date_formated($tweet, $output_format){
    // Twitter format "Thu Apr 06 15:28:43 +0000 2017"
    $date = DateTime::createFromFormat('D M d H:i:s O Y', $tweet->created_at);
    return date_i18n($output_format, $date->getTimestamp());
}

function get_image_url_by_slug($slug){
    $args = array(
        'post_type'   => 'attachment',
        'post_status' => 'any',
        'posts_per_page' => 1,
        'name' => $slug
    );

    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) {
        $the_query->the_post();
        return wp_get_attachment_image_src(get_the_ID(), 'full')[0];
    }
}