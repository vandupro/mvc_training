<h1>Cập nhật Task</h1>
<form action="<?=WEBROOT?>task/store" method="post">
    <input type="hidden" value="<?=$task['id']?>" name="id">
    <div class="form-group">
        <label for="title">Tên Task</label>
        <input value="<?=$task['title']?>" class="form-control" type="text" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="description">Mô Tả Task</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?=$task['description']?></textarea>
    </div>
    <div>
        <button name="btn" class="btn btn-success">cập nhật</button>
    </div>
</form>