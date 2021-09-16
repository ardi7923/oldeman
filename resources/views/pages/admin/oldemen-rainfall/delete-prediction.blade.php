<form action="{{ url('admin/delete-prediction-rainfall') }}" method="POST" class="needs-validation" novalidate>
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> Hapus Prediksi</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="errors"></div>

        @csrf

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tahun </label>
            <div class="col-sm-10">
                <select class="form-control" name="year" required>
                    <option disabled selected value="">--PILIH--</option>
                    @foreach ($predictions as $p)
                        <option> {{ $p->year }} </option>
                    @endforeach
                </select>
            </div>
        </div>



    </div>
    <div class="modal-footer">

        <div class="loading" style="display: none;">
            <div class="spinner-border text-primary" role="status" style="width: 30px; height: 30px; margin-right:20px">
            </div>
        </div>

        <div class="button">
            <button type="button" class="btn btn-primary" data-dismiss="modal"> <i class="fa fa-reply-all"></i> @lang('main.button.cancel')</button>
            <button type="submit" class="btn btn-danger "> <i class="fa fa-trash"></i> Hapus</button>
        </div>
    </div>
</form>

<script>

</script>