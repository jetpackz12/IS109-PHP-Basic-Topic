<div class="card <?php echo empty($color) ? $color = "bg-info" : $color; ?> text-white mb-4">
    <div class="card-body text-center fs-1 py-5"><?php echo empty($text) ? $text = "No value" : $text; ?></div>
    <div class="card-footer d-flex align-items-center justify-content-between">
        <a class="small text-white stretched-link" href="<?php echo empty($link) ? $link = "#" : $link; ?>">View Details</a>
        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
    </div>
</div>