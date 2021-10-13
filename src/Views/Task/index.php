<h1>Danh sách Task</h1>
<div style="text-align:left; margin: 10px 0;">
    <a class="btn btn-primary" href="<?=WEBROOT?>task/creat">Thêm mới</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Stt</th>
            <th>Title</th>
            <th>Description</th>
            <th class='text-center'>Action</th>
        </tr>
    </thead>
    
    <tbody>
    <?php
    $onclick = " onclick=\""."return confirm('Bạn có muốn xóa')". "\"";
    foreach ($tasks as $task)
    {
        echo '<tr>';
        echo "<td>" . $task['id'] . "</td>";
        echo "<td>" . $task['title'] . "</td>";
        echo "<td>" . $task['description'] . "</td>";
        echo "<td class='text-center'>
        <a class='btn btn-warning mr-3' href=" . WEBROOT . 'task/edit/'.$task['id'].'>Edit</a>'
        . "<a class='btn btn-danger' href=" . WEBROOT . 'task/delete/'.$task['id'].$onclick.'>Del</a>'
        . "</td>";
    }
    ?>
    </tbody>
</table>