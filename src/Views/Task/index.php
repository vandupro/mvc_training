<h1>Danh sách Task</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Stt</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($tasks as $task)
    {
        echo '<tr>';
        echo "<td>" . $task['id'] . "</td>";
        echo "<td>" . $task['title'] . "</td>";
        echo "<td>" . $task['description'] . "</td>";
        echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/MVC_todo/tasks/edit/" . $task["id"] . "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/MVC_todo/tasks/delete/" . $task["id"] . "' 
        class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>