<h1>Danh sách Student</h1>
<div style="text-align:left; margin: 10px 0;">
    <a class="btn btn-primary" href="<?=WEBROOT?>student/create">Thêm mới</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Ngày sinh</th>
            <th class='text-center'>Action</th>
        </tr>
    </thead>
    
    <tbody>
    <?php
    $onclick = " onclick=\""."return confirm('Bạn có muốn xóa')". "\"";
    $gender = '';
    foreach ($students as $student)
    {   
        if($student['gender']) $gender = 'Nam';
        if(!$student['gender']) $gender = 'Nữ';
        echo '<tr>';
        echo "<td>" . $student['name'] . "</td>";
        echo "<td>" . $gender. "</td>";
        echo "<td>" . $student['dob'] . "</td>";
        echo "<td class='text-center'>
        <a class='btn btn-warning mr-3' href=" . WEBROOT . 'student/edit/'.$student['studentId'].'>Edit</a>'
        . "<a class='btn btn-danger' href=" . WEBROOT . 'student/delete/'.$student['studentId'].$onclick.'>Del</a>'
        . "</td>";
    }
    ?>
    </tbody>
</table>