<?php 
function cpagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged)) $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<div class='pagination center'>";
        echo "<ul>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1).
        "'><i class='fa fa-angle-double-left'></i></a></li>";
        if ($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1).
        "'><i class='fa fa-angle-left'></i></a></li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
                echo($paged == $i) ? "<li><span class='pagecur'>".$i.
                "</span></li>": "<li><a href='".get_pagenum_link($i).
                "' class='pagelink' >".$i.
                "</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1).
        "' class='btnPage'><i class='fa fa-angle-right'></i></a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages).
        "' class='btnPage'><i class='fa fa-angle-double-right'></i></a></li>";
        echo "</ul>";
        echo "</div>\n";
    }
}