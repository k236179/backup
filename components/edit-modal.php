<!-- Button trigger modal -->
<button type="button" class="btn-sm btn-warning text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
    編輯
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">

            <div class="modal-header bg-info text-light">
                <h3 class="modal-title " id="exampleModalLabel">編輯</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="http://localhost:8080/project/components/<?= $edit_type ?>-form.php?id=<?= $row["id"] ?>"
                    frameborder="0" scrolling="no" style="height: 60vh;" class="w-100"></iframe>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>