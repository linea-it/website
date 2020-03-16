<?php

Class PostObject {
    public $permalink;
    public $thumb_tag;
    public $title;
    public $date;
    public $string_date;
}

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

function get_tweets($screen_name, $count, $tag){
    $ch = curl_init('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name='.$screen_name.'&count='.$count.'&tweet_mode=extended');
    $authorization = "Authorization: Bearer ".TWITTER_KEY;
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json' , $authorization ));
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    $tweets_with_tag = array();
    curl_close($ch);
    $tweets = json_decode($result);
    foreach ($tweets as $tweet){
        if (substr_count($tweet->full_text, $tag) > 0) {
            array_push($tweets_with_tag, $tweet);
        }
    }
    return $tweets_with_tag;
}

function get_tweet_url($tweet, $twitter_base_url){
    return $twitter_base_url.$tweet->user->screen_name.'/status/'.$tweet->id_str;
}

function show_tweet($tweet, $twitter_base_url, $twitter_logo_slug){
    $str = '';
    $str .= '<div class="tweets-item">';
    $str .= '    <a href="' . get_tweet_url($tweet, $twitter_base_url). '" title="ver tweet">';
    $str .= '        <div class="tweets-img-container">';
    $str .= '            <img src="' . get_image_url_by_slug($twitter_logo_slug) .'" />';
    $str .= '        </div>';
    $str .= '        <p class="tweets-item-title">' . $tweet->full_text . '</p>';
    $str .= '    </a>';
    $str .= '    <span class="tweets-item-date">' . get_tweet_date_formated($tweet, 'd \d\e F \d\e Y') . '</span>';
    $str .= '</div>';
    echo $str;
}

function get_tweet_date($tweet){
    // Twitter format "Thu Apr 06 15:28:43 +0000 2017"
    return DateTime::createFromFormat('D M d H:i:s O Y', $tweet->created_at);
}

function get_tweet_date_formated($tweet, $output_format){
    $date = get_tweet_date($tweet);
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

function get_blogs($num_posts){
    $args = array( 
        'posts_per_page' => $num_posts,
        'order'=> 'DESC',
        'orderby' => 'date',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => 'blog'
            )
        )
    );
    $query = new WP_Query( $args );
    $posts = array();
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $post_object = new PostObject();
            $post_object->permalink = get_the_permalink();
            $post_object->thumb_tag = get_the_post_thumbnail(get_the_ID(), 'full');
            $post_object->title = get_the_title();
            $post_object->date = DateTime::createFromFormat('Ymd H:i:s', get_the_date('Ymd H:i:s'));
            $post_object->string_date = get_the_date('d \d\e F \d\e Y');

            array_push($posts, $post_object);
        }
    }
    return $posts;
}

function show_blog($post_object){
    $str = '';
    $str .= '<div class="news-item">';
    $str .= '    <a href="' . $post_object->permalink . '">';
    $str .= '        <div class="news-img-container">';
    $str .= '            ' . $post_object->thumb_tag;
    $str .= '        </div>';
    $str .= '        <h3 class="news-item-title">' . $post_object->title . '</h3>';
    $str .= '    </a>';
    $str .= '    <span class="news-item-date">' . $post_object->string_date . '</span>';
    $str .= '</div>';

    echo $str;
}

function merge_tweets_and_blogs($tweets, $blogs, $array_limit){
    $news = array();
    foreach($tweets as $tweet){
        $item = ['type'=>'tweet', 'date'=>get_tweet_date($tweet), 'obj'=>$tweet];
        array_push($news, $item);
    }
    foreach($blogs as $blog){
        $item = ['type'=>'blog', 'date'=>$blog->date, 'obj'=>$blog];
        array_push($news, $item);
    }
    usort($news, 'news_compare');
    return array_chunk(array_reverse($news), $array_limit)[0];
}

function news_compare($x, $y){
    if ($x['date'] == $y['date'])
    return 0;
    else if ($x['date'] > $y['date'])
    return 1;
    else
    return -1;
}