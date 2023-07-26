<x-page-base>
    <x-slot name="main">
<form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="file" name="file" required>
    <button type="submit">アップロード</button>
</form>

</x-slot>
</x-page-base>
