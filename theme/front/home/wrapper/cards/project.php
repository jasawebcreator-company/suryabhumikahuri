<?php
$project_img = !empty($project->img_cover_url) ? $project->img_cover_url : ($project->img_thumb_url ?? '');
$project_label = trim(($project->tags ?? '') . (!empty($project->tags) && !empty($project->custom_field_1) ? ' • ' : '') . ($project->custom_field_1 ?? ''));
$project_sub = !empty($project->custom_field_2) ? $project->custom_field_2 : '';
?>
<a class="project-card" href="<?= htmlspecialchars(base_url(ROUTE_PRODUCT_VIEW . urlencode($project->slug))) ?>">
    <img src="<?= htmlspecialchars($project_img ?? 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1400&q=80') ?>" alt="<?= htmlspecialchars($project->title) ?>" loading="lazy">
    <div class="project-shade"></div>
    <div class="project-meta">
        <span><?= htmlspecialchars($project_label) ?></span>
        <h3><?= htmlspecialchars($project->title) ?></h3>
        <?php if ($project_sub !== ''): ?>
            <p><?= htmlspecialchars($project_sub) ?></p>
        <?php endif; ?>
    </div>
</a>
