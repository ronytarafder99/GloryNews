<ul class="social">
    <li>
        <a class="share-twitter" href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp; target="_blank">
            <i class="fab fa-twitter"></i>
        </a>
    </li>
    <li>
        <a class="share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank">
            <i class="fab fa-facebook-f"></i>
        </a>
    </li>
    <li>
        <a class="share-facebook" href="whatsapp://send?text=<?php echo ($title . " " . $url); ?>" target="_blank">
            <i class="fab fa-whatsapp"></i>
        </a>
    </li>
</ul>