<h1>Thêm mới Task</h1>
<form action="<?=WEBROOT?>task/store" method="post">
    <input name="created_at" type="hidden" value="<?=date("Y-m-d h:i:sa")?>">
    <div class="form-group">
        <label for="title">Tên Task</label>
        <input class="form-control" type="text" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="description">Mô Tả Task</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    <div>
        <button name="btn" class="btn btn-success">Thêm mới</button>
    </div>
</form>