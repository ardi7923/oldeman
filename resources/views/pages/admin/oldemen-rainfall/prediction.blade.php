<form action="{{ url('admin/prediction-rainfall') }}" method="POST" class="needs-validation" novalidate>
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"> @lang('main.form.add')</h4>
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
                    <option> 2017 </option>
                    <option> 2018 </option>
                    <option> 2019 </option>
                    <option> 2020 </option>
                    @for ($i = 0; $i <= 5; $i++)
                        <option> {{ (now()->format("Y")) + $i }} </option>
                    @endfor
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
            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-reply-all"></i> @lang('main.button.cancel')</button>
            <button type="submit" class="btn btn-success "> <i class="fa fa-paper-plane"></i> @lang('main.button.save')</button>
        </div>
    </div>
</form>

<script>

</script>