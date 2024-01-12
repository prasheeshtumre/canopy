<form action="{{ route('upload-qr') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" accept="text/csv">
    <button type="submit">Import</button>
</form>