<form action="<?php echo htmlspecialchars(isset($postUrl) ? $postUrl : ''); ?>" method="post">
    <?php if (isset($item['id'])): ?>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($item['id']); ?>">
    <?php endif; ?>
    <input type="text" name="value" value="<?php echo htmlspecialchars(isset($item['item_name']) ? $item['item_name'] : ''); ?>">
    <input type="submit" value="提交">
</form>

<a class="big" href="/item/index">返回</a>