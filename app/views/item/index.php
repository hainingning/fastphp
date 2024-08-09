<form action="/item/index" method="get">
    <input type="text" name="keyword" value="<?php echo isset($keyword) ? htmlspecialchars($keyword) : ''; ?>">
    <input type=submit value=搜索>
</form>

<p><a href=/item/manage>新建</a></p>

<table>
    <tr>
        <th>ID</th>
        <th>内容</th>
        <th>操作</th>
    </tr>
    <?php if (isset($items) && is_array($items)): ?>
        <?php foreach ($items as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['id']); ?></td>
                <td><?php echo htmlspecialchars($item['item_name']); ?></td>
                <td>
                    <a href="/item/manage/<?php echo htmlspecialchars($item['id']); ?>">编辑</a>
                    <a href="/item/delete/<?php echo htmlspecialchars($item['id']); ?>">删除</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">没有找到条目。</td>
        </tr>
    <?php endif; ?>
</table>