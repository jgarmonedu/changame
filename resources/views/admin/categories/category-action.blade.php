<div class="d-flex gap-3 justify-content-center">
    <a href="javascript:void(0)" data-toggle="tooltip" onClick="editCategory({{ $id }})"  data-original-title="Edit" class="edit btn btn-light border-green-600">
        <span class="text-green-600"><i class="fas fa-solid fa-pencil"></i></span>
    </a>
    <a href="javascript:void(0);" id="delete" onClick="deleteCategory({{ $id }})"  data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
        <span class="text-red-50"><i class="fas fa-solid fa-trash"></i></span>
    </a>
</div>
